<?= $this->extend('Admin/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Akses</h1>

    <!-- Check for session flash messages -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-<?= strpos(session()->getFlashdata('pesan'), 'berhasil') !== false ? 'success' : 'danger'; ?>" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- Form to add new user -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pengguna</h6>
        </div>
        <div class="card-body">
            <form action="<?= isset($user) ? '/Dashboard/akses/update/' . $user['username'] : '/Dashboard/tambahAkses'; ?>" method="post">
                <?= csrf_field(); ?>

                <!-- Username Input -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control <?= (isset($validation) && $validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Masukkan username" value="<?= old('username', isset($user) ? $user['username'] : ''); ?>" <?= isset($user) ? 'readonly' : ''; ?>>
                    <div class="invalid-feedback d-block">
                        <?= (isset($validation) && $validation->hasError('username')) ? $validation->getError('username') : ''; ?>
                    </div>
                </div>

                <!-- name Input -->
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control <?= (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="masukkan nama" value="<?= old('name', isset($user) ? $user['name'] : ''); ?>">
                    <div class="invalid-feedback d-block">
                        <?= (isset($validation) && $validation->hasError('name')) ? $validation->getError('name') : ''; ?>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?= (isset($validation) && $validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="<?= isset($user) ? 'Leave blank to keep current password' : 'Masukkan password'; ?>">
                    <div class="invalid-feedback d-block">
                        <?= (isset($validation) && $validation->hasError('password')) ? $validation->getError('password') : ''; ?>
                    </div>
                </div>

                <!-- Role Select -->
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control <?= (isset($validation) && $validation->hasError('role')) ? 'is-invalid' : ''; ?>" id="role" name="role">
                        <option value="">Pilih Role</option>
                        <option value="admin" <?= (old('role', isset($user) ? $user['role'] : '') == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="engineer" <?= (old('role', isset($user) ? $user['role'] : '') == 'engineer') ? 'selected' : ''; ?>>Engineer</option>
                    </select>
                    <div class="invalid-feedback d-block">
                        <?= (isset($validation) && $validation->hasError('role')) ? $validation->getError('role') : ''; ?>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary"><?= isset($user) ? 'Update' : 'Simpan'; ?></button>
                <button type="reset" class="btn btn-secondary">Reset</button>

                <!-- Cancel Button: Only show when editing -->
                <?php if (isset($user)) : ?>
                    <a href="/Dashboard/listAkses" class="btn btn-danger">Cancel</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <!-- Display table with data from the database -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Akses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="aksesTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Last Login</th> <!-- Example additional column -->
                            <th>Actions</th> <!-- New column for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($akses as $item) : ?>
                            <tr>
                                <td><?= esc($item['username']); ?></td>
                                <td><?= esc($item['name']) ?></td>
                                <td><?= esc($item['role']); ?></td>
                                <td><?= isset($item['last_login']) ? esc($item['last_login']) : 'N/A'; ?></td>
                                <td>
                                    <a href="/Dashboard/akses/edit/<?= $item['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="/Dashboard/akses/delete/<?= $item['id']; ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>