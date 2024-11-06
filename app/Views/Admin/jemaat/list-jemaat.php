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
                                            <a href="/Settings/jemaat/edit/<?= $j['id']; ?>" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="/Settings/jemaat/delete/<?= $j['id']; ?>" method="post" class="d-inline">
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