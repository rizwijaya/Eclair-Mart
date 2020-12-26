<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eclair - Mart</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets_home/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Lightbox-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets_home/vendor/lightbox2/css/lightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets_home/vendor/nouislider/nouislider.min.css">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets_home/vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets_home/vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets_home/vendor/owl.carousel2/assets/owl.theme.default.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets_home/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/assets_home/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/assets_home/img/logo.svg">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Transaksi Penjualan</h5>
                            <table class="mb-0 table table-striped">
                                <thead>
                                    <tr>
                                        <th>No Transaksi</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Kode Pos</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($laporan as $u) {
                                    ?>
                                        <tr>
                                            <th scope="row">#0938<?= $u->id_transaksi; ?></th>
                                            <td><?= $u->nama ?></td>
                                            <td><?= $u->email ?></td>
                                            <td><?= $u->no_telp_pelanggan ?></td>
                                            <td><?= date('d/m/Y', strtotime($u->tanggal_bayar)) ?></td>
                                            <td><?= $u->kode_pos_pelanggan ?></td>
                                            <td><?= $u->alamat_pelanggan ?>, Kota <?= $u->kota_pelanggan ?>, <?= $u->negara_pelanggan ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/assets/assets_admin/assets/scripts/main.js"></script>
    </div>
</body>

</html>