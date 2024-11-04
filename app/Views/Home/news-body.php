<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- News Detail Section -->
<section class="page-section bg-black" id="news-body">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- News Image -->
                <div class="news-image mb-4" style="position: relative; width: 100%; padding-top: 66.67%; overflow: hidden; border-radius: 0.5rem;">
                    <img src="<?= isset($berita['img']) && file_exists('uploads/images/' . $berita['img']) ? base_url('uploads/images/' . $berita['img']) : 'https://placehold.jp/150x150.png'; ?>"
                        alt="News Image"
                        class="img-fluid rounded"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                </div>
                <!-- News Meta -->
                <div class="news-meta text-muted mb-3">
                    <span><?= isset($berita['created']) ? date('j F Y', strtotime($berita['created'])) : date('j F Y'); ?></span>
                    &bull; <span>Source : <?= $berita['source'] ?? 'N/A'; ?></span>
                </div>
                <!-- News Title -->
                <h1 class="news-title mb-4 text-white"><?= $berita['title'] ?? 'Judul Tidak Tersedia'; ?></h1>
                <!-- News Content -->
                <p class="text-white"><?= nl2br($berita['text'] ?? 'Isi artikel belum dimasukkan.'); ?></p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>