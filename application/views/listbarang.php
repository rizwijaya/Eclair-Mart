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
                                    <div class="col-sm-7 pr-sm-0">
                                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                            <div class="quantity">
                                                <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                                <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                                <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                                </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Daftar Produk</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container p-0">
            <div class="row">
                <!-- SHOP SIDEBAR-->
                <div class="col-lg-3 order-2 order-lg-1">
                    <h5 class="text-uppercase mb-4">Filter</h5>
                    <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Kategori Produk</strong></div>
                    <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                    <li class="mb-2"><a class="reset-anchor" href="<?php echo base_url(); ?>pelanggan/list_barang/">Semua Produk</a></li>
                    <?php foreach ($kategori as $kt) : ?>
                        <li class="mb-2"><a class="reset-anchor" href="<?php echo base_url(); ?>pelanggan/filtercategory/<?= $kt->id_kategori ?>"><?= $kt->nama_kategori ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <!-- SHOP LISTING-->
                <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                    <div class="row mb-3 align-items-center">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <p class="text-small text-muted mb-0">Showing 1–12 of 53 results</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($barang as $u) : ?>
                            <!-- PRODUCT-->
                            <div class="col-lg-4 col-sm-6">
                                <div class="product text-center">
                                    <div class="mb-3 position-relative">
                                        <div class="badge text-white badge-"></div><a class="d-block" href="<?php echo base_url(); ?>pelanggan/detail_barang/<?php echo $u->id_barang ?>"><img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>" alt="..."></a>
                                        <div class="product-overlay"> 
                                            <ul class="mb-0 list-inline">
                                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                                                <?php if ($this->session->userdata('id_user')) { ?>
                                                <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="<?php echo base_url(); ?>pelanggan/tambahkeranjang/<?= $u->id_barang ?>/1">Add to cart</a></li>
                                                <!-- <?php //echo anchor('pelanggan/tambahkeranjang/'.$u->id_barang,'<li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark">Add to cart</button></li>')?> -->
                                                <?php } else { ?>
                                                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="<?php echo base_url(); ?>home/login">Add to cart</a></li>
                                                <?php } ?>
                                                <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView<?php echo $u->id_barang ?>" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6> <a class="reset-anchor" href="<?php echo base_url(); ?>pelanggan/detail_barang/<?php echo $u->id_barang ?>"><?php echo $u->nama_barang ?></a></h6>
                                    <p class="small text-muted">Rp. <?php echo number_format($u->harga, 0, ',', '.'); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>