<?= $this->include('partials/main') ?>
<head>
    <?php echo view('partials/title-meta', array('title' => 'Customers List')); ?>
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
                <h1 class="mb-3">Customers</h1>

                <div class="row">
                  <div class="col-lg-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-header text-right">
                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><i class="fas fa-plus me-2"></i> New Customer </button>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="serviceTable" class="table table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID#</th>
                                        <th>Regd. Date</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($customers): ?>
                                    <?php foreach($customers as $customer): ?>
                                      <tr>
                                        <td><?=$customer['id']?></td>
                                        <td><?=date('d-m-Y', strtotime($customer['created']))?></td>
                                        <td><?=$customer['name']?></td>
                                        <td><?=$customer['phone']?></td>
                                        <td><?=$customer['email']?></td>
                                        <td><?=($customer['status'] == '1')?'<div class="badge bg-success text-white rounded-pill">Active</div>':''?></td>
                                        <td><button type="button" class="btn btn-sm btn-outline-primary editCustomer" cid="<?=$customer['id']?>"><i data-feather="edit-3"></i> Edit</button></td>
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

                <!-- Add Customer Modal -->
                <div class="modal fade" id="addCustomerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form id="addCustomerForm" method="post" >
                              <div class="modal-header">
                                  <h5 class="modal-title" id="addCustomerModalLabel">Add Customer</h5>
                                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group mb-3">
                                  <label class="form-label">Name</label>
                                  <input class="form-control" type="text" name="name" data-validetta="required">
                                </div>
                                <div class="form-group mb-3">
                                  <label class="form-label">Phone/Mobile No.</label>
                                  <input class="form-control" type="text" name="phone" data-validetta="required" >
                                </div>
                                <div class="form-group mb-3">
                                  <label class="form-label">Email</label>
                                  <input class="form-control" type="text" name="email" data-validetta="email,required" >
                                </div>
                                <div class="form-group mb-3">
                                  <label class="form-label">City</label>
                                  <input class="form-control" type="text" name="city" >
                                </div>
                                <div class="form-group mb-3">
                                  <label class="form-label">Address</label>
                                  <textarea class="form-control" name="address" ></textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button id="addCustomerFormBtn" class="btn btn-primary" type="submit">Submit</button>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Customer Modal -->
                <button id="editCustomerModalBtn" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#editCustomerModal"></button>
                <div class="modal fade" id="editCustomerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div id="editCustomerModalContent" class="modal-content">
                          <?= $this->include('customer/edit-customer') ?>
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
  <script src="<?=base_url()?>/assets/js/customer.js"></script>

  <script>
    $(document).ready(function(){
      $('#serviceTable').DataTable();
    });
  </script>

</body>

</html>
