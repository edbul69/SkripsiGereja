<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Ibadah</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success m-3" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- Form Column for Adding/Editing Jadwal -->
        <div class="col-lg-6">
            <div class="card shadow mb-4" style="width: 100%;">
                <div class="card-header py-3" style="background-color: #4e73df; color: white;">
                    <h6 id="form-title" class="m-0 font-weight-bold">Tambah Jadwal</h6>
                </div>

                <div class="card-body">
                    <form id="jadwalForm" method="post" action="/Admin/saveIbadah">
                        <?= csrf_field(); ?>
                        <input type="hidden" id="jadwal-id" name="id" value="">

                        <!-- Nama Ibadah -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Ibadah</label>
                            <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : ''; ?>" id="title" name="title" placeholder="Masukkan nama ibadah" value="<?= old('title'); ?>" maxlength="50">
                            <div class="invalid-feedback"><?= isset($errors['title']) ? $errors['title'] : ''; ?></div>
                            <small id="charCount" class="text-muted">0/50</small>
                        </div>

                        <!-- Mulai -->
                        <div class="mb-3">
                            <label for="start" class="form-label">Mulai</label>
                            <input type="datetime-local" class="form-control <?= isset($errors['start']) ? 'is-invalid' : ''; ?>" id="start" name="start" value="<?= old('start'); ?>" onclick="this.showPicker()">
                            <div class="invalid-feedback"><?= isset($errors['start']) ? $errors['start'] : ''; ?></div>
                        </div>

                        <!-- Selesai -->
                        <div class="mb-3">
                            <label for="end" class="form-label">Selesai</label>
                            <input type="datetime-local" class="form-control <?= isset($errors['end']) ? 'is-invalid' : ''; ?>" id="end" name="end" value="<?= old('end'); ?>" onclick="this.showPicker()">
                            <div class="invalid-feedback"><?= isset($errors['end']) ? $errors['end'] : ''; ?></div>
                        </div>

                        <!-- Lokasi Input -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control <?= isset($errors['location']) ? 'is-invalid' : ''; ?>" id="location" name="location" placeholder="Masukkan lokasi" value="<?= old('location'); ?>" maxlength="255">
                            <div class="invalid-feedback"><?= isset($errors['location']) ? $errors['location'] : ''; ?></div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control <?= isset($errors['description']) ? 'is-invalid' : ''; ?>" id="description" name="description" placeholder="Masukkan deskripsi" value="<?= old('description'); ?>" maxlength="255">
                            <div class="invalid-feedback"><?= isset($errors['description']) ? $errors['description'] : ''; ?></div>
                        </div>

                        <!-- Submit and Cancel Button -->
                        <button type="submit" id="submit-btn" class="btn btn-primary">Simpan Jadwal</button>
                        <button type="button" id="cancel-btn" class="btn btn-secondary d-none" onclick="resetForm()">Batal</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Table Column with Month Filter -->
        <div class="col-lg-6">
            <div class="card shadow mb-4" style="width: 100%;">
                <div class="card-header py-3" style="background-color: #4e73df; color: white;">
                    <h6 class="m-0 font-weight-bold">Jadwal Berdasarkan Tanggal</h6>
                    <!-- Month Filter Dropdown -->
                    <div class="form-group mt-2">
                        <select id="monthFilter" class="form-control" style="width: auto;">
                            <option value="all">All Months</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table id="jadwalTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Ibadah</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="jadwalTableBody">
                                <?php
                                function isValidUrl($url)
                                {
                                    return filter_var($url, FILTER_VALIDATE_URL) !== false;
                                }

                                foreach ($groupedJadwalData as $date => $events): ?>
                                    <tr class="date-row" data-month="<?= date('n', strtotime($date)) ?>">
                                        <td colspan="6" style="background-color: #e3f2fd;"><strong><?= date('d-m-Y', strtotime($date)) ?></strong></td>
                                    </tr>
                                    <?php foreach ($events as $event): ?>
                                        <tr class="event-row" data-month="<?= date('n', strtotime($event->start)) ?>">
                                            <td><?= esc($event->title) ?></td>
                                            <td><?= date('H:i', strtotime($event->start)) ?></td>
                                            <td><?= date('H:i', strtotime($event->end)) ?></td>
                                            <td>
                                                <?php
                                                $locationText = esc($event->location);
                                                echo isValidUrl($locationText)
                                                    ? "<a href=\"$locationText\" target=\"_blank\">Buka Peta...</a>"
                                                    : $locationText;
                                                ?>
                                            </td>
                                            <td><?= esc($event->description) ?></td>
                                            <!-- Action Buttons for Edit and Delete -->
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm edit-btn" title="Edit"
                                                    data-id="<?= $event->id ?>"
                                                    data-title="<?= esc($event->title) ?>"
                                                    data-start="<?= date('Y-m-d\TH:i', strtotime($event->start)) ?>"
                                                    data-end="<?= date('Y-m-d\TH:i', strtotime($event->end)) ?>"
                                                    data-location="<?= esc($event->location) ?>"
                                                    data-description="<?= esc($event->description) ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <form action="/Settings/ibadah/delete/<?= $event->id ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');" title="Delete">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendar Column -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background-color: #4e73df; color: white;">
                    <h6 class="m-0 font-weight-bold">Kalender</h6>
                </div>
                <div class="card-body" style="background-color: #343a40; color: white;">
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
    document.addEventListener('DOMContentLoaded', function() {
        // Month filter logic
        const monthFilter = document.getElementById('monthFilter');
        monthFilter.addEventListener('change', function() {
            const selectedMonth = this.value;
            const rows = document.querySelectorAll('#jadwalTableBody .date-row, #jadwalTableBody .event-row');

            rows.forEach(row => {
                const rowMonth = row.getAttribute('data-month');
                row.style.display = (selectedMonth === 'all' || rowMonth === selectedMonth) ? '' : 'none';
            });
        });

        // Character count for title input
        const titleInput = document.getElementById('title');
        const charCount = document.getElementById('charCount');
        titleInput.addEventListener('input', function() {
            charCount.textContent = `${titleInput.value.length}/50`;
        });

        // Form and button variables
        const jadwalForm = document.getElementById('jadwalForm');
        const formTitle = document.getElementById('form-title');
        const submitBtn = document.getElementById('submit-btn');
        const cancelBtn = document.getElementById('cancel-btn');

        // Function to load data into the form for editing
        function loadFormData(id, title, start, end, location, description) {
            formTitle.textContent = 'Edit Jadwal';
            submitBtn.textContent = 'Simpan Perubahan';
            submitBtn.classList.replace('btn-primary', 'btn-success');
            cancelBtn.classList.remove('d-none');
            jadwalForm.action = `/Settings/ibadah/update/${id}`;

            // Populate form fields with data
            document.getElementById('jadwal-id').value = id;
            document.getElementById('title').value = title;
            document.getElementById('start').value = start;
            document.getElementById('end').value = end;
            document.getElementById('location').value = location;
            document.getElementById('description').value = description;
        }

        // Function to reset the form to "Add" mode
        function resetForm() {
            formTitle.textContent = 'Tambah Jadwal';
            submitBtn.textContent = 'Simpan Jadwal';
            submitBtn.classList.replace('btn-success', 'btn-primary');
            cancelBtn.classList.add('d-none');
            jadwalForm.action = '/Admin/saveIbadah';

            // Clear form fields
            document.getElementById('jadwal-id').value = '';
            document.getElementById('title').value = '';
            document.getElementById('start').value = '';
            document.getElementById('end').value = '';
            document.getElementById('location').value = '';
            document.getElementById('description').value = '';
        }

        // Attach click event to edit buttons in the table
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const title = this.getAttribute('data-title');
                const start = this.getAttribute('data-start');
                const end = this.getAttribute('data-end');
                const location = this.getAttribute('data-location');
                const description = this.getAttribute('data-description');

                loadFormData(id, title, start, end, location, description);
            });
        });

        // Make resetForm globally accessible for cancel button
        window.resetForm = resetForm;
    });
</script>

<?= $this->endSection(); ?>