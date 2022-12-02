<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Profile</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="notif" data-notif="<?= $this->session->flashdata('notif'); ?>"></div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('user/editprofile'); ?>
                            <h6>Nama Lengkap</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                                <input type="text" autocomplete="off" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" placeholder="Masukan Nama" value="<?= $user['nama'] ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= form_error('nama', '<div class="pl-3">', '</div>'); ?>
                                </div>
                                <div class="form-control-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>

                            <h6>Email</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" name="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= $user['email']; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= form_error('email', '<div class="pl-3">', '</div>'); ?>
                                </div>
                                <div class="form-control-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>

                            <h6>No Telpon</h6>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" name="no" class="form-control <?= form_error('no') ? 'is-invalid' : ''; ?>" value="<?= $user['no_telp']; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= form_error('no', '<div class="pl-3">', '</div>'); ?>
                                </div>
                                <div class="form-control-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>

                            <h6>Foto</h6>
                            <div class="form-group">
                                <input class="form-control" name="image" type="file">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-end"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>