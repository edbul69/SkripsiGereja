<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Masthead Section -->
<header class="masthead" id="sunday">
    <div class="container">
        <div class="masthead-subheading"></div>
    </div>
</header>

<!-- Sunday Service Section -->
<section class="page-section bg-black page-pelayanan my-0 pb-0" id="sunday-body">
    <div class="container py-5">
        <h2 class="fw-bold text-white text-center mb-3">Sunday Service</h2>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="divider-bar"></div>
        </div>
        <div class="text-center text-white my-3">
            <em>"Pada hari pertama dari tiap-tiap minggu hendaklah kamu masing-masing di rumahnya menyisihkan sesuatu dan menyimpannya, menurut apa yang ia peroleh, supaya jangan pengumpulan itu diadakan, kalau aku datang."</em>
            <p class="mt-1"><strong>1 Korintus 16:</strong></p>
        </div>

        <!-- Sub-section with vertical alignment -->
        <div class="row text-white align-items-center sub-section hidden">
            <div class="col-md-6 text-center my-5">
                <h4 class="fw-bold">SETIAP HARI MINGGU</h4>
                <hr class="divider my-3 mx-auto">
                <div class="d-flex justify-content-around align-items-center mt-4">
                    <div>
                        <p>PAGI</p>
                        <p>08.00 AM</p>
                    </div>
                    <div class="divider-vertical"></div>
                    <div>
                        <p>SORE</p>
                        <p>06.00 PM</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <figure class="empty-box bg-light rounded mx-auto">
                    <img src="../Public/assets/img/pelayanan/sunday/img-1.jpg" class="img-fluid" alt="Service Image">
                </figure>
            </div>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="location-section bg-black text-white text-center my-0 py-0" id="location-section">
    <div class="container py-5 hidden">
        <h2 class="fw-bold">LOKASI</h2>
        <div class="row justify-content-center align-items-center g-0 my-5">
            <div class="col-md-6">
                <figure class="location-box bg-secondary mx-auto box" id="box1">
                    <img src="../Public/assets/img/pelayanan/sunday/img-maps-1.png" class="img-fluid" alt="Location Image">
                </figure>
            </div>
            <div class="col-md-6">
                <figure class="location-box bg-secondary mx-auto box" id="box2">
                    <img src="../Public/assets/img/pelayanan/sunday/img-maps-2.png" class="img-fluid" alt="Location Image">
                </figure>
            </div>
        </div>
        <div class="mb-4">
            <a href="#footer" class="text-white">
                <h4 class="fw-bold">LIHAT DI PETA</h4>
                <p>&#x2193;</p>
            </a>
        </div>
    </div>
</section>

<!-- Livestream Section -->
<section class="livestream-section bg-black text-white text-center my-0 py-0" id="livestream-section">
    <div class="container py-5 hidden">
        <h2 class="fw-bold mb-5">LIVESTREAM</h2>
        <div class="row justify-content-center align-items-center g-5">
            <div class="col-md-7 text-center">
                <iframe id="youtube-video" width="100%" height="315" src="<?= esc($embedCode) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="col-md-5 text-center">
                <p class="text-white">Temukan kami di YouTube untuk live ibadah GPdI Bahu</p>
                <a href="https://www.youtube.com/@GPdIbahuofficial3099" class="btn btn-outline-light btn-lg px-5 py-2 rounded-pill">Go to YouTube</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>