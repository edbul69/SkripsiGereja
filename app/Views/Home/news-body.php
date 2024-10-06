<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- News Detail Section -->
<section class="page-section bg-black" id="news-body">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- News Image -->
                <div class="news-image mb-4">
                    <img src="../<?= $berita['img']; ?>" alt="News Image" class="img-fluid rounded">
                </div>
                <!-- News Meta -->
                <div class="news-meta text-muted mb-3">
                    <span><?= isset($berita['created']) ? strftime('%e %B %Y', strtotime($berita['created'])) : 'unknown'; ?></span>
                    &bull; <span>Source : <?= $berita['source'] ?? 'unknown'; ?></span>
                </div>
                <!-- News Title -->
                <h1 class="news-title mb-4 text-white"><?= $berita['title']; ?></h1>
                <!-- News Content -->
                <p class="news-content text-white-50">
                    <?= $berita['text']; ?>
                </p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>