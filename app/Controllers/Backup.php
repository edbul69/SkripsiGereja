<?php

namespace App\Controllers;

class Backup extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home'
        ];
        return view('Home/backup', $data);
    }
}
