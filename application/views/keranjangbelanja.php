<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Keranjang</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Keranjang Belanja</h2>
        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <!-- CART TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Produk</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Harga</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Jumlah</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total Harga</strong></th>
                                <th class="border-0" scope="col"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang as $u) : ?>
                                <tr>
                                    <th class="pl-0 border-0" scope="row">
                                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="<?php echo base_url(); ?>pelanggan/detail_barang/<?php echo $u->id_barang ?>"><img src="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>" alt="..." width="70"></a>
                                            <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="<?php echo base_url(); ?>pelanggan/detail_barang/<?php echo $u->id_barang ?>"><?= $u->nama_barang  ?></a></strong></div>
                                        </div>
                                    </th>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small">Rp. <?php echo number_format($u->harga, 0, ',', '.'); ?></p>
                                    </td>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small"><?= $u->jumlah  ?></p>
                                    </td>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small"> Rp. <?php echo number_format($u->total_harga, 0, ',', '.'); ?></p>
                                    </td>
                                    <td class="align-middle border-0"><a class="reset-anchor" href="<?php echo base_url(); ?>pelanggan/hapus_keranjang/<?php echo $u->id_keranjang ?>"><i class="fas fa-trash-alt small text-muted"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- CART NAV-->
                <div class="bg-light px-4 py-3">
                    <div class="row align-items-center text-center">
                        <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="<?php echo base_url(); ?>pelanggan/list_barang"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Lanjutkan Belanja</a></div>
                        <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="<?php echo base_url(); ?>pelanggan/checkout/<?= $this->session->userdata('id_user') ?>">Bayar Sekarang<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
                    </div>
                </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Total Pembayaran</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">Rp <?php 
                                $totalbelanja = $this->barang_model->totalbelanja($this->session->userdata('id_user'));
                                foreach($totalbelanja['0'] as $tot) {
                                echo number_format($tot, 0, ',', '.');
                                }
                                ?></span></li>
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>Rp <?php 
                                $totalbelanja = $this->barang_model->totalbelanja($this->session->userdata('id_user'));
                                foreach($totalbelanja['0'] as $tot) {
                                echo number_format($tot, 0, ',', '.');
                                }
                                ?></span></li>
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>