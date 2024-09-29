<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Masthead Section -->
<header class="" id="sekolah">
</header>

<!-- Sekolah Minggu Body Section -->
<section class="page-section blackboard-bg page-pelayanan" id="sekolah-body">
    <div class="container">
        <h2 class="fw-bold text-white text-center mb-3">Sekolah Minggu</h2>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="divider-bar"></div>
        </div>
        <div class="text-center text-white my-3">
            <em class="fs-5">"Kami tidak hendak sembunyikan itu kepada anak-anak mereka, tetapi kami akan ceritakan kepada angkatan yang kemudian puji-pujian kepada TUHAN dan kekuatan-Nya, dan perbuatan-perbuatan ajaib yang telah dilakukan-Nya."</em>
            <p class="mt-2"><strong>Mazmur 78:4</strong></p>
        </div>
    </div>
</section>

<!-- Blackboard Themed Information Section -->
<section class="page-section blackboard-bg" id="sekolah-info">
    <div class="container text-center text-white">
        <h2 class="chalk-text">Tentang Sekolah Minggu</h2>
        <div class="divider-bar" style="background-color: #ffdd57;"></div>
        <p class="chalk-text mt-4">
            Sekolah Minggu adalah tempat di mana anak-anak dapat belajar Firman Tuhan melalui cerita Alkitab, nyanyian, dan permainan. Di sini, anak-anak dapat menemukan cara baru untuk mengenal Tuhan dengan lebih dekat.
        </p>
        <p class="chalk-text mt-4">
            Kami mengajak semua anak untuk bergabung setiap Minggu di GPDI Bahu, pukul 10:00 AM. Ini adalah tempat yang penuh sukacita dan kegembiraan di mana mereka dapat bertumbuh dalam iman.
        </p>
    </div>
</section>

<!-- Image Carousel for Sekolah Minggu -->
<section class="page-section blackboard-bg" id="sekolah-carousel">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../Public/assets/img/pelayanan/aba.jpg" class="d-block w-100" alt="Sekolah Minggu Activity 1">
                </div>
                <div class="carousel-item">
                    <img src="../Public/assets/img/pelayanan/baptisan-air.jpg" class="d-block w-100" alt="Sekolah Minggu Activity 2">
                </div>
                <div class="carousel-item">
                    <img src="../Public/assets/img/pelayanan/doa-bersama.JPG" class="d-block w-100" alt="Sekolah Minggu Activity 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Activities Section with Icons -->
<section class="page-section blackboard-bg" id="sekolah-activities">
    <div class="container text-center text-white">
        <h2 class="chalk-text">Aktivitas Kami</h2>
        <div class="divider-bar" style="background-color: #4ecdc4;"></div>
        <p class="chalk-text mt-4">
            Setiap Minggu, anak-anak terlibat dalam berbagai kegiatan yang membantu mereka bertumbuh dalam iman dengan cara yang menyenangkan. Berikut adalah beberapa aktivitas yang kami lakukan:
        </p>
        <div class="row mt-4">
            <div class="col-md-4" style="z-index: 1;">
                <img src="../Public/assets/img/news/news1.JPG" alt="Sing Icon" class="img-fluid mb-2">
                <h4 class="chalk-text" style="color: #4CAF50;">Bernyanyi</h4>
                <p class="chalk-text">
                    Anak-anak memuji Tuhan dengan penuh sukacita melalui lagu-lagu pujian.
                </p>
            </div>
            <div class="col-md-4" style="z-index: 1;">
                <img src="../Public/assets/img/news/news2.JPG" alt="Bible Icon" class="img-fluid mb-2">
                <h4 class="chalk-text" style="color: #4ecdc4;">Cerita Alkitab</h4>
                <p class="chalk-text">
                    Anak-anak mendengarkan cerita Alkitab yang mengajarkan nilai-nilai kasih Tuhan.
                </p>
            </div>
            <div class="col-md-4" style="z-index: 1;">
                <img src="../Public/assets/img/news/news3.JPG" alt="Play Icon" class="img-fluid mb-2">
                <h4 class="chalk-text" style="color: #ff6f61;">Permainan</h4>
                <p class="chalk-text">
                    Permainan yang menyenangkan membantu mereka memahami lebih banyak tentang Firman Tuhan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Event Information Section -->
<section class="page-section blackboard-bg" id="sekolah-event-info">
    <div class="container text-center text-white">
        <h2 class="chalk-text">Kapan dan Dimana?</h2>
        <div class="divider-bar" style="background-color: #ff6f61;"></div>
        <p class="chalk-text mt-4">
            Sekolah Minggu diadakan setiap hari Minggu pada pukul 10:00 AM di GPDI Bahu, Manado. Kami menyambut semua anak untuk bergabung dan merasakan sukacita dalam belajar Firman Tuhan bersama teman-teman sebaya.
        </p>
        <p class="chalk-text mt-4 mb-5">
            Lokasi: <strong>GPDI Bahu, Jalan Bahu, Manado</strong>
        </p>
        <a href="#footer" class="btn-sekolah btn-sekolah-location mt-4">Lihat Lokasi</a>
    </div>
</section>

<!-- Call to Action Section -->
<section class="page-section blackboard-bg" id="sekolah-cta">
    <div class="container text-center text-white">
        <h2 class="chalk-text">Ayo Bergabung!</h2>
        <div class="divider-bar" style="background-color: #4CAF50;"></div>
        <p class="chalk-text mt-4 mb-5">
            Jangan lewatkan kesempatan untuk anak-anak Anda bertumbuh dalam iman sambil bersenang-senang! Bergabunglah dengan Sekolah Minggu kami dan ajak mereka untuk merasakan kasih Tuhan bersama teman-teman mereka.
        </p>
        <a href="https://wa.me/1234567890" target="_blank" class="btn-sekolah btn-sekolah-whatsapp btn-lg mt-4">
            WhatsApp
        </a>
    </div>
</section>

<div class="decoration" id="sekolah-decor">
    <div class="decor" id="apple">
        <img src="../Public/assets/img/chalk-icon/apple.svg" alt="">
    </div>
    <div class="decor" id="lamp">
        <img src="../Public/assets/img/chalk-icon/lamp.svg" alt="">
    </div>
    <div class="decor" id="clip">
        <img src="../Public/assets/img/chalk-icon/clip.svg" alt="">
    </div>
    <div class="decor" id="root">
        <img src="../Public/assets/img/chalk-icon/root.svg" alt="">
    </div>
    <div class="decor" id="plane">
        <img src="../Public/assets/img/chalk-icon/plane.svg" alt="">
    </div>
    <div class="decor" id="atom">
        <img src="../Public/assets/img/chalk-icon/atom.svg" alt="">
    </div>
    <div class="decor" id="rainbow-3">
        <img src="../Public/assets/img/chalk-icon/rainbow-3.svg" alt="">
    </div>
    <div class="decor" id="books">
        <img src="../Public/assets/img/chalk-icon/book.svg" alt="">
    </div>
    <div class="decor" id="ruler">
        <img src="../Public/assets/img/chalk-icon/ruler.svg" alt="">
    </div>
</div>

<?= $this->endSection(); ?>