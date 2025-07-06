<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Jemaat</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php

    use Carbon\Carbon; // Pastikan Carbon terinstal via Composer

    $ageGroups = [
        '0-5' => 0,
        '6-12' => 0,
        '13-17' => 0,
        '18-25' => 0,
        '26-35' => 0,
        '36-45' => 0,
        '46-60' => 0,
        '61+' => 0,
    ];

    foreach ($jemaatList as $j) {
        // Periksa apakah tanggallahir tidak kosong, berupa string, dan bisa diurai oleh strtotime
        if (!empty($j['tanggallahir']) && is_string($j['tanggallahir']) && strtotime($j['tanggallahir']) !== false) {
            $dateOfBirth = Carbon::parse($j['tanggallahir']);

            // Pastikan tanggal yang diurai valid sebelum menghitung usia
            if ($dateOfBirth->isValid()) {
                $age = $dateOfBirth->age;

                if ($age <= 5) {
                    $ageGroups['0-5']++;
                } elseif ($age <= 12) {
                    $ageGroups['6-12']++;
                } elseif ($age <= 17) {
                    $ageGroups['13-17']++;
                } elseif ($age <= 25) {
                    $ageGroups['18-25']++;
                } elseif ($age <= 35) {
                    $ageGroups['26-35']++;
                } elseif ($age <= 45) {
                    $ageGroups['36-45']++;
                } elseif ($age <= 60) {
                    $ageGroups['46-60']++;
                } else {
                    $ageGroups['61+']++;
                }
            }
        }
    }
    ?>

    <!-- Ringkasan Kelompok Usia -->
    <div class="row mb-4">
        <?php foreach ($ageGroups as $range => $count) : ?>
            <div class="col-md-3 mb-3">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Usia <?= $range ?>
                        </div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?= $count ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Ringkasan Rayon -->
    <div class="row mb-4">
        <?php if (!empty($rayonCounts)) : ?>
            <?php foreach ($rayonCounts as $rayon) : ?>
                <div class="col mb-3"> <!-- Menggunakan 'col' agar lebar kolom disesuaikan secara otomatis -->
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Rayon <?= esc($rayon['rayon'] ?? 'Tidak Ada Rayon'); ?>
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?= esc($rayon['total_members']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <p class="text-center text-muted">Tidak ada data rayon yang tersedia atau semua anggota tidak memiliki rayon.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Tombol Toggle Grafik -->
    <div class="d-flex justify-content-end mb-3">
        <button id="toggleChartsBtn" class="btn btn-primary btn-sm">
            Tampilkan Grafik
        </button>
    </div>

    <!-- Bagian Grafik -->
    <div id="chartsSection" class="row mb-4 d-none"> <!-- Awalnya tersembunyi -->
        <div class="col-lg-12 mb-4"> <!-- Menggunakan col-lg-12 untuk lebar penuh -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Anggota per Rayon (Berdasarkan Usia)</h6>
                </div>
                <div class="card-body">
                    <canvas id="membersByRayonAndAgeChart" style="height: 400px;"></canvas> <!-- Tambahkan tinggi minimal -->
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-4"> <!-- Menggunakan col-lg-12 untuk lebar penuh -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Keluarga per Rayon</h6>
                </div>
                <div class="card-body">
                    <canvas id="familiesByRayonChart" style="height: 400px;"></canvas> <!-- Tambahkan tinggi minimal -->
                </div>
            </div>
        </div>
    </div>


    <!-- Contoh DataTales -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background-color: #4e73df; color: white;">
                    <h6 class="m-0 font-weight-bold">Tabel Jemaat</h6>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Keluarga</th>
                                    <th>Peran di Keluarga</th>
                                    <th>Rayon</th>
                                    <th class="text-center">Actions</th> <!-- Kolom untuk tombol aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jemaatList as $jemaat) : ?>
                                    <tr>
                                        <td><?= esc($jemaat['namalengkap']); ?></td>
                                        <td><?= esc($jemaat['tanggallahir']); ?></td>
                                        <td><?= esc($jemaat['namakeluarga'] ?? 'N/A'); ?></td> <!-- Tampilkan 'N/A' jika tidak ada keluarga -->
                                        <td><?= esc($jemaat['peran'] ?? 'Perseorangan'); ?></td> <!-- Tampilkan 'Perseorangan' jika tidak ada peran -->
                                        <td><?= esc($jemaat['rayon'] ?? 'N/A'); ?></td>
                                        <!-- Tombol aksi untuk Edit dan Hapus -->
                                        <td class="text-center">
                                            <a href="/Dashboard/jemaat/edit/<?= esc($jemaat['idanggota']); ?>" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="/Dashboard/jemaat/delete/<?= esc($jemaat['idanggota']); ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>


<script>
    $(document).ready(function() {
        // Inisialisasi DataTables pada elemen #dataTable
        var table = $('#dataTable').DataTable({
            "pageLength": 50, // Jumlah baris per halaman
            "lengthMenu": [10, 20, 50, 100], // Opsi untuk jumlah baris yang ditampilkan per halaman
            "paging": true, // Aktifkan paginasi
            "searching": true, // Aktifkan bilah pencarian
            "ordering": true, // Aktifkan pengurutan kolom
            "info": true, // Tampilkan informasi tabel (misalnya, "Menampilkan 1 hingga 10 dari 57 entri")
            "responsive": true, // Pastikan tabel beradaptasi dengan berbagai ukuran layar
            "order": [
                [0, "asc"]
            ] // Urutkan berdasarkan kolom pertama (indeks 0) dalam urutan menaik
        });

        // Tombol kustom untuk mengatur panjang halaman secara dinamis
        window.setPageLength = function(value) {
            table.page.len(value).draw(); // Ubah jumlah baris yang ditampilkan dan gambar ulang
        };

        // --- LOGIKA TOGGLE GRAFIK ---
        const toggleChartsBtn = document.getElementById('toggleChartsBtn');
        const chartsSection = document.getElementById('chartsSection');
        let chartsInitialized = false; // Flag untuk memastikan grafik hanya diinisialisasi sekali

        toggleChartsBtn.addEventListener('click', function() {
            chartsSection.classList.toggle('d-none'); // Toggle class d-none untuk menyembunyikan/menampilkan

            if (!chartsSection.classList.contains('d-none')) {
                // Jika grafik ditampilkan
                toggleChartsBtn.textContent = 'Sembunyikan Grafik';
                if (!chartsInitialized) {
                    initializeCharts(); // Inisialisasi grafik hanya jika belum diinisialisasi
                    chartsInitialized = true;
                }
                // Jika grafik sudah diinisialisasi, pastikan mereka di-resize jika perlu
                if (typeof membersByRayonAndAgeChart !== 'undefined') membersByRayonAndAgeChart.resize();
                if (typeof familiesByRayonChart !== 'undefined') familiesByRayonChart.resize();

            } else {
                // Jika grafik disembunyikan
                toggleChartsBtn.textContent = 'Tampilkan Grafik';
            }
        });

        // --- LOGIKA GRAFIK CHART.JS (dipindahkan ke fungsi agar bisa dipanggil saat ditampilkan) ---
        let membersByRayonAndAgeChart; // Deklarasikan di luar scope agar bisa diakses global
        let familiesByRayonChart; // Deklarasikan di luar scope agar bisa diakses global

        function initializeCharts() {
            const allRayons = <?= json_encode($allRayons); ?>;
            const ageRanges = <?= json_encode($ageRanges); ?>;
            const membersByRayonAndAgeData = <?= json_encode($membersByRayonAndAge); ?>;
            const familiesByRayonData = <?= json_encode($familiesByRayon); ?>;

            // Fungsi untuk menghasilkan warna acak yang konsisten
            function generateColors(numColors) {
                const colors = [];
                const baseHue = Math.floor(Math.random() * 360); // Start with a random hue
                for (let i = 0; i < numColors; i++) {
                    const hue = (baseHue + (i * 60)) % 360; // Spread hues
                    colors.push(`hsl(${hue}, 70%, 60%)`);
                }
                return colors;
            }

            // Warna untuk rentang usia
            const ageRangeColors = {
                '0-5': '#FF6384', // Merah muda
                '6-12': '#36A2EB', // Biru
                '13-17': '#FFCE56', // Kuning
                '18-25': '#4BC0C0', // Teal
                '26-35': '#9966FF', // Ungu
                '36-45': '#FF9F40', // Oranye
                '46-60': '#8A2BE2', // Biru Violet
                '61+': '#2ECC71' // Hijau zamrud
            };


            // --- Grafik Jumlah Anggota per Rayon (Berdasarkan Usia) ---
            const membersByRayonAndAgeCtx = document.getElementById('membersByRayonAndAgeChart').getContext('2d');
            membersByRayonAndAgeChart = new Chart(membersByRayonAndAgeCtx, {
                type: 'bar',
                data: {
                    labels: allRayons,
                    datasets: ageRanges.map(range => {
                        return {
                            label: `Usia ${range}`,
                            data: allRayons.map(rayon => membersByRayonAndAgeData[rayon][range]),
                            backgroundColor: ageRangeColors[range] || '#CCCCCC', // Gunakan warna yang ditentukan atau abu-abu
                            borderColor: ageRangeColors[range] || '#CCCCCC',
                            borderWidth: 1
                        };
                    })
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: true, // Membuat bar menjadi tumpuk
                            title: {
                                display: true,
                                text: 'Rayon'
                            }
                        },
                        y: {
                            stacked: true, // Membuat bar menjadi tumpuk
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Anggota'
                            },
                            ticks: {
                                precision: 0 // Pastikan sumbu Y menampilkan bilangan bulat
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Distribusi Anggota per Rayon Berdasarkan Kelompok Usia'
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    }
                }
            });

            // --- Grafik Jumlah Keluarga per Rayon ---
            const familiesByRayonCtx = document.getElementById('familiesByRayonChart').getContext('2d');
            familiesByRayonChart = new Chart(familiesByRayonCtx, {
                type: 'bar', // Atau 'pie', 'doughnut' jika lebih suka
                data: {
                    labels: Object.keys(familiesByRayonData),
                    datasets: [{
                        label: 'Jumlah Keluarga',
                        data: Object.values(familiesByRayonData),
                        backgroundColor: generateColors(Object.keys(familiesByRayonData).length), // Warna dinamis
                        borderColor: generateColors(Object.keys(familiesByRayonData).length),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Rayon'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Keluarga'
                            },
                            ticks: {
                                precision: 0 // Pastikan sumbu Y menampilkan bilangan bulat
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Jumlah Keluarga per Rayon'
                        },
                        legend: {
                            display: false // Sembunyikan legenda jika hanya satu dataset
                        }
                    }
                }
            });
        }
        // --- AKHIR LOGIKA GRAFIK CHART.JS ---
    });
</script>

<?= $this->endSection(); ?>