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
                                            <button class="btn btn-warning btn-sm edit-btn"
                                                data-id="<?= $j['id']; ?>"
                                                data-nama="<?= $j['nama']; ?>"
                                                data-tgl_lahir="<?= $j['tgl_lahir']; ?>"
                                                data-asal="<?= $j['asal']; ?>"
                                                data-jns_kelamin="<?= $j['jns_kelamin']; ?>"
                                                data-telp="<?= $j['telp']; ?>"
                                                data-alamat="<?= $j['alamat']; ?>"
                                                data-toggle="modal" data-target="#editModal">
                                                Edit
                                            </button>
                                            <a href="/Settings/deleteJemaat/<?= $j['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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

<!-- Bootstrap Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/Settings/updateJemaat" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Jemaat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Hidden input to store ID -->
                    <input type="hidden" id="edit-id" name="id">

                    <!-- Editable fields -->
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="edit-tgl_lahir" name="tgl_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-asal" class="form-label">Asal</label>
                        <input type="text" class="form-control" id="edit-asal" name="asal">
                    </div>
                    <div class="mb-3">
                        <label for="edit-jns_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="edit-jns_kelamin" name="jns_kelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-telp" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="edit-telp" name="telp">
                    </div>
                    <div class="mb-3">
                        <label for="edit-alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="edit-alamat" name="alamat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>