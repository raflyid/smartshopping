<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              
            </div>
            <?= $this->session->flashdata('message'); ?>
            
            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('auth'); ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="<?= base_url('auth/forgotpassword'); ?>" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required value="<?= set_value('email'); ?>">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="<?= base_url('auth/registration')?>">Create One</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Smart Shopping 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/popper.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url('vendor/dist/'); ?>assets/js/custom.js"></script>
</body>
</html>