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
                    <form action="/Admin/tambahIbadah" method="post">
                        <?= csrf_field(); ?>
                        <!-- Title Input -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Ibadah</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter the title" maxlength="30" required>
                        </div>

                        <!-- Start DateTime Picker -->
                        <div class="mb-3 col-lg-6">
                            <label for="start" class="form-label">Mulai</label>
                            <input type="datetime-local" class="form-control" id="start" name="start" required>
                        </div>

                        <!-- End DateTime Picker -->
                        <div class="mb-3 col-lg-6">
                            <label for="end" class="form-label">Selesai</label>
                            <input type="datetime-local" class="form-control" id="end" name="end" required>
                        </div>

                        <!-- Description Textarea -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Enter a description for the event" maxlength="255">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Save Event</button>
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

<!-- Modal for Event Details -->
<div id="eventModal" class="modal">
    <div class="modal-content">
        <!-- Close Button -->
        <span class="close">&times;</span>

        <!-- Event View Mode -->
        <div id="viewMode">
            <h2 id="eventTitle"></h2>
            <p id="eventTime"></p>
            <p id="eventDescription"></p>
        </div>

        <!-- Event Edit Mode (Initially Hidden) -->
        <div id="editMode" style="display: none;">
            <form id="editEventForm">
                <div class="mb-3">
                    <label for="editTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" id="editTitle" name="title">
                </div>
                <div class="mb-3">
                    <label for="editStart" class="form-label">Start Date</label>
                    <input type="datetime-local" class="form-control" id="editStart" name="start">
                </div>
                <div class="mb-3">
                    <label for="editEnd" class="form-label">End Date</label>
                    <input type="datetime-local" class="form-control" id="editEnd" name="end">
                </div>
                <div class="mb-3">
                    <label for="editDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" id="editDescription" name="description" placeholder="Enter event description">
                </div>
                <button type="button" class="btn btn-success" id="saveBtn">Save Changes</button>
            </form>
        </div>

        <!-- Action Buttons for View Mode -->
        <div class="modal-footer" id="viewButtons">
            <!-- Edit Button to Switch to Edit Mode -->
            <button id="editBtn" class="btn btn-warning">Edit</button>

            <!-- Delete Button (Confirmation or Direct Action) -->
            <button id="deleteBtn" class="btn btn-danger" data-id="">Delete</button>
        </div>

        <!-- Action Buttons for Edit Mode (Initially Hidden) -->
        <div class="modal-footer" id="editButtons" style="display: none;">
            <button type="button" class="btn btn-secondary" id="cancelEditBtn">Cancel</button>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>