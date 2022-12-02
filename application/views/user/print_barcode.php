<!DOCTYPE html>
<html>

<head>
    <title>Sarbi V-Legal</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logo_besar.png') ?>">
    <style type="text/css">
        @page {
            width: 5cm;
            height: 5cm;
            margin: 0px;
        }
    </style>
</head>

<body>
    <center>
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr align="center">
                    <td></td>
                </tr>
                <tr align="center">
                    <td>
                        <img src="<?= base_url('assets/images/qr-code/') . $this->session->userdata('id_user'); ?>.png" alt="">
                    </td>
                </tr>
                <tr align="center">
                    <td><?= $query['nama']; ?> (<?= $query['role']; ?>)</td>
                </tr>
            </tbody>
        </table>
    </center>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>