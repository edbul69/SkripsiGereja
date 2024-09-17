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
    ////////////////////////////////////////////////////////////////
    public function baptisan(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Baptisan Air'
        ];
        return view('Home/pelayanan/baptisan-air', $data);
    }
    public function penyerahan(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Penyerahan Anak'
        ];
        return view('Home/pelayanan/penyerahan-anak', $data);
    }
    public function perjamuan(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Perjamuan Kudus'
        ];
        return view('Home/pelayanan/perjamuan-kudus', $data);
    }
    public function sunday(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Sunday Service'
        ];
        return view('Home/pelayanan/sunday-service', $data);
    }
    public function doa(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Doa Bersama'
        ];
        return view('Home/pelayanan/doa-bersama', $data);
    }
    public function ibadah(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Ibadah Rayon'
        ];
        return view('Home/pelayanan/ibadah-rayon', $data);
    }

    public function moc(): string
    {
        $data = [
            'title' => 'GPDI BAHU - MOC'
        ];
        return view('Home/pelayanan/moc', $data);
    }
    public function aba(): string
    {
        $data = [
            'title' => 'GPDI BAHU - ABA'
        ];
        return view('Home/pelayanan/aba', $data);
    }
    public function sekolah(): string
    {
        $data = [
            'title' => 'GPDI BAHU - Sekolah Minggu'
        ];
        return view('Home/pelayanan/sekolah-minggu', $data);
    }
}
