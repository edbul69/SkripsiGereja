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
                <form>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Masukkan alamat">
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="inputPhone" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="mb-3">
                        <label for="inputDOB" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="inputDOB">
                    </div>
                    <div class="mb-3">
                        <label for="inputGender" class="form-label">Jenis Kelamin</label>
                        <select id="inputGender" class="form-select">
                            <option selected>Pilih...</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary">Simpan Data</button>
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