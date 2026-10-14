<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class EmployeeAuth extends Controller
{
    public function login()
    {
        return view('employee_login');
    }

    public function authenticate()
    {
        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        $user = Database::connect()
            ->table('users')
            ->where('username', $username)
            ->get()
            ->getRowArray();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        session()->regenerate();

        session()->set([
            'employee_user_id' => $user['user_id'],
            'employee_id' => $user['employee_id'],
            'employee_username' => $user['username'],
            'employee_role' => $user['role'],
            'user_type' => 'employee',
            'employee_logged_in' => true,
        ]);

        return redirect()->to(site_url('employee/dashboard'));
    }

    public function dashboard()
    {
        if (
            !session()->get('employee_logged_in') ||
            session()->get('user_type') !== 'employee'
        ) {
            return redirect()->to(site_url('employee/login'));
        }

        $employeeId = session()->get('employee_id');
        $today = date('Y-m-d');

        $attendance = null;

        if ($employeeId) {
            $attendance = Database::connect()
                ->table('attendance')
                ->where('employee_id', $employeeId)
                ->where('DATE(time_in)', $today)
                ->orderBy('attendance_id', 'DESC')
                ->get()
                ->getRowArray();
        }

        return view('employee_dashboard', [
            'attendance' => $attendance,
        ]);
    }

    public function timeIn()
    {
        if (
            !session()->get('employee_logged_in') ||
            session()->get('user_type') !== 'employee'
        ) {
            return redirect()->to(site_url('employee/login'));
        }

        $employeeId = session()->get('employee_id');

        if (!$employeeId) {
            return redirect()->to(site_url('employee/dashboard'))
                ->with('error', 'No employee record is linked to this account.');
        }

        $db = Database::connect();
        $today = date('Y-m-d');

        $existing = $db->table('attendance')
            ->where('employee_id', $employeeId)
            ->where('time_in >=', $today . ' 00:00:00')
            ->where('time_in <=', $today . ' 23:59:59')
            ->get()
            ->getRowArray();

        if ($existing) {
            return redirect()->to(site_url('employee/dashboard'))
                ->with('error', 'You have already timed in today.');
        }

        $db->table('attendance')->insert([
            'employee_id' => $employeeId,
            'time_in' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('employee/dashboard'))
            ->with('success', 'Time In recorded successfully.');
    }

    public function timeOut()
    {
        if (
            !session()->get('employee_logged_in') ||
            session()->get('user_type') !== 'employee'
        ) {
            return redirect()->to(site_url('employee/login'));
        }

        $employeeId = session()->get('employee_id');

        if (!$employeeId) {
            return redirect()->to(site_url('employee/dashboard'))
                ->with('error', 'No employee record is linked to this account.');
        }

        $db = Database::connect();
        $today = date('Y-m-d');

        $attendance = $db->table('attendance')
            ->where('employee_id', $employeeId)
            ->where('time_in >=', $today . ' 00:00:00')
            ->where('time_in <=', $today . ' 23:59:59')
            ->where('time_out', null)
            ->orderBy('attendance_id', 'DESC')
            ->get()
            ->getRowArray();

        if (!$attendance) {
            return redirect()->to(site_url('employee/dashboard'))
                ->with('error', 'No active Time In record found.');
        }

        $db->table('attendance')
            ->where('attendance_id', $attendance['attendance_id'])
            ->update([
                'time_out' => date('Y-m-d H:i:s'),
            ]);

        return redirect()->to(site_url('employee/dashboard'))
            ->with('success', 'Time Out recorded successfully.');
    }

    public function logout()
    {
        session()->remove([
            'employee_user_id',
            'employee_id',
            'employee_username',
            'employee_role',
            'user_type',
            'employee_logged_in',
        ]);

        return redirect()->to(site_url('employee/login'))
            ->with('success', 'You have been logged out.');
    }

    public function manage()
    {
        if (!$this->isAdmin()) {
            return redirect()->to(site_url('employee/dashboard'))
                ->with('error', 'Access denied.');
        }

        $employees = Database::connect()
            ->table('employees')
            ->get()
            ->getResultArray();

        return view('employee_manage', [
            'employees' => $employees,
        ]);
    }

    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect()->to(site_url('employee/dashboard'))
                ->with('error', 'Access denied.');
        }

        return view('employee_create');
    }

    public function store()
    {
        if (!$this->isAdmin()) {
            return redirect()->to(site_url('employee/dashboard'))
                ->with('error', 'Access denied.');
        }

        $rules = [
            'fname' => 'required|min_length[2]|max_length[50]',
            'mname' => 'permit_empty|max_length[50]',
            'lname' => 'required|min_length[2]|max_length[50]',
            'birthday' => 'required|valid_date[Y-m-d]',
            'gender' => 'required|in_list[Male,Female,Prefer not to say]',
            'email' => 'required|valid_email|max_length[100]',
            'phone_number' => 'required|min_length[7]|max_length[20]',
            'address' => 'required|max_length[255]',
            'department' => 'required|max_length[100]',
            'username' => 'required|min_length[3]|max_length[50]',
            'password' => 'required|min_length[8]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $db = Database::connect();

        $username = trim($this->request->getPost('username'));
        $email = strtolower(trim($this->request->getPost('email')));

        if (
            $db->table('users')
                ->where('username', $username)
                ->countAllResults() > 0
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username is already taken.');
        }

        if (
            $db->table('employees')
                ->where('email', $email)
                ->countAllResults() > 0
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Employee email is already registered.');
        }

        $db->transBegin();

        try {
            $db->table('employees')->insert([
                'fname' => trim($this->request->getPost('fname')),
                'mname' => trim($this->request->getPost('mname') ?? ''),
                'lname' => trim($this->request->getPost('lname')),
                'birthday' => $this->request->getPost('birthday'),
                'gender' => $this->request->getPost('gender'),
                'email' => $email,
                'phone_number' => trim($this->request->getPost('phone_number')),
                'address' => trim($this->request->getPost('address')),
                'department' => trim($this->request->getPost('department')),
            ]);

            $employeeId = $db->insertID();

            $db->table('users')->insert([
                'employee_id' => $employeeId,
                'username' => $username,
                'password' => password_hash(
                    $this->request->getPost('password'),
                    PASSWORD_DEFAULT
                ),
                'role' => 'Employee',
            ]);

            if ($db->transStatus() === false) {
                throw new \RuntimeException('Database transaction failed.');
            }

            $db->transCommit();

            return redirect()->to(site_url('employee/manage'))
                ->with('success', 'Employee account created successfully.');
        } catch (\Throwable $e) {
            $db->transRollback();

            log_message(
                'error',
                'Employee creation failed: ' . $e->getMessage()
            );

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to create employee account. Check the employee fields and try again.');
        }
    }

    private function isAdmin()
    {
        return session()->get('employee_logged_in') === true
            && session()->get('employee_role') === 'Admin'
            && session()->get('user_type') === 'employee';
    }
}
