<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Legalitas</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('legalitas') ?>">Legalitas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Legalitas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">
                    <div class="notif" data-notif="<?= $this->session->flashdata('notif'); ?>"></div>
                    <?php echo form_open_multipart('legalitas/ubah/' . $data['id_legalitas']); ?>
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('assets/file/legalitas/' . $data['file']) ?>" target="_blank" class="btn btn-info btn-sm">
                                Show File
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right ms-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                    <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                </svg>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="name" class="col-lg-3 col-form-label">Nama Dokumen</label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="file_old" value="<?= $data['file']; ?>">
                                    <input placeholder="Nama Dokumen" autofocus autocomplete="off" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" type="text" name="nama" value="<?= $data['nama_file'] ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('nama'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis" class="col-lg-3 col-form-label">Jenis Legalitas</label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="id" value="<?= $data['id_legalitas'] ?>">
                                    <input placeholder="Akta/ Izin/ Sk" autocomplete="off" class="form-control <?= form_error('jenis') ? 'is-invalid' : ''; ?>" type="text" name="jenis" value="<?= $data['jenis'] ?>">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= form_error('jenis'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-lg-3 col-form-label">File</label>
                                <div class="col-lg-9">
                                    <input type="file" name="file" class="form-control">
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