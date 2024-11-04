<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>
<section class="page-section bg-black" id="news-body">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- News Image -->
                <div class="news-image mb-4" style="position: relative; width: 100%; padding-top: 66.67%; overflow: hidden; border-radius: 0.5rem;">
                    <img src="<?= esc($img) ?>" alt="News Image" class="img-fluid rounded" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                </div>
                <!-- News Meta -->
                <div class="news-meta text-muted mb-3">
                    <span><?= date('j F Y') ?></span>
                    &bull; <span>Source : <?= $source ?></span>
                </div>
                <!-- News Title -->
                <h1 class="news-title mb-4 text-white"><?= $title ?></h1>
                <!-- News Content -->
                <p class="text-white"><?= nl2br($text) ?></p>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>