<div id="main-content">

    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Template Form</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Template Form</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('template_form/tambah'); ?>" class="btn btn-primary float-end"><i class="bi bi-upload"></i> Upload</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table w-100" id="table_sistem">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Update</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Update</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($template as $t) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $t['kode']; ?></td>
                                    <td><?= $t['nama_template']; ?></td>
                                    <td><?= $t['jenis']; ?></td>
                                    <td><?= $t['tanggal']; ?></td>
                                    <td><?= time_ago($t['dibuat']); ?></td>
                                    <td><?= $t['nama']; ?></td>
                                    <td>
                                        <a class="" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?= base_url('assets/file/template-form/' . $t['file']) ?>" target="_blank"><i class=" fa fa-download"></i> Download File</a>
                                            <a class="dropdown-item" href="<?= base_url('template_form/ubah/' . $t['id_template']) ?>"><i class="fa fa-pencil-alt"></i> Ubah File</a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-danger" id="button-hapus" href="<?= base_url('template_form/hapus/' . $t['id_template']) ?>"><i class="fa fa-trash-alt text-danger"></i> Delete File</a>
                                        </div>
                                    </td>
                                <?php
                            }
                                ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>