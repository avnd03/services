<?= $this->include('partials/main') ?>
<head>
    <?php echo view('partials/title-meta', array('title' => 'Service Detail')); ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/airbnb.css">
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
          <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-fluid px-4">
              <div class="page-header-content py-3 d-flex align-items-center justify-content-left">
                <button class="back btn btn-sm btn-icon me-3" onclick="history.back()"><i data-feather="arrow-left-circle" width="50" height="50" class="text-light"></i></button>
                <h1 class="text-light me-5">Service # <?=$service_id?></h1>
                <?php $status = $controller->getStatus($service['status']); ?>
                <button type="button" class="ms-5 btn btn-outline-light"><?=$status['name']?></button>
              </div>
            </div>
          </header>

          <!-- Main page content-->
          <div class="container-fluid px-4">

            <div class="row">
              <div class="col-12">
                <div class="card mb-4 mt-n10">
                    <div class="card-body">
                      <form id="serviceReportForm" method="post">
                        <div class="row mb-5">
                          <div class="col-8">
                            <div class="d-flex align-items-center justify-content-left">
                              <h6>First Report</h6>
                              <a href="<?=site_url('/edit-service')?>/<?=$service_id?>"><i data-feather="edit-3"></i></a>
                            </div>
                            <table class="table table-sm table-bordered">
                              <tr><th class="text-nowrap">Walkin Date</th><td><?=date('d-m-Y', strtotime($service['created']))?></td></tr>
                              <tr><th class="text-nowrap">Device</th><td><?=$service['model']?></td></tr>
                              <tr><th class="text-nowrap">S.No./IMEI</th><td><?=$service['imei']?></td></tr>
                              <tr><th class="text-nowrap">Service Category</th><td><?=$controller->getServiceCategoryName($service['service_cat_id'])?></td></tr>
                              <tr><th class="text-nowrap">Customer Complaint</th><td><?=$service['complaint']?></td></tr>
                            </table>
                          </div>
                          <div class="col-4">
                            <h6>Customer Details</h6>
                            <table class="table table-sm table-bordered">
                              <tr><th>ID #</th><td><?=$service['customer_id']?></td></tr>
                              <tr><th>Name</th><td><?=$controller->getCustomerField($service['customer_id'], 'name')?></td></tr>
                              <tr><th>Phone/Mobile</th><td><?=$controller->getCustomerField($service['customer_id'], 'phone')?></td></tr>
                              <tr><th>Email</th><td><?=$controller->getCustomerField($service['customer_id'], 'email')?></td></tr>
                              <tr><th>Address</th><td><?=$controller->getCustomerField($service['customer_id'], 'address')?></td></tr>
                            </table>
                          </div>
                        </div>
                        <div class="row mb-5">
                          <div class="col-8" style="border-right: 1px solid #eee;">
                            <h6>Repair Report</h6>
                            <div class="row mb-3">
                              <div class="col-6">
                                <div class="form-group">
                                  <label class="form-label">Delivery Date</label>
                                  <input class="form-control basicDate" type="text" name="delivery_date" placeholder="Select Date.." value="<?=($service['delivery_date'])?date('d-m-Y', strtotime($service['delivery_date'])):''?>">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label class="form-label">Status</label>
                                  <select class="form-control form-select" name="status">
                                    <option value="">Select</option>
                                    <option value="1" <?=($service['status'] == '1')?'selected':''?>>Pending</option>
                                    <option value="2" <?=($service['status'] == '2')?'selected':''?>>In Progress</option>
                                    <option value="3" <?=($service['status'] == '3')?'selected':''?>>On Hold</option>
                                    <option value="4" <?=($service['status'] == '4')?'selected':''?>>Returned/Cancelled</option>
                                    <option value="5" <?=($service['status'] == '5')?'selected':''?>>Return/Refund</option>
                                    <option value="6" <?=($service['status'] == '6')?'selected':''?>>Completed</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group mt-3">
                                <label class="form-label">Visible Notes (This will be seen by the customer online)</label>
                                <textarea name="visible_notes" class="form-control" rows="2"><?=$service['visible_notes']?></textarea>
                              </div>
                              <div class="form-group mt-3">
                                <label class="form-label">Technician Notes (Internal)</label>
                                <textarea name="technician_notes" class="form-control" rows="12"><?=$service['technician_notes']?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-4">
                            <h6>Billing</h6>
                            <div class="form-group mb-3">
                              <label class="form-label">Estimated Amount</label>
                              <div class="input-group">
                                  <input id="est_amount" type="text" class="form-control fnumber floatnumber" name="est_amount" placeholder="0.00" value="<?=$service['est_amount']?>" data-validetta="required">
                                  <span class="input-group-text bg-success text-white">€</span>
                              </div>
                            </div>
                            <div class="form-group mb-3">
                              <label class="form-label">Advance Paid</label>
                              <div class="input-group">
                                  <input id="advance_paid" type="text" class="form-control fnumber floatnumber" name="advance_paid" placeholder="0.00" value="<?=$service['advance_paid']?>" data-validetta="required">
                                  <span class="input-group-text bg-success text-white">€</span>
                              </div>
                            </div>
                            <div class="form-group mb-3">
                              <label class="form-label">Total Amount</label>
                              <div class="input-group">
                                  <input id="total_amount"  type="text" class="form-control fnumber floatnumber" name="total_amount" placeholder="0.00" value="<?=$service['total_amount']?>" data-validetta="required">
                                  <span class="input-group-text bg-success text-white">€</span>
                              </div>
                            </div>
                            <div class="form-group mb-3">
                              <label class="form-label">Balance Due</label>
                              <div class="input-group">
                                  <input id="balance_amount" type="text" class="form-control fnumber floatnumber" placeholder="0.00" value="<?=$service['total_amount']?>" readonly="readonly">
                                  <span class="input-group-text bg-success text-white">€</span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label">Paid Date</label>
                              <input class="form-control basicDate" type="text" name="paid_date" placeholder="Select Date.." value="<?=($service['paid_date'])?date('d-m-Y', strtotime($service['paid_date'])):''?>">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-0">
                          <div class="col-12">
                            <input type="hidden" name="service_id" value="<?=$service_id?>" />
                          </div>
                          <div class="col-12 bg-light d-flex justify-content-between p-2">
                            <button class="btn btn-outline-dark" onclick="history.back()" type="button">Cancel</button>
                            <button id="serviceReportFormBtn" class="btn btn-primary" type="submit">Save Report</button>
                          </div>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>


          </div>
        </main>
    </div>
  </div>
  <?= $this->include('partials/footer-scripts') ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!--  Flatpickr  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
  <script src="<?=base_url()?>/assets/js/validetta.min.js"></script>
  <script src="<?=base_url()?>/assets/js/notifIt.js"></script>
  <script src="<?=base_url()?>/assets/js/service.js"></script>
  <script>
    $(document).ready(function(){

      var total_amount = $('#total_amount').val();
      var advance_paid = $('#advance_paid').val();
      var balance_amount = total_amount - advance_paid;
      $('#balance_amount').val(balance_amount);

      $(".basicDate").flatpickr({
        dateFormat: "d-m-Y",
        minDate: "today"
      });

      $('#est_amount').keyup(function(){
        $('#total_amount').val($(this).val());
      });

      $('.fnumber').keyup(function(){
        var total_amount = $('#total_amount').val();
        var advance_paid = $('#advance_paid').val();
        var balance_amount = total_amount - advance_paid;
        $('#balance_amount').val(balance_amount);
      });

    });
  </script>
</body>

</html>
