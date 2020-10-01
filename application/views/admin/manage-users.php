      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>

          <div class="section-body">
          <div class="row">
              <div class="col-lg-12 col-sm-12 col-md-12">

              <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
              <?php endif; ?>

              <?= $this->session->flashdata('message'); ?>

                <div class="card card-primary shadow mb-3">
                  <div class="card-header">
                    <h4>You can manage your users here!</h4>
                    <div class="card-header-action">
                      <!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newSubMenuModal">
                        Add New Users
                      </a> -->
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Active<small style="color: blue;"><a href="#" title="" data-toggle="popover" data-trigger="hover" data-content="Users Active == 1 / Non-active == 0." data-original-title="What is this means?"><i class="fas fa-question-circle"></i></a></small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($users as $usr) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $usr['email'] ?></td>
                                <td><?= $usr['password'] ?></td>
                                <td><?= $usr['fullname'] ?></td>
                                <td><?= $usr['phone'] ?></td>
                                <td><?= $usr['role'] ?></td>
                                <td><?= $usr['is_active'] ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>

          </div>
        </section>
      </div>