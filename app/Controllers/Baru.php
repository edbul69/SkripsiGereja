<?php

namespace App\Controllers;

class Baru extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home'
        ];
        return view('Migrasi/index', $data);
    }
}
