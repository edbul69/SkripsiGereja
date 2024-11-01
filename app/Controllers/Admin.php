<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\JemaatModel;
use App\Models\LiveModel;
use App\Models\BeritaModel;

class Admin extends BaseController
{
    protected $jemaatModel;
    protected $liveModel;
    protected $jadwalModel;
    protected $beritaModel;

    public function __construct()
    {
        $this->jemaatModel = new JemaatModel();
        $this->liveModel = new LiveModel();
        $this->jadwalModel = new JadwalModel();
        $this->beritaModel = new BeritaModel();
    }

    // HALAMAN DASHBOARD
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

    // ------------------------------ LIVE STREAM ----------------------------------

    public function updateVideo($id)
    {
        // Validate that the YouTube Embed Code is not empty
        $embedCode = $this->request->getPost('youtubeEmbedCode');

        if ($embedCode) {
            // Update the `link` field where `id = 1`
            $updated = $this->liveModel->update($id, ['link' => $embedCode]);

            if ($updated) {
                // Set a success message
                session()->setFlashdata('message', 'Video updated successfully.');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                // Set a failure message
                session()->setFlashdata('message', 'Failed to update the video.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
        } else {
            // Set a validation error message
            session()->setFlashdata('message', 'Please provide a valid YouTube Embed Code.');
            session()->setFlashdata('alert-class', 'alert-warning');
        }

        // Redirect back to the form page
        return redirect()->to('/Settings');
    }

    // ------------------------------ JEMAAT ----------------------------------

    // HALAMAN LIST JEMAAT
    public function listJemaat(): string
    {
        $jemaat = $this->jemaatModel->findAll();

        $data = [
            'title' => 'List Jemaat',
            'jemaat' => $jemaat
        ];


        return view('Admin/list-jemaat', $data);
    }

    // HALAMAN TAMBAH JEMAAT
    public function tambahJemaat(): string
    {
        $data = [
            'title' => 'Tambah Jemaat'
        ];
        return view('Admin/tambah-jemaat', $data);
    }

    // FUNCTION SIMPAN DATA JEMAAT
    public function simpanJemaat()
    {
        // Validate input fields
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi.'
                ]
            ],
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'jns_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus dipilih.'
                ]
            ],
            'telp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} harus berupa angka.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ]
        ])) {
            // Return back to form with validation errors
            $validation = \Config\Services::validation();
            return redirect()->to('/Admin/tambahJemaat')->withInput()->with('validation', $validation);
        }

        // If validation is successful, save the data
        $this->jemaatModel->save([
            'nama'       => $this->request->getVar('nama'),
            'tgl_lahir'  => $this->request->getVar('tgl_lahir'),
            'asal'       => $this->request->getVar('asal'),
            'jns_kelamin' => $this->request->getVar('jns_kelamin'),
            'telp'       => $this->request->getVar('telp'),
            'alamat'     => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan.');

        // Redirect to the tambahJemaat page
        return redirect()->to('/Admin/tambahJemaat');
    }

    // FUNCTION HAPUS DATA JEMAAT
    public function deleteJemaat($id)
    {

        // Delete the record
        $this->jemaatModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');

        // Redirect back to the list after deletion
        return redirect()->to('/Admin/listJemaat');
    }


    // ------------------------------ JADWAL ----------------------------------

    // HALAMAN JADWAL IBADAH
    public function jadwalIBadah(): string
    {
        $data = [
            'title' => 'Jadwal Ibadah'
        ];
        return view('Admin/jadwal-ibadah', $data);
    }

    // HALAMAN TAMBAH JADWAL IBADAH
    public function tambahIbadah()
    {
        $model = new JadwalModel();

        // Insert data into the database
        $model->insert([
            'title'       => $this->request->getVar('title'),
            'start'       => $this->request->getVar('start'),
            'end'         => $this->request->getVar('end'),
            'description' => $this->request->getVar('description')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan.');

        // Redirect after successful insertion
        return redirect()->to('/Admin/jadwalIbadah')->with('message', 'Event saved successfully!');
    }

    // FUNCTION EDIT JADWAL IBADAH
    public function updateEvent($id)
    {
        // Check if the event exists before attempting to update it
        $event = $this->jadwalModel->find($id);

        if ($event) {
            // Get the updated event data from the request
            $updatedData = $this->request->getJSON(true); // Fetch the data as an associative array

            // Update the event record in the database
            $this->jadwalModel->update($id, [
                'title'       => $updatedData['title'],
                'start'       => $updatedData['start'],
                'end'         => $updatedData['end'],
                'description' => $updatedData['description']
            ]);

            // Return a success message as JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Jadwal Berhasil Diubah.']);
        } else {
            // If the event is not found, return an error message
            return $this->response->setJSON(['success' => false, 'message' => 'Data Tidak Ditemukan!']);
        }
    }

    // FUNCTION HAPUS JADWAL IBADAH
    public function deleteEvent($id)
    {
        // Check if the event exists before attempting to delete it
        $event = $this->jadwalModel->find($id);

        if ($event) {
            // Delete the event from the database using the correct model
            $this->jadwalModel->delete($id);

            // Return a success message as JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Jadwal Berhasil Dihapus.']);
        } else {
            // If the event is not found, return an error message
            return $this->response->setJSON(['success' => false, 'message' => 'Data Tidak Ditemukan!']);
        }
    }

    // ------------------------------ BERITA ----------------------------------

    // HALAMAN LIST BERITA
    public function listBerita(): string
    {

        $data = [
            'title' => 'List Berita',
            'berita' => $this->beritaModel->getBerita()
        ];
        return view('Admin/berita/list-berita', $data);
    }

    // HALAMAN TAMBAH BERITA
    public function tambahBerita(): string
    {
        $data = [
            'title' => 'Tambah Berita',
            'validation' => session('validation') ?? \Config\Services::validation()
        ];
        return view('Admin/berita/tambah-berita', $data);
    }

    public function viewBerita($slug)
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

    public function saveBerita()
    {

        // validasi input
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[tb_berita.title]',
                'errors' => [
                    'required' => 'judul harus diisi',
                    'is_unique' => 'berita sudah ada'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Settings/tambahBerita')->withInput()->with('validation', $this->validator);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->beritaModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'img' => $this->request->getVar('img'),
            'source' => $this->request->getVar('source'),
            'text' => $this->request->getVar('text')
        ]);

        session()->setFlashdata('pesan', 'Berita Berhasil Ditambahkan');

        return redirect()->to('/Settings/tambahBerita');
    }




    // ------------------------------ LOGIN ----------------------------------

    // HALAMAN LOGIN
    public function login(): string
    {
        $data = [
            'title' => 'Login'
        ];
        return view('Admin/login', $data);
    }

    // ------------------------------ TEMPLATE ----------------------------------

    // HALAMAN TEMPLATE
    public function blank(): string
    {
        $data = [
            'title' => 'Blank Page'
        ];
        return view('Admin/blank', $data);
    }
}
