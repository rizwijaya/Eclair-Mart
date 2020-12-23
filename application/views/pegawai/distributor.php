<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Daftar Distributor</h5>
                <table class="mb-0 table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Distributor</th>
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
                                <td><?= $u->nama_distributor ?></td>
                                <td><?= date('d-m-Y', strtotime($u->date_created)); ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin untuk menghapus?')"></i></a>
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