<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update Kontrak</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('kontrak') ?>">Kontrak</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="notif" data-notif="<?= $this->session->flashdata('notif'); ?>"></div>
                    <?php echo form_open_multipart('kontrak/ubah/' . $kontrak['id_kontrak']); ?>
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('assets/file/kontrak/' . $kontrak['file']) ?>" target="_blank" class="btn btn-info btn-sm">
                                Show File
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right ms-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                    <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                </svg>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Nama Perusahaan</label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="file_lama" value="<?= $kontrak['file'] ?>">
                                    <input placeholder="Nama Perusahaan" value="<?= $kontrak['nama_kontrak'] ?>" autocomplete="off" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" type="text" name="nama">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skema" class="col-lg-3 col-form-label">Skema</label>
                                <div class="col-lg-9">
                                    <input placeholder="Skema" value="<?= $kontrak['skema'] ?>" autocomplete="off" class="form-control <?= form_error('skema') ? 'is-invalid' : ''; ?>" value="<?= set_value('skema'); ?>" type="text" name="skema">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('skema'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lingkup" class="col-lg-3 col-form-label">Lingkup</label>
                                <div class="col-lg-9">
                                    <input placeholder="Lingkup" value="<?= $kontrak['skema'] ?>" autocomplete="off" class="form-control <?= form_error('lingkup') ? 'is-invalid' : ''; ?>" value="<?= set_value('lingkup'); ?>" type="text" name="lingkup">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('lingkup'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal" class="col-lg-3 col-form-label">Tanggal</label>
                                <div class="col-lg-9">
                                    <input placeholder="tanggal" value="<?= $kontrak['tanggal'] ?>" autocomplete="off" class="form-control <?= form_error('tanggal') ? 'is-invalid' : ''; ?>" type="text" id="tanggal" name="tanggal">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('tanggal'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Jenis</label>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input class="form-check-input <?= form_error('jenis') ? 'is-invalid' : ''; ?>" value="Kontrak Auditee" type="radio" name="jenis" id="jenis" <?php if ($kontrak['jenis'] == 'Kontrak Auditee') echo 'checked' ?>>
                                        <label class="form-check-label" for="jenis">
                                            Kontrak Auditee
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input <?= form_error('jenis') ? 'is-invalid' : ''; ?>" type="radio" name="jenis" id="jenis" <?php if ($kontrak['jenis'] == 'Kontrak Auditor') echo 'checked' ?> value="Kontrak Auditor">
                                        <label class="form-check-label" for="jenis">
                                            Kontrak Auditor
                                        </label>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= form_error('jenis'); ?>
                                        </div>
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
                                    <a href="<?= base_url('kontrak') ?>" class="btn btn-secondary">
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