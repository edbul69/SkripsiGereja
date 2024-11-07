<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Artikel</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Artikel</h6>
                </div>
                <div class="card-body">
                    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

                    <form id="beritaForm" action="/Dashboard/berita/update/<?= $berita['id']; ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="slug" value="<?= $berita['slug']; ?>">

                        <!-- Article Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Artikel</label>
                            <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : ''; ?>" id="title" name="title" placeholder="Masukkan judul artikel" value="<?= old('title') ?: $berita['title']; ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['title']) ? $errors['title'] : ''; ?>
                            </div>
                        </div>

                        <!-- Main Image Upload -->
                        <div class="mb-3">
                            <label for="img" class="form-label">Gambar Utama Artikel</label>
                            <div class="col-sm-2">
                                <img src="<?= base_url('uploads/images/' . ($berita['img'] ?? 'placeholder.png')); ?>" class="img-thumbnail mb-3 img-preview">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= isset($errors['img']) ? 'is-invalid' : ''; ?>" id="img" name="img">
                                <label class="custom-file-label" for="img">Pilih Gambar</label>
                                <div class="invalid-feedback">
                                    <?= isset($errors['img']) ? $errors['img'] : ''; ?>
                                </div>
                            </div>
                            <small class="form-text text-muted">Upload gambar utama untuk artikel (jpeg, png) disarankan rasio 2:1</small>
                        </div>

                        <!-- Article Source -->
                        <div class="mb-3">
                            <label for="source" class="form-label">Sumber Artikel</label>
                            <input type="text" class="form-control <?= isset($errors['source']) ? 'is-invalid' : ''; ?>" id="source" name="source" placeholder="Masukkan sumber artikel (contoh: GPDI BAHU)" value="<?= old('source') ?: $berita['source']; ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['source']) ? $errors['source'] : ''; ?>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="mb-3">
                            <label for="text" class="form-label">Isi Artikel</label>
                            <textarea id="text" class="form-control <?= isset($errors['text']) ? 'is-invalid' : ''; ?>" rows="10" name="text" placeholder="Masukkan isi artikel di sini..."><?= old('text') ?: $berita['text']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= isset($errors['text']) ? $errors['text'] : ''; ?>
                            </div>
                        </div>

                        <!-- Preview and Save Buttons -->
                        <button type="submit" class="btn btn-secondary me-2" name="action" value="preview" formtarget="_blank">Preview Artikel</button>
                        <button type="submit" class="btn btn-primary" name="action" value="save">Edit Artikel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- container-fluid -->

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    const imgInput = document.querySelector('#img');
    const imgPreview = document.querySelector('.img-preview');
    const imgLabel = document.querySelector('.custom-file-label');

    imgInput.addEventListener('change', function() {
        const file = imgInput.files[0];

        if (file) {
            imgLabel.textContent = file.name;
            const reader = new FileReader();

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            imgLabel.textContent = 'Pilih Gambar';
            imgPreview.src = '<?= base_url('uploads/images/' . ($berita['img'] ?? 'placeholder.png')); ?>';
        }
    });
</script>

<?= $this->endSection(); ?>