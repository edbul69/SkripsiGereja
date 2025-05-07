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

    <!-- Gender Summary -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Laki-laki
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= count(array_filter($jemaat, fn($j) => $j['jns_kelamin'] === 'laki-laki')); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card border-left-pink shadow h-100 py-2" style="border-left: 0.25rem solid #e83e8c !important;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="text-xs font-weight-bold text-pink text-uppercase mb-1">
                        Jumlah Perempuan
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?= count(array_filter($jemaat, fn($j) => $j['jns_kelamin'] === 'perempuan')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    use Carbon\Carbon; // Make sure Carbon is installed via Composer

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

    foreach ($jemaat as $j) {
        $age = Carbon::parse($j['tgl_lahir'])->age;

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
    ?>

    <!-- Age Group Summary -->
    <div class="row">
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

    <?php
    $cityCounts = [];

    foreach ($jemaat as $j) {
        $alamat = $j['alamat'];
        $parts = explode(',', $alamat);
        $city = trim($parts[0]); // Get the first segment and trim spaces

        if ($city) {
            if (!isset($cityCounts[$city])) {
                $cityCounts[$city] = 0;
            }
            $cityCounts[$city]++;
        }
    }
    ksort($cityCounts); // Sort cities alphabetically
    ?>

    <div class="row g-2 mb-3">
        <div class="col-md-4">
            <button class="btn btn-outline-primary w-100 shadow-sm d-flex align-items-center justify-content-center gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#citySummary" aria-expanded="false" aria-controls="citySummary">
                <i class="bi bi-geo-alt-fill"></i> Jemaat Berdasarkan Kota
            </button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-outline-success w-100 shadow-sm d-flex align-items-center justify-content-center gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#kecamatanSummary" aria-expanded="false" aria-controls="kecamatanSummary">
                <i class="bi bi-map-fill"></i> Jemaat Berdasarkan Kecamatan
            </button>
        </div>
        <div class="col-md-4">
            <button class="btn btn-outline-info w-100 shadow-sm d-flex align-items-center justify-content-center gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#kelurahanSummary" aria-expanded="false" aria-controls="kelurahanSummary">
                <i class="bi bi-map-fill"></i> Jemaat Berdasarkan Kelurahan
            </button>
        </div>
    </div>

    <!-- Collapsible City Summary -->
    <div class="collapse" id="citySummary">
        <h5 class="mb-3 mt-4">Jumlah Jemaat Berdasarkan Kota</h5>
        <div class="row">
            <?php foreach ($cityCounts as $city => $count) : ?>
                <div class="col-md-3 mb-3">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?= esc($city) ?>
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?= $count ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php
    $kecamatanCounts = [];

    foreach ($jemaat as $j) {
        $alamat = $j['alamat'];
        $parts = explode(',', $alamat);
        $kecamatan = isset($parts[1]) ? trim($parts[1]) : 'Tidak Diketahui'; // 2nd part of the address

        if (!isset($kecamatanCounts[$kecamatan])) {
            $kecamatanCounts[$kecamatan] = 0;
        }
        $kecamatanCounts[$kecamatan]++;
    }

    ksort($kecamatanCounts); // Optional: sort alphabetically
    ?>

    <!-- Collapsible Kecamatan Summary -->
    <div class="collapse" id="kecamatanSummary">
        <h5 class="mb-3 mt-4">Jumlah Jemaat Berdasarkan Kecamatan</h5>
        <div class="row">
            <?php foreach ($kecamatanCounts as $kecamatan => $count) : ?>
                <div class="col-md-3 mb-3">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <?= esc($kecamatan) ?>
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?= $count ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php
    $kelurahanCounts = [];

    foreach ($jemaat as $j) {
        $alamat = $j['alamat'];
        $parts = explode(',', $alamat);
        $kelurahan = isset($parts[2]) ? trim($parts[2]) : 'Tidak Diketahui'; // 3rd part of the address

        if (!isset($kelurahanCounts[$kelurahan])) {
            $kelurahanCounts[$kelurahan] = 0;
        }
        $kelurahanCounts[$kelurahan]++;
    }

    ksort($kelurahanCounts); // Sort alphabetically if desired
    ?>

    <!-- Collapsible Kelurahan Summary -->
    <div class="collapse" id="kelurahanSummary">
        <h5 class="mb-3 mt-4">Jumlah Jemaat Berdasarkan Kelurahan</h5>
        <div class="row">
            <?php foreach ($kelurahanCounts as $kelurahan => $count) : ?>
                <div class="col-md-3 mb-3">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <?= esc($kelurahan) ?>
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?= $count ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- DataTales Example -->
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
                                    <th>Name</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Asal</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telp</th>
                                    <th style="min-width: 200px;">Alamat</th> <!-- Ensure space for full address -->
                                    <th class="text-center">Actions</th> <!-- New column for buttons -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jemaat as $j) : ?>
                                    <tr>
                                        <td><?= $j['nama']; ?></td>
                                        <td><?= $j['tgl_lahir']; ?></td>
                                        <td><?= $j['asal']; ?></td>
                                        <td><?= $j['jns_kelamin']; ?></td>
                                        <td><?= $j['telp']; ?></td>
                                        <td style="white-space: normal; word-break: break-word;"><?= $j['alamat']; ?></td> <!-- Ensure full address is shown -->
                                        <!-- Action buttons for Edit and Delete -->
                                        <td class="text-center">
                                            <a href="/Dashboard/jemaat/edit/<?= $j['id']; ?>" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="/Dashboard/jemaat/delete/<?= $j['id']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');" title="Delete">
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

<script>
    $(document).ready(function() {
        // Initialize DataTables on the #dataTable element
        var table = $('#dataTable').DataTable({
            "pageLength": 50, // Number of rows per page
            "lengthMenu": [10, 20, 50, 100], // Options for number of rows to show per page
            "paging": true, // Enable pagination
            "searching": true, // Enable search bar
            "ordering": true, // Enable column sorting
            "info": true, // Show table information (e.g., "Showing 1 to 10 of 57 entries")
            "responsive": true, // Ensure table adapts to different screen sizes
            "order": [
                [0, "asc"]
            ] // Sort by the first column (index 0) in ascending order
        });

        // Custom button to set the page length dynamically
        window.setPageLength = function(value) {
            table.page.len(value).draw(); // Change the number of rows displayed and redraw
        };
    });
</script>

<?= $this->endSection(); ?>