      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Profile</h1>
          </div>

          <div class="section-body">
            <div class="col-12 col-md-12 col-sm-12 col-lg-6">
              <div class="card-body">
              <?= form_open_multipart('partner/edit'); ?>
                    <div class="section-title mt-0">Edit Profile</div>
                    <div class="form-group">
                      <label>Fullname</label>
                      <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['fullname'] ?>">
                      <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" readonly id="email" name="email" value="<?= $user['email']; ?>">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone'] ?>">
                      <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                   <button type="submit" class="btn btn-primary">Edit profile</button>

                </div>
            </div>
        </div>
    </section>
</div>