<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Histori</h1>
                </div>
                <div class="col-lg-6 text-lg-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Histori</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <h2 class="h5 text-uppercase mb-4">Histori Transaksi</h2>
        <div class="row">
            <div class="col-lg-12 mb-4 mb-lg-0">
                <!-- CART TABLE-->
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Nomor Transaksi</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total Pembayaran</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Status</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tanggal Pembelian</strong></th>
                                <th class="border-0" scope="col">Kelola</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($histori as $u) : ?>
                                <tr>
                                    <th class="align-middle border-0">
                                        <p class="mb-0 small">#0938<?= $u->id_transaksi; ?></p>
                                    </th>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small">Rp. <?php echo number_format($u->total_bayar, 0, ',', '.'); ?></p>
                                    </td>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small"><?php 
                                            if($u->status_bayar == 0) {
                                                echo 'Belum dibayar';
                                            } elseif($u->status_bayar == 1) {
                                                echo 'Menunggu Konfirmasi';
                                            } elseif($u->status_bayar == 2) {
                                                echo 'Pembayaran Ditolak';
                                            } elseif($u->status_bayar == 3) {
                                                echo 'Pembayaran Berhasil';
                                            } elseif($u->status_bayar == 4) {
                                                echo 'Sedang Dikemas';
                                            }  elseif($u->status_bayar == 5) {
                                                echo 'Proses Pengiriman';
                                            } elseif($u->status_bayar == 6) {
                                                echo 'Selesai';
                                            } else{
                                                echo '-';
                                            }
                                        ?></p>
                                    </td>
                                    <td class="align-middle border-0">
                                        <p class="mb-0 small"><?= date('d/m/Y', strtotime($u->tanggal_bayar)) ?></p>
                                    </td>
                                    <td class="align-middle border-0"><a class="btn btn-sm btn-warning" href="<?php echo base_url(); ?>pelanggan/invoice/<?php echo $u->id_transaksi ?>">Detail</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>