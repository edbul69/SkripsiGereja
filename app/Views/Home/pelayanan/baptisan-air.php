<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<header class="masthead" id="baptisan">
    <div class="container">
        <div class="masthead-subheading">Baptisan Air</div>
    </div>
</header>

<section class="page-section bg-black" id="news">
    <div class="container py-5">
        <h2 class="text-center text-white mb-4">Baptis | Hidup Baru</h2>
        <p class="text-center text-white mb-5">
            <em>“Aku berkata kepadamu: Sesungguhnya barangsiapa mendengar perkataan-Ku dan percaya kepada Dia yang mengutus Aku, ia mempunyai hidup yang kekal dan tidak turut dihukum, sebab ia sudah pindah dari dalam maut ke dalam hidup” Yohanes 5:24</em>
        </p>
        <p class="text-center text-muted mb-5">
            Baptis adalah salah satu syarat dan juga hal terpenting dalam keimanan kita kepada Tuhan dan memiliki arti yang dalam sebagai suatu tanda memulai kehidupan yang baru bersama Kristus.
        </p>
        <!-- Accordion -->
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
                        Yesus Sendiri dipatis
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#baptismAccordion">
                    <div class="accordion-body">
                        Jesus was baptized by John the Baptist as an example for us to follow. It was a significant moment in His ministry.
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
                        In the Great Commission, Jesus instructed His disciples to baptize in the name of the Father, the Son, and the Holy Spirit.
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
                        If you have accepted Jesus Christ as your Lord and Savior, and desire to publicly declare your faith, you are ready for baptism.
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
                        Remember that baptism is a step of obedience and a way to follow the example set by Jesus.
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
                        After baptism, continue to grow in your faith through prayer, studying the Bible, and being part of a church community.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>