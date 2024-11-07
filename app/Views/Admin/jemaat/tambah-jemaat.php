<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Jemaat</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Form Input Data Jemaat</h6>
                </div>
                <div class="card-body">
                    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

                    <form id="jemaatForm" method="post" enctype="multipart/form-data" action="/Dashboard/saveJemaat">
                        <?= csrf_field(); ?>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="<?= old('nama'); ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['nama']) ? $errors['nama'] : ''; ?>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control <?= isset($errors['tgl_lahir']) ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>" onclick="this.showPicker();">
                            <div class="invalid-feedback">
                                <?= isset($errors['tgl_lahir']) ? $errors['tgl_lahir'] : ''; ?>
                            </div>
                        </div>

                        <!-- Asal -->
                        <div class="mb-3">
                            <label for="asal" class="form-label">Asal</label>
                            <input type="text" class="form-control <?= isset($errors['asal']) ? 'is-invalid' : ''; ?>" id="asal" name="asal" placeholder="Masukkan asal" value="<?= old('asal'); ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['asal']) ? $errors['asal'] : ''; ?>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-3">
                            <label for="jns_kelamin" class="form-label">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input <?= isset($errors['jns_kelamin']) ? 'is-invalid' : ''; ?>" type="radio" name="jns_kelamin" id="male" value="Laki-laki" <?= (old('jns_kelamin') == 'Laki-laki') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="male">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input <?= isset($errors['jns_kelamin']) ? 'is-invalid' : ''; ?>" type="radio" name="jns_kelamin" id="female" value="Perempuan" <?= (old('jns_kelamin') == 'Perempuan') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="female">Perempuan</label>
                                </div>
                            </div>
                            <div class="invalid-feedback d-block">
                                <?= isset($errors['jns_kelamin']) ? $errors['jns_kelamin'] : ''; ?>
                            </div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-3">
                            <label for="telp" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control <?= isset($errors['telp']) ? 'is-invalid' : ''; ?>" id="telp" name="telp" placeholder="Masukkan nomor telepon" value="<?= old('telp'); ?>">
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
                                        <option value="" disabled <?= old('city') ? '' : 'selected'; ?>>Pilih Kota</option>
                                        <!-- Populate with PHP loop -->
                                        <?php foreach ($cities as $city) : ?>
                                            <option value="<?= $city['code']; ?>" <?= (old('city') == $city['code']) ? 'selected' : ''; ?>>
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
                                        <option value="" disabled <?= old('kecamatan') ? '' : 'selected'; ?>>Pilih Kecamatan</option>
                                        <!-- Populate dynamically using JS, add the old value check -->
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= isset($errors['kecamatan']) ? $errors['kecamatan'] : ''; ?>
                                    </div>
                                </div>

                                <!-- Kelurahan -->
                                <div class="mb-3">
                                    <label for="kelurahan" class="form-label">Kelurahan</label>
                                    <select class="form-control <?= isset($errors['kelurahan']) ? 'is-invalid' : ''; ?>" id="kelurahan" name="kelurahan">
                                        <option value="" disabled <?= old('kelurahan') ? '' : 'selected'; ?>>Pilih Kelurahan</option>
                                        <!-- Populate dynamically using JS, add the old value check -->
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= isset($errors['kelurahan']) ? $errors['kelurahan'] : ''; ?>
                                    </div>
                                </div>

                                <!-- Lingkungan -->
                                <div class="mb-3">
                                    <label for="lingkungan" class="form-label">Lingkungan</label>
                                    <input type="number" class="form-control <?= isset($errors['lingkungan']) ? 'is-invalid' : ''; ?>" id="lingkungan" name="lingkungan" placeholder="Masukkan lingkungan" value="<?= old('lingkungan'); ?>" min="1">
                                    <div class="invalid-feedback">
                                        <?= isset($errors['lingkungan']) ? $errors['lingkungan'] : ''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-primary" name="action" value="save">Simpan Data</button>
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

        const oldCity = "<?= old('city'); ?>";
        const oldKecamatan = "<?= old('kecamatan'); ?>";
        const oldKelurahan = "<?= old('kelurahan'); ?>";

        function showLoading(selectElement, placeholder) {
            selectElement.innerHTML = `<option value="" disabled selected>${placeholder}...</option>`;
        }

        function clearLoading(selectElement, placeholder) {
            selectElement.innerHTML = `<option value="">${placeholder}</option>`;
        }

        function fetchData(url, selectElement, placeholder) {
            showLoading(selectElement, 'Loading');
            return fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch data');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        throw new Error(data.error);
                    }
                    clearLoading(selectElement, placeholder);
                    return data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    alert('Failed to load data. Please try again later.');
                    clearLoading(selectElement, placeholder);
                });
        }

        // Fetch cities and set old value if available
        fetchData('/admin/get-cities', citySelect, 'Pilih Kota')
            .then(cities => {
                if (cities) {
                    cities.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.code;
                        option.textContent = city.name;
                        if (city.code === oldCity) {
                            option.selected = true;
                        }
                        citySelect.appendChild(option);
                    });
                    if (oldCity) {
                        citySelect.dispatchEvent(new Event('change')); // Trigger change event to load Kecamatan
                    }
                }
            });

        // Fetch Kecamatan on city change and set old value if available
        citySelect.addEventListener('change', function() {
            const regencyCode = citySelect.value;
            if (regencyCode) {
                fetchData(`/admin/get-kecamatan/${regencyCode}`, kecamatanSelect, 'Pilih Kecamatan')
                    .then(kecamatanList => {
                        if (kecamatanList) {
                            kecamatanList.forEach(kecamatan => {
                                const option = document.createElement('option');
                                option.value = kecamatan.code;
                                option.textContent = kecamatan.name;
                                if (kecamatan.code === oldKecamatan) {
                                    option.selected = true;
                                }
                                kecamatanSelect.appendChild(option);
                            });
                            if (oldKecamatan) {
                                kecamatanSelect.dispatchEvent(new Event('change')); // Trigger change event to load Kelurahan
                            }
                        }
                    });
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>'; // Reset Kelurahan
            } else {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
            }
        });

        // Fetch Kelurahan on kecamatan change and set old value if available
        kecamatanSelect.addEventListener('change', function() {
            const districtCode = kecamatanSelect.value;
            if (districtCode) {
                fetchData(`/admin/get-kelurahan/${districtCode}`, kelurahanSelect, 'Pilih Kelurahan')
                    .then(kelurahanList => {
                        if (kelurahanList) {
                            kelurahanList.forEach(kelurahan => {
                                const option = document.createElement('option');
                                option.value = kelurahan.code;
                                option.textContent = kelurahan.name;
                                if (kelurahan.code === oldKelurahan) {
                                    option.selected = true;
                                }
                                kelurahanSelect.appendChild(option);
                            });
                        }
                    });
            } else {
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
            }
        });
    });
</script>
<?= $this->endSection(); ?>