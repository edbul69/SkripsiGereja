<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Masthead Section -->
<header class="masthead" id="ibadah">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center text-white text-center">
    </div>
</header>

<!-- Introduction Section -->
<section class="page-section bg-black page-pelayanan" id="doa-hd">
    <div class="container">
        <h2 class="fw-bold text-white text-center mb-4">Ibadah Rayon</h2>
        <div class="divider-bar mx-auto mb-4"></div>
        <div class="text-center text-white my-4">
            <blockquote class="fs-5 fst-italic">
                "Sebab di mana dua atau tiga orang berkumpul dalam nama-Ku, di situ Aku ada di tengah-tengah mereka." </blockquote>
            <p class="mt-2"><strong>Matius 18:20</strong></p>
        </div>
    </div>
</section>

<section class="page-section bg-black text-center my-0" id="rayon">
    <h2 class="fs-1 fw-bold text-white mb-0">5 RAYON</h2>
    <p class="fs-5 text-white">GPDI BAHU</p>
    <div class="container d-flex flex-column">
        <!-- Rayon 1 -->
        <div class="col-12 d-flex flex-wrap mb-3 p-3 rayon-item hidden" id="rayon1">
            <!-- Image/Placeholder -->
            <div class="col-md-8 col-12 d-flex align-items-center justify-content-center bg-secondary rounded-5 rayon-placeholder p-0">
                <img src="https://placehold.co/600x300" alt="Image Placeholder" class="img-fluid">
            </div>
            <!-- Text -->
            <div class="col-md-4 col-12 d-flex align-items-center justify-content-center text-container">
                <p class="text-white fw-bold animated-text animated-right">Rayon Hermon</p>
            </div>
        </div>

        <!-- Rayon 2 - Inverse Layout -->
        <div class="col-12 d-flex flex-wrap mb-3 p-3 rayon-item hidden" id="rayon2">
            <!-- Text - Order 2 on larger screens, Order 1 on small -->
            <div class="col-md-4 col-12 d-flex align-items-center justify-content-center order-md-1 order-2 text-container">
                <p class="text-white fw-bold animated-text animated-left">Rayon Horeb</p>
            </div>
            <!-- Image/Placeholder - Order 1 on larger screens, Order 2 on small -->
            <div class="col-md-8 col-12 d-flex align-items-center justify-content-center bg-secondary rounded-5 rayon-placeholder order-md-2 order-1 p-0">
                <img src="https://placehold.co/600x300" alt="Image Placeholder" class="img-fluid">
            </div>
        </div>

        <!-- Rayon 3 - Same as Rayon 1 -->
        <div class="col-12 d-flex flex-wrap mb-3 p-3 rayon-item hidden" id="rayon3">
            <!-- Image/Placeholder -->
            <div class="col-md-8 col-12 d-flex align-items-center justify-content-center bg-secondary rounded-5 rayon-placeholder p-0">
                <img src="https://placehold.co/600x300" alt="Image Placeholder" class="img-fluid">
            </div>
            <!-- Text -->
            <div class="col-md-4 col-12 d-flex align-items-center justify-content-center text-container">
                <p class="text-white fw-bold animated-text animated-right">Rayon Karmel</p>
            </div>
        </div>

        <!-- Rayon 4 - Same as Rayon 2 (Inverse Layout) -->
        <div class="col-12 d-flex flex-wrap mb-3 p-3 rayon-item hidden" id="rayon4">
            <!-- Text - Order 2 on larger screens, Order 1 on small -->
            <div class="col-md-4 col-12 d-flex align-items-center justify-content-center order-md-1 order-2 text-container">
                <p class="text-white fw-bold animated-text animated-left">Rayon Sion</p>
            </div>
            <!-- Image/Placeholder - Order 1 on larger screens, Order 2 on small -->
            <div class="col-md-8 col-12 d-flex align-items-center justify-content-center bg-secondary rounded-5 rayon-placeholder order-md-2 order-1 p-0">
                <img src="https://placehold.co/600x300" alt="Image Placeholder" class="img-fluid">
            </div>
        </div>

        <!-- Rayon 5 -->
        <div class="col-12 d-flex flex-wrap mb-3 p-3 rayon-item hidden" id="rayon5">
            <!-- Left Text (Rotated for larger screens, normal for smaller screens) -->
            <div class="col-md-2 col-12 d-flex align-items-center justify-content-center text-container">
                <p class="text-white fw-bold animated-text animated-right text-left-rotate">Rayon</p>
            </div>
            <!-- Image/Placeholder in the Center -->
            <div class="col-md-8 col-12 d-flex align-items-center justify-content-center bg-secondary rounded-5 rayon-placeholder p-0">
                <img src="https://placehold.co/600x300" alt="Image Placeholder" class="img-fluid">
            </div>
            <!-- Right Text (Rotated for larger screens, normal for smaller screens) -->
            <div class="col-md-2 col-12 d-flex align-items-center justify-content-center text-container">
                <p class="text-white fw-bold animated-text animated-left text-right-rotate">Moria</p>
            </div>
        </div>
    </div>

    <!-- New Paragraph for Description -->
    <div class="container-fluid d-flex justify-content-center align-items-center flex-column text-white">
        <div class="col-md-8 col-12 m-0 px-0 hidden" id="rayon-desc">
            <p class="fs-5 description-text text-center">
                RAYON MEMBAGI JEMAAT MENJADI BEBERAPA KELOMPOK GUNA UNTUK MEMETAKAN LOKASI PERIBADATAN JEMAAT DARI RUMAH KE RUMAH SETIAP MINGGUNYA BERDASARKAN TEMPAT TINGGALNYA
            </p>
        </div>
        <div class="divider-bar mb-4 hidden" style="width: 50%;"></div>
        <div class="col-md-6 col-12 text-white mt-5 p-0 d-flex flex-column justify-content-center align-items-center hidden" id="ibadah-footer">
            <p class="fw-light fs-4 fst-italic opacity-50 text-center">
                Apakah Kita Bisa Bergabung Untuk Mengikuti Ibadah Rayon?
            </p>
            <p class="fw-bold text-center">
                TENTU SAJA!
            </p>
            <p class="fs-4 text-center">
                Siapa Pun Bisa Bergabung Ke Dalam Keluarga GPDI Bahu Dan Menjadi Bagian Dalam Salah Satu Rayon.
            </p>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>