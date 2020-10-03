      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>

          <div class="section-body">
          <div class="row">
              <div class="col-lg-6 col-sm-12 col-md-12">
              <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <div class="card card-primary shadow mb-3">
                  <div class="card-header">
                    <h4>You can change some roles here!</h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newRoleModal">
                        Add New Role
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($role as $r) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $r['role'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-primary">set access</a>
                                    <a href="" class="badge badge-info" data-toggle="modal" data-target="#neweditRole<?= $r['id'] ?>">edit</a>
                                    <a href="<?= base_url('admin/deleterole/'.$r['id']); ?>" class="badge badge-danger btn-delete">delete</a>
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

    <!-- Modal Add -->
      <div class="modal fade" tabindex="-1" role="dialog" id="newRoleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add role</button>
                </div>
              </form>
            </div>
          </div>
        </div>

    <?php foreach ($role as $r) :
        $id=$r['id'];
    ?>

    <!-- Modal Edit -->
      <div class="modal fade" tabindex="-1" role="dialog" id="neweditRole<?= $id; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= base_url('admin/editrole'); ?>" method="post">
                <div class="modal-body">
                <input type="hidden" id="id" name="id" value="<?= $id; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit role</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    <?php endforeach; ?>