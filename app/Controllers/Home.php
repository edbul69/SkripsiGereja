<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'GPDI BAHU'
        ];
        return view('Home/index', $data);
    }
    public function news(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Berita'
        ];
        return view('Home/all-news', $data);
    }
    public function sample(): string
    {
        $data = [
            'title' => 'Berita - Sample'
        ];
        return view('Home/news-sample', $data);
    }
    public function baptisan(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Baptisan Air'
        ];
        return view('Home/pelayanan/baptisan-air', $data);
    }
}
