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

    <!-- Schedule-->
    <section class="schead" id="schedule">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading">KALENDER KEGIATAN GPdI BAHU</h2>
            </div>
            <div id='calendar'></div>
        </div>
    </section>

    <!-- Include the modal -->
    <?= $this->include('Admin/jadwal/modal-ibadah'); ?>

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

</html>