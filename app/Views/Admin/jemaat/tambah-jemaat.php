<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Jemaat</h1>

    <?php $validation = session()->getFlashdata('validation'); ?>

    <!-- Card Component for Form Layout -->
    <div class="card shadow mb-4 col-lg-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Data Jemaat</h6>
        </div>
        <div class="card-body">
            <!-- Form Structure -->
            <form id="jemaatForm" action="/Admin/simpanJemaat" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control <?= ($validation && $validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="<?= old('nama'); ?>">
                    <?php if ($validation && $validation->hasError('nama')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control col-lg-3 <?= ($validation && $validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>">
                    <?php if ($validation && $validation->hasError('tgl_lahir')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_lahir'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="asal" class="form-label">Asal</label>
                    <input type="text" class="form-control <?= ($validation && $validation->hasError('asal')) ? 'is-invalid' : ''; ?>" id="asal" name="asal" placeholder="Masukkan asal" value="<?= old('asal'); ?>">
                    <?php if ($validation && $validation->hasError('asal')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('asal'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="jns_kelamin" class="form-label">Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= ($validation && $validation->hasError('jns_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jns_kelamin" id="male" value="Laki-laki" <?= (old('jns_kelamin') == 'Laki-laki') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="male">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input <?= ($validation && $validation->hasError('jns_kelamin')) ? 'is-invalid' : ''; ?>" type="radio" name="jns_kelamin" id="female" value="Perempuan" <?= (old('jns_kelamin') == 'Perempuan') ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="female">Perempuan</label>
                        </div>
                    </div>
                    <?php if ($validation && $validation->hasError('jns_kelamin')) : ?>
                        <div class="invalid-feedback d-block">
                            <?= $validation->getError('jns_kelamin'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="telp" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control <?= ($validation && $validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" placeholder="Masukkan nomor telepon" value="<?= old('telp'); ?>">
                    <?php if ($validation && $validation->hasError('telp')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('telp'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control <?= ($validation && $validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Masukkan alamat" value="<?= old('alamat'); ?>">
                    <?php if ($validation && $validation->hasError('alamat')) : ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary" id="submitBtn">Simpan Data</button>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Form Pengisihan Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Text tidak boleh ada yang kosong.
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>