<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Ibadah</h1>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Jadwal</h6>
                </div>

                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success m-3" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-body col-lg-6">
                    <form action="/Admin/saveIbadah" method="post">
                        <?= csrf_field(); ?>

                        <!-- Nama Ibadah -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Ibadah</label>
                            <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : ''; ?>" id="title" name="title" placeholder="Masukkan nama ibadah" value="<?= old('title'); ?>" maxlength="30" oninput="updateCharCount()">
                            <div class="d-flex justify-content-between mt-1">
                                <div class="invalid-feedback">
                                    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
                                </div>
                                <small id="charCount" class="text-muted">0/50</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="start" class="form-label">Mulai</label>
                            <input type="datetime-local" class="form-control datetime-clickable <?= isset($errors['start']) ? 'is-invalid' : ''; ?>" id="start" name="start" value="<?= old('start'); ?>" onclick="this.showPicker()">
                            <div class="invalid-feedback">
                                <?= isset($errors['start']) ? $errors['start'] : ''; ?>
                            </div>
                        </div>

                        <!-- Selesai -->
                        <div class="mb-3">
                            <label for="end" class="form-label">Selesai</label>
                            <input type="datetime-local" class="form-control datetime-clickable <?= isset($errors['end']) ? 'is-invalid' : ''; ?>" id="end" name="end" value="<?= old('end'); ?>" onclick="this.showPicker()">
                            <div class="invalid-feedback">
                                <?= isset($errors['end']) ? $errors['end'] : ''; ?>
                            </div>
                        </div>


                        <!-- Lokasi Input -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control <?= isset($errors['location']) ? 'is-invalid' : ''; ?>" id="location" name="location" placeholder="Masukkan lokasi (misalnya: link Google Maps atau alamat)" value="<?= old('location'); ?>" maxlength="255">
                            <div class="invalid-feedback">
                                <?= isset($errors['location']) ? $errors['location'] : ''; ?>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid' : ''; ?>" id="description" name="description" placeholder="Masukkan deskripsi" value="<?= old('description'); ?>" maxlength="255">
                            <div class="invalid-feedback">
                                <?= isset($errors['description']) ? $errors['description'] : ''; ?>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kalender</h6>
                </div>
                <div class="card-body bg-gray-800">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->include('Admin/jadwal/modal-ibadah'); ?>

<!-- End of Main Content -->

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
    $(document).ready(function() {
        $('#title').on('input', function() {
            const length = $(this).val().length;
            $('#charCount').text(`${length}/50`);
        });
    });
</script>

<?= $this->endSection();; ?>