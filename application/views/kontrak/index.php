<div id="main-content">
    <div class="page-heading">
        <div class="page-title mb-4">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Kontrak</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontrak</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('kontrak/tambah'); ?>" class="btn btn-primary float-end"><i class="bi bi-upload"></i> Upload</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table w-100" id="table_rab">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Skema</th>
                                <th>Lingkup</th>
                                <th>Tanggal</th>
                                <th>Jenis</th>
                                <th>Update</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Skema</th>
                                <th>Lingkup</th>
                                <th>Tanggal</th>
                                <th>Jenis</th>
                                <th>Update</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kontrak as $k) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k['nama_kontrak']; ?></td>
                                    <td><?= $k['skema']; ?></td>
                                    <td><?= $k['lingkup']; ?></td>
                                    <td><?= $k['tanggal']; ?></td>
                                    <td><?= $k['jenis']; ?></td>
                                    <td><?= time_ago($k['dibuat']); ?></td>
                                    <td><?= $k['nama']; ?></td>
                                    <td>
                                        <a class="" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?= base_url('assets/file/kontrak/' . $k['file']) ?>" target="_blank"><i class=" fa fa-download"></i> Download File</a>
                                            <a class="dropdown-item" href="<?= base_url('kontrak/ubah/' . $k['id_kontrak']) ?>"><i class="fa fa-pencil-alt"></i> Ubah File</a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-danger" id="button-hapus" href="<?= base_url('kontrak/hapus/' . $k['id_kontrak']) ?>"><i class="fa fa-trash-alt text-danger"></i> Delete File</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>