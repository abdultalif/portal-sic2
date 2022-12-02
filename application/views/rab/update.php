<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update RAB</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('rab') ?>">RAB</a></li>
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
                    <?php echo form_open_multipart('rab/ubah/' . $rab['id_rab']); ?>
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('assets/file/rab/' . $rab['file']) ?>" target="_blank" class="btn btn-info btn-sm">
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
                                    <input type="hidden" name="file_lama" value="<?= $rab['file']; ?>">
                                    <input placeholder="Nama Perusahaan" value="<?= $rab['nama_rab']; ?>" autocomplete="off" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" type="text" name="nama">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skema" class="col-lg-3 col-form-label">Skema</label>
                                <div class="col-lg-9">
                                    <input placeholder="Skema" value="<?= $rab['skema']; ?>" autocomplete="off" class="form-control <?= form_error('skema') ? 'is-invalid' : ''; ?>" type="text" name="skema">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('skema'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lingkup" class="col-lg-3 col-form-label">Lingkup</label>
                                <div class="col-lg-9">
                                    <input placeholder="Lingkup" value="<?= $rab['lingkup']; ?>" autocomplete="off" class="form-control <?= form_error('lingkup') ? 'is-invalid' : ''; ?>" type="text" name="lingkup">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('lingkup'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tahun" class="col-lg-3 col-form-label">Tahun</label>
                                <div class="col-lg-9">
                                    <input placeholder="Tahun" value="<?= $rab['tahun']; ?>" autocomplete="off" class="form-control <?= form_error('tahun') ? 'is-invalid' : ''; ?>" type="text" name="tahun">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('tahun'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Jenis</label>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input class="form-check-input <?= form_error('jenis') ? 'is-invalid' : ''; ?>" type="radio" value="RAB KLHK" name="jenis" id="jenis" <?php if ($rab['jenis'] == 'RAB KLHK') echo 'checked' ?>>
                                        <label class="form-check-label" for="jenis" <?php if ($rab['jenis'] == 'RAB KLHK') echo 'checked' ?>>
                                            RAB KLHK
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input <?= form_error('jenis') ? 'is-invalid' : ''; ?>" value="RAB Auditee" type="radio" name="jenis" id="jenis" <?php if ($rab['jenis'] == 'RAB Auditee') echo 'checked' ?>>
                                        <label class="form-check-label" for="jenis" <?php if ($rab['jenis'] == 'RAB Auditee') echo 'checked' ?>>
                                            RAB Auditee
                                        </label>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= form_error('jenis'); ?>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input <?= form_error('jenis') ? 'is-invalid' : ''; ?>" type="radio" value="RAB Auditor" name="jenis" id="jenis" <?php if ($rab['jenis'] == 'RAB Auditor') echo 'checked' ?>>
                                        <label class="form-check-label" for="jenis" <?php if ($rab['jenis'] == 'RAB Auditor') echo 'checked' ?>>
                                            RAB Auditor
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input <?= form_error('jenis') ? 'is-invalid' : ''; ?>" value="Surat Pengantar" type="radio" name="jenis" id="jenis" <?php if ($rab['jenis'] == 'Surat Pengantar') echo 'checked' ?>>
                                        <label class="form-check-label" for="jenis" <?php if ($rab['jenis'] == 'Surat Pengantar') echo 'checked' ?>>
                                            Surat Pengantar
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
                                    <small class="text-muted">Format File: zip/rar/xls/xlsx/pdf.</small>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-end">
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i>
                                        Simpan
                                    </button>
                                    <a href="<?= base_url('rab') ?>" class="btn btn-secondary">
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