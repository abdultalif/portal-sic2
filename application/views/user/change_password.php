<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Change Password</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                            <div class="notif" data-notif="<?= $this->session->flashdata('notif'); ?>"></div>
                            <form action="<?= base_url('user/changepass') ?>" method="post">
                                <h6>Curent Password</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="password" name="lama" class="form-control <?= form_error('lama') ? 'is-invalid' : ''; ?>" placeholder="Password Lama">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('lama', '<div class="pl-3">', '</div>'); ?>
                                    </div>
                                    <div class="form-control-icon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>

                                <h6>New Password</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="password" name="baru" class="form-control <?= form_error('baru') ? 'is-invalid' : ''; ?>" placeholder="Password Lama">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('baru', '<div class="pl-3">', '</div>'); ?>
                                    </div>
                                    <div class="form-control-icon">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>

                                <h6>Confirm Password</h6>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="password" name="konfirm" class="form-control <?= form_error('konfirm') ? 'is-invalid' : ''; ?>" placeholder="Password Lama">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('konfirm', '<div class="pl-3">', '</div>'); ?>
                                    </div>
                                    <div class="form-control-icon">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> Change Password</button>
                                    <button type="reset" class="btn btn-outline-danger"><i class="fa fa-times"></i> Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>