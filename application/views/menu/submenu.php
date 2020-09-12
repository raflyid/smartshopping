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
                    <h4>You can manage your sub-menu (on your left side) here!</h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newSubMenuModal">
                        Add New Sub-Menu
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Menu</th>
                                <th scope="col">URL</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($subMenu as $sm) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sm['title'] ?></td>
                                <td><?= $sm['menu'] ?></td>
                                <td><?= $sm['url'] ?></td>
                                <td><?= $sm['icon'] ?></td>
                                <td><?= $sm['is_active'] ?></td>
                                <td>
                                    <a href="" class="badge badge-info" data-toggle="modal" data-target="#neweditSubMenu<?= $sm['id'] ?>">edit</a>
                                    <a href="<?= base_url('menu/deletesubmenu/'.$sm['id']); ?>" class="badge badge-danger">delete</a>
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
      <div class="modal fade" tabindex="-1" role="dialog" id="newSubMenuModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add New Sub-Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu URL">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                        <small><a href="https://fontawesome.com/icons?d=gallery" target="_blank">Fontawesome Icons</a></small>
                    </div>

                    <div class="form_group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Active?
                        </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Sub-Menu</button>
                </div>
              </form>
            </div>
          </div>
        </div>

    <?php foreach ($subMenu as $sm) :
        $id=$sm['id'];
    ?>

    <!-- Modal Edit -->
      <div class="modal fade" tabindex="-1" role="dialog" id="neweditSubMenu<?= $id; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= base_url('menu/editsubmenu'); ?>" method="post">
                <div class="modal-body">
                <input type="hidden" id="id" name="id" value="<?= $id; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control" >
                            <option value="" disabled="" selected="">Select Category</option>
                            <?php foreach($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                        <small><a href="https://fontawesome.com/icons?d=gallery" target="_blank">Fontawesome Icons</a></small>
                    </div>

                    <div class="form_group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $sm['is_active']; ?>" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Active?
                        </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit menu</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    <?php endforeach; ?>