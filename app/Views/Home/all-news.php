<?= $this->extend('Home/layout/template'); ?>

<?= $this->section('content'); ?>

<section class="page-section" id="all-news">
    <div class="container mt-5">
        <div id="news-container">
            <?php foreach ($berita as $b) : ?>
                <div class="news-item mb-4">
                    <a href="/Berita/<?= esc($b['slug']); ?>" class="text-decoration-none" target="_blank">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="news-image">
                                    <img src="/uploads/images/<?= esc($b['img']); ?>" alt="News Image" class="img-fluid" style="height: 150px; object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h2 class="news-title"><?= esc($b['title']); ?></h2>
                                <div>
                                    <span class="news-badge">NEWS</span>
                                    <span class="news-time">
                                        <?php
                                        $createdTime = new DateTime($b['created']);
                                        $currentTime = new DateTime();
                                        $interval = $createdTime->diff($currentTime);

                                        if ($interval->y > 0) {
                                            echo $interval->y . ' tahun yang lalu';
                                        } elseif ($interval->m > 0) {
                                            echo $interval->m . ' bulan yang lalu';
                                        } elseif ($interval->d > 0) {
                                            echo $interval->d . ' hari yang lalu';
                                        } elseif ($interval->h > 0) {
                                            echo $interval->h . ' jam yang lalu';
                                        } elseif ($interval->i > 0) {
                                            echo $interval->i . ' menit yang lalu';
                                        } else {
                                            echo 'Baru saja';
                                        }
                                        ?>
                                    </span>
                                </div>
                                <p class="news-snippet text-muted">
                                    <?= esc(mb_substr(strip_tags($b['text']), 0, 200)) . '...'; ?>
                                </p>
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
                        <img src="/Public/assets/img/icon/arrow-left.webp" alt="Previous" class="pagination-arrow">
                    </a>
                </li>
                <!-- Pagination buttons will be generated here by JavaScript -->
                <!-- Next arrow -->
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <img src="/Public/assets/img/icon/arrow-right.webp" alt="Next" class="pagination-arrow">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>