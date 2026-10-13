<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class Customer extends Controller
{ public function dashboard()
{
    if (!session()->get('customer_logged_in')) {
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
        'customer_logged_in'
    ]);

    return redirect()->to(site_url('customer/login'));
}
    public function register()
    {
        return view('customer_register');
    }

    public function login()
    {
        return view('customer_login');
    }

public function authenticate()
{
    $email = strtolower(trim($this->request->getPost('email')));
    $password = $this->request->getPost('password');

    $customer = \Config\Database::connect()
        ->table('customers')
        ->where('email', $email)
        ->get()
        ->getRowArray();

    if (!$customer || !password_verify($password, $customer['password'])) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Invalid email or password.');
    }

    session()->set([
        'customer_id' => $customer['customer_id'],
        'customer_name' => $customer['full_name'],
        'customer_email' => $customer['email'],
        'user_type' => 'customer',
        'customer_logged_in' => true,
    ]);

    return redirect()->to(site_url('customer/dashboard'));
}

    public function save()
    {
        $validation = [
            'full_name' => 'required|min_length[2]|max_length[150]',
            'email'     => 'required|valid_email|max_length[150]',
            'phone'     => 'required|min_length[7]|max_length[20]',
            'password'  => 'required|min_length[8]',
        ];

        if (!$this->validate($validation)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $db = Database::connect();
        $email = strtolower(trim($this->request->getPost('email')));

        $existing = $db->table('customers')
            ->where('email', $email)
            ->countAllResults();

        if ($existing > 0) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email is already registered.');
        }

        $db->table('customers')->insert([
            'full_name' => trim($this->request->getPost('full_name')),
            'email'     => $email,
            'phone'     => trim($this->request->getPost('phone')),
            'password'  => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
        ]);

        return redirect()->to(site_url('customer/register'))
            ->with('success', 'Registration successful! You can now log in once customer login is available.');
    }
}
