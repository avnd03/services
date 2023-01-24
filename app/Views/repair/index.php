<?= $this->include('partials/main') ?>
<head>
    <?php echo view('partials/title-meta', array('title' => 'Service List')); ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
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
                <h1 class="mb-3">Services List</h1>
                <div class="row">
                  <div class="col-lg-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="serviceTable" class="table table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Service ID#</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Mobile No.</th>
                                        <th>Service Description</th>
                                        <th>Delivery Date</th>
                                        <th>Billed Amount</th>
                                        <th>Advance Paid</th>
                                        <th>Balance Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td>770010</td>
                                      <td>12-01-2023</td>
                                      <td>James Peter</td>
                                      <td>07955560450</td>
                                      <td>Touch Screen Replacement</td>
                                      <td>15-01-2023</td>
                                      <td>€ 350</td>
                                      <td>€ 100</td>
                                      <td>€ 250</td>
                                      <td><div class="badge bg-primary text-white rounded-pill">In Progress</div></td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#serviceTable').DataTable();
    });
  </script>
</body>

</html>
