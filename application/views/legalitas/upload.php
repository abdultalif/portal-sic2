<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Legalitas</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('legalitas') ?>">Legalitas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Upload Legalitas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="notif" data-notif="<?= $this->session->flashdata('notif'); ?>"></div>
                    <?php echo form_open_multipart('legalitas/tambah'); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Nama Dokumen</label>
                                <div class="col-lg-9">
                                    <input placeholder="Nama Dokumen" autofocus autocomplete="off" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" type="text" name="nama">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis" class="col-lg-3 col-form-label">Jenis Legalitas</label>
                                <div class="col-lg-9">
                                    <select name="jenis" class="form-control <?= form_error('jenis') ? 'is-invalid' : ''; ?>">
                                        <option value="">--Pilih Legalitas--</option>
                                        <option value="Akta">Akta</option>
                                        <option value="Izin">Izin</option>
                                        <option value="SK">SK</option>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('jenis'); ?>
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
                                    <small class="text-muted">Format File: pdf/jpg/png</small>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-end">
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                    <a href="<?= base_url('legalitas') ?>" class="btn btn-secondary">
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