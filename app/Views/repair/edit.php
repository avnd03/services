<?= $this->include('partials/main') ?>
<head>
    <?php echo view('partials/title-meta', array('title' => 'Edit Service')); ?>
    <?= $this->include('partials/head-css') ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" rel="stylesheet" >
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
              <h1 class="text-light">Edit Service #<?=$service_id?></h1>
            </div>
          </div>
        </header>

        <!-- Main page content-->
        <div class="container-fluid px-4">
          <div class="card mt-n10">
            <div class="card-body">
              <form id="serviceRepairForm" method="post">
                <div class="row">
                  <div class="col-6 mb-3">
                    <div class="form-group mb-3">
                      <label class="form-label">Device Name/Model</label>
                      <input class="form-control" name="model" type="text" placeholder="iphone12 pro" data-validetta="required" value="<?=$service['model']?>">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">IMEI</label>
                      <input class="form-control" name="imei" type="text" data-validetta="required" value="<?=$service['imei']?>">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Service Category</label>
                      <select class="form-control form-select select2" name="service_cat_id" data-validetta="required">
                        <option value="">Select</option>
                        <?php $categories = $controller->getServiceCategoriesList(); ?>
                        <?php foreach($categories as $category): ?>
                          <option value="<?=$category['id']?>" <?=($category['id'] == $service['service_cat_id'])?'selected':''?>><?=$category['name']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Customer Complaint</label>
                      <textarea class="form-control" name="complaint" rows="6" data-validetta="required"><?=$service['complaint']?></textarea>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Photo</label>
                      <input type="file" name="photo" class="form-control" />
                    </div>
                  </div>
                  <div class="col-6 mb-3">
                    <div class="form-group mb-3">
                      <label class="form-label">Select Customer/New</label>
                      <select id="customerSelect" name="customer_id" class="form-control form-select select2" data-validetta="required">
                        <option value="">Select</option>
                        <option value="new">New</option>
                        <?php foreach($customers as $customer): ?>
                          <option value="<?=$customer['id']?>" <?=($customer['id'] == $service['customer_id'])?'selected':''?>><?=$customer['phone']?> | <?=$customer['name']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Name</label>
                      <input id="customer_name" name="customer_name" class="form-control" type="text" data-validetta="required" value="<?=$controller->getCustomerField($service['customer_id'], 'name')?>">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Email address</label>
                      <input id="customer_email" name="customer_email" class="form-control" type="email" data-validetta="email,required" value="<?=$controller->getCustomerField($service['customer_id'], 'email')?>">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Phone/Mobile No.</label>
                      <input id="customer_phone" name="customer_phone" class="form-control" type="text" data-validetta="required" value="<?=$controller->getCustomerField($service['customer_id'], 'phone')?>">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">City</label>
                      <input id="customer_city" name="customer_city" class="form-control" type="text" value="<?=$controller->getCustomerField($service['customer_id'], 'city')?>">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Address</label>
                      <textarea id="customer_address" name="customer_address" class="form-control" name="address" rows="6"><?=$controller->getCustomerField($service['customer_id'], 'address')?></textarea>
                    </div>
                  </div>
                  <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between">
                      <input type="hidden" name="service_id" value="<?=$service_id?>" />
                      <a class="btn btn-light" href="<?=site_url('/service-list')?>" >Cancel</a>
                      <button id="serviceRepairFormBtn" class="btn btn-primary" type="submit">Save Changes</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
  </div>
</div>
<?= $this->include('partials/footer-scripts') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?=base_url()?>/assets/js/validetta.min.js"></script>
<script src="<?=base_url()?>/assets/js/notifIt.js"></script>
<script src="<?=base_url()?>/assets/js/service.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
</body>

</html>
