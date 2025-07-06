<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Masthead Section -->
<header class="masthead" id="doa">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-white text-center">
    </div>
</header>

<!-- Introduction Section -->
<section class="page-section bg-black page-pelayanan" id="doa-hd">
    <div class="container">
        <h2 class="fw-bold text-white text-center mb-4">Doa Bersama</h2>
        <div class="divider-bar mx-auto mb-4"></div>
        <div class="text-center text-white my-4">
            <blockquote class="fs-5 fst-italic">
                "Tetaplah berdoa. Mengucap syukurlah dalam segala hal, sebab itulah yang dikehendaki Allah di dalam Kristus Yesus bagi kamu." </blockquote>
            <p class="mt-2"><strong>1 Tesalonika 5:17-18</strong></p>
        </div>
    </div>
</section>

<!-- Why We Pray Section -->
<section class="page-section bg-light text-dark" id="why-pray">
    <div class="container py-5 text-center hidden">
        <h2 class="fw-bold">Mengapa Berdoa Itu Penting?</h2>
        <p class="fs-5 mt-3 mb-4">
            Berdoa membawa kita lebih dekat kepada Tuhan dan memperkuat iman kita. Melalui doa, kita membuka hati dan pikiran kita kepada-Nya, mencari petunjuk, dan mempercayai rencana-Nya.
        </p>
        <p class="fs-5">
            Doa bersama di GPdI Bahu adalah kesempatan untuk memperkuat iman sebagai komunitas yang bersatu dalam Tuhan.
        </p>
    </div>
</section>

<!-- Doa Schedule Section -->
<section class="page-section bg-dark" id="doa-schedule">
    <div class="container py-5 hidden">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="../Public/assets/img/pelayanan/doa/img-1.jpg" alt="Doa Bersama" class="img-fluid rounded shadow-lg mb-4">
            </div>
            <div class="col-md-6 text-center text-white">
                <div class="p-4">
                    <h2 class="fw-bold mb-3">SETIAP HARI KAMIS</h2>
                    <p class="fs-4">7.00 MALAM</p>
                    <p class="fs-5">Bergabunglah dalam Doa Bersama di GPdI Bahu untuk memperkuat iman dan pengharapan kita bersama.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Encouragement Section -->
<section class="page-section bg-white text-center text-dark py-5" id="encouragement">
    <div class="container hidden">
        <h2 class="fw-bold">Mari Bersama Berdoa</h2>
        <p class="fs-5 mt-3">
            Jadikan doa sebagai bagian penting dalam hidup Anda. Setiap Kamis pukul 7.00 malam, bergabunglah bersama kami di GPdI Bahu untuk mencari kekuatan, penghiburan, dan harapan baru dalam doa.
        </p>
    </div>
</section>

<?= $this->endSection(); ?>