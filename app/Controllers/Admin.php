<?php

namespace App\Controllers;

use App\Models\JemaatModel;
use App\Models\LiveModel;

class Admin extends BaseController
{
    protected $jemaatModel;
    protected $liveModel;

    public function __construct()
    {
        $this->jemaatModel = new JemaatModel();
        $this->liveModel = new LiveModel();
    }

    public function index(): string
    {
        // Fetch the link from the database where id = 1
        $liveData = $this->liveModel->find(1); // Retrieves the row with id 1
        $embedCode = ''; // Default video link

        // Check if liveData is valid and contains the 'link' field
        if ($liveData && isset($liveData['link'])) {
            $iframeString = $liveData['link'];

            // Use regular expression to extract the src attribute value from the iframe
            if (preg_match('/src="([^"]+)"/', $iframeString, $matches)) {
                $embedCode = $matches[1];  // Extracted URL from the iframe
            } else {
                // If it's not an iframe, set it directly as the link
                $embedCode = $iframeString;
            }
        }

        // Prepare data to pass to the view
        $data = [
            'title' => 'Admin Dashboard',
            'embedCode' => $embedCode
        ];

        return view('Admin/index', $data);
    }

    // Loads the list jemaat Page
    public function listJemaat(): string

    {
        $jemaat = $this->jemaatModel->findAll();

        $data = [
            'title' => 'List Jemaat',
            'jemaat' => $jemaat
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

    public function simpanJemaat()
    {
        // Use the default insert method from CodeIgniter's Model class and store the returned ID
        $insertedID = $this->jemaatModel->insert([
            'nama'       => $this->request->getVar('nama'),
            'alamat'     => $this->request->getVar('alamat'),
            'telp'       => $this->request->getVar('telp'),
            'tgl_lahir'  => $this->request->getVar('tgl_lahir'),
            'jns_kelamin' => $this->request->getVar('jns_kelamin')
        ]);

        // Check if the data was successfully inserted
        if ($insertedID) {
            // Set a flash data message for success
            session()->setFlashdata('success', 'Data successfully inserted with ID: ' . $insertedID);
        } else {
            // Set a flash data message for failure
            session()->setFlashdata('error', 'Data insertion failed.');
        }

        // Redirect to the tambahJemaat page
        return redirect()->to('/Settings/tambahJemaat');
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

    // Loads the preview berita Page
    public function previewBerita(): string
    {
        $data = [
            'title' => 'Preview'
        ];
        return view('Admin/preview-berita', $data);
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
