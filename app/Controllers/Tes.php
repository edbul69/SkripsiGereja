<?php

namespace App\Controllers;

class Tes extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Tes'
        ];
        return view('Tes/index', $data);
    }
}
