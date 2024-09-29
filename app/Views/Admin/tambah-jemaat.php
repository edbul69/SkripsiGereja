<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Jemaat</h1>
    <?= $this->extend('Admin/layout/template'); ?>

    <?= $this->section('content'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tambah Jemaat</h1>

        <!-- Card Component for Form Layout -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Data Jemaat</h6>
            </div>
            <div class="card-body">
                <!-- Form Structure -->
                <form action="/Admin/simpanJemaat" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat">
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="telp" name="telp" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="jns_kelamin" class="form-label">Jenis Kelamin</label>
                        <select id="jns_kelamin" class="form-select" name="jns_kelamin">
                            <option selected>Pilih...</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>