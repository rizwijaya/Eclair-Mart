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
                        <button type="button" data-toggle="modal" data-target="#tambah_kategori" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-business-time fa-w-20"></i>
                            </span>
                            Tambah Kategori
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Kategori Barang</h5>
                        <p><?php echo $this->session->flashdata('pesan'); ?></p>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kategori as $u) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?= $u->kode_kategori ?></td>
                                        <td><?= $u->nama_kategori ?></td>
                                        <td><?= date('d-m-Y', strtotime($u->date_created)); ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>pegawai/hapus_kategori/<?= $u->id_kategori ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin untuk menghapus?')"></i></a>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_modal<?= $u->id_kategori ?>"><i class="fas fa-edit"></i></button>
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
<!-- Modal Tambah Data -->
<div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="tambah_kategori" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_kategori">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>pegawai/tambah_kategori" method="post">
                    <div class="form-group">
                        <label class="form-control-label" for="kode_kategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
<!--End Modal Tambah -->
<!-- Modal Update Data -->
<?php foreach ($kategori as $u) { ?>
<div class="modal fade" id="update_modal<?= $u->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="update_modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="update_modal">Update Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>pegawai/update_kategori" method="post">
                <input type="hidden" class="form-control" id="id_kategori" name="id_kategori" value="<?= $u->id_kategori ?>">
                    <div class="form-group">
                        <label class="form-control-label" for="kode_kategori">Kode Kategori</label>
                        <input type="text" class="form-control" id="kode_kategori" name="kode_kategori"  value="<?= $u->kode_kategori ?>" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"  value="<?= $u->nama_kategori ?>" required="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Perbarui Data</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
<?php } ?>
<!--End Modal Update -->
</body>

</html>