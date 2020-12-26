<?php foreach ($total_transaksi as $u) : ?>
    <!-- Form Modal Upload Bukti Bayar -->
    <div class="modal fade" id="update_modal<?= $u->id_transaksi; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Upload Bukti Pembayaran</h5>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>pelanggan/uploadbukti" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                        <div class="form-group">
                            <label class="form-control-label" for="no_transaksi">Nomor Transaksi</label>
                            <input type="text" class="form-control" value="#0938<?= $u->id_transaksi; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="merk">Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?= $u->nama; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="tahun">Total Pembayaran</label>
                            <input type="text" class="form-control" value="Rp. <?php echo number_format($u->total_bayar, 0, ',', '.'); ?>" disabled>
                        </div>
                        <label class="form-control-label">Upload Bukti Pembayaran</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="bukti_pembayaran" name="bukti_pembayaran">
                                <label class="custom-file-label" for="gambar" aria-describedby="inputGroupFileAddon02">Pilih file (maks 2mb, jpg/jpeg/png/pdf)</label>
                            </div>
                        </div>
                        <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-secondary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Modal Upload Bukti Bayar -->
    <div class="container">
        <section class="py-5">
            <h2 class="h5 text-uppercase mb-4">Invoice Eclair Mart</h2>
            <div class="row mb-4">
                <div class="col-lg-8 mb-lg-0  bg-light">
                    <!-- CART TABLE-->
                    <div class="table-responsive">
                        <span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan') ?></span>
                        <table class="table">
                            <tbody>
                                <br>
                                <tr>
                                    <td class="border-0">
                                        <strong>Nomor Transaksi</strong>
                                    </td>
                                    <td class="border-0">
                                        <strong>:</strong>
                                    </td>
                                    <td class="border-0">
                                        <strong class="text-primary">#0938<?= $u->id_transaksi; ?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Nama Lengkap</strong>
                                    </td>
                                    <td>
                                        <p>:</p>
                                    </td>
                                    <td>
                                        <span><?= $u->nama; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-0">
                                        <strong>Alamat Email</strong>
                                    </td>
                                    <td class="border-0">
                                        <p>:</p>
                                    </td>
                                    <td class="border-0">
                                        <span><?= $u->email; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-0">
                                        <strong>Nomor Telepon</strong>
                                    </td>
                                    <td class="border-0">
                                        <p>:</p>
                                    </td>
                                    <td class="border-0">
                                        <span><?= $u->no_telp_pelanggan; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-0">
                                        <strong>Alamat Pengiriman</strong>
                                    </td>
                                    <td class="border-0">
                                        <p>:</p>
                                    </td>
                                    <td class="border-0">
                                        <span><?= $u->alamat_pelanggan; ?>, Kota <?= $u->kota_pelanggan; ?>, <?= $u->negara_pelanggan; ?> (<?= $u->kode_pos_pelanggan; ?>)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-0">
                                        <strong>Tanggal Pembelian</strong>
                                    </td>
                                    <td class="border-0">
                                        <p>:</p>
                                    </td>
                                    <td class="border-0">
                                        <span><?= date('d/m/Y', strtotime($u->tanggal_bayar)) ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-0">
                                        <strong>Total Pembayaran</strong>
                                    </td>
                                    <td class="border-0">
                                        <p>:</p>
                                    </td>
                                    <td class="border-0">
                                        <span>Rp. <?php echo number_format($u->total_bayar, 0, ',', '.'); ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ORDER TOTAL-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Informasi Pembayaran</h5>
                            <ul class="list-unstyled mb-0">
                                <p>Silahkan melakukan pembayaran melalui Nomor Rekening dibawah:</p>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mt-4"><strong class="text-uppercase small font-weight-bold">Bank Mandiri: </strong><span class="text-muted small">3242323232322</span></li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mt-4"><strong class="text-uppercase small font-weight-bold">Bank BRI: </strong><span class="text-muted small">3242323232322</span></li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mt-4"><strong class="text-uppercase small font-weight-bold">OVO/GOPAY: </strong><span class="text-muted small">0856786543465</span></li>
                                <li class="mt-5">
                                    <div class="form-group">
                                        <?php if ($u->status_bayar == 0) { ?>
                                            <button class="btn btn-dark btn-sm btn-block" type="button" data-toggle="modal" data-target="#update_modal<?= $u->id_transaksi; ?>"></i>Upload Bukti Pembayaran</button>
                                        <?php } elseif ($u->status_bayar == 1) { ?>
                                            <button type="button" class="btn btn-warning btn-sm btn-block"><i><i class="fa fa-clock"></i></i> Menunggu Konfirmasi</button>
                                        <?php } elseif ($u->status_bayar == 3) { ?>
                                            <button type="button" class="btn btn-success btn-sm btn-block"><i><i class="fa fa-check"></i></i> Pembayaran berhasil</button>
                                        <?php } elseif ($u->status_bayar == 2) { ?>
                                            <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#update_modal<?= $u->id_transaksi; ?>">Upload Ulang Pembayaran</button>
                                        <?php } elseif ($u->status_bayar == 4) { ?>
                                            <button type="button" class="btn btn-warning btn-sm btn-block"><i><i class="fas fa-dolly-flatbed mr-1"></i></i> Sedang Dikemas</button>
                                        <?php } elseif ($u->status_bayar == 5) { ?>
                                            <button type="button" class="btn btn-warning btn-sm btn-block"><i><i class="far fa-paper-plane"></i></i> Proses Pengiriman</button>
                                        <?php } elseif ($u->status_bayar == 6) { ?>
                                            <button type="button" class="btn btn-success btn-sm btn-block"><i><i class="fa fa-check"></i></i> Barang Diterima</button>
                                        <?php } ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h5 text-uppercase mb-4">Detail Barang</h2>
                    <div class="table-rensponsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Produk</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Harga Satuan</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Jumlah</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total Harga</strong></th>
                                    <th class="border-0" scope="col"> </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($barang_detail as $brg) : ?>
                                    <tr>
                                        <th class="pl-0 border-0" scope="row">
                                            <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="<?php echo base_url(); ?>pelanggan/detail_barang/<?php echo $brg->id_barang ?>"><img src="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $brg->photo_barang ?>" alt="..." width="70"></a>
                                                <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="<?php echo base_url(); ?>pelanggan/detail_barang/<?php echo $brg->id_barang ?>"><?= $brg->nama_barang  ?></a></strong></div>
                                            </div>
                                        </th>
                                        <td class="align-middle border-0">
                                            <p class="mb-0 small">Rp. <?php echo number_format($brg->harga, 0, ',', '.'); ?></p>
                                        </td>
                                        <td class="align-middle border-0">
                                            <p class="mb-0 small"><?= $brg->jumlah  ?></p>
                                        </td>
                                        <td class="align-middle border-0">
                                            <p class="mb-0 small"> Rp. <?php echo number_format($brg->total_harga, 0, ',', '.'); ?></p>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- CART NAV-->
                    <div class="bg-light px-4 py-3">
                        <div class="row align-items-center text-center">
                            <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="<?php echo base_url(); ?>pelanggan/histori"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Histori Transaksi</a></div>
                            <!-- <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="#">Cetak Invoice<i class="fa fa-print ml-2"></i></a></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endforeach; ?>