<!DOCTYPE html>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="<?php echo base_url(); ?>/assets/assets_login_register/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="<?php echo base_url(); ?>/assets/assets_login_register/images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Login</p>
              <p><?php echo $this->session->flashdata('pesan'); ?></p>
              <form action="<?php echo base_url(); ?>users/checkinglogin" method="POST" class="hero-form">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input class="form-control" type="email" placeholder="Email" id="email" name="email" required="">
                    <?php echo form_error('email', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input class="form-control" type="password" placeholder="Password" name="password" id="password" required="">
                    <?php echo form_error('password', '<div style="font-size:13px" class="text-danger">', '</div>') ?>
                  </div>
                  <button class="btn btn-block login-btn mb-4" type="submit" name="submit"> Login</button>
                </form>
                <a href="#!" class="forgot-password-link">Lupa Password?</a>
                <p class="login-card-footer-text">Belum Punya Akun? <a href="<?php echo base_url(); ?>home/register" class="text-reset">Daftar Sekarang</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
