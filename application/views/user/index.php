<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data user</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <?= validation_errors(); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <?= form_open('user/multi_delete', ['id' => 'form-deleteAll']); ?>
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('user/add'); ?>" class="btn btn-primary float-end"><i class="fa fa-user-plus"></i> Tambah User</a>
                    <button type="button" onclick="delete_all()" class="btn btn-danger float-end mx-2"><i class="fa fa-trash-alt"></i> Delete</button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table w-100" id="table1">
                        <thead>
                            <tr>
                                <th>
                                    <div class=" form-check">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="select_all" class="form-check-input form-check-danger">
                                        </div>
                                    </div>
                                </th>
                                <th>No</th>
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No Telp</th>
                                <th>Role</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($users as $s) { ?>
                                <tr>
                                    <td>
                                        <div class=" form-check">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="pilih" class="form-check-input form-check-danger pilih" name="checked[]" value="<?= $s['id_user']; ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img src="<?= base_url("/assets/images/logo/$s[image]"); ?>" width="50" alt="">
                                    </td>
                                    <td><?= $s['nama']; ?></td>
                                    <td><?= $s['email']; ?></td>
                                    <td><?= $s['no_telp']; ?></td>
                                    <td>
                                        <?php
                                        if ($s['role'] == "Admin") { ?>
                                            <span class="badge bg-success"><?= $s['role']; ?></span>
                                        <?php
                                        } else { ?>
                                            <span class="badge bg-danger"><?= $s['role']; ?></span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?= time_ago($s['tanggal_input']); ?></td>
                                    <td>
                                        <?php
                                        if ($s['is_active'] == 1) { ?>
                                            <a href="<?= base_url('user/activeuser/') . $s['id_user']; ?>" class="btn btn-success rounded-pill btn-sm" title="<?= $s['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                        <?php
                                        } else { ?>
                                            <a href="<?= base_url('user/activeuser/') . $s['id_user']; ?>" class="btn btn-secondary rounded-pill btn-sm" title="<?= $s['is_active'] ? 'Nonaktifkan User' : 'Aktifkan User' ?>"><i class="fa fa-fw fa-power-off"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <button type="button" class="btn btn-warning rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#inlineForm<?= $s['id_user']; ?>"><i class="fa fa-user-edit"></i></button>
                                        <a href="<?= base_url('user/hapus/' . $s['id_user']); ?>" class="btn btn-danger rounded-pill btn-sm" id="button-hapus"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>




    <?php
    foreach ($users as $s) { ?>
        <!--Edit User form Modal -->
        <div class="modal fade text-left" id="inlineForm<?= $s['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Edit user</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="<?= base_url('user/edit') ?>" method="POST">
                        <div class="modal-body">
                            <label>Nama: </label>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $s['id_user']; ?>">
                                <input type="text" name="nama" autocomplete="off" placeholder="Input Nama" value="<?= $s['nama']; ?>" class="form-control">
                            </div>
                            <label>Email: </label>
                            <div class="form-group">
                                <input type="text" name="email" autocomplete="off" placeholder="Input Email" value="<?= $s['email']; ?>" class="form-control">
                            </div>
                            <label>No Telp: </label>
                            <div class="form-group">
                                <input type="text" name="no" value="<?= $s['no_telp']; ?>" autocomplete="off" placeholder="Input Nomor" class="form-control">
                            </div>
                            <label>Role: </label>
                            <div class="col-lg-9">
                                <div class="form-check">
                                    <input class="form-check-input <?= form_error('role') ? 'is-invalid' : ''; ?>" type="radio" value="RAB KLHK" name="role" id="role" <?php if ($s['role'] == 'Admin') echo 'checked' ?>>
                                    <label class="form-check-label" for="role" <?php if ($s['role'] == 'Admin') echo 'checked' ?>>
                                        Admin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input <?= form_error('role') ? 'is-invalid' : ''; ?>" value="Staff" type="radio" name="role" id="role" <?php if ($s['role'] == 'Staff') echo 'checked' ?>>
                                    <label class="form-check-label" for="role" <?php if ($s['role'] == 'Staff') echo 'checked' ?>>
                                        Staff
                                    </label>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('role'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block"><i class="fa fa-times"></i> Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block"><i class="fa fa-save"></i> Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>