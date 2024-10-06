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
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Jemaat</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Asal</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telp</th>
                                    <th>Alamat</th>
                                    <th>Actions</th> <!-- New column for buttons -->
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
                                        <td><?= $j['alamat']; ?></td>
                                        <!-- Action buttons for Edit and Delete -->
                                        <td>
                                            <!-- Edit Button triggers the modal -->
                                            <a href="/Settings/updateJemaat/<?= $j['id']; ?>" class="btn btn-warning">Edit</a>
                                            <form action="/Settings/<?= $j['id']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');">Hapus</button>
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