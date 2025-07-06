<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Gereja Pantekosta di Indonesia</div>
        <div class="masthead-heading text-uppercase">BAHU</div>
    </div>
</header>
<!-- About-->
<section class="page-section bg-black" id="about">
    <div class="container location-section">
        <div class="text-center">
            <h3 class="section-subheading text-uppercase">SELAMAT DATANG DI</h3>
            <h2 class="section-heading outline-text">GPdI BAHU</h2>
        </div>
        <div class="row align-items-center hidden">
            <div class="col-md-6 image-content">
                <img src="../Public/assets/img/main-banner.webp" alt="Group of people" clas>
            </div>
            <div class="col-md-6 text-content">
                <h1>KELUARGA<br><span>BESAR</span><br>GPdI</h1>
            </div>
        </div>
        <div class="row text-container hidden justify-content-center">
            <div class="col-auto static-text">PELAYANAN</div>
            <div class="col-auto animated-text-container">
                <div class="animated-text" id="text-1">BAPTISAN.</div>
                <div class="animated-text" id="text-2">PENYERAHAN ANAK.</div>
                <div class="animated-text" id="text-3">PERJAMUAN KUDUS.</div>
                <div class="animated-text" id="text-4">SUNDAY SERVICE.</div>
                <div class="animated-text" id="text-5">DOA BERSAMA.</div>
                <div class="animated-text" id="text-6">IBADAH RAYON.</div>
                <div class="animated-text" id="text-7">MOC.</div>
                <div class="animated-text" id="text-8">TOG.</div>
                <div class="animated-text" id="text-9">SEKOLAH MINGGU.</div>
            </div>
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section bg-black p-0" id="services">
    <div class="container-fluid p-0 hidden">
        <div class="row g-0 m-0">
            <!-- First Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Baptisan">
                    <img src="../Public/assets/img/pelayanan/baptisan-air.webp" class="img-fluid h-100" alt="Before You Arrive">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Baptisan Air</div>
                </a>
            </div>
            <!-- Second Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Penyerahan">
                    <img src="../Public/assets/img/pelayanan/penyerahan-anak.webp" class="img-fluid h-100" alt="I'm New">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Penyerahan Anak</div>
                </a>
            </div>
            <!-- Third Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Perjamuan">
                    <img src="../Public/assets/img/pelayanan/perjamuan-kudus.webp" class="img-fluid h-100" alt="Alpha">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Perjamuan Kudus</div>
                </a>
            </div>
            <!-- Fourth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Sunday">
                    <img src="../Public/assets/img/pelayanan/sunday-service.webp" class="img-fluid h-100" alt="Before You Arrive">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Sunday Service</div>
                </a>
            </div>
            <!-- Fifth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Doa">
                    <img src="../Public/assets/img/pelayanan/doa-bersama.webp" class="img-fluid h-100" alt="I'm New">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Doa Bersama</div>
                </a>
            </div>
            <!-- Sixth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Ibadah">
                    <img src="../Public/assets/img/pelayanan/ibadah-rayon.webp" class="img-fluid h-100" alt="Alpha">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Ibadah Rayon</div>
                </a>
            </div>
            <!-- Seventh Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/MOC">
                    <img src="../Public/assets/img/pelayanan/moc.webp" class="img-fluid h-100" alt="Before You Arrive">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">MOC</div>
                </a>
            </div>
            <!-- Eight Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/TOG">
                    <img src="../Public/assets/img/pelayanan/aba.webp" class="img-fluid h-100" alt="I'm New">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">TOG</div>
                </a>
            </div>
            <!-- Ninth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Sekolah">
                    <img src="../Public/assets/img/pelayanan/sekolah-minggu.webp" class="img-fluid h-100" alt="Alpha">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Sekolah Minggu</div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- News-->
<section class="page-section bg-black" id="news">
    <div class="container hidden">
        <div class="text-center">
            <h2 class="section-heading text-uppercase text-white">Berita</h2>
        </div>
        <!-- Card Grid -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
            <?php foreach ($latestNews as $news): ?>
                <div class="col">
                    <div class="card h-100 border-0 bg-transparent">
                        <img src="/uploads/images/<?= esc($news['img']) ?>" class="card-img-top card-img-fixed rounded-4" alt="<?= esc($news['title']) ?>">
                        <div class="card-body text-white">
                            <h5 class="card-title">
                                <a href="/Berita/<?= esc($news['slug']) ?>" class="text-white text-decoration-none">
                                    <?= esc($news['title']) ?> <i class="fas fa-chevron-right"></i>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="/Berita" class="btn btn-outline-light btn-lg">Berita Lainnya</a>
        </div>
    </div>
</section>
<!-- Schedule-->
<section class="schead" id="schedule">
    <div class="container hidden">
        <div class="text-center">
            <h2 class="section-heading">KALENDER KEGIATAN GPdI BAHU</h2>
        </div>
        <div id='calendar'></div>
    </div>
</section>
<!-- Media-->
<section class="page-section bg-black" id="media">
    <div class="container hidden">
        <div class="text-center">
            <h2 class="section-heading mb-5 mt-0">MEDIA GPdI BAHU</h2>
        </div>
        <div class="swiper mySwiper pt-0">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="content-wrapper">
                        <div class="rotated-text-left">
                            <span>Live Ibadah</span>
                        </div>
                        <div class="iframe-and-text">
                            <iframe id="youtube-video" width="100%" height="315" src="<?= esc($embedCode) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            <p class="iframe-caption">Ibadah Raya GPdI Bahu Setiap Hari Minggu Pada Pukul 8 Pagi dan 6 Malam</p>
                        </div>
                        <div class="rotated-text-right">
                            <span>Live Ibadah</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Navigation Buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<!-- Include the modal -->
<?= $this->include('Admin/jadwal/modal-ibadah'); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<?= $this->endSection(); ?>