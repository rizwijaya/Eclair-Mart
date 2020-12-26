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
    <div class="page-holder">
        <!-- navbar-->
        <header class="header bg-white">
            <div class="container px-0 px-lg-3">
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="<?php echo base_url(); ?>home""><span class=" font-weight-bold text-uppercase text-dark">Eclair Mart</span></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link active" href="<?php echo base_url(); ?>home">Home</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#products">Shop</a>
                            </li> -->
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link" href="<?php echo base_url(); ?>pelanggan/list_barang">Daftar Produk</a>
                            </li>
                            <?php if ($this->session->userdata('id_user')) { ?>
                                <?php if ($this->session->userdata('id_grup') == 3) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url(); ?>pelanggan/histori">Histori Transaksi</a>
                                    </li>
                            <?php }
                            } ?>
                            <?php if ($this->session->userdata('id_grup') == 1) { ?>
                                <li class="nav-item">
                                    <!-- Link--><a class="nav-link" href="<?php echo base_url(); ?>pemilik">Pemilik</a>
                                </li>
                            <?php } elseif ($this->session->userdata('id_grup') == 2) { ?>
                                <li class="nav-item">
                                    <!-- Link--><a class="nav-link" href="<?php echo base_url(); ?>pegawai">Pegawai</a>
                                </li>
                            <?php } ?>
                            <!-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                            </li> -->
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" <?php if ($this->session->userdata('id_user')) { ?> href="<?php echo base_url(); ?>home/keranjangbelanja" <?php } else { ?> href="<?php echo base_url(); ?>home/login" <?php } ?>><i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Keranjang<small class="text-gray">(<?php
                                                                                                                                                                                                                                                                                                                                            $id = $this->session->userdata('id_user');
                                                                                                                                                                                                                                                                                                                                            if (!empty($id)) {
                                                                                                                                                                                                                                                                                                                                                $keranjang = $this->barang_model->jumlahkeranjang($id);
                                                                                                                                                                                                                                                                                                                                                foreach ($keranjang['0'] as $cetak) {
                                                                                                                                                                                                                                                                                                                                                    if ($cetak == NULL) {
                                                                                                                                                                                                                                                                                                                                                        echo '0';
                                                                                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                                                                                        echo $cetak;
                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                echo '0';
                                                                                                                                                                                                                                                                                                                                            } ?>)</small></a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li> -->
                            <?php if ($this->session->userdata('id_user')) { ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/logout"> <i class="fas fa-user-alt mr-1 text-gray"></i>Logout</a></li>
                            <?php } else { ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>home/login"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>