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
                        <button type="button" data-toggle="modal" data-target="#tambah_distributor" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-business-time fa-w-20"></i>
                            </span>
                            Tambah Distributor
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Distributor</h5>
                        <p><?php echo $this->session->flashdata('pesan'); ?></p>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Nama Distributor</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal Bergabung</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($distributor as $u) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?= $u->nama_perusahaan ?></td>
                                        <td><?= $u->nama_distributor ?></td>
                                        <td><?= $u->no_telp_distributor ?></td>
                                        <td><?= date('d-m-Y', strtotime($u->date_created)); ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>pegawai/hapus_distributor/<?= $u->id_distributor ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin untuk menghapus?')"></i></a>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_modal<?= $u->id_distributor ?>"><i class="fas fa-edit"></i></button>
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
<div class="modal fade" id="tambah_distributor" tabindex="-1" role="dialog" aria-labelledby="tambah_distributor" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_distributor">Tambah Distributor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>pegawai/tambah_distributor" method="post">
                    <div class="form-group">
                        <label class="form-control-label" for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="nama_distributor">Nama Distributor</label>
                        <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">Pilih Status</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-danger">reset</button>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
<!--End Modal Tambah -->
<!-- Modal Update Data -->
<?php foreach ($distributor as $u) { ?>
    <div class="modal fade" id="update_modal<?= $u->id_distributor ?>" tabindex="-1" role="dialog" aria-labelledby="update_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update_modal">Update Distributor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>pegawai/update_distributor" method="post">
                        <input type="hidden" class="form-control" id="id_distributor" name="id_distributor" value="<?= $u->id_distributor ?>">
                        <div class="form-group">
                            <label class="form-control-label" for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $u->nama_perusahaan ?>" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="nama_distributor">Nama Distributor</label>
                            <input type="text" class="form-control" id="nama_distributor" name="nama_distributor" value="<?= $u->nama_distributor ?>" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="nomor_telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= $u->no_telp_distributor ?>" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option <?php if ($u->status_distributor == "1") {
                                            echo "selected='selected'";
                                        }
                                        echo $u->status_distributor; ?> value="1">Tersedia</option>
                                <option <?php if ($u->status_distributor == "0") {
                                            echo "selected='selected'";
                                        }
                                        echo $u->status_distributor; ?> value="0">Tidak Tersedia</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">reset</button>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Tambah Data</button>
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