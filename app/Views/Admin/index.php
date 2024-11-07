<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- Content Live -->
    <div class="row" id="live">
        <!-- Left Box (Video Display) -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <h5>Live Video Preview</h5>
                    <div class="chart-area">
                        <iframe id="youtube-video" width="100%" height="315" src="<?= esc($embedCode) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Box (Input and Button) -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <h5>Enter YouTube Video Link</h5>
                    <!-- Use POST method to submit the form data -->
                    <form method="POST" action="/Dashboard/updateVideo/1">
                        <div class="mb-3">
                            <input type="text" name="youtubeEmbedCode" id="youtubeEmbedCode" class="form-control" placeholder="Enter YouTube Embed Code Here">
                        </div>
                        <button type="submit" id="postEmbed" class="btn btn-primary">Post Video</button>
                    </form>

                    <!-- Optional: Display Success/Failure Message -->
                    <?php if (session()->getFlashdata('message')) : ?>
                        <div class="alert mt-3 <?= session()->getFlashdata('alert-class'); ?>">
                            <?= session()->getFlashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Jemaat -->
    <div class="row" id="jemaat">
        <!-- Total Jemaat Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Jemaat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($totalJemaat); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pria Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($totalPria); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wanita Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Wanita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($totalWanita); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Remaja & Anak-Anak Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Remaja & Anak-Anak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($totalRemajaAnak); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Calendar -->
    <div class="row" id="jadwal">
        <!-- Area Chart -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body bg-gray-800">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="news">
        <!-- Display the 6 newest news items -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5>Berita Terbaru</h5>
                    <div class="list-group">
                        <?php if (!empty($latestNews)) : ?>
                            <?php foreach ($latestNews as $news) : ?>
                                <a href="/Dashboard/berita/list/<?= esc($news['slug']); ?>" class="list-group-item list-group-item-action" target="_blank">
                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="/uploads/images/<?= esc($news['img']); ?>" alt="<?= esc($news['title']); ?>" style="width: 80px; height: 60px; object-fit: cover; margin-right: 15px;">
                                            <div>
                                                <h6 class="mb-1"><?= esc($news['title']); ?></h6>
                                                <small>Sumber: <?= esc($news['source']); ?></small>
                                            </div>
                                        </div>
                                        <small><?= date('d M Y', strtotime($news['created'])); ?></small>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-muted">Belum ada berita.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->include('Admin/jadwal/modal-ibadah'); ?>

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>