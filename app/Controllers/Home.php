<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home'
        ];
        return view('Home/index', $data);
    }
    public function Backup(): string
    {
        $data = [
            'title' => 'Home'
        ];
        return view('Home/backup', $data);
    }
}
