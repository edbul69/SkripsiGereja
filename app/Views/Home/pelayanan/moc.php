<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<header class="masthead p-0" id="moc">
    <div class="col-12 p-0 m-0 h-100">
        <div class="row h-100 m-0">
            <!-- Black column (left-box) -->
            <div class="left-box col-md-4 d-none d-md-flex bg-black p-0 m-0 h-100 justify-content-center align-items-center">
                <p class="text-white" style="rotate: 270deg;">
                    MILLENIAL OF CHRIST
                </p>
            </div>
            <!-- White column (right-box) -->
            <div class="right-box col-12 col-md-8 bg-dark p-1 m-0 h-100 d-flex flex-column justify-content-end align-items-start">
                <img src="../Public/assets/img/icon/moc-icon-tp.png" alt="" class="ml-5 mb-1">
                <p class="text-white ml-3">// MOC - GPDI BAHU</p>
            </div>
        </div>
    </div>
</header>

<section class="page-section bg-black p-0" id="moc-about">
    <div class="col-12 p-0 m-0 h-100">
        <div class="row h-100 m-0">
            <div class="col-md-6 col-12 bg-dark text-white p-5">
                <p>Dear Family,</p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec blandit dolor in ipsum tincidunt, nec feugiat augue laoreet. Vivamus imperdiet eu dui et mollis. Aliquam auctor auctor neque ac aliquet. Morbi ultrices varius neque at efficitur. Vivamus tincidunt sit amet purus sed lobortis. Vivamus sollicitudin ante at ante tincidunt gravida. Sed et lacus id arcu posuere pretium at tempus enim. Vestibulum tincidunt libero sed purus finibus, et venenatis lorem bibendum. Fusce vestibulum rutrum arcu, id tincidunt quam faucibus at. Maecenas aliquet dolor sed ex sagittis mollis.
                </p>

                <p>
                    Nam quis efficitur enim, facilisis accumsan velit. Curabitur metus ligula, vulputate ut viverra sed, auctor nec est. Phasellus vitae nulla turpis. Fusce rhoncus enim ut rhoncus mollis. Aliquam id porta sem. Phasellus malesuada erat lacinia interdum scelerisque. In rutrum lorem sed nunc maximus, cursus viverra lectus euismod. Vivamus laoreet molestie eleifend. Pellentesque tempor vestibulum pharetra.
                </p>

                <p>
                    Sed id vulputate nunc, et porta libero. Aliquam erat volutpat. Morbi accumsan, ante non viverra interdum, ligula arcu tincidunt eros, in posuere mauris neque in dui. Nullam vitae vehicula risus, elementum laoreet erat. In molestie ex ut nibh ultricies, eu porttitor nisi dictum. Vivamus convallis, justo eget feugiat sodales, odio nunc vehicula dui, ac congue ante erat sed erat. Cras nisi velit, imperdiet sed massa sed, pellentesque commodo risus. Vivamus mollis ante ac fermentum hendrerit. Aliquam odio sem, mattis sed dolor a, dignissim aliquet sapien. Vestibulum non finibus neque.
                </p>

                <p>
                    Duis non neque neque. Nam ex libero, venenatis eget felis nec, euismod porttitor nibh. Sed porta nulla diam, ac sodales nibh laoreet nec. Vivamus hendrerit tortor nunc, et sagittis turpis gravida nec. Fusce porta augue non elementum auctor. Etiam elementum massa mi, ut pulvinar libero tristique nec. Sed vitae tristique orci. Nullam lacus elit, aliquam ut tempus sit amet, elementum ac diam. Phasellus eu finibus justo.
                </p>
            </div>
            <div class="col-md-6 col-12 bg-white p-5">
                <!-- Image Section -->
                <div class="image-container mb-4">
                    <img src="https://placehold.co/400x300" alt="Family Image" class="img-fluid">
                </div>

                <!-- Text Section -->
                <div class="text-section mb-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec blandit dolor in ipsum tincidunt, nec feugiat augue laoreet. Vivamus imperdiet eu dui et mollis. Aliquam auctor auctor neque ac aliquet. Morbi ultrices varius neque at efficitur. Vivamus tincidunt sit amet purus sed lobortis. Vivamus sollicitudin ante at ante tincidunt gravida. Sed et lacus id arcu posuere pretium at tempus enim. Vestibulum tincidunt libero sed purus finibus, et venenatis lorem bibendum. Fusce vestibulum rutrum arcu, id tincidunt quam faucibus at. Maecenas aliquet dolor sed ex sagittis mollis.
                    </p>
                    <p>
                        Nam quis efficitur enim, facilisis accumsan velit. Curabitur metus ligula, vulputate ut viverra sed, auctor nec est. Phasellus vitae nulla turpis. Fusce rhoncus enim ut rhoncus mollis. Aliquam id porta sem. Phasellus malesuada erat lacinia interdum scelerisque. In rutrum lorem sed nunc maximus, cursus viverra lectus euismod. Vivamus laoreet molestie eleifend. Pellentesque tempor vestibulum pharetra.
                    </p>
                </div>

                <!-- Signature Section -->
                <div class="signature-section mt-5">
                    <p class="mb-0">In His love,</p>
                    <p class="signature" style="font-family: 'Cursive', sans-serif; font-size: 1.5rem;">
                        Lorem Ipsum
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section bg-black p-0" id="moc-media">
    <div id="mocCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
        <!-- Carousel Inner (Slides) -->
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="../Public/assets/img/header/header-bg1.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="../Public/assets/img/header/header-bg2.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="../Public/assets/img/header/header-bg3.jpg" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
    </div>
</section>

<div class="col-12 mx-auto my-0 bg-white p-0" style="height: 1em;">
    <div class="row m-0 p-0 h-100">
        <div class="col-5 m-0 p-0 h-100" style="background-color: #111;"></div>
        <div class="col-3 m-0 p-0 h-100" style="background-color: #333;"></div>
        <div class="col-2 m-0 p-0 h-100" style="background-color: #555;"></div>
        <div class="col-1 m-0 p-0 h-100" style="background-color: #777;"></div>
        <div class="col-1 m-0 p-0 h-100" style="background-color: #999;"></div>
    </div>
</div>

<section class="page-section bg-white pb-5" id="moc-act">
    <div class="bg-background px-5 text-center hidden">
        <h1 class="text-4xl font-bold mb-4">M O C</h1>
        <div class="row justify-content-center mb-6">
            <div class="col-2 bg-black mb-3 rounded-start" style="height: 1em;"></div>
            <div class="col-3 mb-3 opacity-75" style="height: 1em; background-color: rgb(212, 212, 216);"></div>
            <div class="col-2 mb-3 opacity-75" style="height: 1em; background-color: darkorange;"></div>
            <div class="col-3 mb-3 opacity-75" style="height: 1em; background-color: rgb(212, 212, 216);"></div>
            <div class="col-2 bg-black mb-3 rounded-end" style="height: 1em;"></div>
        </div>
        <h2 class="fs-1 fw-semibold mb-4">GROW TOGETHER IN PRAISE AND WORSHIP</h2>
        <p class="text-muted mx-auto">
            KOMUNITAS MOC YANG TERDIRI DARI ANAK-ANAK MUDA TIDAK HANYA MENJADI SUATU ORGANISASI ATAUPUN TEMPAT BERKUMPUL DAN BERIBADAH, AKAN TETAPI KAMI PUN SANGAT TERBUKA BAGI SIAPAPUN YANG INGIN BELAJAR UNTUK MELAYANI TUHAN MULAI DARI PEMAIN MUSIK, SINGERS, REBANA, BANNERS, HINGGA CHOIRS BISA KALIAN PELAJARI BERSAMA DENGAN KAMI.
        </p>
    </div>
</section>

<section class="page-section p-0" id="moc-train">
    <div class="col-12 p-0 m-0 h-100">
        <div class="row h-100 m-0">
            <!-- Left Box (Gallery) -->
            <div class="col-md-6 col-12 p-5">
                <div class="gallery col-12 p-0 w-auto">
                    <div class="frame" id="frame1">
                        <div class="img-box">
                            <img src="../Public/assets/img/pelayanan/moc/rebana.jpg" alt="Image1">
                        </div>
                        <div class="caption">Rebana</div>
                    </div>
                    <div class="frame" id="frame2">
                        <div class="img-box">
                            <img src="../Public/assets/img/pelayanan/moc/banners.jpg" alt="Image2">
                        </div>
                        <div class="caption">Banners</div>
                    </div>
                    <div class="frame" id="frame3">
                        <div class="img-box">
                            <img src="../Public/assets/img/pelayanan/moc/music.jpg" alt="Image3">
                        </div>
                        <div class="caption">Music</div>
                    </div>
                    <div class="frame" id="frame4">
                        <div class="img-box">
                            <img src="../Public/assets/img/pelayanan/moc/singers.jpg" alt="Image4">
                        </div>
                        <div class="caption">Singers</div>
                    </div>
                    <div class="frame" id="frame5">
                        <div class="img-box">
                            <img src="../Public/assets/img/pelayanan/moc/choirs.jpg" alt="Image5">
                        </div>
                        <div class="caption">Choirs</div>
                    </div>
                </div>
            </div>

            <!-- Right Box (Description) -->
            <div class="description col-md-6 col-12 p-5">
                <section class="description-section">
                    <div class="col-12 p-5 w-100 text-center" id="description-content">
                        <h1 class="description-title">BIDANG PELAYANAN MOC</h1>
                        <p class="description-intro">MOC memiliki beberapa bidang pelayanan, antara lain:</p>
                        <ul class="description-list">
                            <li>Rebana</li>
                            <li>Banners</li>
                            <li>Music</li>
                            <li>Singers</li>
                            <li>Choirs</li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<section class="page-section bg-light p-5" id="moc-testimonials">
    <div class="container hidden">
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-4 mb-4">
                <div class="testimonial bg-white p-4 shadow d-flex flex-column align-items-center text-center">
                    <img src="https://placehold.co/150" alt="Andre" class="testimonial-img mb-3 rounded-circle" style="width: 160px; height: 160px;">
                    <p>
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec blandit dolor in ipsum tincidunt, nec feugiat augue laoreet. Vivamus imperdiet eu dui et mollis. Aliquam auctor auctor neque ac aliquet. Morbi ultrices varius neque at efficitur."
                    </p>
                    <p class="text-muted">- TEST, Anggota MOC</p>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-4 mb-4">
                <div class="testimonial bg-white p-4 shadow d-flex flex-column align-items-center text-center">
                    <img src="https://placehold.co/150" alt="Maria" class="testimonial-img mb-3 rounded-circle" style="width: 160px; height: 160px;">
                    <p>
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec blandit dolor in ipsum tincidunt, nec feugiat augue laoreet. Vivamus imperdiet eu dui et mollis. Aliquam auctor auctor neque ac aliquet. Morbi ultrices varius neque at efficitur."
                    </p>
                    <p class="text-muted">- TEST, Anggota MOC</p>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="col-md-4 mb-4">
                <div class="testimonial bg-white p-4 shadow d-flex flex-column align-items-center text-center">
                    <img src="https://placehold.co/150" alt="Budi" class="testimonial-img mb-3 rounded-circle" style="width: 160px; height: 160px;">
                    <p>
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec blandit dolor in ipsum tincidunt, nec feugiat augue laoreet. Vivamus imperdiet eu dui et mollis. Aliquam auctor auctor neque ac aliquet. Morbi ultrices varius neque at efficitur."
                    </p>
                    <p class="text-muted">- TEST, Anggota MOC</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section text-white p-5" id="moc-contact">
    <div class="container hidden">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold display-4 mb-4">MOC Celebration</h2>
                <p class="lead mt-3 mb-5">Kami mengundang kamu untuk bergabung dalam acara
                    <strong>MOC Celebration</strong> setiap hari Rabu, setiap minggu. Ini adalah kesempatan yang luar biasa untuk kita semua bersatu dan merayakan bersama!
                </p>
                <p class="h5 mb-4">Tempat acara: <span class="text-warning">GPDI Bahu, Manado</span></p>
                <a href="#footer" class="btn btn-warning btn-lg px-4 py-2 mt-3">Cek Lokasi</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>