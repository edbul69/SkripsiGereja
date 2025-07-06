<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Masthead Section -->
<header class="masthead" id="aba">
</header>

<!-- Main Section -->
<section class="page-section bg-black page-pelayanan pb-0" id="aba-body">
    <div class="container">
        <h2 class="fw-bold text-white text-center mb-3">Ayo Baca Alkitab</h2>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="divider-bar"></div>
        </div>
    </div>
</section>

<!-- Bible Verse Section -->
<section class="page-section bg-black p-0 m-0" id="book">
    <div class="containe hidden">
        <div class="card">
            <div class="cover">
                <img src="/Public/assets/img/book/cover.png" alt="">
            </div>
            <div class="content">
                <h2>Yosua 1:8</h2>
                <p>"Janganlah engkau lupa memperkatakan kitab Taurat ini, tetapi renungkanlah itu siang dan malam, supaya engkau bertindak hati-hati sesuai dengan segala yang tertulis di dalamnya, sebab dengan demikian perjalananmu akan berhasil dan engkau akan beruntung."</p>
            </div>
        </div>
    </div>
</section>

<!-- New ABA Information Section -->
<section class="page-section bg-black text-white py-5" id="aba-info">
    <div class="container hidden">
        <h3 class="fw-bold text-center mb-4">Apa Itu ABA?</h3>
        <p class="lead text-center mb-4">
            ABA (Ayo Baca Alkitab) adalah kegiatan di GPdI Bahu yang bertujuan untuk meningkatkan kebiasaan membaca Alkitab setiap hari dan membagikan renungan yang didapat dari bacaan tersebut.
        </p>
        <p class="text-center">
            Setiap harinya, jemaat diajak untuk membaca satu pasal Alkitab dan membagikan renungan atau wawasan yang mereka peroleh. Kegiatan ini dilakukan sebagai upaya untuk memperdalam iman dan pemahaman firman Tuhan.
        </p>
    </div>
</section>

<!-- ABA Participation Section -->
<section class="page-section bg-black text-white py-5" id="aba-participation">
    <div class="container hidden">
        <div class="row align-items-center">
            <!-- Left side (Image) -->
            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                <!-- <img src="../Public/assets/img/pelayanan/aba/ss-aba.jpeg" alt="Group Activity Screenshot" class="img-fluid rounded shadow-lg"> -->
                <img src="/Public/assets/img/pelayanan/aba/ss-aba.jpeg" alt="Group Activity Screenshot" class="img-fluid rounded shadow-lg">
            </div>

            <!-- Right side (Text) -->
            <div class="col-lg-6">
                <h4 class="fw-bold mb-4">Aktivitas ABA</h4>
                <p class="mb-3">
                    Kami membaca satu pasal Alkitab setiap hari dan berbagi renungan atau pemahaman yang kami peroleh dari bacaan tersebut di dalam grup ini. Setiap anggota diberi kesempatan untuk membagikan pemikiran mereka, seperti absensi harian, tetapi ini adalah bagian dari berbagi firman Tuhan dengan sesama.
                </p>
                <p>
                    Ini adalah kesempatan yang luar biasa untuk mendalami firman Tuhan, memperkuat iman, dan saling mendorong dalam pertumbuhan rohani. Kami mengajak semua jemaat untuk aktif berbagi setiap hari dan saling memberi dorongan melalui Alkitab.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ABA Join Section -->
<section class="page-section bg-black text-white py-5" id="aba-join">
    <div class="container hidden">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h4 class="fw-bold mb-4">Bergabung dengan Ayo Baca Alkitab</h4>
                <p class="lead mb-5">
                    Ingin bergabung dengan kami dalam kegiatan <strong>Ayo Baca Alkitab</strong>? Klik tombol di bawah ini untuk menghubungi admin melalui WhatsApp dan dapatkan undangan ke grup diskusi kami!
                </p>
                <a href="https://wa.me/1234567890" target="_blank" class="btn btn-success btn-lg px-5">
                    Hubungi Admin di WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>