<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Dokument - <?= $judul; ?></title>
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
    <style>
        .border {
            border: 1px solid #495057 !important
        }
    </style>
</head>

<body class="login-page accent-success dark-mode" style="min-height: 496.938px;">
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
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <p class="text-center font-weight-bold mb-0">APLIKASI ARSIP DATA PT SIC</p>
                    <p class="login-box-msg small">Masukkan email jika lupa password</p>
                    <?= form_open('auth/forgotpassword', [], ['captcha_code' => $captcha]); ?>
                    <div class="form-group">
                        <div class="input-group">
                            <input autofocus name="email" type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" placeholder="Masukan Email">
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
                    <div id="captha-form" class="bg-dark mb-3 p-2 border rounded user-select-none">
                        <div class="row mb-0">
                            <div class="col-5 d-flex justify-content-center">
                                <span class="font-weight-bold align-self-center"><?= $captcha; ?></span>
                            </div>
                            <div class="col-7">
                                <input type="text" name="captcha" class="form-control form-control-sm  <?= form_error('captcha') ? 'is-invalid' : ''; ?>" placeholder="Ketik kata disamping">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= form_error('captcha', '<div class="pl-1">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn bg-success btn-block">Kirim</button>
                    <p class="small text-center text-muted pt-2">
                        <a href="<?= base_url('auth'); ?>">Kembali</a>
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
    <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>

    <script>
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            Swal.fire({
                icon: 'error',
                title: flashData,
            })
        }
    </script>
</body>

</html>