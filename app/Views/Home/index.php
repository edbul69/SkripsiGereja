<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Gereja Pantekosta di Indonesia</div>
        <div class="masthead-heading text-uppercase">BAHU</div>
        <!-- <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a> -->
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
                <img src="Public/assets/img/header/header-bg1.jpg" alt="Group of people">
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
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="Before You Arrive">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">Baptisan Air</div>
            </div>
            <!-- Second Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="I'm New">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">Penyerahan Anak</div>
            </div>
            <!-- Third Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="Alpha">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">Perjamuan Kudus</div>
            </div>
            <!-- Fourth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="Before You Arrive">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">Sunday Service</div>
            </div>
            <!-- Fifth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="I'm New">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">Doa Bersama</div>
            </div>
            <!-- Sixth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="Alpha">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">Ibadah Rayon</div>
            </div>
            <!-- Seventh Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="Before You Arrive">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">MOC</div>
            </div>
            <!-- Eight Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="I'm New">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">ABA</div>
            </div>
            <!-- Ninth Image Column -->
            <div class="col-lg-4 col-sm-6 p-0 position-relative">
                <img src="Public/assets/img/pelayanan/pelayanan.jpeg" class="img-fluid w-100" alt="Alpha">
                <div class="white-overlay"></div> <!-- White transparent overlay -->
                <div class="overlay-text">Sekolah Minggu</div>
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
                    <img src="https://via.placeholder.com/300x150" class="card-img-top card-img-fixed rounded-4" alt="Piedmont Students">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Piedmont Students <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top card-img-fixed rounded-4" alt="Fall Small Group Signups">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Fall Small Group Signups <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top card-img-fixed rounded-4" alt="College & Young Adult Kickoff">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">College & Young Adult Kickoff <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top card-img-fixed rounded-4" alt="Step One">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Step One <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top card-img-fixed rounded-4" alt="Serve Day">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">Serve Day <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0 bg-transparent">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top card-img-fixed rounded-4" alt="New Series: Binge the Bible">
                    <div class="card-body text-white">
                        <h5 class="card-title">
                            <a href="YOUR_URL_HERE" class="text-white text-decoration-none">New Series: Binge the Bible <i class="fas fa-chevron-right"></i></a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="#all-news" class="btn btn-outline-light btn-lg">Berita Lainnya</a>
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
                            <span>Your Left Text</span>
                        </div>
                        <div class="iframe-and-text">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/CYwql2EUQlk?si=rWOsu98UDbcruDGI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <p class="iframe-caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptate autem maxime unde fuga mollitia id natus laudantium explicabo repellendus nulla error porro sit, saepe perspiciatis ex cumque voluptatibus ducimus!</p>
                        </div>
                        <div class="rotated-text-right">
                            <span>Your Right Text</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content-wrapper">
                        <div class="rotated-text-left">
                            <span>Your Left Text</span>
                        </div>
                        <div class="iframe-and-text">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/CYwql2EUQlk?si=rWOsu98UDbcruDGI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <p class="iframe-caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptate autem maxime unde fuga mollitia id natus laudantium explicabo repellendus nulla error porro sit, saepe perspiciatis ex cumque voluptatibus ducimus!</p>
                        </div>
                        <div class="rotated-text-right">
                            <span>Your Right Text</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content-wrapper">
                        <div class="rotated-text-left">
                            <span>Your Left Text</span>
                        </div>
                        <div class="iframe-and-text">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/CYwql2EUQlk?si=rWOsu98UDbcruDGI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <p class="iframe-caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque voluptate autem maxime unde fuga mollitia id natus laudantium explicabo repellendus nulla error porro sit, saepe perspiciatis ex cumque voluptatibus ducimus!</p>
                        </div>
                        <div class="rotated-text-right">
                            <span>Your Right Text</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>

            <!-- Add Navigation Buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
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
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container hidden">
        <div class="row">
            <!-- Content Section (Right) -->
            <div class="col-md-4 content" style="color: #fff;">
                <div style="margin-bottom: 2em;">
                    <h2 style="font-size: 4em; font-weight: bold; line-height: 1;">GPDI<br>BAHU</h2>
                </div>
                <div style="margin-bottom: 2em;">
                    <h3 style="font-size: 1.2em; text-transform: uppercase; letter-spacing: 0.1em; font-weight: bold;">MANADO, SULAWESI UTARA</h3>
                    <p style="margin: 0;">11400 Rupp Drive</p>
                    <p>Burnsville, MN 55337</p>
                    <p>952.255.8800</p>
                </div>
            </div>

            <!-- Map and Cards Section (Left) -->
            <div class="col-md-8">
                <!-- Map Embed -->
                <div class="map-container mb-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d513.1769336409643!2d124.82452232533353!3d1.460395973020168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328774f154e294d5%3A0xb4b7a5f06f7d4815!2sGPdI%20Bahu!5e0!3m2!1sid!2skh!4v1726314833638!5m2!1sid!2skh"
                        width="100%" height="300" style="border: 5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- Cards Section -->
                <div class="wrapper mb-3">
                    <div class="card card1 ms-5" style="padding: 1em; background-color: #f1f1f1; margin-bottom: 1em;">
                        <!-- Card 1 content -->
                        <p>Card 1 Content Here</p>
                    </div>
                    <div class="card card2 me-5" style="padding: 1em; background-color: #f1f1f1;">
                        <!-- Card 2 content -->
                        <p>Card 2 Content Here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Modals-->



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