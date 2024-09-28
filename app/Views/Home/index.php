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
            <h2 class="section-heading text-uppercase outline-text">GPDI BAHU</h2>
        </div>
        <div class="row align-items-center hidden">
            <div class="col-md-6 image-content">
                <img src="Public/assets/img/main-banner.jpg" alt="Group of people" clas>
            </div>
            <div class="col-md-6 text-content">
                <h1>KELUARGA<br><span>BESAR</span><br>GPDI</h1>
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
                <div class="animated-text" id="text-8">ABA.</div>
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
                    <img src="Public/assets/img/pelayanan/baptisan-air.jpg" class="img-fluid h-100" alt="Before You Arrive">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Baptisan Air</div>
                </a>
            </div>
            <!-- Second Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Penyerahan">
                    <img src="Public/assets/img/pelayanan/penyerahan-anak.jpg" class="img-fluid h-100" alt="I'm New">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Penyerahan Anak</div>
                </a>
            </div>
            <!-- Third Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Perjamuan">
                    <img src="Public/assets/img/pelayanan/perjamuan-kudus.JPG" class="img-fluid h-100" alt="Alpha">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Perjamuan Kudus</div>
                </a>
            </div>
            <!-- Fourth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Sunday">
                    <img src="Public/assets/img/pelayanan/sunday-service.JPG" class="img-fluid h-100" alt="Before You Arrive">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Sunday Service</div>
                </a>
            </div>
            <!-- Fifth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Doa">
                    <img src="Public/assets/img/pelayanan/doa-bersama.png" class="img-fluid h-100" alt="I'm New">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Doa Bersama</div>
                </a>
            </div>
            <!-- Sixth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Ibadah">
                    <img src="Public/assets/img/pelayanan/ibadah-rayon.JPG" class="img-fluid h-100" alt="Alpha">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">Ibadah Rayon</div>
                </a>
            </div>
            <!-- Seventh Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/MOC">
                    <img src="Public/assets/img/pelayanan/moc.JPG" class="img-fluid h-100" alt="Before You Arrive">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">MOC</div>
                </a>
            </div>
            <!-- Eight Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/ABA">
                    <img src="Public/assets/img/pelayanan/aba.jpg" class="img-fluid h-100" alt="I'm New">
                    <div class="white-overlay"></div> <!-- White transparent overlay -->
                    <div class="overlay-text">ABA</div>
                </a>
            </div>
            <!-- Ninth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <a href="/Sekolah">
                    <img src="Public/assets/img/pelayanan/sekolah-minggu.JPG" class="img-fluid h-100" alt="Alpha">
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
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="Public/assets/img/news/news1.JPG" class="card-img-top card-img-fixed rounded-4" alt="Piedmont Students">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Putri GPDI Sulawesi Utara, Aurelia David<i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="Public/assets/img/news/news2.JPG" class="card-img-top card-img-fixed rounded-4" alt="Fall Small Group Signups">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Mayor TNI Membuka Ibadah Persemian <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="Public/assets/img/news/news3.JPG" class="card-img-top card-img-fixed rounded-4" alt="College & Young Adult Kickoff">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Majelis Daerah GPDI Menghadiri Acara Peresmian <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="Public/assets/img/news/news4.JPG" class="card-img-top card-img-fixed rounded-4" alt="Step One">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Penandatangan Peresmian Gedung Baru GPDI Bahu <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="Public/assets/img/news/news5.JPG" class="card-img-top card-img-fixed rounded-4" alt="Serve Day">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Ibadah Peresmian Gedung Baru GPDI Bahu <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="Public/assets/img/news/news6.JPG" class="card-img-top card-img-fixed rounded-4" alt="New Series: Binge the Bible">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Moment Kebersamaan Jemaat GPDI Bahu <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/Berita" class="btn btn-outline-light btn-lg">Berita Lainnya</a>
        </div>
</section>
<!-- Schedule-->
<section class="schead" id="schedule">
    <div class="container hidden">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Kalender Kegiatan GPDI Bahu</h2>
        </div>
        <div id='calendar'></div>
    </div>
</section>
<!-- Media-->
<section class="page-section bg-black" id="media">
    <div class="container hidden">
        <div class="text-center">
            <h2 class="section-heading text-uppercase mb-5 mt-0">Media GPDI BAHU</h2>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="content-wrapper">
                        <div class="rotated-text-left">
                            <span>Informasi COVID-19</span>
                        </div>
                        <div class="iframe-and-text">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/UzNtC2SDHiQ?si=GV147dAGp9k6NV_c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <p class="iframe-caption">Dalam upaya menangani wabah COVID-19, GPDI pun menjalankan prosedur kesehatan yang secara langsung di berikan oleh salah satu pelayan, yaitu Dr. Suryadi Tatura</p>
                        </div>
                        <div class="rotated-text-right">
                            <span>Informasi COVID-19</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content-wrapper">
                        <div class="rotated-text-left">
                            <span>Peresmian Gedung Baru</span>
                        </div>
                        <div class="iframe-and-text">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/5lZderOtZmI?si=p5EKr_snl6dgINRT" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <p class="iframe-caption">Gedung baru GPDI Bahu yang telah mengalami renovasi akhirnya telah selesai dibangun dan di adakannya ibadah peresmian serta pentahbisan yang dihadiri langsung oleh walikota Manado dan ketua majelis daerah GPDI Sulawesi Utara</p>
                        </div>
                        <div class="rotated-text-right">
                            <span>Peresmian Gedung Baru</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content-wrapper">
                        <div class="rotated-text-left">
                            <span>Ibadah Rayon Gabungan</span>
                        </div>
                        <div class="iframe-and-text">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/ByJCiCspAHY?si=Wd1qjJeROqK84QGW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <p class="iframe-caption">Ibadah Rayon gabungan yang menjadi salah satu perayaan ibadah GPDI Bahu pada tanggal 3 Juni tahun 2020</p>
                        </div>
                        <div class="rotated-text-right">
                            <span>Ibadah Rayon Gabungan</span>
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

<!-- Modal for Event Details -->
<div id="eventModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="eventTitle"></h2>
        <p id="eventTime"></p>
        <p id="eventDescription"></p>
    </div>
</div>

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