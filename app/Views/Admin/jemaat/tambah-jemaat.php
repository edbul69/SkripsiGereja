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
                    <?php $errors = session()->getFlashdata('errors') ?? \Config\Services::validation()->getErrors(); ?>

                    <form id="jemaatForm" method="post" enctype="multipart/form-data" action="/Dashboard/saveJemaat">
                        <?= csrf_field(); ?>

                        <!-- Informasi Anggota Utama (Nama, Tanggal Lahir, Rayon) -->
                        <div class="mb-3">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control <?= isset($errors['namaLengkap']) ? 'is-invalid' : ''; ?>" id="namaLengkap" name="namaLengkap" placeholder="Masukkan nama lengkap" value="<?= old('namaLengkap'); ?>" required>
                            <div class="invalid-feedback">
                                <?= isset($errors['namaLengkap']) ? $errors['namaLengkap'] : ''; ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control <?= isset($errors['tanggalLahir']) ? 'is-invalid' : ''; ?>" id="tanggalLahir" name="tanggalLahir" value="<?= old('tanggalLahir'); ?>" onclick="this.showPicker();">
                            <div class="invalid-feedback">
                                <?= isset($errors['tanggalLahir']) ? $errors['tanggalLahir'] : ''; ?>
                            </div>
                        </div>

                        <!-- Rayon (Dropdown) -->
                        <div class="mb-3">
                            <label for="rayon" class="form-label">Rayon</label>
                            <select class="form-control <?= isset($errors['rayon']) ? 'is-invalid' : ''; ?>" id="rayon" name="rayon">
                                <option value="" disabled <?= old('rayon') ? '' : 'selected'; ?>>Pilih Rayon</option>
                                <option value="1 SION" <?= (old('rayon') == '1 SION') ? 'selected' : ''; ?>>1 SION</option>
                                <option value="2 HERMON" <?= (old('rayon') == '2 HERMON') ? 'selected' : ''; ?>>2 HERMON</option>
                                <option value="3 MORIA" <?= (old('rayon') == '3 MORIA') ? 'selected' : ''; ?>>3 MORIA</option>
                                <option value="4 HOREB" <?= (old('rayon') == '4 HOREB') ? 'selected' : ''; ?>>4 HOREB</option>
                                <option value="5 KARMEL" <?= (old('rayon') == '5 KARMEL') ? 'selected' : ''; ?>>5 KARMEL</option>
                                <!-- Tambahkan opsi rayon lainnya di sini jika diperlukan -->
                            </select>
                            <div class="invalid-feedback">
                                <?= isset($errors['rayon']) ? $errors['rayon'] : ''; ?>
                            </div>
                        </div>

                        <!-- Pilihan Peran Anggota -->
                        <div class="mb-3">
                            <label for="memberRole" class="form-label">Peran dalam Keluarga</label>
                            <select class="form-control <?= isset($errors['memberRole']) ? 'is-invalid' : ''; ?>" id="memberRole" name="memberRole" required>
                                <option value="" disabled <?= old('memberRole') ? '' : 'selected'; ?>>Pilih Peran</option>
                                <option value="Perseorangan" <?= (old('memberRole') == 'Perseorangan') ? 'selected' : ''; ?>>Perseorangan</option>
                                <option value="Suami" <?= (old('memberRole') == 'Suami') ? 'selected' : ''; ?>>Suami</option>
                                <option value="Istri" <?= (old('memberRole') == 'Istri') ? 'selected' : ''; ?>>Istri</option>
                                <option value="Anak" <?= (old('memberRole') == 'Anak') ? 'selected' : ''; ?>>Anak</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= isset($errors['memberRole']) ? $errors['memberRole'] : ''; ?>
                            </div>
                        </div>

                        <!-- Bagian Opsi Keluarga (Buat Baru / Pilih Ada) -->
                        <div id="familyOptionsSection" class="card p-3 mb-3 border-left-secondary shadow-sm d-none">
                            <h5 class="mb-3 text-secondary">Opsi Keluarga</h5>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="familyChoice" id="createNewFamily" value="new">
                                    <label class="form-check-label" for="createNewFamily">Buat Keluarga Baru</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="familyChoice" id="selectExistingFamily" value="existing">
                                    <label class="form-check-label" for="selectExistingFamily">Pilih Keluarga yang Ada</label>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Keluarga Baru (Hanya jika "Buat Keluarga Baru" dipilih) -->
                        <div id="newFamilyDetailsSection" class="card p-3 mb-3 border-left-primary shadow-sm d-none">
                            <h5 class="mb-3 text-primary">Detail Keluarga Baru</h5>
                            <div class="mb-3">
                                <label for="namaKeluargaBaru" class="form-label">Nama Keluarga</label>
                                <input type="text" class="form-control <?= isset($errors['namaKeluargaBaru']) ? 'is-invalid' : ''; ?>" id="namaKeluargaBaru" name="namaKeluargaBaru" placeholder="Masukkan nama keluarga baru" value="<?= old('namaKeluargaBaru'); ?>">
                                <div class="invalid-feedback">
                                    <?= isset($errors['namaKeluargaBaru']) ? $errors['namaKeluargaBaru'] : ''; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tanggalPernikahanBaru" class="form-label">Tanggal Pernikahan</label>
                                <input type="date" class="form-control <?= isset($errors['tanggalPernikahanBaru']) ? 'is-invalid' : ''; ?>" id="tanggalPernikahanBaru" name="tanggalPernikahanBaru" value="<?= old('tanggalPernikahanBaru'); ?>" onclick="this.showPicker();">
                                <div class="invalid-feedback">
                                    <?= isset($errors['tanggalPernikahanBaru']) ? $errors['tanggalPernikahanBaru'] : ''; ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="namaAyahSuamiBaru" class="form-label">Nama Ayah Suami</label>
                                <input type="text" class="form-control" id="namaAyahSuamiBaru" name="namaAyahSuamiBaru" placeholder="Nama ayah dari suami">
                            </div>
                            <div class="mb-3">
                                <label for="namaIbuSuamiBaru" class="form-label">Nama Ibu Suami</label>
                                <input type="text" class="form-control" id="namaIbuSuamiBaru" name="namaIbuSuamiBaru" placeholder="Nama ibu dari suami">
                            </div>
                            <div class="mb-3">
                                <label for="namaAyahIstriBaru" class="form-label">Nama Ayah Istri</label>
                                <input type="text" class="form-control" id="namaAyahIstriBaru" name="namaAyahIstriBaru" placeholder="Nama ayah dari istri">
                            </div>
                            <div class="mb-3">
                                <label for="namaIbuIstriBaru" class="form-label">Nama Ibu Istri</label>
                                <input type="text" class="form-control" id="namaIbuIstriBaru" name="namaIbuIstriBaru" placeholder="Nama ibu dari istri">
                            </div>
                        </div>

                        <!-- Informasi Keluarga yang Ada (Hanya jika "Pilih Keluarga yang Ada" dipilih) -->
                        <div id="existingFamilySection" class="card p-3 mb-3 border-left-info shadow-sm d-none">
                            <h5 class="mb-3 text-info">Pilih Keluarga yang Ada</h5>
                            <div class="mb-3">
                                <label for="idKeluarga" class="form-label">Nama Keluarga</label>
                                <select class="form-control <?= isset($errors['idKeluarga']) ? 'is-invalid' : ''; ?>" id="idKeluarga" name="idKeluarga">
                                    <option value="" disabled <?= old('idKeluarga') ? '' : 'selected'; ?>>Pilih Keluarga</option>
                                    <?php if (isset($keluargaList) && is_array($keluargaList)) : ?>
                                        <?php foreach ($keluargaList as $keluarga) : ?>
                                            <option value="<?= esc($keluarga['idkeluarga']); ?>" <?= (old('idKeluarga') == $keluarga['idkeluarga']) ? 'selected' : ''; ?>>
                                                <?= esc($keluarga['namakeluarga']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= isset($errors['idKeluarga']) ? $errors['idKeluarga'] : ''; ?>
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
        const memberRoleSelect = document.getElementById('memberRole');
        const familyOptionsSection = document.getElementById('familyOptionsSection');
        const createNewFamilyRadio = document.getElementById('createNewFamily');
        const selectExistingFamilyRadio = document.getElementById('selectExistingFamily');
        const newFamilyDetailsSection = document.getElementById('newFamilyDetailsSection');
        const existingFamilySection = document.getElementById('existingFamilySection');
        const idKeluargaSelect = document.getElementById('idKeluarga');

        // Input fields for new family details
        const namaKeluargaBaruInput = document.getElementById('namaKeluargaBaru');
        const tanggalPernikahanBaruInput = document.getElementById('tanggalPernikahanBaru');
        const namaAyahSuamiBaruInput = document.getElementById('namaAyahSuamiBaru');
        const namaIbuSuamiBaruInput = document.getElementById('namaIbuSuamiBaru');
        const namaAyahIstriBaruInput = document.getElementById('namaAyahIstriBaru');
        const namaIbuIstriBaruInput = document.getElementById('namaIbuIstriBaru');


        // Function to toggle form sections based on member role
        function toggleFormSections() {
            const selectedRole = memberRoleSelect.value;

            // Reset family options and sections
            familyOptionsSection.classList.add('d-none');
            createNewFamilyRadio.checked = false;
            selectExistingFamilyRadio.checked = false;
            newFamilyDetailsSection.classList.add('d-none');
            existingFamilySection.classList.add('d-none');
            createNewFamilyRadio.disabled = false; // Re-enable for other roles

            // Remove required attributes from all family-related fields initially
            namaKeluargaBaruInput.removeAttribute('required');
            tanggalPernikahanBaruInput.removeAttribute('required');
            namaAyahSuamiBaruInput.removeAttribute('required');
            namaIbuSuamiBaruInput.removeAttribute('required');
            namaAyahIstriBaruInput.removeAttribute('required');
            namaIbuIstriBaruInput.removeAttribute('required');
            idKeluargaSelect.removeAttribute('required');
            idKeluargaSelect.value = ""; // Clear existing family selection

            // Clear new family input values
            namaKeluargaBaruInput.value = "";
            tanggalPernikahanBaruInput.value = "";
            namaAyahSuamiBaruInput.value = "";
            namaIbuSuamiBaruInput.value = "";
            namaAyahIstriBaruInput.value = "";
            namaIbuIstriBaruInput.value = "";


            if (selectedRole === 'Perseorangan') {
                // No family sections needed for individual
            } else if (selectedRole === 'Suami' || selectedRole === 'Istri') {
                familyOptionsSection.classList.remove('d-none');
                // Default to 'new' or 'existing' based on old data or preference
                if (oldFamilyChoice === 'new') {
                    createNewFamilyRadio.checked = true;
                    toggleFamilyChoiceSections();
                } else if (oldFamilyChoice === 'existing') {
                    selectExistingFamilyRadio.checked = true;
                    toggleFamilyChoiceSections();
                } else {
                    // No default, user must choose
                }
            } else if (selectedRole === 'Anak') {
                familyOptionsSection.classList.remove('d-none'); // Show options section
                selectExistingFamilyRadio.checked = true; // Anak always belongs to existing family
                createNewFamilyRadio.disabled = true; // Disable "Create New Family" for Anak
                toggleFamilyChoiceSections(); // Show existing family section
            }
        }

        // Function to toggle new/existing family sections based on radio choice
        function toggleFamilyChoiceSections() {
            const selectedFamilyChoice = document.querySelector('input[name="familyChoice"]:checked')?.value;

            newFamilyDetailsSection.classList.add('d-none');
            existingFamilySection.classList.add('d-none');

            // Remove required attributes from family-related fields
            namaKeluargaBaruInput.removeAttribute('required');
            tanggalPernikahanBaruInput.removeAttribute('required');
            namaAyahSuamiBaruInput.removeAttribute('required');
            namaIbuSuamiBaruInput.removeAttribute('required');
            namaAyahIstriBaruInput.removeAttribute('required');
            namaIbuIstriBaruInput.removeAttribute('required');
            idKeluargaSelect.removeAttribute('required');

            if (selectedFamilyChoice === 'new') {
                newFamilyDetailsSection.classList.remove('d-none');
                namaKeluargaBaruInput.setAttribute('required', 'required');
                // tanggalPernikahanBaruInput.setAttribute('required', 'required'); // Optional: make marriage date required
            } else if (selectedFamilyChoice === 'existing') {
                existingFamilySection.classList.remove('d-none');
                idKeluargaSelect.setAttribute('required', 'required');
            }
        }

        // Add event listeners
        memberRoleSelect.addEventListener('change', toggleFormSections);
        createNewFamilyRadio.addEventListener('change', toggleFamilyChoiceSections);
        selectExistingFamilyRadio.addEventListener('change', toggleFamilyChoiceSections);

        // Handle old() values on page load
        const oldMemberRole = "<?= old('memberRole'); ?>";
        const oldFamilyChoice = "<?= old('familyChoice'); ?>";
        const oldIdKeluarga = "<?= old('idKeluarga'); ?>"; // For existing family dropdown
        const oldNamaKeluargaBaru = "<?= old('namaKeluargaBaru'); ?>"; // For new family name
        // Add other old data for new family fields if needed
        const oldTanggalPernikahanBaru = "<?= old('tanggalPernikahanBaru'); ?>";
        const oldNamaAyahSuamiBaru = "<?= old('namaAyahSuamiBaru'); ?>";
        const oldNamaIbuSuamiBaru = "<?= old('namaIbuSuamiBaru'); ?>";
        const oldNamaAyahIstriBaru = "<?= old('namaAyahIstriBaru'); ?>";
        const oldNamaIbuIstriBaru = "<?= old('namaIbuIstriBaru'); ?>";


        if (oldMemberRole) {
            memberRoleSelect.value = oldMemberRole;
            // Re-enable createNewFamilyRadio if it was disabled for 'Anak' and now it's not 'Anak'
            if (oldMemberRole !== 'Anak') {
                createNewFamilyRadio.disabled = false;
            }
            toggleFormSections(); // This will handle initial visibility

            // If a family choice was made (for Suami/Istri/Anak)
            if (oldMemberRole !== 'Perseorangan') {
                if (oldFamilyChoice === 'new') {
                    createNewFamilyRadio.checked = true;
                    toggleFamilyChoiceSections();
                    namaKeluargaBaruInput.value = oldNamaKeluargaBaru; // Populate old data
                    tanggalPernikahanBaruInput.value = oldTanggalPernikahanBaru;
                    namaAyahSuamiBaruInput.value = oldNamaAyahSuamiBaru;
                    namaIbuSuamiBaruInput.value = oldNamaIbuSuamiBaru;
                    namaAyahIstriBaruInput.value = oldNamaAyahIstriBaru;
                    namaIbuIstriBaruInput.value = oldNamaIbuIstriBaru;
                } else if (oldFamilyChoice === 'existing') {
                    selectExistingFamilyRadio.checked = true;
                    toggleFamilyChoiceSections();
                    if (oldIdKeluarga) {
                        idKeluargaSelect.value = oldIdKeluarga; // Select old family
                    }
                }
            }
        }
    });
</script>
<?= $this->endSection(); ?>