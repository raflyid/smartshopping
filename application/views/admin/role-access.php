      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>

          <div class="section-body">
          <div class="row">
              <div class="col-lg-6 col-sm-12 col-md-12">

              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                <div class="card card-primary shadow mb-3">
                  <div class="card-header">
                    <h4>You're changing this role: <?= $role['role']; ?></h4>
                    <div class="card-header-action">
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Enable access?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $m['menu'] ?></td>
                                <td>
                                <div class="form-check">
                                    <input class="form-check-input position-static" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                </div>
                                </td>
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