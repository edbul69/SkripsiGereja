<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Buat Artikel Baru</h1>

    <!-- Display success or error messages -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($errors['text'])) : ?>
        <div class="alert alert-danger mt-3">
            <?= $errors['text']; ?>
        </div>
    <?php endif; ?>

    <!-- Article Form Container -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pembuatan Artikel</h6>
                </div>
                <div class="card-body">
                    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

                    <form id="beritaForm" method="post" enctype="multipart/form-data" action="/Settings/saveBerita">
                        <?= csrf_field(); ?>

                        <!-- Article Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : ''; ?>" id="title" name="title" placeholder="Masukkan judul artikel" value="<?= old('title'); ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['title']) ? $errors['title'] : ''; ?>
                            </div>
                        </div>

                        <!-- Main Image Upload -->
                        <div class="mb-3">
                            <label for="img" class="form-label">Gambar Utama Artikel</label>
                            <div class="col-sm-2">
                                <img src="https://placehold.jp/150x150.png" class="img-thumbnail mb-3 img-preview" id="imgPreview">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= isset($errors['img']) ? 'is-invalid' : ''; ?>" id="img" name="img">
                                <label class="custom-file-label" for="img" id="imgLabel">Pilih Gambar</label>
                                <div class="invalid-feedback">
                                    <?= isset($errors['img']) ? $errors['img'] : ''; ?>
                                </div>
                            </div>
                            <small class="form-text text-muted">Upload gambar utama untuk artikel (jpeg, png).</small>
                        </div>

                        <!-- Article Source -->
                        <div class="mb-3">
                            <label for="source" class="form-label">Sumber Artikel</label>
                            <input type="text" class="form-control <?= isset($errors['source']) ? 'is-invalid' : ''; ?>" id="source" name="source" placeholder="Masukkan sumber artikel (contoh: GPDI BAHU)" value="<?= old('source'); ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['source']) ? $errors['source'] : ''; ?>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="mb-3">
                            <label for="text" class="form-label">Isi Artikel</label>
                            <textarea id="text" class="form-control <?= isset($errors['text']) ? 'is-invalid' : ''; ?>" rows="10" name="text" placeholder="Masukkan isi artikel di sini..."><?= old('text'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= isset($errors['text']) ? $errors['text'] : ''; ?>
                            </div>
                        </div>

                        <!-- Save Button -->
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

<?= $this->section('scripts'); ?>

<script>
    // Image preview handling
    document.querySelector('#img').addEventListener('change', function() {
        const file = this.files[0];
        const imgPreview = document.querySelector('#imgPreview');
        const imgLabel = document.querySelector('#imgLabel');

        if (file) {
            imgLabel.textContent = file.name;
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            imgLabel.textContent = 'Pilih Gambar';
            imgPreview.src = 'https://placehold.jp/150x150.png';
        }
    });
</script>

<?= $this->endSection(); ?>