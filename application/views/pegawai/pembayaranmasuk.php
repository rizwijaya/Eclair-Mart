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
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Pembayaran Masuk</h5>
                        <p><?php echo $this->session->flashdata('pesan'); ?></p>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>No Transaksi</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Total Bayar</th>
                                    <th>Invoice</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pembayaran as $u) {
                                ?>
                                    <tr>
                                        <th scope="row">#0938<?= $u->id_transaksi; ?></th>
                                        <td><?= $u->nama ?></td>
                                        <td><?= $u->email ?></td>
                                        <td><?= date('d/m/Y', strtotime($u->tanggal_bayar)) ?></td>
                                        <td>Rp. <?php echo number_format($u->total_bayar, 0, ',', '.'); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_modal<?= $u->id_transaksi; ?>"><i>Invoice</i></button>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success mr-2" href="<?php echo base_url(); ?>/pegawai/terimabukti/<?= $u->id_transaksi; ?>"><i class='fas fa-check' onclick="return confirm('Apakah anda yakin untuk menerima Transaksi?')"></i></a>
                                            <a class="btn btn-sm btn-danger" href="<?php echo base_url(); ?>/pegawai/tolakbukti/<?= $u->id_transaksi; ?>"><i class='fas fa-times' onclick="return confirm('Apakah anda yakin untuk membatalkan Transaksi?')"></i></a>
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
<?php foreach ($pembayaran as $u) : ?>
<div class="modal fade" id="update_modal<?= $u->id_transaksi; ?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img width="100%" height="100%" src="<?php echo base_url(); ?>assets/assets_bukti_bayar/<?php echo $u->bukti_bayar; ?>">
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
</body>

</html>