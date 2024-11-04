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

    public function listJemaat(): string // Halaman List Jemaat
    {
        $jemaat = $this->jemaatModel->findAll();

        $data = [
            'title' => 'List Jemaat',
            'jemaat' => $jemaat
        ];

        return view('Admin/jemaat/list-jemaat', $data);
    }

    public function tambahJemaat(): string // Halaman Tambah Jemaat
    {
        $url = "https://wilayah.id/api/regencies/71.json"; // Replace with the correct province code URL

        try {
            $response = file_get_contents($url);
            if ($response === FALSE) {
                throw new Exception("Failed to fetch city data");
            }
            $citiesData = json_decode($response, true);
            $cities = $citiesData['data'] ?? []; // Extract the 'data' array if it exists
        } catch (Exception $e) {
            $cities = []; // Fallback to an empty array on error
        }

        $data = [
            'title' => 'Tambah Jemaat',
            'validation' => \Config\Services::validation(), // This will be used if session data isn't set
            'errors' => session()->getFlashdata('errors'), // Check flashdata for errors
            'cities' => $cities // Pass the cities array to the view
        ];
        return view('Admin/jemaat/tambah-jemaat', $data);
    }

    public function saveJemaat() // Save Jemaat
    {
        $action = $this->request->getPost('action');

        // Validate input
        if (!$this->validate($this->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Collect form data
        $formData = $this->request->getPost([
            'nama',
            'tgl_lahir',
            'asal',
            'jns_kelamin',
            'telp',
            'city',
            'kecamatan',
            'kelurahan',
            'lingkungan'
        ]);

        try {
            $alamat = $this->formatAddress($formData['city'], $formData['kecamatan'], $formData['kelurahan'], $formData['lingkungan']);

            if ($action === 'save') {
                $this->jemaatModel->save(array_merge($formData, ['alamat' => $alamat]));

                session()->setFlashdata('pesan', 'Data Jemaat Berhasil Ditambahkan');
                return redirect()->to('/Admin/tambahJemaat');
            }
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('errors', ['api' => 'Gagal menyimpan data ke database.']);
        }
    }

    public function getCities() // API Kota
    {
        $provinceCode = '71'; // Sulawesi Utara province code
        $url = "https://wilayah.id/api/regencies/{$provinceCode}.json";

        try {
            $response = file_get_contents($url);
            if ($response === FALSE) {
                throw new Exception("Failed to fetch data from the API");
            }

            // Log response for debugging (optional)
            log_message('info', 'API response: ' . $response);

            return $this->response->setJSON(json_decode($response, true));
        } catch (Exception $e) {
            log_message('error', 'API fetch error: ' . $e->getMessage());
            return $this->response->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function getKecamatan($regencyCode) // API Kecamata
    {
        $url = "https://wilayah.id/api/districts/{$regencyCode}.json";

        try {
            $response = file_get_contents($url);
            if ($response === FALSE) {
                throw new Exception("Failed to fetch data from the API");
            }

            // Send the response as JSON
            return $this->response->setJSON(json_decode($response, true));
        } catch (Exception $e) {
            // Handle error
            return $this->response->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function getKelurahan($districtCode) // API Kelurahan
    {
        $url = "https://wilayah.id/api/villages/{$districtCode}.json";

        try {
            $response = file_get_contents($url);
            if ($response === FALSE) {
                throw new Exception("Failed to fetch data from the API");
            }

            // Send the response as JSON
            return $this->response->setJSON(json_decode($response, true));
        } catch (Exception $e) {
            // Handle error
            return $this->response->setJSON(['error' => $e->getMessage()]);
        }
    }


    private function getValidationRules() // Private -> Validation Rules
    {
        return [
            'nama' => ['rules' => 'required', 'errors' => ['required' => 'Nama harus diisi']],
            'tgl_lahir' => ['rules' => 'required|valid_date', 'errors' => ['required' => 'Tanggal lahir harus diisi', 'valid_date' => 'Format tanggal lahir tidak valid']],
            'asal' => ['rules' => 'required', 'errors' => ['required' => 'Asal harus diisi']],
            'jns_kelamin' => ['rules' => 'required|in_list[Laki-laki,Perempuan]', 'errors' => ['required' => 'Jenis kelamin harus dipilih', 'in_list' => 'Jenis kelamin tidak valid']],
            'telp' => ['rules' => 'required|numeric|min_length[10]', 'errors' => ['required' => 'Nomor telepon harus diisi', 'numeric' => 'Nomor telepon harus berupa angka', 'min_length' => 'Nomor telepon harus terdiri dari minimal 10 angka']],
            'city' => ['rules' => 'required', 'errors' => ['required' => 'Kota harus dipilih']],
            'kecamatan' => ['rules' => 'required', 'errors' => ['required' => 'Kecamatan harus dipilih']],
            'kelurahan' => ['rules' => 'required', 'errors' => ['required' => 'Kelurahan harus dipilih']],
            'lingkungan' => ['rules' => 'required|numeric|min_length[1]', 'errors' => ['required' => 'Lingkungan harus diisi', 'numeric' => 'Lingkungan harus berupa angka', 'min_length' => 'Lingkungan harus valid']]
        ];
    }

    private function formatAddress($cityCode, $kecamatanCode, $kelurahanCode, $lingkungan) // Private -> Formatting Alamat
    {
        $areaNames = [];
        $apiData = [
            'city' => $this->fetchDataFromApi("https://wilayah.id/api/regencies/71.json"),
            'kecamatan' => $this->fetchDataFromApi("https://wilayah.id/api/districts/{$cityCode}.json"),
            'kelurahan' => $this->fetchDataFromApi("https://wilayah.id/api/villages/{$kecamatanCode}.json")
        ];

        foreach (['city' => $cityCode, 'kecamatan' => $kecamatanCode, 'kelurahan' => $kelurahanCode] as $key => $code) {
            $areaNames[] = $this->findAreaName($apiData[$key], $code);
        }

        return implode(', ', $areaNames) . ", Lingkungan {$lingkungan}";
    }

    private function fetchDataFromApi($url) // Private -> Fetching Data Dari APA
    {
        $response = file_get_contents($url);

        if ($response === FALSE) {
            throw new \Exception("Failed to fetch data from the API");
        }

        return json_decode($response, true);
    }

    private function findAreaName($data, $code) // Private -> Cari Nama Area Dari Kode Daerah
    {
        foreach ($data['data'] as $area) {
            if ($area['code'] == $code) {
                return $area['name'];
            }
        }

        return 'Unknown';
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

    public function listBerita(): string // Halaman List Berita
    {

        $data = [
            'title' => 'List Berita',
            'berita' => $this->beritaModel->getBerita()
        ];
        return view('Admin/berita/list-berita', $data);
    }

    public function tambahBerita(): string // Halaman Tambah Berita
    {
        $data = [
            'title' => 'Tambah Berita',
            'validation' => \Config\Services::validation(), // This will be used if session data isn't set
            'errors' => session()->getFlashdata('errors') // Check flashdata for errors
        ];
        return view('Admin/berita/tambah-berita', $data);
    }

    public function editBerita($slug) // Halaman Edit Berita
    {
        $data = [
            'title' => 'Edit Berita',
            'validation' => \Config\Services::validation(),
            'berita' => $this->beritaModel->getBerita($slug)
        ];
        return view('Admin/berita/edit-berita', $data);
    }

    public function detailBerita($slug) // Halaman Detail Berita
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

    public function saveBerita() // Simpan Berita
    {
        $action = $this->request->getPost('action'); // Get the action value from the form

        // Validate input
        if (!$this->validate([
            'title' => [
                'rules' => 'required|is_unique[tb_berita.title]',
                'errors' => [
                    'required' => 'judul harus diisi',
                    'is_unique' => 'berita sudah ada'
                ]
            ],
            'img' => [
                'rules' => 'uploaded[img]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,5120]',
                'errors' => [
                    'uploaded' => 'Gambar utama harus diunggah',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'Format gambar harus jpg, jpeg, atau png',
                    'max_size' => 'Ukuran gambar maksimal 5MB'
                ]
            ],
            'source' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'sumber harus diisi'
                ]
            ],
            'text' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi berita tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Collect form data
        $title = $this->request->getVar('title');
        $source = $this->request->getVar('source');
        $text = $this->request->getVar('text');

        // Handle image upload and save it temporarily
        $fileImg = $this->request->getFile('img');
        if ($fileImg->isValid() && !$fileImg->hasMoved()) {
            $imgName = $fileImg->getRandomName();
            $tempPath = FCPATH . 'uploads/tmp/'; // Full path under public
            if (!is_dir($tempPath)) {
                mkdir($tempPath, 0777, true); // Create the directory if it doesn't exist
            }
            $fileImg->move($tempPath, $imgName);
            $tempFilePath = $tempPath . $imgName; // Full temporary file path
            $imgUrl = base_url('uploads/tmp/' . $imgName); // Adjusted path to point to public directory
        } else {
            return redirect()->back()->withInput()->with('errors', ['img' => 'Error uploading the image.']);
        }

        if ($action === 'preview') {
            // Store data in session for preview
            session()->set([
                'previewTitle' => $title,
                'previewSource' => $source,
                'previewText' => $text,
                'previewImage' => $imgUrl
            ]);

            // Redirect to the preview page
            return redirect()->to('/Settings/berita/preview');
        } elseif ($action === 'save') {
            // Move the image from the temporary folder to the permanent uploads directory
            $permanentPath = 'uploads/images/' . $imgName;
            if (rename($tempFilePath, FCPATH . $permanentPath)) {
                // Delete the original temporary file after moving it (should already be moved)
                if (file_exists($tempFilePath)) {
                    unlink($tempFilePath);
                }

                // Save the article to the database
                $this->beritaModel->save([
                    'title' => $title,
                    'slug' => url_title($title, '-', true),
                    'img' => $imgName,
                    'source' => $source,
                    'text' => $text
                ]);

                session()->setFlashdata('pesan', 'Berita Berhasil Ditambahkan');
                return redirect()->to('/Settings/tambahBerita');
            } else {
                // Handle error in moving file
                return redirect()->back()->withInput()->with('errors', ['img' => 'Error moving the image to the permanent location.']);
            }
        }
    }


    public function deleteBerita($id) // Hapus Berita
    {
        // Get the article data by ID
        $berita = $this->beritaModel->find($id);

        if ($berita) {
            // Get the image file path
            $imagePath = 'uploads/images/' . $berita['img'];

            // Check if the image file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Delete the article record from the database
            $this->beritaModel->delete($id);

            // Set flashdata for success message
            session()->setFlashdata('pesan', 'Berita Berhasil Dihapus');
        } else {
            // Set flashdata for an error message if the record is not found
            session()->setFlashdata('error', 'Berita tidak ditemukan atau sudah dihapus');
        }

        // Redirect back to the list of articles
        return redirect()->to('/Settings/listBerita');
    }


    public function updateBerita($id) // Edit Berita
    {
        $action = $this->request->getPost('action'); // Get the action value from the form

        // Get the existing article data by ID
        $beritaLama = $this->beritaModel->find($id);

        // Determine validation rule for the title field
        $rule_judul = ($beritaLama['title'] === $this->request->getVar('title')) ? 'required' : 'required|is_unique[tb_berita.title]';

        // Validate form input
        if (!$this->validate([
            'title' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'is_unique' => 'Judul berita sudah ada'
                ]
            ],
            'img' => [
                'rules' => 'is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,5120]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'Format gambar harus jpg, jpeg, atau png',
                    'max_size' => 'Ukuran gambar maksimal 5MB'
                ]
            ],
            'source' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sumber harus diisi'
                ]
            ],
            'text' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi berita tidak boleh kosong'
                ]
            ]
        ])) {
            return redirect()->to('/Settings/berita/edit/' . $beritaLama['slug'])->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getVar('title');
        $source = $this->request->getVar('source');
        $text = $this->request->getVar('text');
        $slug = url_title($title, '-', true);

        // Handle image upload if a new image is provided
        $fileImg = $this->request->getFile('img');
        if ($fileImg && $fileImg->isValid() && !$fileImg->hasMoved()) {
            if (!empty($beritaLama['img']) && file_exists('uploads/images/' . $beritaLama['img'])) {
                unlink('uploads/images/' . $beritaLama['img']);
            }
            $imgName = $fileImg->getRandomName();
            $fileImg->move('uploads/tmp', $imgName);
            $imgUrl = base_url('uploads/tmp/' . $imgName);
        } else {
            $imgName = $beritaLama['img'];
            $imgUrl = base_url('uploads/images/' . $imgName);
        }

        if ($action === 'preview') {
            // Store data in session for preview
            session()->set([
                'previewTitle' => $title,
                'previewSource' => $source,
                'previewText' => $text,
                'previewImage' => $imgUrl
            ]);

            // Redirect to the preview page
            return redirect()->to('/Settings/berita/preview');
        } elseif ($action === 'save') {
            // Move the image from the temporary folder to the permanent uploads directory if needed
            if (strpos($imgUrl, 'tmp') !== false) {
                rename(FCPATH . 'uploads/tmp/' . $imgName, FCPATH . 'uploads/images/' . $imgName);
            }

            // Update the database record
            $this->beritaModel->save([
                'id' => $id,
                'title' => $title,
                'slug' => $slug,
                'img' => $imgName,
                'source' => $source,
                'text' => $text
            ]);

            session()->setFlashdata('pesan', 'Berita Berhasil Diubah');
            return redirect()->to('/Settings/listBerita');
        }
    }

    public function previewBerita() // Preview Berita
    {
        $data = [
            'title' => session()->get('previewTitle') ?? 'Judul Tidak Tersedia',
            'source' => session()->get('previewSource') ?? 'N/A',
            'text' => session()->get('previewText') ?? 'Isi artikel belum dimasukkan.',
            'img' => session()->get('previewImage') ?? base_url('uploads/images/placeholder.png')
        ];

        return view('Admin/berita/berita-preview', $data);
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
