<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class EmployeeAuth extends Controller
{
    // Display employee login page
    public function login()
    {
        return view('employee_login');
    }

    // Check employee credentials
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

        session()->set([
            'employee_user_id' => $user['user_id'],
            'employee_username' => $user['username'],
            'employee_role' => $user['role'],
            'employee_logged_in' => true,
        ]);

        return redirect()->to(site_url('employee/dashboard'));
    }

    // Display employee dashboard
    public function dashboard()
    {
        if (!session()->get('employee_logged_in')) {
            return redirect()->to(site_url('employee/login'));
        }

        return view('employee_dashboard');
    }

    // Log out employee
    public function logout()
    {
        session()->remove([
            'employee_user_id',
            'employee_username',
            'employee_role',
            'employee_logged_in',
        ]);

        return redirect()->to(site_url('employee/login'))
            ->with('success', 'You have been logged out.');
    }
}
