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
                        <button type="button" data-toggle="modal" data-target="#tambah_barang" class="btn-shadow btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-business-time fa-w-20"></i>
                            </span>
                            Tambah Barang
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Barang</h5>
                        <p><?php echo $this->session->flashdata('pesan'); ?></p>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photo</th>
                                    <th>Nama Barang</th>
                                    <th>Distributor</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Kelola</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($barang as $u) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><img width="50px" src="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>"></td>
                                        <td><?= $u->nama_barang ?></td>
                                        <td><?= $u->nama_perusahaan ?></td>
                                        <td><?= $u->jumlah ?></td>
                                        <td>Rp. <?php echo number_format($u->harga, 0, ',', '.'); ?></td>
                                        <td><?php if ($u->status_barang == 0) { ?>
                                                Tidak Tersedia
                                            <?php } else { ?>
                                                Tersedia
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail_modal<?= $u->id_barang ?>"><i class="fas fa-eye"></i></button>
                                            <a href="<?php echo base_url(); ?>barang/hapus/<?= $u->id_barang ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin untuk menghapus?')"></i></a>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_modal<?= $u->id_barang ?>"><i class="fas fa-edit"></i></button>
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
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="tambah_barang" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_barang"><strong>Tambah Barang</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>barang/tambah_barang" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-control-label" for="nama_barang"><strong>Nama Barang</strong></label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="harga"><strong>Harga Barang</strong></label>
                        <input type="number" class="form-control" id="harga" name="harga" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="jumlah"><strong>Jumlah Barang</strong></label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="status"><strong>Status Barang</strong></label>
                        <select class="form-control" name="status" id="status">
                            <option value="">Pilih Status</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="distributor"><strong>Distributor</strong></label>
                                <select class="form-control" id="distributor" name="distributor" required="">
                                    <option value="">Pilih Distributor</option>
                                    <?php foreach ($distributor as $db) : ?>
                                        <option value="<?= $db->id_distributor ?>"><?= $db->nama_perusahaan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kategori"><strong>Kategori Barang</strong></label>
                                <select class="form-control" id="kategori" name="kategori" required="">
                                    <option value="">Pilih Kategori Barang</option>
                                    <?php foreach ($kategori as $kt) : ?>
                                        <option value="<?= $kt->id_kategori ?>"><?= $kt->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label><strong>Upload Gambar</strong></label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="gambar" name="gambar" required="">
                        <label class="custom-file-label" for="gambar">Pilih File</label>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="deskripsi"><strong>Deskripsi Barang</strong></label>
                        <textarea class="form-control" name="deskripsi" required="" id="deskripsi" placeholder="Deskripsi Singkat Barang (Maksimal 200 Kata) ... "></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="reset" class="btn btn-danger">reset</button>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!--End Modal Tambah -->
<!-- Modal Update Data -->
<?php foreach ($barang as $u) : ?>
    <div class="modal fade" id="update_modal<?= $u->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="update_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update_modal"><strong>Update Data Barang</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>barang/update_barang/<?php echo $u->id_barang ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="id_barang" name="id_barang" value="<?= $u->id_barang ?>">
                        <div class="form-group">
                            <label class="form-control-label" for="nama_barang"><strong>Nama Barang</strong></label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $u->nama_barang ?>" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="harga"><strong>Harga Barang</strong></label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $u->harga ?>" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="jumlah"><strong>Jumlah Barang</strong></label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $u->jumlah ?>" required="">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="status"><strong>Status Barang</strong></label>
                            <select class="form-control" name="status" id="status">
                                <option <?php if ($u->status_barang == "1") {
                                            echo "selected='selected'";
                                        }
                                        echo $u->status_barang; ?> value="1">Tersedia</option>
                                <option <?php if ($u->status_barang == "0") {
                                            echo "selected='selected'";
                                        }
                                        echo $u->status_barang; ?> value="0">Tidak Tersedia</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="distributor"><strong>Distributor</strong></label>
                                    <select class="form-control" id="distributor" name="distributor" required="">
                                        <option value="<?= $u->id_distributor ?>"><?= $u->nama_perusahaan ?></option>
                                        <?php foreach ($distributor as $db) : ?>
                                            <option value="<?= $db->id_distributor ?>"><?= $db->nama_perusahaan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="kategori"><strong>Kategori Barang</strong></label>
                                    <select class="form-control" id="kategori" name="kategori" required="">
                                        <option value="<?= $u->id_kategori ?>"><?= $u->nama_kategori ?></option>
                                        <?php foreach ($kategori as $kt) : ?>
                                            <option value="<?= $kt->id_kategori ?>"><?= $kt->nama_kategori ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label>Upload Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Pilih File</label>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="deskripsi"><strong>Deskripsi Barang</strong></label>
                            <textarea class="form-control" name="deskripsi" required="" id="deskripsi" placeholder="Deskripsi Singkat Barang (Maksimal 200 Kata) ... "><?= $u->deskripsi_barang ?></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="reset" class="btn btn-danger">reset</button>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Perbarui Data</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
<?php endforeach; ?>
<!--End Modal Update -->

<!-- Modal Detail Data -->
<?php foreach ($barang as $u) : ?>
    <div class="modal fade" id="detail_modal<?= $u->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="detail_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail_modal"><strong>Detail Data Barang</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="card-img-top" height="320px" src="<?php echo base_url(); ?>assets/assets_barang/image/<?php echo $u->photo_barang ?>" alt="Barang">
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nomor Barang&nbsp;&nbsp;:&nbsp;&nbsp;0172<?php echo $u->id_barang; ?></li>
                                <li class="list-group-item">Nama Barang&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->nama_barang; ?></li>
                                <li class="list-group-item">Harga Barang&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;Rp. <?php echo number_format($u->harga, 0, ',', '.'); ?></li>
                                <li class="list-group-item">Jumlah Barang&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->jumlah; ?> Buah</li>
                                <li class="list-group-item">Status Barang&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php if ($u->status_barang == '1') {
                                                                                                                    echo 'Tersedia';
                                                                                                                } else {
                                                                                                                    echo 'Tidak Tersedia';
                                                                                                                } ?></li>
                                <li class="list-group-item">Produsen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->nama_perusahaan; ?></li>
                                <li class="list-group-item">Distributor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $u->nama_distributor; ?> (<?php echo $u->no_telp_distributor; ?>)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-5">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong> Deskripsi Barang : </strong><br>&nbsp;&nbsp;&nbsp;<?php echo $u->deskripsi_barang; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>
<!--End Detail Modal Update -->
</div>
</body>

</html>