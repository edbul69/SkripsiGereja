<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('Admin/index', $data);
    }
}
