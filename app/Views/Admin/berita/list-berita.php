<?php

use PhpParser\Node\Stmt\Foreach_;
?>
<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Berita</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background-color: #4e73df; color: white;">
                    <h6 class="m-0 font-weight-bold">Tabel Berita</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Editor</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($berita as $b) : ?>
                                    <tr>
                                        <td><?= $b['title']; ?></td>
                                        <td><?= $b['author']; ?></td>
                                        <td><?= $b['created']; ?></td>
                                        <td>
                                            <a href="/Dashboard/berita/list/<?= $b['slug']; ?>" class="btn btn-success" target="_blank">Lihat</a>
                                            <a href="/Dashboard/berita/edit/<?= $b['slug']; ?>" class="btn btn-warning">Edit</a>
                                            <form action="/Dashboard/berita/hapus/<?= $b['id']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">Hapus</button>
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

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    $(document).ready(function() {
        // Initialize DataTables on the #dataTable element
        var table = $('#dataTable').DataTable({
            "pageLength": 10, // Number of rows per page
            "lengthMenu": [10, 20, 50, 100], // Options for number of rows to show per page
            "paging": true, // Enable pagination
            "searching": true, // Enable search bar
            "ordering": true, // Enable column sorting
            "info": true, // Show table information (e.g., "Showing 1 to 10 of 57 entries")
            "responsive": true, // Ensure table adapts to different screen sizes
            "order": [
                [2, "desc"]
            ] // Sort by the third column (index 2) in descending order
        });

        // Custom button to set the page length dynamically
        window.setPageLength = function(value) {
            table.page.len(value).draw(); // Change the number of rows displayed and redraw
        };
    });
</script>

<?= $this->endSection(); ?>