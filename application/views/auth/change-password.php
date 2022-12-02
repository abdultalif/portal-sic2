<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarbi V-Legal | <?= $judul; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/assets/login/img/logo_besar.png') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/dist/css/custom.css">
</head>

<body class="login-page accent-success dark-mode">
    <div id="particle-container">
        <div class="particle purple"></div>
        <div class="particle medium-blue"></div>
        <div class="particle light-blue"></div>
        <div class="particle red"></div>
        <div class="particle orange"></div>
        <div class="particle yellow"></div>
        <div class="particle cyan"></div>
        <div class="particle light-green"></div>
        <div class="particle lime"></div>
        <div class="particle magenta"></div>
        <div class="particle lightish-red"></div>
        <div class="particle pink"></div>
    </div>

    <div class="login-page dark-mode">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-success">
                <div class="card-header text-center">
                    <img src="<?= base_url() ?>/assets/login/img/logo_besar.png" alt="Logo SIC" class="mw-100" style="height:50px">
                    <div class="small text-center mt-2">
                        Jl. Raya Taman Pagelaran No.2 Lt.2
                        <br>
                        Ciomas, Bogor - Jawa Barat
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif'); ?>"></div>
                    <div class="pesan" data-pesan="<?= $this->session->flashdata('pesan'); ?>"></div>
                    <p class="login-box-msg small">Silahkan Reset Password</p>
                    <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
                        <div class="form-group">
                            <div class="input-group">
                                <input readonly type="text" class="form-control" value="<?= $this->session->userdata('reset_email'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="password1" class="form-control <?= form_error('password1') ? 'is-invalid' : ''; ?>" placeholder="Please enter password...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= form_error('password1', '<div class="pl-1">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="password2" class="form-control <?= form_error('password2') ? 'is-invalid' : ''; ?>" placeholder="Please enter confirm password...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= form_error('password2', '<div class="pl-1">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-success btn-block mb-3"> Reset Password</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="small text-center mt-2">
                © 2022 •
                <a href="https://sarbisertifikasi.com/" target="blank" rel="dofollow">PT Sarbi International Certification</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/login/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/assets/login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/assets/login/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/login/dist/js/adminlte.min.js"></script>

    <script>
        if ($('.flash-data').data('flashdata')) {
            const flashData = $('.flash-data').data('flashdata');
            if (flashData) {
                Swal.fire({
                    icon: 'error',
                    title: flashData,
                })
            }
        } else {
            const flashData = $('.pesan').data('pesan');
            if (flashData) {
                Swal.fire({
                    icon: 'success',
                    title: flashData,
                })
            }
        }
    </script>
</body>

</html>