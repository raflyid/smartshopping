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
                    <h4>Product database section!</h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newProducts">
                        Add New Products
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Ext. Info</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image 1</th>
                                <th scope="col">Image 2</th>
                                <th scope="col">QR Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($products as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['category_name'] ?></td>
                                <td><?= $p['product_name'] ?></td>
                                <td><?= $p['description'] ?></td>
                                <td><?= $p['product_info'] ?></td>
                                <td><?= $p['price'] ?></td>
                                <td><?= $p['image_1'] ?></td>
                                <td><?= $p['image_2'] ?></td>
                                <td><?= $p['qr_code'] ?></td>
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
      <div class="modal fade" tabindex="-1" role="dialog" id="newProducts">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add New Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="<?= base_url('admin/products'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                    </div>

                    <div class="form-group">
                        <select name="id_category" id="id_category" class="form-control">
                            <option value="" selected disabled>Choose Category</option>
                            <?php foreach($category as $cat) : ?>
                            <option value="<?= $cat['id']; ?>"><?= $cat['category_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description of the product ...">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="product_info" name="product_info" placeholder="Extra Information">
                        <small>Eg. Brand New In Box, Brand New Out Box, Refurbish, etc..</small>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                    </div>

                  </div>

                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add New Products</button>
                </div>
              </form>
            </div>
          </div>
        </div>