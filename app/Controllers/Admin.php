<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\AnggotaModel;
use App\Models\KeluargaModel;
use App\Models\AnggotaKeluargaModel;
use App\Models\LiveModel;
use App\Models\BeritaModel;
use App\Models\AksesModel;
use Carbon\Carbon; // Pastikan Carbon terinstal dan di-import di sini (controller)

class Admin extends BaseController
{
    protected $db;
    protected $liveModel;
    protected $jadwalModel;
    protected $beritaModel;
    protected $aksesModel;
    protected $anggotaModel;
    protected $keluargaModel;
    protected $anggotakeluargaModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->liveModel = new LiveModel();
        $this->jadwalModel = new JadwalModel();
        $this->beritaModel = new BeritaModel();
        $this->aksesModel = new AksesModel();
        $this->anggotaModel = new AnggotaModel();
        $this->keluargaModel = new KeluargaModel();
        $this->anggotakeluargaModel = new AnggotaKeluargaModel();
        helper('form');
    }


    // HALAMAN DASHBOARD
    public function index(): string
    {
        $liveData = $this->liveModel->find(1); // Retrieves the row with id 1
        $embedCode = ''; // Default video link

        if ($liveData && isset($liveData['link'])) {
            $iframeString = $liveData['link'];

            // Extract the src attribute from the iframe
            if (preg_match('/src="([^"]+)"/', $iframeString, $matches)) {
                $embedCode = $matches[1];  // Extracted URL from the iframe
            } else {
                $embedCode = $iframeString;
            }
        }

        // Load BeritaModel to get the 6 newest news items
        $beritaModel = new \App\Models\BeritaModel();
        $latestNews = $beritaModel->orderBy('created', 'DESC')->limit(6)->findAll();

        // Load  to get member data
        $anggotaModel = new \App\Models\AnggotaModel();
        $keluargaModel = new \App\Models\KeluargaModel();
        $totalJemaat = $anggotaModel->countAllResults();
        $totalKeluarga = $keluargaModel->countAllResults();

        // Count members aged 18 or younger
        $totalRemajaAnak = $anggotaModel->where('tanggallahir >=', date('Y-m-d', strtotime('-18 years')))->countAllResults();

        // --- LOGIKA BARU UNTUK RATA-RATA JUMLAH ANGGOTA KELUARGA ---
        $averageFamilySizeResult = $this->anggotakeluargaModel
            ->select('COUNT(idanggota) AS jumlah_anggota')
            ->groupBy('idkeluarga')
            ->get() // Dapatkan hasil dari sub-kueri
            ->getResultArray(); // Ubah ke array

        $totalMembersInFamilies = 0;
        $numberOfFamiliesWithMembers = 0;

        foreach ($averageFamilySizeResult as $row) {
            $totalMembersInFamilies += $row['jumlah_anggota'];
            $numberOfFamiliesWithMembers++;
        }

        $averageFamilySize = 0;
        if ($numberOfFamiliesWithMembers > 0) {
            $averageFamilySize = $totalMembersInFamilies / $numberOfFamiliesWithMembers;
        }

        $session = session();
        $loggedInUserRole = $session->get('role'); //+
        $loggedInUserName = $session->get('name'); //+        

        // Prepare data to pass to the view
        $data = [
            'title' => 'Admin Dashboard',
            'embedCode' => $embedCode,
            'latestNews' => $latestNews,
            'totalJemaat' => $totalJemaat,
            'totalKeluarga' => $totalKeluarga,
            'totalRemajaAnak' => $totalRemajaAnak,
            'averageFamilySize' => round($averageFamilySize, 2),
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole,
        ];

        return view('Admin/index', $data);
    }

    // ------------------------------------------------------------ LIVE STREAM ----------------------------------------------------------------

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
        return redirect()->to('/Dashboard');
    }

    // ---------------------------------------------------------------- JEMAAT --------------------------------------------------------------------

    public function listJemaat(): string // Halaman List Jemaat
    {
        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        // Mengambil data jemaat dengan JOIN dari tabel tb_anggota, tb_anggotakeluarga, dan tb_keluarga
        $jemaatList = $this->anggotaModel
            ->select('tb_anggota.idanggota, tb_anggota.namalengkap, tb_anggota.tanggallahir, tb_anggota.rayon, tb_keluarga.namakeluarga, tb_anggotakeluarga.peran')
            ->join('tb_anggotakeluarga', 'tb_anggotakeluarga.idanggota = tb_anggota.idanggota', 'left')
            ->join('tb_keluarga', 'tb_keluarga.idkeluarga = tb_anggotakeluarga.idkeluarga', 'left')
            ->findAll(); // Mengambil semua hasil

        // --- LOGIKA UNTUK JUMLAH JEMAAT BERDASARKAN RAYON (untuk Ringkasan Rayon yang sudah ada) ---
        $rayonCounts = $this->anggotaModel
            ->select('rayon, COUNT(idanggota) as total_members')
            ->groupBy('rayon')
            ->orderBy('rayon', 'ASC')
            ->findAll();
        // --- AKHIR LOGIKA RAYON ---

        // --- LOGIKA BARU UNTUK DATA GRAFIK ---
        $membersByRayonAndAge = []; // Data untuk grafik usia per rayon
        $allRayons = []; // Untuk menyimpan semua nama rayon unik
        $ageRanges = ['0-5', '6-12', '13-17', '18-25', '26-35', '36-45', '46-60', '61+'];

        foreach ($jemaatList as $j) {
            $rayon = $j['rayon'] ?? 'Tidak Ada Rayon';
            if (!in_array($rayon, $allRayons)) {
                $allRayons[] = $rayon;
            }

            $age = null;
            if (!empty($j['tanggallahir']) && is_string($j['tanggallahir']) && strtotime($j['tanggallahir']) !== false) {
                $dateOfBirth = Carbon::parse($j['tanggallahir']);
                if ($dateOfBirth->isValid()) {
                    $age = $dateOfBirth->age;
                }
            }

            // Inisialisasi rayon jika belum ada
            if (!isset($membersByRayonAndAge[$rayon])) {
                $membersByRayonAndAge[$rayon] = array_fill_keys($ageRanges, 0);
            }

            // Tambahkan ke kelompok usia yang sesuai
            if ($age !== null) {
                if ($age <= 5) $membersByRayonAndAge[$rayon]['0-5']++;
                elseif ($age <= 12) $membersByRayonAndAge[$rayon]['6-12']++;
                elseif ($age <= 17) $membersByRayonAndAge[$rayon]['13-17']++;
                elseif ($age <= 25) $membersByRayonAndAge[$rayon]['18-25']++;
                elseif ($age <= 35) $membersByRayonAndAge[$rayon]['26-35']++;
                elseif ($age <= 45) $membersByRayonAndAge[$rayon]['36-45']++;
                elseif ($age <= 60) $membersByRayonAndAge[$rayon]['46-60']++;
                else $membersByRayonAndAge[$rayon]['61+']++;
            }
        }

        // Urutkan rayon secara alfabetis untuk konsistensi grafik
        sort($allRayons);

        // Ambil jumlah keluarga per rayon
        // Perlu join ke tb_anggota untuk mendapatkan rayon dari anggota yang merupakan bagian dari keluarga
        $familiesByRayonRaw = $this->keluargaModel
            ->select('tb_anggota.rayon, COUNT(DISTINCT tb_keluarga.idkeluarga) as total_families')
            ->join('tb_anggotakeluarga', 'tb_anggotakeluarga.idkeluarga = tb_keluarga.idkeluarga', 'left')
            ->join('tb_anggota', 'tb_anggota.idanggota = tb_anggotakeluarga.idanggota', 'left')
            ->where('tb_anggota.rayon IS NOT NULL') // Hanya hitung keluarga yang memiliki anggota dengan rayon
            ->groupBy('tb_anggota.rayon')
            ->orderBy('tb_anggota.rayon', 'ASC')
            ->findAll();

        $familiesByRayon = [];
        foreach ($familiesByRayonRaw as $f) {
            $familiesByRayon[$f['rayon']] = (int)$f['total_families'];
        }

        // Pastikan semua rayon memiliki entri di familiesByRayon, bahkan jika 0 keluarga
        foreach ($allRayons as $rayonName) {
            if (!isset($familiesByRayon[$rayonName])) {
                $familiesByRayon[$rayonName] = 0;
            }
        }
        // Urutkan familiesByRayon berdasarkan urutan allRayons
        $familiesByRayonSorted = [];
        foreach ($allRayons as $rayonName) {
            $familiesByRayonSorted[$rayonName] = $familiesByRayon[$rayonName];
        }
        $familiesByRayon = $familiesByRayonSorted;


        // --- AKHIR LOGIKA BARU UNTUK DATA GRAFIK ---

        $data = [
            'title' => 'List Jemaat',
            'jemaatList' => $jemaatList,
            'rayonCounts' => $rayonCounts,
            'membersByRayonAndAge' => $membersByRayonAndAge, // Data untuk grafik
            'familiesByRayon' => $familiesByRayon,           // Data untuk grafik
            'allRayons' => $allRayons,                        // Daftar semua rayon unik
            'ageRanges' => $ageRanges,                        // Daftar rentang usia
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole,
        ];

        return view('Admin/jemaat/list-jemaat', $data);
    }

    public function editJemaat($idAnggota = null)
    {
        // Pastikan ID valid
        if ($idAnggota === null) {
            return redirect()->to('/Dashboard/listJemaat')->with('error', 'ID Anggota tidak valid.');
        }

        // Ambil data anggota yang akan diedit, termasuk informasi keluarga
        $memberData = $this->anggotaModel
            ->select('tb_anggota.*, tb_keluarga.namakeluarga, tb_keluarga.idkeluarga, tb_anggotakeluarga.peran')
            ->join('tb_anggotakeluarga', 'tb_anggotakeluarga.idanggota = tb_anggota.idanggota', 'left')
            ->join('tb_keluarga', 'tb_keluarga.idkeluarga = tb_anggotakeluarga.idkeluarga', 'left')
            ->where('tb_anggota.idanggota', $idAnggota)
            ->first();

        if (!$memberData) {
            return redirect()->to('/Dashboard/listJemaat')->with('error', 'Data anggota tidak ditemukan.');
        }

        // Ambil daftar semua keluarga untuk dropdown
        $keluargaList = $this->keluargaModel->select('idkeluarga, namakeluarga')->findAll();

        $data = [
            'title' => 'Edit Jemaat',
            'validation' => \Config\Services::validation(),
            'errors' => session()->getFlashdata('errors'),
            'anggota' => $memberData, // Data anggota yang akan diedit
            'keluargaList' => $keluargaList, // Daftar keluarga untuk dropdown
            'loggedInUserName' => session()->get('name'),
            'loggedInUserRole' => session()->get('role'),
        ];
        return view('Admin/jemaat/edit-jemaat', $data);
    }

    public function updateJemaat($idAnggota)
    {
        // 1. Definisikan aturan validasi dinamis
        $rules = [
            'namaLengkap' => 'required',
            'tanggalLahir' => 'permit_empty|valid_date',
            'rayon' => 'permit_empty',
            'memberRole' => 'required|in_list[Perseorangan,Suami,Istri,Anak]',
        ];

        $memberRole = $this->request->getPost('memberRole');
        $familyChoice = $this->request->getPost('familyChoice');

        if ($memberRole !== 'Perseorangan') {
            $rules['familyChoice'] = 'required|in_list[new,existing]';

            if ($familyChoice === 'new') {
                $rules['namaKeluargaBaru'] = 'required';
                $rules['tanggalPernikahanBaru'] = 'permit_empty|valid_date';
            } elseif ($familyChoice === 'existing') {
                $rules['idKeluarga'] = 'required|is_natural_no_zero';
            }
        }

        // 2. Jalankan validasi
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 3. Mulai transaksi database
        $this->db->transBegin();

        try {
            // Ambil data anggota dan hubungannya yang sudah ada
            $oldMemberData = $this->anggotaModel
                ->join('tb_anggotakeluarga', 'tb_anggotakeluarga.idanggota = tb_anggota.idanggota', 'left')
                ->where('tb_anggota.idanggota', $idAnggota)
                ->first();

            // 4. Perbarui data di tb_anggota
            $anggotaData = [
                'namalengkap' => $this->request->getPost('namaLengkap'),
                'tanggallahir' => $this->request->getPost('tanggalLahir') ?: NULL,
                'rayon' => $this->request->getPost('rayon') ?: NULL,
            ];
            $this->anggotaModel->update($idAnggota, $anggotaData);

            // 5. Kelola hubungan keluarga
            $oldIdKeluarga = $oldMemberData['idkeluarga'] ?? null;
            $newIdKeluarga = null;

            // Hapus entri lama di tb_anggotakeluarga
            if ($oldIdKeluarga) {
                $this->anggotakeluargaModel->where('idanggota', $idAnggota)->delete();
            }

            // Tambahkan entri baru jika bukan perseorangan
            if ($memberRole !== 'Perseorangan') {
                if ($familyChoice === 'new') {
                    // Buat keluarga baru
                    $keluargaData = [
                        'namakeluarga' => $this->request->getPost('namaKeluargaBaru'),
                        'tanggalpernikahan' => $this->request->getPost('tanggalPernikahanBaru') ?: NULL,
                        'namaayahsuami' => $this->request->getPost('namaAyahSuamiBaru') ?: NULL,
                        'namaibusuami' => $this->request->getPost('namaIbuSuamiBaru') ?: NULL,
                        'namaayahistri' => $this->request->getPost('namaAyahIstriBaru') ?: NULL,
                        'namaibuistri' => $this->request->getPost('namaIbuIstriBaru') ?: NULL,
                    ];
                    $this->keluargaModel->insert($keluargaData);
                    $newIdKeluarga = $this->keluargaModel->getInsertID();
                } elseif ($familyChoice === 'existing') {
                    $newIdKeluarga = $this->request->getPost('idKeluarga');
                }

                if ($newIdKeluarga) {
                    $anggotaKeluargaData = [
                        'idkeluarga' => $newIdKeluarga,
                        'idanggota' => $idAnggota,
                        'peran' => $memberRole,
                    ];
                    $this->anggotakeluargaModel->insert($anggotaKeluargaData);
                }
            }

            // 6. Periksa jika keluarga lama menjadi kosong
            if ($oldIdKeluarga && $oldIdKeluarga !== $newIdKeluarga) {
                $membersInOldFamily = $this->anggotakeluargaModel->where('idkeluarga', $oldIdKeluarga)->countAllResults();
                if ($membersInOldFamily == 0) {
                    $this->keluargaModel->delete($oldIdKeluarga);
                }
            }

            // 7. Commit transaksi jika semua berhasil
            $this->db->transCommit();
            session()->setFlashdata('pesan', 'Data Jemaat Berhasil Diperbarui');
            return redirect()->to('/Dashboard/listJemaat');
        } catch (\Exception $e) {
            // 8. Rollback transaksi jika terjadi error
            $this->db->transRollback();
            log_message('error', 'Error updating jemaat data: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('errors', ['database' => 'Gagal memperbarui data ke database: ' . $e->getMessage()]);
        }
    }

    public function deleteJemaat($idAnggota)
    {
        // Pastikan ID valid
        if ($idAnggota === null) {
            return redirect()->to('/Dashboard/jemaat/list')->with('error', 'ID Anggota tidak valid.');
        }

        $this->db->transBegin();

        try {
            // Dapatkan ID keluarga lama sebelum menghapus anggota
            $oldMemberData = $this->anggotakeluargaModel->where('idanggota', $idAnggota)->first();
            $oldIdKeluarga = $oldMemberData['idkeluarga'] ?? null;

            // Hapus anggota dari tabel tb_anggota
            $this->anggotaModel->delete($idAnggota);

            // Periksa jika keluarga lama menjadi kosong setelah penghapusan
            if ($oldIdKeluarga) {
                $membersInOldFamily = $this->anggotakeluargaModel->where('idkeluarga', $oldIdKeluarga)->countAllResults();
                if ($membersInOldFamily == 0) {
                    // Jika keluarga lama tidak punya anggota, hapus juga dari tb_keluarga
                    $this->keluargaModel->delete($oldIdKeluarga);
                }
            }

            $this->db->transCommit();
            session()->setFlashdata('pesan', 'Data Jemaat Berhasil Dihapus');
            return redirect()->to('/Dashboard/listJemaat');
        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message('error', 'Error deleting jemaat data: ' . $e->getMessage());
            return redirect()->back()->with('errors', ['database' => 'Gagal menghapus data: ' . $e->getMessage()]);
        }
    }

    public function tambahJemaat(): string // Halaman Tambah Jemaat
    {
        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        // Ambil daftar keluarga yang ada untuk dropdown
        $keluargaList = $this->keluargaModel->select('idkeluarga, namakeluarga')->findAll();

        $data = [
            'title' => 'Tambah Jemaat',
            'validation' => \Config\Services::validation(),
            'errors' => session()->getFlashdata('errors') ?? [],
            'keluargaList' => $keluargaList, // Teruskan daftar keluarga ke view
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole,
        ];
        return view('Admin/jemaat/tambah-jemaat', $data);
    }

    public function saveJemaat()
    {
        // 1. Definisikan aturan validasi dinamis
        $rules = [
            'namaLengkap' => 'required',
            'tanggalLahir' => 'permit_empty|valid_date',
            'rayon' => 'permit_empty',
            'memberRole' => 'required|in_list[Perseorangan,Suami,Istri,Anak]',
        ];

        $memberRole = $this->request->getPost('memberRole');
        $familyChoice = $this->request->getPost('familyChoice');

        if ($memberRole !== 'Perseorangan') {
            $rules['familyChoice'] = 'required|in_list[new,existing]';

            if ($familyChoice === 'new') {
                $rules['namaKeluargaBaru'] = 'required';
                $rules['tanggalPernikahanBaru'] = 'permit_empty|valid_date';
                // Nama orang tua adalah opsional, tidak perlu aturan validasi khusus kecuali diinginkan
            } elseif ($familyChoice === 'existing') {
                $rules['idKeluarga'] = 'required|is_natural_no_zero';
            }
        }

        // 2. Jalankan validasi
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 3. Mulai transaksi database
        $this->db->transBegin();

        try {
            // 4. Insert data ke tb_anggota
            $anggotaData = [
                'namalengkap' => $this->request->getPost('namaLengkap'),
                'tanggallahir' => $this->request->getPost('tanggalLahir') ?: NULL, // Simpan sebagai NULL jika kosong
                'rayon' => $this->request->getPost('rayon') ?: NULL, // Simpan sebagai NULL jika kosong
            ];
            $this->anggotaModel->insert($anggotaData);
            $idAnggotaBaru = $this->anggotaModel->getInsertID();

            // 5. Tangani logika spesifik keluarga/peran
            if ($memberRole !== 'Perseorangan') {
                $idKeluargaToLink = NULL;

                if ($familyChoice === 'new') {
                    // Buat keluarga baru
                    $keluargaData = [
                        'namakeluarga' => $this->request->getPost('namaKeluargaBaru'),
                        'tanggalpernikahan' => $this->request->getPost('tanggalPernikahanBaru') ?: NULL,
                        'namaayahsuami' => $this->request->getPost('namaAyahSuamiBaru') ?: NULL,
                        'namaibusuami' => $this->request->getPost('namaIbuSuamiBaru') ?: NULL,
                        'namaayahistri' => $this->request->getPost('namaAyahIstriBaru') ?: NULL,
                        'namaibuistri' => $this->request->getPost('namaIbuIstriBaru') ?: NULL,
                    ];
                    $this->keluargaModel->insert($keluargaData);
                    $idKeluargaToLink = $this->keluargaModel->getInsertID();
                } elseif ($familyChoice === 'existing') {
                    // Gunakan ID keluarga yang sudah ada
                    $idKeluargaToLink = $this->request->getPost('idKeluarga');
                }

                if ($idKeluargaToLink) {
                    $anggotaKeluargaData = [
                        'idkeluarga' => $idKeluargaToLink,
                        'idanggota' => $idAnggotaBaru,
                        'peran' => $memberRole,
                    ];
                    $this->anggotakeluargaModel->insert($anggotaKeluargaData);
                }
            }

            // 6. Commit transaksi jika semua berhasil
            $this->db->transCommit();
            session()->setFlashdata('pesan', 'Data Jemaat Berhasil Ditambahkan');
            return redirect()->to('/Dashboard/listJemaat');
        } catch (\Exception $e) {
            // 7. Rollback transaksi jika terjadi error
            $this->db->transRollback();
            log_message('error', 'Error saving jemaat data: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('errors', ['database' => 'Gagal menyimpan data ke database: ' . $e->getMessage()]);
        }
    }

    // ------------------------------------------------------------ JADWAL ----------------------------------------------------------------

    public function listIbadah() // Halaman List Ibadah
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_jadwal');

        // Group data by date and order by start date
        $query = $builder->select('id, DATE(start) as date, title, start, location, description')
            ->orderBy('start', 'ASC')
            ->get();

        $groupedData = [];
        foreach ($query->getResult() as $row) {
            $date = $row->date;
            if (!isset($groupedData[$date])) {
                $groupedData[$date] = [];
            }
            $groupedData[$date][] = $row;
        }

        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        $data = [
            'title' => 'Jadwal Ibadah',
            'jadwalData' => $this->jadwalModel->getJadwal(), // Pass the schedule data to the view
            'groupedJadwalData' => $groupedData, // Pass grouped data for the table
            'validation' => \Config\Services::validation(),
            'errors' => session()->getFlashdata('errors'),
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole
        ];

        return view('Admin/jadwal/list-ibadah', $data);
    }

    public function saveIbadah() // Simpan Ibadah
    {
        $id = $this->request->getPost('id'); // Get the ID, if present

        $session = session();
        $loggedInUserName = $session->get('name');

        $validationRules = [
            'title' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'max_length' => 'Judul tidak boleh lebih dari 50 karakter'
                ]
            ],
            'start' => [
                'rules' => 'required|valid_date[Y-m-d\TH:i]',
                'errors' => [
                    'required' => 'Waktu mulai harus diisi',
                    'valid_date' => 'Format waktu mulai tidak valid'
                ]
            ],
            'location' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length' => 'Lokasi tidak boleh lebih dari 255 karakter'
                ]
            ],
            'description' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length' => 'Deskripsi tidak boleh lebih dari 255 karakter'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'start' => $this->request->getPost('start'),
            'location' => $this->request->getPost('location'),
            'description' => $this->request->getPost('description'),
            'by' => $loggedInUserName
        ];

        if ($id) {
            // Update existing record
            $this->jadwalModel->update($id, $data);
            session()->setFlashdata('pesan', 'Jadwal berhasil diperbarui.');
        } else {
            // Insert new record
            $this->jadwalModel->insert($data);
            session()->setFlashdata('pesan', 'Jadwal berhasil ditambahkan.');
        }

        return redirect()->to('/Dashboard/listIbadah');
    }

    public function deleteIbadah($id) // Delete Ibadah
    {
        if ($this->request->isAJAX()) {
            $event = $this->jadwalModel->find($id);

            if ($event) {
                $this->jadwalModel->delete($id);
                return $this->response->setJSON(['success' => true, 'message' => 'Jadwal Ibadah Berhasil Dihapus']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Jadwal Ibadah Tidak Ditemukan'])->setStatusCode(404);
            }
        } else {
            $event = $this->jadwalModel->find($id);

            if ($event) {
                // Delete the jemaat record from the database
                $this->jadwalModel->delete($id);

                // Set flashdata for success message
                session()->setFlashdata('pesan', 'Jadwal Ibadah Berhasil Dihapus');
            } else {
                // Set flashdata for an error message if the record is not found
                session()->setFlashdata('error', 'Jadwal Ibadah Tidak Ditemukan');
            }
            return redirect()->to('/Dashboard/listIbadah');
        }

        return redirect()->to('/Dashboard/listIbadah'); // Fallback redirect if not an AJAX request
    }

    public function updateIbadah($id) // Edit Ibadah
    {
        $validationRules = [
            'title' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Judul harus diisi',
                    'max_length' => 'Judul tidak boleh lebih dari 50 karakter'
                ]
            ],
            'start' => [
                'rules' => 'required|valid_date[Y-m-d\TH:i]',
                'errors' => [
                    'required' => 'Waktu mulai harus diisi',
                    'valid_date' => 'Format waktu mulai tidak valid'
                ]
            ],
            'location' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length' => 'Lokasi tidak boleh lebih dari 255 karakter'
                ]
            ],
            'description' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length' => 'Deskripsi tidak boleh lebih dari 255 karakter'
                ]
            ]
        ];
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'start' => $this->request->getPost('start'),
            'location' => $this->request->getPost('location'),
            'description' => $this->request->getPost('description')
        ];

        $this->jadwalModel->update($id, $data);

        session()->setFlashdata('pesan', 'Jadwal berhasil diperbarui.');
        return redirect()->to('/Dashboard/listIbadah');
    }

    // ---------------------------------------------------------------- BERITA --------------------------------------------------------------------

    public function listBerita(): string // Halaman List Berita
    {

        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        $data = [
            'title' => 'List Berita',
            'berita' => $this->beritaModel->getBerita(),
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole
        ];
        return view('Admin/berita/list-berita', $data);
    }

    public function tambahBerita(): string // Halaman Tambah Berita
    {

        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        $data = [
            'title' => 'Tambah Berita',
            'validation' => \Config\Services::validation(),
            'errors' => session()->getFlashdata('errors'),
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole
        ];
        return view('Admin/berita/tambah-berita', $data);
    }

    public function editBerita($slug) // Halaman Edit Berita
    {

        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        $data = [
            'title' => 'Edit Berita',
            'validation' => \Config\Services::validation(),
            'berita' => $this->beritaModel->getBerita($slug),
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole
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
        $session = session();
        $title = $this->request->getVar('title');
        $source = $this->request->getVar('source');
        $text = $this->request->getVar('text');
        $loggedInUserName = $session->get('name');

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
            return redirect()->to('/Dashboard/berita/preview');
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
                    'text' => $text,
                    'author' => $loggedInUserName
                ]);

                session()->setFlashdata('pesan', 'Berita Berhasil Ditambahkan');
                return redirect()->to('/Dashboard/listBerita');
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
        return redirect()->to('/Dashboard/listBerita');
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
            return redirect()->to('/Dashboard/berita/edit/' . $beritaLama['slug'])->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getVar('title');
        $source = $this->request->getVar('source');
        $text = $this->request->getVar('text');
        $slug = url_title($title, '-', true);

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
            session()->set([
                'previewTitle' => $title,
                'previewSource' => $source,
                'previewText' => $text,
                'previewImage' => $imgUrl
            ]);

            return redirect()->to('/Dashboard/berita/preview');
        } elseif ($action === 'save') {
            if (strpos($imgUrl, 'tmp') !== false) {
                rename(FCPATH . 'uploads/tmp/' . $imgName, FCPATH . 'uploads/images/' . $imgName);
            }
            $this->beritaModel->save([
                'id' => $id,
                'title' => $title,
                'slug' => $slug,
                'img' => $imgName,
                'source' => $source,
                'text' => $text
            ]);

            session()->setFlashdata('pesan', 'Berita Berhasil Diubah');
            return redirect()->to('/Dashboard/listBerita');
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

    // ------------------------------------------------------------ AKSES --------------------------------------------------------------------

    public function listAkses() // Halaman List Akun
    {
        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        if ($loggedInUserRole === 'admin') {
            return redirect()->to('/Dashboard');
        }

        $data = [
            'title' => 'List Akses',
            'akses' => $this->aksesModel->getAkses(),
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole,
            'validation' => session('validation') ?? \Config\Services::validation()
        ];

        return view('Admin/user/list-akses', $data);
    }

    public function editAkses($id) // Halaman Edit Akun
    {
        $user = $this->aksesModel->getAkses($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        $data = [
            'title' => 'Edit Data Pengguna',
            'akses' => $this->aksesModel->findAll(), // Include existing users to display in the table
            'user' => $user, // Pass the user data for editing
            'validation' => session('validation') ?? \Config\Services::validation(),
            'loggedInUserName' => $loggedInUserName,
            'loggedInUserRole' => $loggedInUserRole
        ];

        return view('Admin/user/list-akses', $data);
    }

    public function tambahAkses() // Tambah Akun
    {
        $session = session();
        $loggedInUserRole = $session->get('role');
        $loggedInUserName = $session->get('name');

        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[3]|is_unique[tb_akses.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'min_length' => 'Username harus memiliki minimal 3 karakter',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password harus memiliki minimal 6 karakter'
                ]
            ],
            'role' => [
                'rules' => 'required|in_list[admin,engineer]',
                'errors' => [
                    'required' => 'Role harus dipilih',
                    'in_list' => 'Role tidak valid, harus salah satu dari admin atau engineer'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->aksesModel->save([
            'username' => $this->request->getVar('username'),
            'name' => $this->request->getVar('name'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role')
        ]);

        return redirect()->to('/Dashboard/listAkses')->with('pesan', 'Data pengguna berhasil ditambahkan');
    }

    public function deleteAkses($id) // Hapus Akun
    {
        // Ensure the user exists before attempting to delete
        $user = $this->aksesModel->find($id);

        if ($user) {
            $this->aksesModel->delete($id);
            return redirect()->to('/Dashboard/listAkses')->with('pesan', 'Data pengguna berhasil dihapus');
        } else {
            return redirect()->to('/Dashboard/listAkses')->with('pesan', 'Pengguna tidak ditemukan');
        }
    }

    public function updateAkses($id) // Edit Akun
    {
        // Get the existing user data by ID
        $userLama = $this->aksesModel->find($id);

        // Check if the user data exists
        if (!$userLama) {
            // Redirect back with an error message if the user is not found
            return redirect()->to('/Dashboard/listAkses')->with('error', 'User not found.');
        }

        // Determine validation rule for the username field
        $rule_username = ($userLama['username'] === $this->request->getVar('username')) ? 'required' : 'required|is_unique[tb_akses.username]';

        // Validate form input
        if (!$this->validate([
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah digunakan'
                ]
            ],
            'password' => [
                'rules' => 'permit_empty|min_length[6]',
                'errors' => [
                    'min_length' => 'Password harus memiliki minimal 6 karakter'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'role' => [
                'rules' => 'required|in_list[admin,engineer]',
                'errors' => [
                    'required' => 'Role harus dipilih',
                    'in_list' => 'Role tidak valid, harus salah satu dari admin atau engineer'
                ]
            ]
        ])) {
            return redirect()->to('/Dashboard/akses/edit/' . $id)->withInput()->with('validation', $this->validator);
        }

        // Collect form data
        $username = $this->request->getVar('username');
        $name = $this->request->getVar('name');
        $role = $this->request->getVar('role');

        // Only update the password if a new one is provided
        $password = $this->request->getVar('password');
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $hashedPassword = $userLama['password']; // Keep the old password if none is provided
        }

        // Update the user data in the database
        $this->aksesModel->save([
            'id' => $id,
            'username' => $username,
            'name' => $name,
            'password' => $hashedPassword,
            'role' => $role
        ]);

        session()->setFlashdata('pesan', 'Data pengguna berhasil diperbarui');
        return redirect()->to('/Dashboard/listAkses');
    }
}
