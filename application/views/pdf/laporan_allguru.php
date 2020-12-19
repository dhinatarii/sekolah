<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en" class="notranslate" translate="no">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google" content="notranslate">

    <!-- Icon web -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url() ?>assets/favicon/manifest.json">
    <link rel="mask-icon" href="<?= base_url() ?>assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Main styles for this application-->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- coreui chartjs -->
    <link href="<?= base_url() ?>assets/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendors/jquery/jquery.min.js"></script>

    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendors/jquery-easing/jquery.easing.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <title>Laporan Daftar Guru</title>
</head>

<body style="background-color: white; color: black;">
    <img src="<?= base_url('assets/img/logo.jpg') ?>" style="position: absolute; width: 110px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold; font-size: 28px; color: black;">SD MUHAMMDIYAH TRINI</span>
                <br>TRINI 005/016, TRIHANGGO, GAMPING, SLEMAN
                <br>Telepon : (0274) 292 00 66
                <br>E-mail : sdmuh_trini@yahoo.com Website : www.sdmuhtrini.webs.com
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <p align="center">
        <span style="font-size: 20px">LAPORAN DATA GURU</span>
        <br>
        <b>Tahun Ajaran 2020/2021</b>
    </p>
    <table class="table table-bordered" id="table-laporanguru">
        <thead>
            <tr>
                <th width="15px" class="text-center">No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th width="20px" class="text-center">L/P</th>
                <th>Tanggal Lahir</th>
                <th>Jabatan</th>
                <th>Kelas Mengajar</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value) :  ?>
                <?php
                $map_kelas = explode(',', $value->kelas);
                $uniqe_kelas = array_unique($map_kelas);
                sort($uniqe_kelas);
                $new_kelas = implode(', ', $uniqe_kelas);
                ?>
                <tr>
                    <td widtd="20px"><?= ++$key ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->nip ?></td>
                    <td><?= $value->jenis_kelamin == 'Perempuan' ? 'P' : 'L' ?></td>
                    <td><?= $value->tanggal_lahir ?></td>
                    <td><?= $value->jabatan ?></td>
                    <td><?= $new_kelas ?></td>
                    <td><?= $value->alamat ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url() ?>assets/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/@coreui/icons/js/svgxuse.min.js"></script>

    <!-- Plugins and scripts required by this view-->
    <!-- <script src="<?= base_url() ?>assets/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script> -->
    <script src="<?= base_url() ?>assets/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/main.js"></script> -->

    <!-- Datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/datatablesbs4.js"></script>

</body>

</html>