<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<section class="page-section" id="all-news">
    <div class="container mt-5">
        <div id="news-container">
            <?php foreach ($berita as $b) : ?>
                <div class="news-item">
                    <a href="/Berita/<?= esc($b['id']); ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="news-image">
                                    <img src="<?= esc($b['img']); ?>" alt="News Image" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h2 class="news-title"><?= esc($b['title']); ?></h2>
                                <div>
                                    <span class="news-badge">NEWS</span>
                                    <span class="news-time">11 menit yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination controls with custom arrow buttons -->
        <div class="pagination-container">
            <ul id="pagination" class="pagination justify-content-center">
                <!-- Previous arrow -->
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <img src="../Public/assets/img/icon/arrow-left.webp" alt="Previous" class="pagination-arrow">
                    </a>
                </li>
                <!-- Pagination buttons will be generated here by JavaScript -->
                <!-- Next arrow -->
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <img src="../Public/assets/img/icon/arrow-right.webp" alt="Next" class="pagination-arrow">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>





<?= $this->endSection(); ?>