<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Daftar Barang</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
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
                                <td><?= $u->jumlah ?></td>
                                <td>Rp. <?php echo number_format($u->harga, 0, ',', '.'); ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin untuk menghapus?')"></i></a>
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