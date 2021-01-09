<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <<div class="page-title-icon">
                        <img class="img-fluid w-100" src="<?php echo base_url(); ?>/assets/assets_admin/assets/images/logo.svg">
                </div>
                <div><strong>Eclair-Mart</strong>
                    <div class="page-title-subheading">Eclair Mart adalah toko serba guna yang menyediakan berbagai kebutuhan anda.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Transaksi Penjualan</h5>
                    <p><?php echo $this->session->flashdata('pesan'); ?></p>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr>
                                <th>No Transaksi</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Tanggal Pembelian</th>
                                <th>Kode Pos</th>
                                <th>Alamat</th>
                                <th>Detail Barang</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($transaksi as $u) {
                            ?>
                                <tr>
                                    <th scope="row">#0938<?= $u->id_transaksi; ?></th>
                                    <td><?= $u->nama ?></td>
                                    <td><?= $u->no_telp_pelanggan ?></td>
                                    <td><?= date('d/m/Y', strtotime($u->tanggal_bayar)) ?></td>
                                    <td><?= $u->kode_pos_pelanggan ?></td>
                                    <td><?= $u->alamat_pelanggan ?>, Kota <?= $u->kota_pelanggan ?>, <?= $u->negara_pelanggan ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail_modal<?= $u->id_transaksi; ?>"><i>Detail</i></button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#update_modal<?= $u->id_transaksi; ?>"><i>Update</i></button>
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
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/assets_admin/assets/scripts/main.js"></script>
<?php foreach ($transaksi as $u) : ?>
    <div class="modal fade" id="update_modal<?= $u->id_transaksi; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Perbarui Progress Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div aria-hidden="true">
                        <form action="<?php echo base_url(); ?>/pegawai/update_transaksi" method="post">
                            <input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" value="<?= $u->id_transaksi; ?>">
                            <div class="form-group">
                                <label class="form-control-label" for="nomor_transaksi">Nomor Transaksi</label>
                                <input type=" text" class="form-control" id="nomor_transaksi" name="nomor_transaksi" value="#0938<?= $u->id_transaksi; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama Lengkap</label>
                                <input type=" text" class="form-control" id="nama" name="nama" value="<?= $u->nama ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="tanggal_bayar">Tanggal Pembelian</label>
                                <input type=" text" class="form-control" id="tanggal_bayar" name="tanggal_bayar" value="<?= date('d/m/Y', strtotime($u->tanggal_bayar)) ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="status_bayar">Progres Sekarang</label>
                                <select class="form-control" name="status_bayar" id="status_bayar">
                                    <?php if ($u->status_bayar <= 3) { ?>
                                        <option <?php if ($u->status_bayar == 3) {
                                                    echo "selected='selected'";
                                                } ?> value="3">Pembayaran Berhasil</option>
                                    <?php }
                                    if ($u->status_bayar <= 4) { ?>
                                        <option <?php if ($u->status_bayar == 4) {
                                                    echo "selected='selected'";
                                                } ?> value="4">Sedang Dikemas</option>
                                    <?php }
                                    if ($u->status_bayar <= 5) { ?>
                                        <option <?php if ($u->status_bayar == 5) {
                                                    echo "selected='selected'";
                                                } ?> value="5">Proses Pengiriman</option>
                                    <?php }
                                    if ($u->status_bayar <= 6) { ?>
                                        <option <?php if ($u->status_bayar == 6) {
                                                    echo "selected='selected'";
                                                } ?> value="6">Selesai</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

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
</body>

</html>