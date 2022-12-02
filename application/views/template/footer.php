<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            © 2022 • PORTAL SIC
        </div>
        <div class="float-end">
            <p>Dibuat oleh <a href="https://sarbisertifikasi.com/" target="_blank">PT Sarbi International Certification</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url() ?>/assets/login/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
<script src="<?= base_url() ?>/assets/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/extensions/toastify-js/src/toastify.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/toastify.js') ?>"></script>
<script src="<?= base_url('assets/extensions/datatable/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/extensions/datatable/datepicker@1.2.0/datepicker-full.min.js') ?>"></script>
<script src="<?= base_url('assets/extensions/apexcharts/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/dashboard.js') ?>"></script>

<script>
    $(document).ready(function() {
        var table = $('#table1').DataTable({
            "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                },
                {
                    "bSearchable": false,
                    "aTargets": [0]
                }
            ],
            // "ordering": false,
            // responsive: true,
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#table1_wrapper .col-md-6:eq(0)');
    });
</script>


<script>
    $(document).ready(function() {
        var table = $('#table_legalitas').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 4])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#table_legalitas_wrapper .col-md-6:eq(0)');
    });
</script>


<script>
    $(document).ready(function() {
        var table = $('#table_laporan').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, 6])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#table_laporan_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#tagihan').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, 5, 8])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#tagihan_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#table_rab').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, 5, 7])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#table_rab_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#table_sistem').DataTable({

            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([3, 4, 6])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#table_sistem_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#proses').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, ])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#proses_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#sublisensi').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, ])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#sublisensi_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#kdb').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, ])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#kdb_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#u_balik').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, ])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#u_balik_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#penilaian').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, ])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#penilaian_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#kuisioner').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, ])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#kuisioner_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#treviewer').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, ])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {
                    "first": "«",
                    "last": "»",
                    "next": "›",
                    "previous": "‹"
                },
            }
        });

        table.buttons().container()
            .appendTo('#treviewer_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(document).ready(function() {
        var table = $('#tpk').DataTable({
            buttons: ['copy', 'csv', 'print', 'excel'],
            dom: "<'row pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row py-3'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            initComplete: function() {
                this.api()
                    .columns([2, 3, 4, ])
                    .every(function() {
                        var column = this;
                        var select = $('<select class="form-control"><option value="">--Pilih--</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
            "language": {
                "lengthMenu": "_MENU_ baris perhalaman",
                "search": "Cari:",
                "zeroRecords": "Belum Ada Data",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data Masih Kosong",
                "infoFiltered": "(Disaring dari _MAX_ total data)",
                "paginate": {

                    "first": "«",

                    "last": "»",

                    "next": "›",

                    "previous": "‹"

                },

            }
        });

        table.buttons().container()
            .appendTo('#tpk_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
    $(function() {
        let elem = document.querySelectorAll('#tanggal');
        if (elem.length > 0) {
            elem.forEach(function(i) {
                let datepicker = new Datepicker(i, {
                    buttonClass: 'btn',
                    format: 'yyyy-mm-dd',
                });
            })
        }
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.pilih').each(function() {
                    this.checked = true;
                    $('#select_all').prop('checked', true);
                })
            } else {
                $('.pilih').each(function() {
                    this.checked = false;
                    $('#select_all').prop('checked', false);
                });
            }
        })
    });

    function delete_all() {
        if ($('#pilih:checked').length == 0) {
            Swal.fire({
                icon: 'error',
                title: "Tidak ada yang dipilih"
            })
        } else {
            Swal.fire({
                title: 'Data akan di hapus?',
                text: "Ingin menghapus data yang dipilih dengan checkbox?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-deleteAll').submit();
                }
            })

        }
    }
</script>
<script>
    $(document).on('click', '#button-hapus', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Data akan di hapus?',
            text: "Apakah anda ingin menghapus data yang dipilih",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })


    $(document).on('click', '#logout', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        Swal.fire({
            title: 'Logout?',
            text: "Apakah anda ingin Keluar??",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya, Saya ingin logout'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })


    if ($('.flash-data').data('flashdata')) {
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            Toastify({
                text: flashData,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast()
        }
    } else {
        const flashData = $('.notif').data('notif');
        if (flashData) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: flashData,
            })
        }
    }
</script>

<script>
    var optionsProfileVisit = {
        annotations: {
            position: "back",
        },
        dataLabels: {
            enabled: false,
        },
        chart: {
            type: "bar",
            height: 400,
        },
        fill: {
            opacity: 1,
        },
        plotOptions: {},
        series: [{
            name: "Data",
            data: [<?= $legalitas; ?>, <?= $sistem_mutu; ?>, <?= $template_form; ?>, <?= $rab; ?>, <?= $kontrak; ?>, <?= $tagihan; ?>, <?= $l_pendahuluan; ?>, <?= $l_akhir; ?>],
        }, ],
        colors: "#435ebe",
        xaxis: {
            categories: [
                "Legalitas",
                "Sistem Mutu",
                "Template Form",
                "RAB",
                "Kontrak",
                "Tagihan",
                "Laporan Pendahuluan",
                "Laporan Akhir"
            ],
        },
    }
    let optionsVisitorsProfile = {
        series: [70, 30],
        labels: ["Male", "Female"],
        colors: ["#435ebe", "#55c6e8"],
        chart: {
            type: "donut",
            width: "100%",
            height: "350px",
        },
        legend: {
            position: "bottom",
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "30%",
                },
            },
        },
    }

    var optionsEurope = {
        series: [{
            name: "series1",
            data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605],
        }, ],
        chart: {
            height: 80,
            type: "area",
            toolbar: {
                show: false,
            },
        },
        colors: ["#5350e9"],
        stroke: {
            width: 2,
        },
        grid: {
            show: false,
        },
        dataLabels: {
            enabled: false,
        },
        xaxis: {
            type: "datetime",
            categories: [
                "2018-09-19T00:00:00.000Z",
                "2018-09-19T01:30:00.000Z",
                "2018-09-19T02:30:00.000Z",
                "2018-09-19T03:30:00.000Z",
                "2018-09-19T04:30:00.000Z",
                "2018-09-19T05:30:00.000Z",
                "2018-09-19T06:30:00.000Z",
                "2018-09-19T07:30:00.000Z",
                "2018-09-19T08:30:00.000Z",
                "2018-09-19T09:30:00.000Z",
                "2018-09-19T10:30:00.000Z",
                "2018-09-19T11:30:00.000Z",
            ],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
            },
        },
        show: false,
        yaxis: {
            labels: {
                show: false,
            },
        },
        tooltip: {
            x: {
                format: "dd/MM/yy HH:mm",
            },
        },
    }

    let optionsAmerica = {
        ...optionsEurope,
        colors: ["#008b75"],
    }
    let optionsIndonesia = {
        ...optionsEurope,
        colors: ["#dc3545"],
    }

    var chartProfileVisit = new ApexCharts(
        document.querySelector("#chart-profile-visit"),
        optionsProfileVisit
    )
    var chartVisitorsProfile = new ApexCharts(
        document.getElementById("chart-visitors-profile"),
        optionsVisitorsProfile
    )
    var chartEurope = new ApexCharts(
        document.querySelector("#chart-europe"),
        optionsEurope
    )
    var chartAmerica = new ApexCharts(
        document.querySelector("#chart-america"),
        optionsAmerica
    )
    var chartIndonesia = new ApexCharts(
        document.querySelector("#chart-indonesia"),
        optionsIndonesia
    )

    chartIndonesia.render()
    chartAmerica.render()
    chartEurope.render()
    chartProfileVisit.render()
    chartVisitorsProfile.render()
</script>

</body>

</html>