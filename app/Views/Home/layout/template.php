<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="GPdI Bahu, gereja Pantekosta di Sulawesi Utara yang bertempat di kelurahan Bahu Lingkungan 2 Kota Manado, keluarga besar GPdI Indonesia" />
    <meta name="keywords" content="GPdI Bahu, Gereja, Sulawesi Utara, GPdI, Pantekosta, Bahu, Manado">
    <meta name="robots" content="index, follow">
    <meta name="author" content="GPdI Bahu Team" />
    <meta name="publisher" content="GPdI Bahu">
    <link rel="canonical" href="https://GPdI-bahu.com/">
    <link rel="icon" type="image/x-icon" href="<?= base_url('Public/assets/icon.png'); ?>">
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>">
    <title><?= $title; ?></title>

    <!-- Open Graph -->
    <meta property="og:title" content="<?= $title; ?>">
    <meta property="og:description" content="GPdI Bahu, gereja Pantekosta di Sulawesi Utara yang bertempat di kelurahan Bahu Lingkungan 2 Kota Manado, keluarga besar GPdI Indonesia">
    <meta property="og:image" content="<?= base_url('Public/assets/icon.png'); ?>">
    <meta property="og:url" content="<?= current_url(); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="GPdI Bahu">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title; ?>">
    <meta name="twitter:description" content="GPdI Bahu, gereja Pantekosta di Sulawesi Utara yang bertempat di kelurahan Bahu Lingkungan 2 Kota Manado, keluarga besar GPdI Indonesia">
    <meta name="twitter:image" content="<?= base_url('Public/assets/icon.png'); ?>">
    <meta name="twitter:site" content="@GPdI.bahu">

    <!-- Structured Data -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "GPdI Bahu",
            "url": "https://GPdI-bahu.com",
            "logo": "<?= base_url('Public/assets/icon.png'); ?>",
            "sameAs": [
                "https://www.facebook.com/GPdIbahu",
                "https://www.instagram.com/GPdIbahu"
            ],
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Makalayang, Manado",
                "addressRegion": "Sulawesi Utara",
                "postalCode": "95115",
                "streetAddress": "Kel. Bahu II, Jl. P. Bunaken"
            }
        }
    </script>

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('Public/css/styles.css'); ?>" rel="stylesheet" />
    <!-- FullCalendar theme CSS -->
    <link href="<?= base_url('Public/css/fullcalendar-style.css'); ?>" rel="stylesheet" />
    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Progressive Web App -->
    <link rel="manifest" href="/manifest.json">
</head>


<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/Home'); ?>"><img src="<?= base_url('Public/assets/img/navbar-logo.webp'); ?>" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/#'); ?>">BERANDA</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/#services'); ?>">PELAYANAN</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/#news'); ?>">BERITA</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/#schedule'); ?>">JADWAL</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/#media'); ?>">MEDIA</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container hidden">
            <div class="row">
                <!-- Content Section (Right) -->
                <div class="col-md-4 content my-3">
                    <div>
                        <h2>GPdI<br>BAHU</h2>
                    </div>
                    <div>
                        <h3>MANADO, SULAWESI UTARA</h3>
                        <p>Kec. Malalayang</p>
                        <p>Kel. Bahu II</p>
                        <p>Jl. P.Bunaken, 95115</p>
                        <!-- <a href="tel:+6200000000000">Telp. +62 000-0000-0000</a> -->
                        <br><br>
                        <!-- Button for getting directions -->
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Jl.+P.Bunaken,+95115,+Manado,+Sulawesi+Utara,+Indonesia" target="_blank" class="map-button">
                            Get Directions
                        </a>
                    </div>
                </div>

                <!-- Map and Cards Section (Left) -->
                <div class="col-md-8 my-3">
                    <!-- Map Embed -->
                    <div class="map-container mb-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d513.1769336409643!2d124.82452232533353!3d1.460395973020168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328774f154e294d5%3A0xb4b7a5f06f7d4815!2sGPdI%20Bahu!5e0!3m2!1sid!2skh!4v1726314833638!5m2!1sid!2skh"
                            width="" height="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <!-- Cards Section -->
                    <div class="wrapper mb-3">
                        <div class="wrapper mb-3">
                            <div class="card card1">
                                <!-- Card 1 content -->
                                <div class="card-content">
                                    <img src="<?= base_url('Public/assets/img/icon/bahu-icon-tp.png'); ?>" alt="">
                                    <!-- The link is only visible and clickable on hover -->
                                    <a href="https://www.instagram.com/GPdIbahu?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="hover-text" target="_blank">@gpdi.bahu</a>
                                </div>
                            </div>
                            <div class="card card2">
                                <!-- Card 2 content -->
                                <div class="card-content">
                                    <img src="<?= base_url('Public/assets/img/icon/moc-icon-tp.png'); ?>" alt="">
                                    <!-- The link is only visible and clickable on hover -->
                                    <a href="https://www.instagram.com/moc.GPdIbahu?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="hover-text" target="_blank">@moc.gpdibahu</a>
                                </div>
                            </div>
                            <div class="card card3">
                                <!-- Card 3 content -->
                                <div class="card-content">
                                    <img src="<?= base_url('Public/assets/img/icon/tog-icon-tp.png'); ?>" alt="">
                                    <!-- The link is only visible and clickable on hover -->
                                    <a href="https://www.instagram.com/teensgpdibahu?utm_source=ig_web_button_share_sheet&igsh=bDByYzJkcnVxd2Vo" class="hover-text" target="_blank">@teensgpdibahu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4 bg-dark text-white" id="footer">
        <div class="container">
            <div class="row align-items-center text-white">
                <div class="col-lg-4 text-lg-start"></div>
                <div class="col-lg-4 my-3 my-lg-0">
                    Copyright &copy; GPdI Bahu 2025
                </div>
                <div class="col-lg-4 text-lg-end">
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url('Public/js/scripts.js'); ?>"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Progressive Web App -->
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker
                .register('/service-worker.js')
                .then(() => console.log('Service Worker Registered'))
                .catch((error) => console.error('Service Worker Registration Failed:', error));
        }
    </script>
</body>
<?= $this->renderSection('scripts'); ?>

</html>