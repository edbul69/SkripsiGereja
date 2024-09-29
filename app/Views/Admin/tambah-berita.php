<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buat Artikel Baru</h1>

    <!-- Article Form Container -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pembuatan Artikel</h6>
                </div>
                <div class="card-body">
                    <form action="Admin/simpanBerita" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <!-- Main Image Upload -->
                        <div class="mb-3">
                            <label for="articleImage" class="form-label">Gambar Utama Artikel</label>
                            <input type="file" class="form-control h-100" id="articleImage" name="articleImage">
                            <small class="form-text text-muted">Upload gambar utama untuk artikel (jpeg, png).</small>
                        </div>

                        <!-- Publication Date -->
                        <div class="mb-3">
                            <label for="articleDate" class="form-label">Tanggal Publikasi</label>
                            <input type="date" class="form-control" id="articleDate" name="articleDate">
                        </div>

                        <!-- Article Source -->
                        <div class="mb-3">
                            <label for="articleSource" class="form-label">Sumber Artikel</label>
                            <input type="text" class="form-control" id="articleSource" name="articleSource" placeholder="Masukkan sumber artikel (contoh: GPDI BAHU)">
                        </div>

                        <!-- Article Title -->
                        <div class="mb-3">
                            <label for="articleTitle" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control" id="articleTitle" name="articleTitle" placeholder="Masukkan judul artikel">
                        </div>

                        <!-- Article Content -->
                        <div class="mb-3">
                            <label for="articleContent" class="form-label">Isi Artikel</label>
                            <textarea id="articleContent" class="form-control" rows="10" name="articleContent" placeholder="Masukkan isi artikel di sini..."></textarea>
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