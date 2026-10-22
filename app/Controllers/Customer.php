<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Customer extends Controller
{
    public function register()
    {
        return view('customer_register');
    }

    public function login()
    {
        return view('customer_login');
    }

    public function save()
    {
        $validation = [
            'fname'    => 'required|min_length[2]|max_length[100]',
            'mname'    => 'permit_empty|max_length[100]',
            'lname'    => 'required|min_length[2]|max_length[100]',
            'bday'     => 'required|valid_date[Y-m-d]',
            'gender'   => 'required|in_list[Male,Female,Prefer not to say]',
            'address'  => 'required|max_length[255]',
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email|max_length[150]',
            'phone'    => 'required|min_length[7]|max_length[20]',
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($validation)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $db = Database::connect();

        $fname = trim($this->request->getPost('fname'));
        $mname = trim($this->request->getPost('mname') ?? '');
        $lname = trim($this->request->getPost('lname'));
        $username = trim($this->request->getPost('username'));
        $email = strtolower(trim($this->request->getPost('email')));

        // Check if the email is already registered.
        $existingEmail = $db->table('customers')
            ->where('email', $email)
            ->countAllResults();

        if ($existingEmail > 0) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email is already registered.');
        }

        // Check if the username is already taken.
        $existingUsername = $db->table('customers')
            ->where('username', $username)
            ->countAllResults();

        if ($existingUsername > 0) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username is already taken.');
        }

        $db->table('customers')->insert([
            'fname'    => $fname,
            'mname'    => $mname !== '' ? $mname : null,
            'lname'    => $lname,
            'bday'     => $this->request->getPost('bday'),
            'gender'   => $this->request->getPost('gender'),
            'address'  => trim($this->request->getPost('address')),
            'username' => $username,
            'email'    => $email,
            'phone'    => trim($this->request->getPost('phone')),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
        ]);

        return redirect()->to(site_url('customer/login'))
            ->with('success', 'Registration successful! You can now log in.');
    }

    public function authenticate()
    {
        $email = strtolower(trim($this->request->getPost('email')));
        $password = $this->request->getPost('password');

        $customer = Database::connect()
            ->table('customers')
            ->where('email', $email)
            ->get()
            ->getRowArray();

        if (
            !$customer ||
            !password_verify($password, $customer['password'])
        ) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid email or password.');
        }

        $customerName = trim(
            ($customer['fname'] ?? '') . ' ' .
            ($customer['mname'] ?? '') . ' ' .
            ($customer['lname'] ?? '')
        );

        session()->set([
            'customer_id'        => $customer['customer_id'],
            'customer_name'      => $customerName,
            'customer_email'     => $customer['email'],
            'user_type'          => 'customer',
            'customer_logged_in' => true,
        ]);

        return redirect()->to(site_url('customer/dashboard'));
    }

    public function dashboard()
    {
        if (
            !session()->get('customer_logged_in') ||
            session()->get('user_type') !== 'customer'
        ) {
            return redirect()->to(site_url('customer/login'));
        }

        return view('customer_dashboard');
    }

    public function logout()
    {
        session()->remove([
            'customer_id',
            'customer_name',
            'customer_email',
            'user_type',
            'customer_logged_in',
        ]);

        return redirect()->to(site_url('customer/login'));
    }
}