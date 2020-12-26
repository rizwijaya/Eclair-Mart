<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
                <ul class="nav">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
            <div class="app-footer-right">
                <ul class="nav">
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
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
                <h5 class="modal-title" id="tambah_barang">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-control-label" for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="">Pilih Status</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="type">Distributor</label>
                                <select class="form-control" id="kode_type" name="kode_type" required="">
                                    <option value="">Pilih Distributor</option>
                                    <!-- <?php foreach ($data['type'] as $tp) : ?>
                                        <option value="<?= $tp['kode_type'] ?>"><?= $tp['nama_type'] ?></option>
                                    <?php endforeach; ?> -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="type">Kategori Barang</label>
                                <select class="form-control" id="kode_type" name="kode_type" required="">
                                    <option value="">Pilih Kategori Barang</option>
                                    <!-- <?php foreach ($data['type'] as $tp) : ?>
                                        <option value="<?= $tp['kode_type'] ?>"><?= $tp['nama_type'] ?></option>
                                    <?php endforeach; ?> -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <label>Upload Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input form-control" id="gambar" name="gambar" required="">
                        <label class="custom-file-label" for="gambar">Pilih File</label>
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
</body>

</html>