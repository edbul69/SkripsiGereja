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
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Berita</h6>
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
                                            <a href="/Settings/berita/list/<?= $b['slug']; ?>" class="btn btn-success" target="_blank">Lihat</a>
                                            <a href="/Settings/berita/edit/<?= $b['slug']; ?>" class="btn btn-warning">Edit</a>
                                            <form action="/Settings/berita/hapus/<?= $b['id']; ?>" method="post" class="d-inline">
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