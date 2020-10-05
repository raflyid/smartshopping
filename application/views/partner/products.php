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

              <!-- <?= $this->session->flashdata('message'); ?> -->
              
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

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
                    <table id="dataTables" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Partner</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Ext. Info</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image 1</th>
                                <th scope="col">Image 2</th>
                                <th scope="col">QR Code</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($products as $p) : ?>
                            <input type="hidden" id="id" name="id" value="<?= $p['id']; ?>">
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['fullname'] ?></td>
                                <td><?= $p['category_name'] ?></td>
                                <td><?= $p['product_name'] ?></td>
                                <td><?= $p['description'] ?></td>
                                <td><?= $p['product_info'] ?></td>
                                <td><?= $p['stock'] ?></td>
                                <td><?= $p['price'] ?></td>
                                <td class="text-center"><img src="<?= $p['image_1'] ?>" width="66px" height="64px"></td>
                                <td class="text-center"><img src="<?= $p['image_2'] ?>" width="66px" height="64px"></td>
                                <td class="text-center"><img src="<?php echo site_url('partner/qrcode/'.$p['id']); ?>" width="66px" height="64px"></td>
                                <td>
                                  <a href="" class="badge badge-primary" data-toggle="modal" data-target="#neweditProduct<?= $p['id'] ?>">edit</a>
                                  <a href="<?= base_url('partner/delproducts/'.$p['id']); ?>" class="badge badge-danger btn-delete">delete</a>
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
      <div class="modal fade" tabindex="-1" role="dialog" id="newProducts">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add New Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <?php echo form_open_multipart('partner/products'); ?>
                <div class="modal-body">
                    <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user']; ?>">
                    <div class="form-group" data-toggle="tooltip">
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
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description of the product ..."></textarea>
                    </div>

                    <div class="form-group">
                    <select name="product_info" id="product_info" class="form-control" required>
                        <option value="" selected disabled>Choose</option>
                        <option value="Brand New In Box">Brand New In Box (BNIB)</option>
                        <option value="Brand New Out Box">Brand New Out Box (BNOB)</option>
                        <option value="Refurbished">Refurbished</option>
                        <option value="Second Hand">Second Hand</option>
                        <option value="Others">Others (Explain in your Description)</option>
                    </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                    </div>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image_1" name="image_1" placeholder="First Image">
                      <label class="custom-file-label" for="customFile">Choose image</label>
                    </div><br><br>

                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image_2" name="image_2" placeholder="Second Image">
                      <label class="custom-file-label" for="customFile">Choose image</label>
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

