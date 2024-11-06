<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Jemaat</h1>

    <!-- Display success or error messages -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- Form Container -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Jemaat</h6>
                </div>
                <div class="card-body">
                    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

                    <form id="jemaatForm" method="post" enctype="multipart/form-data" action="/Settings/jemaat/update/<?= $jemaat['id']; ?>">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="api_code" value="<?= $jemaat['api_code']; ?>">

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="<?= old('nama') ?: $jemaat['nama']; ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['nama']) ? $errors['nama'] : ''; ?>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control <?= isset($errors['tgl_lahir']) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir') ?: $jemaat['tgl_lahir']; ?>" onclick="this.showPicker();">
                            <div class="invalid-feedback">
                                <?= isset($errors['tgl_lahir']) ? $errors['tgl_lahir'] : ''; ?>
                            </div>
                        </div>

                        <!-- Asal -->
                        <div class="mb-3">
                            <label for="asal" class="form-label">Asal</label>
                            <input type="text" class="form-control <?= isset($errors['asal']) ? 'is-invalid' : ''; ?>" id="asal" name="asal" placeholder="Masukkan asal" value="<?= old('asal') ?: $jemaat['asal']; ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['asal']) ? $errors['asal'] : ''; ?>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-3">
                            <label for="jns_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control <?= isset($errors['jns_kelamin']) ? 'is-invalid' : ''; ?>" id="jns_kelamin" name="jns_kelamin">
                                <option value="" disabled <?= (old('jns_kelamin') === '' && empty($jemaat['jns_kelamin'])) ? 'selected' : ''; ?>>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= (old('jns_kelamin') === 'Laki-laki' || (!old('jns_kelamin') && isset($jemaat['jns_kelamin']) && $jemaat['jns_kelamin'] === 'Laki-laki')) ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= (old('jns_kelamin') === 'Perempuan' || (!old('jns_kelamin') && isset($jemaat['jns_kelamin']) && $jemaat['jns_kelamin'] === 'Perempuan')) ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= isset($errors['jns_kelamin']) ? $errors['jns_kelamin'] : ''; ?>
                            </div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-3">
                            <label for="telp" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control <?= isset($errors['telp']) ? 'is-invalid' : ''; ?>" id="telp" name="telp" placeholder="Masukkan nomor telepon" value="<?= old('telp') ?: $jemaat['telp']; ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['telp']) ? $errors['telp'] : ''; ?>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <div class="card p-3">
                                <!-- Kota -->
                                <div class="mb-3">
                                    <label for="city" class="form-label">Kota</label>
                                    <select class="form-control <?= isset($errors['city']) ? 'is-invalid' : ''; ?>" id="city" name="city">
                                        <option value="" disabled>Pilih Kota</option>
                                        <?php foreach ($cities as $city) : ?>
                                            <option value="<?= $city['code']; ?>" <?= ($selectedCityCode == $city['code']) ? 'selected' : ''; ?>>
                                                <?= $city['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= isset($errors['city']) ? $errors['city'] : ''; ?>
                                    </div>
                                </div>

                                <!-- Kecamatan -->
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <select class="form-control <?= isset($errors['kecamatan']) ? 'is-invalid' : ''; ?>" id="kecamatan" name="kecamatan">
                                        <option value="" disabled>Pilih Kecamatan</option>
                                        <?php foreach ($kecamatanData as $kec) : ?>
                                            <option value="<?= $kec['code']; ?>" <?= ($selectedKecamatanCode == $kec['code']) ? 'selected' : ''; ?>>
                                                <?= $kec['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= isset($errors['kecamatan']) ? $errors['kecamatan'] : ''; ?>
                                    </div>
                                </div>

                                <!-- Kelurahan -->
                                <div class="mb-3">
                                    <label for="kelurahan" class="form-label">Kelurahan</label>
                                    <select class="form-control <?= isset($errors['kelurahan']) ? 'is-invalid' : ''; ?>" id="kelurahan" name="kelurahan">
                                        <option value="" disabled>Pilih Kelurahan</option>
                                        <?php foreach ($kelurahanData as $kel) : ?>
                                            <option value="<?= $kel['code']; ?>" <?= ($selectedKelurahanCode == $kel['code']) ? 'selected' : ''; ?>>
                                                <?= $kel['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= isset($errors['kelurahan']) ? $errors['kelurahan'] : ''; ?>
                                    </div>
                                </div>

                                <!-- Lingkungan -->
                                <div class="mb-3">
                                    <label for="lingkungan" class="form-label">Lingkungan</label>
                                    <input type="number" class="form-control <?= isset($errors['lingkungan']) ? 'is-invalid' : ''; ?>" id="lingkungan" name="lingkungan" placeholder="Masukkan lingkungan" value="<?= old('lingkungan') ?: $selectedLingkungan; ?>" min="1">
                                    <div class="invalid-feedback">
                                        <?= isset($errors['lingkungan']) ? $errors['lingkungan'] : ''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary" name="action" value="save">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const citySelect = document.getElementById('city');
        const kecamatanSelect = document.getElementById('kecamatan');
        const kelurahanSelect = document.getElementById('kelurahan');

        const oldCity = "<?= old('city') ?: $selectedCityCode; ?>";
        const oldKecamatan = "<?= old('kecamatan') ?: $selectedKecamatanCode; ?>";
        const oldKelurahan = "<?= old('kelurahan') ?: $selectedKelurahanCode; ?>";

        // Existing script logic for fetching and populating dropdowns...
    });
</script>

<?= $this->endSection(); ?>