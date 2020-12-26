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
            <div class="col-md-3"></div>
            <div class="col-lg-6">
                <div class="main-card mb-5 card">
                    <div class="card-body">
                        <h5 class="card-title">Tambahkan Pegawai</h5>
                        <p><?php echo $this->session->flashdata('pesan'); ?></p>
                        <form action="<?php echo base_url(); ?>pemilik/tambahinpegawai" method="POST">
                            <div class="position-relative form-group">
                                <label for="email" class="">Email Pegawai</label>
                                <input name="email" id="email" placeholder="Masukan Email" type="email" class="form-control" required>
                                <?php echo form_error('email', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <label for="nama" class="">Nama Pegawai</label>
                                <input name="nama" id="nama" placeholder="Masukan Nama" type="text" class="form-control" required>
                                <?php echo form_error('nama', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <label for="alamat_pegawai" class="">Alamat Pegawai</label>
                                <input name="alamat_pegawai" id="alamat_pegawai" placeholder="Masukan Alamat Pegawai" type="text" class="form-control" required>
                                <?php echo form_error('alamat_pegawai', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
                            </div>
                            <div class="position-relative form-group">
                                <label for="no_telp_pegawai" class="">Nomor Telepon Pegawai</label>
                                <input name="no_telp_pegawai" id="no_telp_pegawai" placeholder="Masukan Nomor Telepon Pegawai" type="text" class="form-control" required>
                                <?php echo form_error('no_telp_pegawai', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for=password class="">Password</label>
                                        <input name="password" id=password placeholder="Masukan Password" type="password" class="form-control" required>
                                        <?php echo form_error('password', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for=confirm_password class="">Confirm Password</label>
                                        <input name="confirm_password" id=confirm_password placeholder="Masukan Password" type="password" class="form-control" required>
                                        <?php echo form_error('confirm_password', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="submit" style="width: 100%;" class="mt-2 btn btn-primary">Tambah Pegawai</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
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
</body>

</html>