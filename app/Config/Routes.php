<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('dbtest', 'DbTest::index');
$routes->get('customer/register', 'Customer::register');
$routes->post('customer/save', 'Customer::save');
$routes->get('customer/login', 'Customer::login');
$routes->post('customer/authenticate', 'Customer::authenticate');
$routes->get('customer/dashboard', 'Customer::dashboard');
$routes->get('customer/logout', 'Customer::logout');
$routes->get('employee/login', 'EmployeeAuth::login');
$routes->post('employee/authenticate', 'EmployeeAuth::authenticate');
$routes->get('employee/dashboard', 'EmployeeAuth::dashboard');
$routes->get('employee/logout', 'EmployeeAuth::logout');
