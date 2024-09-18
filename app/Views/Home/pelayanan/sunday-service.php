<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<header class="masthead" id="sunday">
    <div class="container">
        <div class="masthead-subheading">
        </div>
    </div>
</header>

<section class="page-section bg-black page-pelayanan" id="sunday-body">
    <div class="container py-5">
        <h2 class="fw-bold text-white text-center mb-3">Sunday Service</h2>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="divider-bar"></div>
        </div>
        <div class="text-center text-white my-3">
            <em>“Aku berkata kepadamu: Sesungguhnya barangsiapa mendengar perkataan-Ku dan percaya kepada Dia yang mengutus Aku, ia mempunyai hidup yang kekal dan tidak turut dihukum, sebab ia sudah pindah dari dalam maut ke dalam hidup”</em>
            <p class="mt-1"><strong>Yohanes 5:24</strong></p>
        </div>

        <!-- Sub-section with vertical alignment -->
        <div class="row text-white align-items-center sub-section">
            <div class="col-md-6 text-center my-5">
                <h4 class="fw-bold">SETIAP HARI MINGGU</h4>
                <hr class="divider my-3 mx-auto">
                <div class="d-flex justify-content-around align-items-center mt-4">
                    <div>
                        <p>PAGI</p>
                        <p>7.00 - 9.00</p>
                    </div>
                    <div class="divider-vertical"></div>
                    <div>
                        <p>SORE</p>
                        <p>7.00 - 9.00</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <figure class="empty-box bg-light rounded mx-auto">
                    <img src="Public/assets/img/pelayanan/sunday-service.JPG" class="img-fluid" alt="Service Image">
                </figure>
            </div>
        </div>

        <!-- New Section with Two Boxes and Clickable Effect -->
        <div class="location-section text-white text-center">
            <h2 class="fw-bold mb-3">LOKASI</h2>
            <div class="row justify-content-center align-items-center g-0"> <!-- Added g-0 to remove gutter -->
                <div class="col-md-6">
                    <figure class="location-box bg-secondary mx-auto box" id="box1"> <!-- Removed mb-3 -->
                        <img src="Public/assets/img/pelayanan/moc.JPG" class="img-fluid" alt="Location Image">
                    </figure>
                </div>
                <div class="col-md-6">
                    <figure class="location-box bg-secondary mx-auto box" id="box2"> <!-- Removed mb-3 -->
                        <img src="Public/assets/img/pelayanan/baptisan-air.jpg" class="img-fluid" alt="Location Image">
                    </figure>
                </div>
            </div>
            <div class="my-4">
                <a href="#footer" class="text-white">
                    <h4 class="fw-bold">LIHAT DI PETA</h4>
                    <p>&#x2193;</p>
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>