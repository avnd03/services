<?= $this->include('partials/main') ?>
<head>
    <?php echo view('partials/title-meta', array('title' => 'New Service')); ?>
    <?= $this->include('partials/head-css') ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" rel="stylesheet" >
    <?= $this->include('partials/head-js') ?>
</head>

<body class="nav-fixed">
  <?= $this->include('partials/top-bar') ?>
  <div id="layoutSidenav">
    <?= $this->include('partials/sidebar') ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-xl px-4 mt-5">
          <h1 class="mb-3">Create New Service</h1>
          <div class="card">
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-6 mb-3">
                    <div class="form-group mb-3">
                      <label class="form-label">Device Name/Model</label>
                      <input class="form-control" type="text" placeholder="iphone12 pro">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">IMEI</label>
                      <input class="form-control" type="text" >
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Service Category</label>
                      <select class="form-control form-select select2">
                        <option value="">Select</option>
                        <?php $categories = $controller->getServiceCategoriesList(); ?>
                        <?php foreach($categories as $category): ?>
                          <option value="<?=$category['id']?>"><?=$category['name']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Customer Complaint</label>
                      <textarea class="form-control" name="complaint" rows="6"></textarea>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Photo</label>
                      <input type="file" class="form-control" />
                    </div>
                  </div>
                  <div class="col-6 mb-3">
                    <div class="form-group mb-3">
                      <label class="form-label">Select Customer/New</label>
                      <select class="form-control form-select select2">
                        <option value="">Select</option>
                        <option value="new">New</option>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Name</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Email address</label>
                      <input class="form-control" type="email" placeholder="name@example.com">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Mobile No.</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label">Address</label>
                      <textarea class="form-control" name="address" rows="6"></textarea>
                    </div>
                  </div>
                  <div class="col-12 mb-3">
                    <div class="d-flex justify-content-between">
                      <button class="btn btn-light" type="button">Cancel</button>
                      <button class="btn btn-primary" type="button">Save</button>
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
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
</body>

</html>
