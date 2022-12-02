<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data user</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>">Data User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('user') ?>" class="btn btn-secondary float-end"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <?= $this->session->flashdata('pesan'); ?>
                                <form action="<?= base_url('user/add'); ?>" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" autocomplete="off" name="nama" autofocus class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama" id="first-name-icon">
                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                            <?= form_error('nama', '<div class="pl-3">', '</div>'); ?>
                                                        </div>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" autocomplete="off" name="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" placeholder="Masukan Email" id="first-name-icon">
                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                            <?= form_error('email', '<div class="pl-3">', '</div>'); ?>
                                                        </div>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-envelope"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>No Telp</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" autocomplete="off" name="no" class="form-control <?= form_error('no') ? 'is-invalid' : ''; ?>" placeholder="Masukan Nomor" id="first-name-icon">
                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                            <?= form_error('no', '<div class="pl-3">', '</div>'); ?>
                                                        </div>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-telephone"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Role" class="col-lg-3 col-form-label">Role</label>
                                                <div class="col-lg-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input <?= form_error('role') ? 'is-invalid' : ''; ?>" value="Admin" type="radio" name="role" id="role">
                                                        <label class="form-check-label" for="Admin">
                                                            Admin
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input <?= form_error('role') ? 'is-invalid' : ''; ?>" type="radio" name="role" id="role" value="Staff">
                                                        <label class="form-check-label" for="role">
                                                            Staff
                                                        </label>
                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                            <?= form_error('role'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="reset" class="btn btn-danger me-2"><i class="fa fa-times"></i> Reset</button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>