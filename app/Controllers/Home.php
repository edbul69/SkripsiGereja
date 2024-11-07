<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\BeritaModel;

class Home extends BaseController
{

    protected $jadwalModel;
    protected $beritaModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->beritaModel = new BeritaModel();
    }

    public function index(): string
    {
        // Load the BeritaModel to fetch the latest news
        $beritaModel = new \App\Models\BeritaModel();
        $latestNews = $beritaModel->orderBy('created', 'DESC')->limit(6)->findAll();

        // Pass the news data to the view
        $data = [
            'title' => 'GPDI BAHU',
            'latestNews' => $latestNews
        ];

        return view('Home/index', $data);
    }

    // BERITA CONTROLLER
    public function berita(): string
    {

        // Prepare the data array to pass to the view
        $data = [
            'title' => 'GPDI BAHU - Berita',
            'berita' => $this->beritaModel->getBerita()
        ];

        // Return the view with the prepared data
        return view('Home/all-news', $data);
    }

    public function isiBerita($slug) // Halaman Detail Berita
    {
        $data = [
            'title' => 'Detail Berita',
            'berita' => $this->beritaModel->getBerita($slug)
        ];

        if (empty($data['berita'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita Tidak Ditemukan');
        }

        return view('Home/news-body', $data);
    }

    // PELAYANAN CONTROLLER
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

    // Method to return JSON data for FullCalendar
    public function getEvents()
    {

        $events = $this->jadwalModel->findAll();

        // Format the data for FullCalendar
        $data = [];
        foreach ($events as $event) {
            $data[] = [
                'id' => $event['id'],
                'title' => $event['title'],
                'start' => $event['start'],
                'end' => $event['end'],
                'description' => $event['description'],
                'location' => $event['location']
            ];
        }

        // Return the JSON-encoded data
        return $this->response->setJSON($data);
    }
}
