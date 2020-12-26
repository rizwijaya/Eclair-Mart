<div class="container">
  <!-- HERO SECTION-->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">Checkout</h1>
        </div>
        <div class="col-lg-6 text-lg-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home/keranjangbelanja">Keranjang</a></li>
              <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5">
    <!-- BILLING ADDRESS-->
    <h2 class="h5 text-uppercase mb-4">Lengkapi Pembayaran</h2>
    <div class="row">
      <div class="col-lg-8">
        <p><?php echo $this->session->flashdata('pesan'); ?></p>
        <?php foreach ($getprofile as $get) : ?>
        <form action="<?php echo base_url(); ?>pelanggan/proseslengkapi" method="POST">
          <div class="row">
            <input id="id_user" name="id_user" type="hidden" value="<?= $get->id_user; ?>">
            <div class="col-lg-12 form-group">
              <label class="text-small text-uppercase" for="nama">Nama Lengkap</label>
              <input class="form-control form-control-lg" id="nama" name="nama" type="text" readonly value="<?= $get->nama; ?>">
            </div>
            <div class="col-lg-12 form-group">
              <label class="text-small text-uppercase" for="email">Email</label>
              <input class="form-control form-control-lg" id="email" name="email" type="email" readonly value="<?= $get->email; ?>">
            </div>
            <div class="col-lg-12 form-group">
              <label class="text-small text-uppercase" for="alamat">Alamat</label>
              <input class="form-control form-control-lg" id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat Lengkap Anda">
              <?php echo form_error('alamat', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
            </div>
            <div class="col-lg-4 form-group">
              <label class="text-small text-uppercase" for="kode_pos">Kode Pos</label>
              <input class="form-control form-control-lg" id="kode_pos" name="kode_pos" type="text" placeholder="Contoh: 63187">
              <?php echo form_error('kode_pos', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
            </div>
            <div class="col-lg-4 form-group">
              <label class="text-small text-uppercase" for="kota">Kota</label>
              <input class="form-control form-control-lg" id="kota" name="kota" type="text" placeholder="Contoh: Surabaya">
              <?php echo form_error('kota', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
            </div>
            <div class="col-lg-4 form-group">
              <label class="text-small text-uppercase" for="negara">Negara</label>
              <input class="form-control form-control-lg" id="negara" name="negara" type="text" placeholder="Contoh: Indonesia">
              <?php echo form_error('negara', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
            </div>
            <div class="col-lg-12 form-group">
              <label class="text-small text-uppercase" for="no_telepon">No. Telepon</label>
              <input class="form-control form-control-lg" id="no_telepon" name="no_telepon" type="text" placeholder="+62 12345678">
              <?php echo form_error('no_telepon', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
            </div>
            <div class="col-lg-12 form-group">
              <button class="btn btn-dark" type="submit" name="submit">Lengkapi Profile</button>
            </div>
          </div>
        </form>
        <?php endforeach; ?>
      </div>
      <!-- ORDER SUMMARY-->
      <div class="col-lg-4">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
          <div class="card-body">
            <h5 class="text-uppercase mb-4">Your order</h5>
            <ul class="list-unstyled mb-0">
              <?php foreach ($barang as $u) : ?>
                <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold"><?= $u->nama_barang; ?></strong><span class="text-muted small">Rp. <?php echo number_format($u->harga, 0, ',', '.'); ?></span></li>
                <li class="border-bottom my-2"></li>
              <?php endforeach; ?>
              <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Total</strong><span>Rp <?php
                                                                                                                                                          $totalbelanja = $this->barang_model->totalbelanja($this->session->userdata('id_user'));
                                                                                                                                                          foreach ($totalbelanja['0'] as $tot) {
                                                                                                                                                            echo number_format($tot, 0, ',', '.');
                                                                                                                                                          }
                                                                                                                                                          ?></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>