<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Upload Tagihan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('tagihan') ?>">Tagihan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Upload</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="notif" data-notif="<?= $this->session->flashdata('notif'); ?>"></div>
                    <?php echo form_open_multipart('tagihan/tambah'); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Nama Perusahaan</label>
                                <div class="col-lg-9">
                                    <input placeholder="Nama Perusahaan" autocomplete="off" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" type="text" name="nama" value="<?= set_value('nama') ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skema" class="col-lg-3 col-form-label">Skema</label>
                                <div class="col-lg-9">
                                    <input placeholder="Skema" autocomplete="off" class="form-control <?= form_error('skema') ? 'is-invalid' : ''; ?>" value="<?= set_value('skema'); ?>" type="text" name="skema" value="<?= set_value('skema') ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('skema'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lingkup" class="col-lg-3 col-form-label">Lingkup</label>
                                <div class="col-lg-9">
                                    <input placeholder="Lingkup" autocomplete="off" class="form-control <?= form_error('lingkup') ? 'is-invalid' : ''; ?>" value="<?= set_value('lingkup'); ?>" type="text" name="lingkup" value="<?= set_value('lingkup') ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('lingkup'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal" class="col-lg-3 col-form-label">Tanggal</label>
                                <div class="col-lg-9">
                                    <input placeholder="tanggal" autocomplete="off" class="form-control <?= form_error('tanggal') ? 'is-invalid' : ''; ?>" type="text" id="tanggal" name="tanggal" value="<?= set_value('tanggal') ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('tanggal'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Nomor Kontrak" class="col-lg-3 col-form-label">Nomor Kontrak</label>
                                <div class="col-lg-9">
                                    <input placeholder="Nomor Kontak" autocomplete="off" class="form-control <?= form_error('nomor') ? 'is-invalid' : ''; ?>" value="<?= set_value('nomor') ?>" type="text" name="nomor">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('nomor'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Tahap Tagihan" class="col-lg-3 col-form-label">Tahap Tagihan</label>
                                <div class="col-lg-9">
                                    <input placeholder="Tahap Tagihan" autocomplete="off" class="form-control <?= form_error('tahap') ? 'is-invalid' : ''; ?>" value="<?= set_value('tahap') ?>" type="text" name="tahap">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('tahap'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Bukti Pembayaran" class="col-lg-3 col-form-label">Bukti Pembayaran</label>
                                <div class="col-lg-9">
                                    <input type="file" name="file" class="form-control <?= form_error('file') ? 'is-invalid' : ''; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('file', '<div class="pl-3">', '</div>'); ?>
                                    </div>
                                    <small class="text-muted">Format File: jpg/jpeg/png/pdf.</small>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-end">
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                    <a href="<?= base_url('tagihan') ?>" class="btn btn-secondary">
                                        Kembali
                                    </a>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>