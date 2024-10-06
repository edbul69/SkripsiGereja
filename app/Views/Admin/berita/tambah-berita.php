<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buat Artikel Baru</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <?php $validation = session()->getFlashdata('validation'); ?>

    <!-- Article Form Container -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pembuatan Artikel</h6>
                </div>
                <div class="card-body">
                    <form id="beritaForm" action="/Admin/simpanBerita" method="post">
                        <?= csrf_field(); ?>
                        <!-- Article Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control <?= ($validation && $validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" placeholder="Masukkan judul artikel" value="<?= old('title'); ?>">
                            <?php if ($validation && $validation->hasError('title')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('title'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Main Image Upload -->
                        <div class="mb-3">
                            <label for="img" class="form-label">Gambar Utama Artikel</label>
                            <input type="file" class="form-control py-1 <?= ($validation && $validation->hasError('img')) ? 'is-invalid' : ''; ?>" id="img" name="img" placeholder="Masukkan URL gambar utama" value="<?= old('img'); ?>">
                            <?php if ($validation && $validation->hasError('img')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('img'); ?>
                                </div>
                            <?php endif; ?>
                            <small class="form-text text-muted">Upload gambar utama untuk artikel (jpeg, png).</small>
                        </div>

                        <!-- Article Source -->
                        <div class="mb-3">
                            <label for="source" class="form-label">Sumber Artikel</label>
                            <input type="text" class="form-control" id="source" name="source" placeholder="Masukkan sumber artikel (contoh: GPDI BAHU)">
                        </div>

                        <!-- Article Content -->
                        <div class="mb-3">
                            <label for="text" class="form-label">Isi Artikel</label>
                            <textarea id="text" class="form-control <?= ($validation && $validation->hasError('text')) ? 'is-invalid' : ''; ?>" rows="10" name="text" placeholder="Masukkan isi artikel di sini..."><?= old('text'); ?></textarea>
                            <?php if ($validation && $validation->hasError('text')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('text'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Preview and Save Buttons -->
                        <button type="button" class="btn btn-secondary me-2">Preview Artikel</button>
                        <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>