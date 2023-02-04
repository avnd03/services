<?= $this->include('partials/main') ?>
<head>
    <?php echo view('partials/title-meta', array('title' => 'Service Categories')); ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link href="<?=base_url()?>/assets/css/validetta.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>/assets/css/notifit.min.css" rel="stylesheet" type="text/css" />
    <?= $this->include('partials/head-js') ?>
</head>

<body class="nav-fixed">
  <?= $this->include('partials/top-bar') ?>
  <div id="layoutSidenav">
    <?= $this->include('partials/sidebar') ?>
    <div id="layoutSidenav_content">
        <main>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-5">
                <h1 class="mb-3">Service Categories</h1>

                <div class="row">
                  <div class="col-lg-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-header text-right">
                          <button id="addCategoryModalBtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="fas fa-plus me-2"></i> New Category </button>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="serviceTable" class="table table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($scategories): ?>
                                    <?php foreach($scategories as $scategory): ?>
                                      <tr>
                                        <td><?=$scategory['id']?></td>
                                        <td><?=$scategory['name']?></td>
                                        <td>
                                          <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-primary editCategory" scat_id="<?=$scategory['id']?>"><i data-feather="edit-3"></i> Edit</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" scat_id="<?=$scategory['id']?>"><i data-feather="trash-2"></i></button>
                                          </div>
                                        </td>
                                      </tr>
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>

                <!-- Add Category Modal -->
                <div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form id="saveCategoryForm" method="post" >
                              <div class="modal-header">
                                  <h5 class="modal-title" id="addCustomerModalLabel">Add Service Category</h5>
                                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group mb-3">
                                  <label class="form-label">Category Name</label>
                                  <input id="cat_name" class="form-control" type="text" name="name" data-validetta="required">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input id="scat_id" type="hidden" name="scat_id" value="" />
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button id="saveCategoryFormBtn" class="btn btn-primary" type="submit">Submit</button>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>


              </div>
          </main>
      </div>
    </div>
    <?= $this->include('partials/footer-scripts') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?=base_url()?>/assets/js/validetta.min.js"></script>
    <script src="<?=base_url()?>/assets/js/notifIt.js"></script>
    <script src="<?=base_url()?>/assets/js/category.js"></script>
    <script>
      $(document).ready(function(){
        $('#serviceTable').DataTable();
      });
    </script>

  </body>
</html>
