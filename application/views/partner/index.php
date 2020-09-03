      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>

          <div class="section-body">
            <div class="col-12 col-md-12 col-sm-12 col-lg-6">
              <div class="card-body">
                    <div class="section-title mt-0">Profile</div>
                    <div class="form-group">
                      <label>Fullname</label>
                      <input type="text" class="form-control" readonly="" value="<?= $user['fullname'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" readonly="" value="<?= $user['email'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" readonly="" value="<?= $user['phone'] ?>">
                    </div>
                    <a href="<?= base_url('partner/edit')?>" class="btn btn-primary">Edit profile</a>

                </div>
            </div>
        </div>
    </section>
</div>