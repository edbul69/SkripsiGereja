<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<header class="masthead" id="perjamuan">
    <div class="container">
    </div>
</header>

<section class="page-section bg-black page-pelayanan" id="perjamuan-body">
    <div class="container py-5">
        <h2 class="fw-bold text-white text-center mb-3">Perjamuan Kudus</h2>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="divider-bar"></div>
        </div>
        <div class="text-center text-white my-3">
            <em>“Aku berkata kepadamu: Sesungguhnya barangsiapa mendengar perkataan-Ku dan percaya kepada Dia yang mengutus Aku, ia mempunyai hidup yang kekal dan tidak turut dihukum, sebab ia sudah pindah dari dalam maut ke dalam hidup”</em>
            <p class="mt-1"><strong>Yohanes 5:24</strong></p>
        </div>
    </div>
</section>

<section class="page-section bg-light" id="perjamuan-info">
    <div class="container hidden">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h3 class="fw-bold text-dark">Makna dan Tujuan Perjamuan Kudus</h3>
                <p class="text-dark">
                    Perjamuan Kudus adalah sakramen penting yang dilakukan oleh umat Kristen untuk mengenang pengorbanan Tuhan Yesus di kayu salib. Perjamuan ini melambangkan tubuh dan darah Yesus Kristus yang diserahkan untuk keselamatan manusia.
                </p>
                <p class="text-dark">
                    Setiap kali kita mengambil bagian dalam Perjamuan Kudus, kita juga mengingat janji Tuhan tentang keselamatan dan kehidupan kekal.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="<?= base_url('Public/assets/img/pelayanan/bread-wine.jpg'); ?>" class="img-fluid rounded shadow-lg" alt="Bread and Wine">
            </div>
        </div>
    </div>
</section>

<section class="page-section bg-black text-white" id="perjamuan-bible">
    <div class="container py-5 hidden">
        <h3 class="text-center text-white mb-5">Ayat-ayat Alkitab tentang Perjamuan Kudus</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="bible-verse">
                    <p><strong>Matius 26:26</strong></p>
                    <em>“Dan ketika mereka sedang makan, Yesus mengambil roti, mengucap berkat, memecah-mecahkannya lalu memberikannya kepada murid-murid-Nya dan berkata: 'Ambillah, makanlah, inilah tubuh-Ku.'”</em>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bible-verse">
                    <p><strong>Lukas 22:20</strong></p>
                    <em>“Demikian juga Ia mengambil cawan, sesudah makan, lalu berkata: 'Cawan ini adalah perjanjian baru oleh darah-Ku, yang ditumpahkan bagi kamu.'”</em>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bible-verse">
                    <p><strong>1 Korintus 11:26</strong></p>
                    <em>“Sebab setiap kali kamu makan roti ini dan minum cawan ini, kamu memberitakan kematian Tuhan sampai Ia datang.”</em>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section bg-light text-center" id="perjamuan-service">
    <div class="container py-5 hidden">
        <h4 class="text-danger mb-4">Informasi Perjamuan Kudus di Gereja Kami</h4>
        <p class="text-muted mb-4">
            Gereja kami selalu melaksanakan Perjamuan Kudus pada minggu pertama setiap bulan. Kami mengundang seluruh jemaat untuk ikut serta dalam sakramen ini.
        </p>
        <a href="#" class="btn btn-danger">Informasi Lebih Lanjut</a>
    </div>
</section>

<?= $this->endSection(); ?>