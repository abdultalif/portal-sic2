<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarbi V-Legal | Login QR-Code</title>
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
                <center>
                    <div class="card-body pb-2">
                        <p class="text-center font-weight-bold mb-0">APLIKASI ARSIP DATA PT SIC</p>
                        <p class="login-box-msg small">Arahkan Kode QR Ke Kamera Untuk Login!</p>
                        <canvas></canvas>
                        <hr>
                        <select></select>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a class="btn btn-danger" href="<?php echo base_url('Auth'); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </center>
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
    <script src="<?= base_url() ?>/assets/login/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/assets/login/dist/js/adminlte.min.js"></script>

    <script src="<?= base_url('assets/login/Scanqr/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/login/Scanqr/js/qrcodelib.js') ?>"></script>
    <script src="<?= base_url('assets/login/Scanqr/js/webcodecamjquery.js') ?>"></script>
    <script src="<?= base_url('assets/login/Scanqr/js/jquery.min.js') ?>"></script>
    <script type="text/javascript">
        var arg = {
            resultFunction: function(result) {
                var redirect = "<?= base_url('auth/cek_login_scan') ?>";
                $.redirectPost(redirect, {
                    id_user: result.code
                });
            }
        };

        var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
        decoder.buildSelectMenu("select");
        decoder.play();

        $('select').on('change', function() {
            decoder.stop().play();
        });

        $.extend({
            redirectPost: function(location, args) {
                var form = '';
                $.each(args, function(key, value) {
                    form += '<input type="hidden" name="' + key + '" value="' + value + '">';
                });
                $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
            }
        });
    </script>
</body>

</html>