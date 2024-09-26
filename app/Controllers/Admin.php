<?php

namespace App\Controllers;

class Admin extends BaseController
{
    // Loads the dashboard (index view)
    public function index(): string
    {
        $data = [
            'title' => 'Admin Dashboard'
        ];
        return view('Admin/index', $data);
    }

    // Loads the login page
    public function login(): string
    {
        $data = [
            'title' => 'Login'
        ];
        return view('Admin/login', $data);
    }

    // Loads the register page
    public function register(): string
    {
        $data = [
            'title' => 'Register'
        ];
        return view('Admin/register', $data);
    }

    // Loads the register page
    public function forgot(): string
    {
        $data = [
            'title' => 'Forgot Password'
        ];
        return view('Admin/forgot-password', $data);
    }

    // Loads the charts page
    public function charts(): string
    {
        $data = [
            'title' => 'Charts'
        ];
        return view('Admin/charts', $data);
    }

    // Loads the tables page
    public function tables(): string
    {
        $data = [
            'title' => 'Tables'
        ];
        return view('Admin/tables', $data);
    }

    // Loads the buttons page
    public function buttons(): string
    {
        $data = [
            'title' => 'Buttons'
        ];
        return view('Admin/buttons', $data);
    }

    // Loads the cards page
    public function cards(): string
    {
        $data = [
            'title' => 'Cards'
        ];
        return view('Admin/cards', $data);
    }

    // Dynamic method for loading utility views
    public function utilities($type = 'animation'): string
    {
        $data = [
            'title' => 'Utilities - ' . ucfirst($type)
        ];
        return view('Admin/utilities-' . $type, $data);
    }

    // Loads the 404 error page
    public function error404(): string
    {
        $data = [
            'title' => 'Page Not Found'
        ];
        return view('Admin/404', $data);
    }

    // Loads the blank page
    public function blank(): string
    {
        $data = [
            'title' => 'Blank Page'
        ];
        return view('Admin/blank', $data);
    }
}
