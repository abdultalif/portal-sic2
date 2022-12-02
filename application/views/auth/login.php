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
    <link rel="stylesheet" href="<?= base_url() ?>/assets/sweetalert2/sweetalert2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/dist/css/custom.css">
    <style>
        .border {
            border: 1px solid #495057 !important
        }
    </style>
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
                        Jl. Raya Taman Pagelaran No.2 Lt.2<br />Ciomas, Bogor - Jawa Barat
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif'); ?>"></div>
                    <div class="pesan" data-pesan="<?= $this->session->flashdata('pesan'); ?>"></div>
                    <p class="text-center font-weight-bold mb-0">APLIKASI ARSIP DATA PT SIC</p>
                    <p class="login-box-msg small">Login untuk masuk ke aplikasi</p>
                    <?= form_open('auth', [], ['captcha_code' => $captcha]); ?>
                    <div class="form-group">
                        <div class="input-group">
                            <input autofocus name="email" type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= set_value('email') ?>" placeholder="Please enter email...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= form_error('email', '<div class="pl-1">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Please enter password...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= form_error('password', '<div class="pl-1">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div id="captha-form" class="bg-dark mb-3 p-2 rounded user-select-none border">
                        <div class="row mb-0">
                            <div class="col-5 d-flex justify-content-center">
                                <span class="font-weight-bold align-self-center"><?= $captcha; ?></span>
                            </div>
                            <div class="col-7">
                                <input type="text" name="captcha" class="form-control form-control-sm  <?= form_error('captcha') ? 'is-invalid' : ''; ?>" placeholder="Ketik Chaptcha disamping">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= form_error('captcha', '<div class="pl-1">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn bg-success btn-block"> Login </button>
                    <?= form_close(); ?>
                    <!-- </form> -->
                    <p class="small text-center text-muted pt-2">
                        <a href="<?= base_url('auth/login_scan') ?>">Login Menggunakan QR-Code</a><br>
                        <a href="<?= base_url('auth/forgotpassword') ?>">Lupa Password?</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="small text-center mt-2 text-success">
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
    <script src="<?= base_url() ?>/assets/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/login/dist/js/adminlte.min.js"></script>

    <script>
        if ($('.flash-data').data('flashdata')) {
            const flashData = $('.flash-data').data('flashdata');
            if (flashData) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: flashData,
                })
            }
        } else {
            const flashData = $('.pesan').data('pesan');
            if (flashData) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: flashData,
                })
            }
        }
    </script>
</body>

</html>