<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Masthead Section -->
<header class="masthead" id="baptisan">
</header>

<!-- Baptism Body Section -->
<section class="page-section bg-black page-pelayanan" id="baptisan-body">
    <div class="container">
        <h2 class="fw-bold text-white text-center mb-3">Baptis | Hidup Baru</h2>
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="divider-bar"></div>
        </div>
        <div class="text-center text-white my-3">
            <em class="fs-5">“Aku berkata kepadamu: Sesungguhnya barangsiapa mendengar perkataan-Ku dan percaya kepada Dia yang mengutus Aku, ia mempunyai hidup yang kekal dan tidak turut dihukum, sebab ia sudah pindah dari dalam maut ke dalam hidup”</em>
            <p class="mt-2"><strong>Yohanes 5:24</strong></p>
        </div>
    </div>
</section>

<!-- Baptism History Accordion Section -->
<section class="page-section bg-black" id="baptism-history">
    <div class="container hidden">
        <div class="accordion" id="baptismAccordion">
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Apa itu baptis?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#baptismAccordion">
                    <div class="accordion-body">
                        Baptis adalah salah satu simbol wujud keimanan kita kepada Kristus dengan memulai hidup baru setelah segala dosanya terhapuskan oleh kasih Kristus kepada kita.
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Yesus Sendiri dibaptis
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#baptismAccordion">
                    <div class="accordion-body">
                        Yesus dibaptis oleh Yohanes sebagai contoh untuk para pengikutnya. Itu merupakan moment yang penting dalam pelayan-Nya.
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Perintah Yesus kepada kita untuk dibaptis
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#baptismAccordion">
                    <div class="accordion-body">
                        Dalam Kitab Agung, Yesus memerintahkan murid-murid-Nya untuk membaptis dalam nama Bapa, Anak, dan Roh Kudus.
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Bagaimana kita tau kapan kita siap untuk dibaptis?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#baptismAccordion">
                    <div class="accordion-body">
                        Jika kamu siap untuk menerima Yesus sebagai Tuhan dan Juru Selamat, serta menyatakan keimanan kalian, maka kamu sudah siap untuk dibaptis.
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Hal yang perlu diingat
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#baptismAccordion">
                    <div class="accordion-body">
                        Ingatlah bahwa baptis bukan hanyalah sebagai simbolisasi, akan tetapi itu telah menjadi sebuah langkah dalam pengiringan kita kepada Yesus sang Juru Selamat serta komitmen kita kepada-Nya.
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button bg-dark text-white collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Selanjutnya apa?
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#baptismAccordion">
                    <div class="accordion-body">
                        Setelah dibaptis, kita tetap melanjutkan perjalanan iman kepada Yesus serta memperdalam pemahaman terhadap Kitab Suci, hubungan dengan Tuhan, serta melayani didalam Roh dan kebenaran.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="page-section bg-black" id="baptism-contact">
    <div class="row g-0">
        <div class="col-md-6 bg-dark text-light p-5">
            <h3>Dasar Pelaksanaan Baptisan Air</h3>
            <ul class="styled-list text-white">
                <li>Kehendak Allah <a href="#" data-bs-toggle="modal" data-bs-target="#verseModal1">(Mat. 3:13-15)</a></li>
                <li>Perintah Tuhan Yesus Kristus <a href="#" data-bs-toggle="modal" data-bs-target="#verseModal2">(Mat. 28:19-20, Mark. 16:15-16)</a></li>
                <li>Pengajaran rasul-rasul <a href="#" data-bs-toggle="modal" data-bs-target="#verseModal3">(Kisah 2:38)</a></li>
            </ul>
        </div>
        <div class="col-md-6 p-5 bg-white text-dark">
            <h3>Arti/Makna Baptisan Air</h3>
            <ul class="styled-list">
                <li>Sebagai simbol persamaan dalam kematian, penguburan dan kebangkitan Yesus Kristus. <a href="#" data-bs-toggle="modal" data-bs-target="#verseModal4">(Rm 6:4, Kol. 2:12)</a></li>
                <li>Sebagai tanda pertobatan dan pengakuan dosa. <a href="#" data-bs-toggle="modal" data-bs-target="#verseModal5">(Mat. 3:6-7, 11; Kisah 2:38)</a></li>
                <li>Sebagai bukti pengakuan iman bahwa Yesus Kristus adalah Anak Allah. <a href="#" data-bs-toggle="modal" data-bs-target="#verseModal6">(Kisah 8:37)</a></li>
                <li>Sebagai pernyataan masuk dalam persekutuan anggota tubuh Kristus. <a href="#" data-bs-toggle="modal" data-bs-target="#verseModal7">(Kisah 2:41-42, 1 Kor. 12:13)</a></li>
                <li>Sebagai bagian dari rencana keselamatan Allah bagi manusia. <a href="#" data-bs-toggle="modal" data-bs-target="#verseModal8">(Mat. 3:1-6, Mark. 1:1-5)</a></li>
            </ul>
        </div>
    </div>

    <!-- Modals for Bible Verses -->
    <!-- Modal 1 -->
    <div class="modal fade" id="verseModal1" tabindex="-1" aria-labelledby="verseModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verseModal1Label">Matius 3:13-15</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Maka datanglah Yesus dari Galilea ke Yordan kepada Yohanes untuk dibaptis olehnya. Tetapi Yohanes mencegah Dia, katanya: "Akulah yang perlu dibaptis oleh-Mu, dan Engkau yang datang kepadaku?" Lalu Yesus menjawab, kata-Nya kepadanya: "Biarlah hal itu terjadi, karena demikianlah sepatutnya kita menggenapkan seluruh kehendak Allah."
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade" id="verseModal2" tabindex="-1" aria-labelledby="verseModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verseModal2Label">Matius 28:19-20, Markus 16:15-16</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Matius 28:19-20:</strong> Karena itu pergilah, jadikanlah semua bangsa murid-Ku dan baptislah mereka dalam nama Bapa dan Anak dan Roh Kudus, dan ajarlah mereka melakukan segala sesuatu yang telah Kuperintahkan kepadamu. Dan ketahuilah, Aku menyertai kamu senantiasa sampai kepada akhir zaman.<br>
                    <strong>Markus 16:15-16:</strong> Lalu Ia berkata kepada mereka: "Pergilah ke seluruh dunia, beritakanlah Injil kepada segala makhluk. Siapa yang percaya dan dibaptis akan diselamatkan, tetapi siapa yang tidak percaya akan dihukum."
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 3 -->
    <div class="modal fade" id="verseModal3" tabindex="-1" aria-labelledby="verseModal3Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verseModal3Label">Kisah 2:38</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Jawab Petrus kepada mereka: "Bertobatlah dan hendaklah kamu masing-masing memberi dirimu dibaptis dalam nama Yesus Kristus untuk pengampunan dosamu, maka kamu akan menerima karunia Roh Kudus."
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 4 -->
    <div class="modal fade" id="verseModal4" tabindex="-1" aria-labelledby="verseModal4Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verseModal4Label">Roma 6:4, Kolose 2:12</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Roma 6:4:</strong> Dengan demikian kita telah dikuburkan bersama-sama dengan Dia oleh baptisan dalam kematian, supaya, sama seperti Kristus telah dibangkitkan dari antara orang mati oleh kemuliaan Bapa, demikian juga kita akan hidup dalam hidup yang baru.<br>
                    <strong>Kolose 2:12:</strong> Karena dengan Dia kamu dikuburkan dalam baptisan, dan di dalam Dia kamu turut dibangkitkan juga oleh kepercayaanmu kepada kerja kuasa Allah, yang telah membangkitkan Dia dari orang mati.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 5 -->
    <div class="modal fade" id="verseModal5" tabindex="-1" aria-labelledby="verseModal5Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verseModal5Label">Matius 3:6-7, 11; Kisah 2:38</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Matius 3:6-7:</strong> Lalu sambil mengaku dosanya mereka dibaptis oleh Yohanes di sungai Yordan. Tetapi waktu ia melihat banyak orang Farisi dan orang Saduki datang untuk dibaptis, berkatalah ia kepada mereka: "Hai kamu keturunan ular beludak, siapakah yang mengatakan kepada kamu, bahwa kamu dapat melarikan diri dari murka yang akan datang?"<br>
                    <strong>Matius 3:11:</strong> Aku membaptis kamu dengan air sebagai tanda pertobatan, tetapi Ia yang datang kemudian dari padaku lebih berkuasa dari padaku dan aku tidak layak melepaskan kasut-Nya. Ia akan membaptiskan kamu dengan Roh Kudus dan dengan api.<br>
                    <strong>Kisah 2:38:</strong> Jawab Petrus kepada mereka: "Bertobatlah dan hendaklah kamu masing-masing memberi dirimu dibaptis dalam nama Yesus Kristus untuk pengampunan dosamu, maka kamu akan menerima karunia Roh Kudus."
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 6 -->
    <div class="modal fade" id="verseModal6" tabindex="-1" aria-labelledby="verseModal6Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verseModal6Label">Kisah 8:37</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Kata Filipus: "Jika tuan percaya dengan segenap hati, boleh." Sahutnya: "Aku percaya, bahwa Yesus Kristus adalah Anak Allah."
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 7 -->
    <div class="modal fade" id="verseModal7" tabindex="-1" aria-labelledby="verseModal7Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verseModal7Label">Kisah 2:41-42, 1 Korintus 12:13</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Kisah 2:41-42:</strong> Orang-orang yang menerima perkataannya itu memberi diri mereka dibaptis dan pada hari itu jumlah mereka bertambah kira-kira tiga ribu jiwa. Mereka bertekun dalam pengajaran rasul-rasul dan dalam persekutuan. Dan mereka selalu berkumpul untuk memecahkan roti dan berdoa.<br>
                    <strong>1 Korintus 12:13:</strong> Karena dalam satu Roh kita semua, baik orang Yahudi, maupun orang Yunani, baik budak, maupun orang merdeka, telah dibaptis menjadi satu tubuh dan kita semua diberi minum dari satu Roh.
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 8 -->
    <div class="modal fade" id="verseModal8" tabindex="-1" aria-labelledby="verseModal8Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verseModal8Label">Matius 3:1-6, Markus 1:1-5</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Matius 3:1-6:</strong> Pada waktu itu tampillah Yohanes Pembaptis di padang gurun Yudea dan memberitakan: "Bertobatlah, sebab Kerajaan Sorga sudah dekat!" Sesungguhnya dialah yang dimaksudkan nabi Yesaya ketika ia berkata: "Ada suara orang yang berseru-seru di padang gurun: Persiapkanlah jalan untuk Tuhan, luruskanlah jalan bagi-Nya." Yohanes memakai jubah bulu unta dan ikat pinggang kulit, dan makanannya belalang dan madu hutan. Maka datanglah kepadanya penduduk dari Yerusalem, dari seluruh Yudea dan dari seluruh daerah sekitar Yordan. Lalu sambil mengaku dosanya mereka dibaptis oleh Yohanes di sungai Yordan.<br>
                    <strong>Markus 1:1-5:</strong> Inilah permulaan Injil tentang Yesus Kristus, Anak Allah. Seperti ada tertulis dalam kitab nabi Yesaya: "Lihatlah, Aku menyuruh utusan-Ku mendahului Engkau, ia akan mempersiapkan jalan bagi-Mu; ada suara orang yang berseru-seru di padang gurun: Persiapkanlah jalan untuk Tuhan, luruskanlah jalan bagi-Nya," demikianlah Yohanes Pembaptis tampil di padang gurun dan menyerukan: "Bertobatlah dan berilah dirimu dibaptis dan Allah akan mengampuni dosamu." Lalu datanglah kepada Yohanes orang-orang dari seluruh daerah Yudea dan semua penduduk Yerusalem, dan sambil mengaku dosanya mereka dibaptis oleh Yohanes di sungai Yordan.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Baptism Info Section -->
<section class="page-section bg-black" id="baptism-info">
    <div class="container text-center text-white hidden">
        <h3 class="mt-5">Ingin Dibaptis?</h3>
        <p class="mb-5">Jika anda merasa terpanggil untuk dibaptis ataupun konseling mengenai baptisan, jangan sungkan untuk menghubungi kami melalui kotak di bawah ini.</p>
        <a href="https://wa.me/yourwhatsapplink" class="btn btn-success" target="_blank">WhatsApp</a>
        <h1 class="my-5">TUHAN YESUS MEMBERKATI</h1>
    </div>
</section>

<?= $this->endSection(); ?>