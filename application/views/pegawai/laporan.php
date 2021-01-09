<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <img class="img-fluid w-100" src="<?php echo base_url(); ?>/assets/assets_admin/assets/images/logo.svg">
                    </div>
                    <div><strong>Eclair-Mart</strong>
                        <div class="page-title-subheading">Eclair Mart adalah toko serba guna yang menyediakan berbagai kebutuhan anda.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">
                        <a href="<?php echo base_url(); ?>pegawai/cetaklaporan" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-print fa-w-20"></i>
                            </span>
                            Cetak Laporan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Transaksi Penjualan</h5>
                        <p><?php echo $this->session->flashdata('pesan'); ?></p>
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
                                    <th>Detail Barang</th>
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
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail_modal<?= $u->id_transaksi; ?>"><i>Detail</i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 2
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <div class="badge badge-success mr-1 ml-0">
                                    <small>NEW</small>
                                </div>
                                Footer Link 4
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<!-- Modal Detail Data -->
<?php foreach ($transaksi as $u) : ?>
    <div class="modal fade" id="detail_modal<?= $u->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="detail_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail_modal"><strong>Detail Data Barang</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <!-- <div class="col-md-6">
                            <img class="card-img-top" height="320px" src="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>" alt="Barang">
                        </div> -->
                        <div class="">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nomor transaksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $u->id_transaksi; ?></li>
                                <li class="list-group-item">Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->nama; ?></li>
                                <li class="list-group-item">Alamat Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->email; ?></li>
                                <li class="list-group-item">Nomor Telepon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->no_telp_pelanggan; ?> </li>
                                <li class="list-group-item">Alamat Pengiriman&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->alamat_pelanggan; ?> </li>
                                <li class="list-group-item">Tanggal Pembelian&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->tanggal_bayar; ?> </li>
                                <li class="list-group-item">Total Pembayaran&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;Rp. <?php echo $u->total_bayar; ?> </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php endforeach; ?>
<!--End Detail Modal Update -->
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/assets_admin/assets/scripts/main.js"></script>
</body>

</html>