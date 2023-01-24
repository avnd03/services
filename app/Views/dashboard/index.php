<?= $this->include('partials/main') ?>
<head>
    <?php echo view('partials/title-meta', array('title' => 'Dashboard')); ?>
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
                <!-- Custom page header alternative example-->
                <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                    <div class="me-4 mb-3 mb-sm-0">
                        <h1 class="mb-0">Dashboard</h1>
                        <div class="small">
                            <span class="fw-500 text-primary"><?=date('l')?></span>
                            - <?=date('F d, Y')?>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xl-4 col-md-6 mb-4">
                        <!-- Dashboard info widget 1-->
                        <div class="card border-start-lg border-start-primary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-primary mb-1">Customers</div>
                                        <div class="h5">4,390</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-users fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <!-- Dashboard info widget 2-->
                        <div class="card border-start-lg border-start-secondary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-secondary mb-1">Service - Pending</div>
                                        <div class="h5">27</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-hourglass-half fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <!-- Dashboard info widget 3-->
                        <div class="card border-start-lg border-start-info h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-info mb-1">Service - In Progress</div>
                                        <div class="h5">11</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-screwdriver fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <!-- Dashboard info widget 4-->
                        <div class="card border-start-lg border-start-info h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-info mb-1">Service - On Hold</div>
                                        <div class="h5">1</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-inbox fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <!-- Dashboard info widget 4-->
                        <div class="card border-start-lg border-start-success h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-success mb-1">Service - Done</div>
                                        <div class="h5">150</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-check-circle fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 mb-4">
                        <!-- Dashboard info widget 4-->
                        <div class="card border-start-lg border-start-danger h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="small fw-bold text-danger mb-1">Returned/Cancelled</div>
                                        <div class="h5">0</div>
                                    </div>
                                    <div class="ms-2"><i class="fas fa-undo fa-2x text-gray-200"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-header">Recent Services</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="serviceTable" class="table table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Service ID#</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Service Description</th>
                                        <th>Delivery Date</th>
                                        <th>Billed Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td>770010</td>
                                      <td>12-01-2023</td>
                                      <td>James Peter</td>
                                      <td>Touch Screen Replacement</td>
                                      <td>15-01-2023</td>
                                      <td>€ 350</td>
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
