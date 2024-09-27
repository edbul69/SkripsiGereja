<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $embedCode = ''; // Default video link

        if ($this->request->getMethod() === 'post') {
            $userVideoLink = $this->request->getPost('youtubeEmbedCode');

            // Convert standard YouTube URL to embed format if a valid URL is submitted
            if ($userVideoLink && strpos($userVideoLink, 'watch?v=') !== false) {
                $videoID = explode('watch?v=', $userVideoLink)[1];
                $embedCode = 'https://www.youtube.com/embed/' . $videoID;
            }
        }

        $data = [
            'title' => 'Admin Dashboard',
            'embedCode' => $embedCode
        ];

        return view('Admin/index', $data);
    }

    // Loads the list jemaat Page
    public function listJemaat(): string
    {
        $data = [
            'title' => 'List Jemaat'
        ];
        return view('Admin/list-jemaat', $data);
    }

    // Loads the tambah jemaat Page
    public function tambahJemaat(): string
    {
        $data = [
            'title' => 'Tambah Jemaat'
        ];
        return view('Admin/tambah-jemaat', $data);
    }

    // Loads the jadwal ibadah Page
    public function jadwalIBadah(): string
    {
        $data = [
            'title' => 'Jadwal Ibadah'
        ];
        return view('Admin/jadwal-ibadah', $data);
    }

    // Loads the list berita Page
    public function listBerita(): string
    {
        $data = [
            'title' => 'List Berita'
        ];
        return view('Admin/list-berita', $data);
    }

    // Loads the tambah berita Page
    public function tambahBerita(): string
    {
        $data = [
            'title' => 'Tambah Berita'
        ];
        return view('Admin/tambah-berita', $data);
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

    // Loads the blank page
    public function blank(): string
    {
        $data = [
            'title' => 'Blank Page'
        ];
        return view('Admin/blank', $data);
    }
}
