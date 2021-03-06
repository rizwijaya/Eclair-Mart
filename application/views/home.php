<?php foreach ($barang as $u) : ?>
    <!--  Modal -->
    <div class="modal fade" id="productView<?php echo $u->id_barang ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row align-items-stretch">
                        <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>)" href="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
                        <div class="col-lg-6">
                            <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <div class="p-5 my-md-4">
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                </ul>
                                <h2 class="h4"><?php echo $u->nama_barang ?></h2>
                                <p class="text-muted">Rp. <?php echo number_format($u->harga, 0, ',', '.'); ?></p>
                                <p class="text-small mb-4"><?php echo $u->deskripsi_barang ?></p>
                                <div class="row align-items-stretch mb-4">
                                    <!-- <form action="<?php //echo base_url(); ?>pelanggan/tambahkeranjang/<?php //echo $u->id_barang ?>" method="POST"> -->
                                    <div class="col-sm-7 pr-sm-0">
                                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                            <div class="quantity">
                                                <div class="dec-btn p-0"><i class="fas fa-caret-left"></i></div>
                                                <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                                <div class="inc-btn p-0"><i class="fas fa-caret-right"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 pl-sm-0"><button type="submit" name="submit" class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0">Add to cart</button></div>
                                    <!-- </form> -->
                                </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- HERO SECTION-->
<div class="container">
    <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(<?php echo base_url(); ?>/assets/assets_home/img/beauty.jpg)">
        <div class="container py-5">
            <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                    <p class="text-muted small text-uppercase mb-2">Inspirasi Minimarket 2020</p>
                    <a class="btn btn-dark" href="shop.html">Cari Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <!-- CATEGORIES SECTION-->
    <section class="pt-5">
        <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Kategori Barang yang kami Jual</p>
            <h2 class="h5 text-uppercase mb-4">Cari Kategori Barang</h2>
        </header>
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href="shop.html"><img class="img-fluid" src="<?php echo base_url(); ?>/assets/assets_home/img/cat-img-1.jpg" alt=""><strong class="category-item-title">Clothes</strong></a></div>
            <div class="col-md-4 mb-4 mb-md-0"><a class="category-item mb-4" href="shop.html"><img class="img-fluid" src="<?php echo base_url(); ?>/assets/assets_home/img/cat-img-2.jpg" alt=""><strong class="category-item-title">Shoes</strong></a><a class="category-item" href="shop.html"><img class="img-fluid" src="img/cat-img-3.jpg" alt=""><strong class="category-item-title">Watches</strong></a></div>
            <div class="col-md-4"><a class="category-item" href="shop.html"><img class="img-fluid" src="<?php echo base_url(); ?>/assets/assets_home/img/cat-img-4.jpg" alt=""><strong class="category-item-title">Electronics</strong></a></div>
        </div>
    </section>
    <!-- TRENDING PRODUCTS-->
    <section class="py-5">
        <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
        </header>
        <div class="row">
            <?php $i=0; foreach ($barang as $u) { ?>
                <!-- PRODUCT-->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product text-center">
                        <div class="position-relative mb-3">
                            <div class="badge text-white badge-primary"><?php $u->kode_kategori ?></div><a class="d-block" href="pelanggan/detail_barang/<?php echo $u->id_barang ?>"><img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>" alt="..."></a>
                            <div class="product-overlay">
                                <ul class="mb-0 list-inline">
                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                                    <?php if ($this->session->userdata('id_user')) { ?>
                                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="<?php echo base_url(); ?>pelanggan/tambahkeranjang/<?= $u->id_barang ?>">Add to cart</a></li>
                                                <!-- <?php //echo anchor('pelanggan/tambahkeranjang/'.$u->id_barang,'<li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark">Add to cart</button></li>')?> -->
                                                <?php } else { ?>
                                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="<?php echo base_url(); ?>home/login">Add to cart</a></li>
                                                <?php } ?>
                                    <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView<?php echo $u->id_barang ?>" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <h6> <a class="reset-anchor" href="detail.html"><?php echo $u->nama_barang ?></a></h6>
                        <p class="small text-muted">Rp. <?php echo number_format($u->harga, 0, ',', '.'); ?></p>
                    </div>
                </div>
            <?php  if (++$i == 8) break; } ?>
        </div>
    </section>
    <!-- SERVICES-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="d-inline-block">
                        <div class="media align-items-end">
                        <img width="60px" src="<?php echo base_url(); ?>assets/assets_home/icons/security.svg">
                            <div class="media-body text-left ml-3">
                                <h6 class="text-uppercase mb-1">Aman</h6>
                                <p class="text-small mb-0 text-muted">Bandingkan review untuk berbagai online shop terpercaya se-Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <div class="d-inline-block">
                        <div class="media align-items-end">
                            <img width="60px" src="<?php echo base_url(); ?>assets/assets_home/icons/ok.svg">
                            
                            <div class="media-body text-left ml-3">
                                <h6 class="text-uppercase mb-1">Mudah</h6>
                                <p class="text-small mb-0 text-muted">Dapatkan pengalaman belanja online yang lebih mudah!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-inline-block">
                        <div class="media align-items-end">
                        <img width="60px" src="<?php echo base_url(); ?>assets/assets_home/icons/diversify.svg">
                            <div class="media-body text-left ml-3">
                                <h6 class="text-uppercase mb-1">Beragam</h6>
                                <p class="text-small mb-0 text-muted">Dapatkan beragam barang yang Anda inginkan!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- NEWSLETTER-->
            </div>
        </div>
    </section>
</div>