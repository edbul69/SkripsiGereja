<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- News Detail Section -->
<section class="page-section bg-black" id="news1">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- News Image -->
                <div class="news-image mb-4">
                    <img src="Public/assets/img/news/news1.JPG" alt="News Image" class="img-fluid rounded">
                </div>
                <!-- News Meta -->
                <div class="news-meta text-muted mb-3">
                    <span>October 4, 2021</span> &bull; <span>Source : GPDI BAHU</span>
                </div>
                <!-- News Title -->
                <h1 class="news-title mb-4 text-white">How to get started as a mobile app designer and get your first client?</h1>
                <!-- News Content -->
                <p class="news-content text-white-50">
                    Everyone wants to make the next great mobile app. It can be an extremely profitable way to make some money if you know what you’re doing.
                </p>
                <p class="news-content text-white-50">
                    If you’ve got a great mobile app idea and decided to consult with a developer or an app development company, you may have been surprised to hear how costly it is to outsource development.
                </p>
                <p class="news-content text-white-50">
                    So that’s when the thought hit you, “I can just do learn to do this myself.”
                </p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>