<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Admin Dashboard'
        ];
        return view('Admin/index', $data);
    }
}
