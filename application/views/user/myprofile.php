<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>MyProfile</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">MyProfile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row justify">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">MyProfile</h4>
                        </div>

                        <div class="card-body">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
                            <center>
                                <div class="avatar avatar-xl me-3">
                                    <img src="<?= base_url('assets/images/logo/' . $user['image']); ?>" alt="" srcset="">
                                </div>
                            </center><br>
                            <h4 class="text-center"><?= $user['nama']; ?></h4>
                            <p class="text-muted text-center"><?= $user['role']; ?></p>

                            <ul class="list-group">
                                <li class="list-group-item"><i class="fa fa-envelope"></i> <a class="float-right text-muted"><b>Email</b> <?= $user['email']; ?></a></li>
                                <li class="list-group-item"><i class="fa fa-phone"></i> <a class="float-right text-muted"><b>Nomor Telpon</b> <?= $user['no_telp']; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">QR-Code User</h4>
                        </div>
                        <div class="card-body">
                            <center>
                                <?= $qruser; ?> <br>
                                <a href="<?= base_url('user/print_barcode') ?>" class="btn btn-primary mb-3 mt-3" target="_blank"><i class="fa fa-print"></i> Print QR-Code User</a><br>
                                <strong>Print untuk Login menggunakan Scan</strong>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>