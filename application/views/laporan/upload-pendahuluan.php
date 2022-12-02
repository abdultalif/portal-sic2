<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Upload Laporan Pendahuluan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('laporan_pendahuluan') ?>">Laporan Pendahuluan</a></li>
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
                    <?php echo form_open_multipart('laporan/tambahPendahuluan'); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Nama Perusahaan</label>
                                <div class="col-lg-9">
                                    <input placeholder="Nama Perusahaan" autocomplete="off" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" type="text" name="nama">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skema" class="col-lg-3 col-form-label">Skema</label>
                                <div class="col-lg-9">
                                    <input placeholder="Skema" autocomplete="off" class="form-control <?= form_error('skema') ? 'is-invalid' : ''; ?>" value="<?= set_value('skema'); ?>" type="text" name="skema">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('skema'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lingkup" class="col-lg-3 col-form-label">Lingkup</label>
                                <div class="col-lg-9">
                                    <input placeholder="Lingkup" autocomplete="off" class="form-control <?= form_error('lingkup') ? 'is-invalid' : ''; ?>" value="<?= set_value('lingkup'); ?>" type="text" name="lingkup">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('lingkup'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tahun" class="col-lg-3 col-form-label">Tahun</label>
                                <div class="col-lg-9">
                                    <input placeholder="Tahun" autocomplete="off" class="form-control <?= form_error('tahun') ? 'is-invalid' : ''; ?>" value="<?= set_value('tahun'); ?>" type="text" name="tahun">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('tahun'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="file" class="col-lg-3 col-form-label">File</label>
                                <div class="col-lg-9">
                                    <input type="file" name="file" class="form-control <?= form_error('file') ? 'is-invalid' : ''; ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('file', '<div class="pl-3">', '</div>'); ?>
                                    </div>
                                    <small class="text-muted">Format File: zip/rar/pdf.</small>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-end">
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                    <a href="<?= base_url('laporan/pendahuluan') ?>" class="btn btn-secondary">
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