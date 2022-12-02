<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Upload Template Form</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('template_form') ?>">Template Form</a></li>
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
                    <?php echo form_open_multipart('template_form/tambah'); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="kode" class="col-lg-3 col-form-label">Kode Dokumen</label>
                                <div class="col-lg-9">
                                    <input placeholder="Kode Dokumen" autofocus autocomplete="off" class="form-control <?= form_error('kode') ? 'is-invalid' : ''; ?>" value="<?= set_value('kode'); ?>" type="text" name="kode">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('kode'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Nama Dokumen</label>
                                <div class="col-lg-9">
                                    <input placeholder="Nama Dokumen" autocomplete="off" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" type="text" name="nama">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Jenis</label>
                                <div class="col-lg-9">
                                    <input placeholder="Jenis Template Form..." autocomplete="off" class="form-control <?= form_error('jenis') ? 'is-invalid' : ''; ?>" type="text" name="jenis">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('jenis'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Tanggal Terbit</label>
                                <div class="col-lg-9">
                                    <input placeholder="Tanggal Terbit" autofocus autocomplete="off" class="form-control <?= form_error('tanggal') ? 'is-invalid' : ''; ?>" type="text" name="tanggal" id="tanggal">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('tanggal'); ?>
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
                                    <small class="text-muted">Format File: pdf</small>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-end">
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                    <a href="<?= base_url('template_form') ?>" class="btn btn-secondary">
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