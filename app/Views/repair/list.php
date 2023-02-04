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
          <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-fluid px-4">
              <div class="page-header-content p-0">
                <h1 class="py-3 text-light">Services List</h1>
              </div>
            </div>
          </header>

          <!-- Main page content-->
          <div class="container-fluid px-4">

            <div class="row">
              <div class="col-12">
                <div class="card mb-4 card mt-n10">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="serviceTable" data-order=[] class="table table-bordered text-nowrap">
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
                              <?php if($services): ?>
                                <?php foreach($services as $service): ?>
                                  <?php $status = $controller->getStatus($service['status']); ?>
                                  <tr>
                                    <td>
                                      <a class="text-decoration-none" href="<?=site_url('/service-detail')?>/<?=$service['id']?>"><?=$service['id']?> <i data-feather="eye"></i></a>
                                    </td>
                                    <td><?=date('d-m-Y', strtotime($service['created']))?></td>
                                    <td><?=$controller->getCustomerField($service['customer_id'], 'name')?></td>
                                    <td><?=$controller->getCustomerField($service['customer_id'], 'phone')?></td>
                                    <td><?=$controller->getServiceCategoryName($service['service_cat_id'])?></td>
                                    <td><?=($service['delivery_date'])?date('d-m-Y', strtotime($service['delivery_date'])):''?></td>
                                    <td><?=$service['total_amount']?> €</td>
                                    <td><?=$service['advance_paid']?> €</td>
                                    <td><?=$service['total_amount'] - $service['advance_paid']?> €</td>
                                    <td><div class="badge bg-<?=$status['color']?> text-white rounded-pill"><?=$status['name']?></div></td>
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


            <button id="serviceCanvasBtn" class="btn btn-primary d-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#serviceCanvas" aria-controls="serviceCanvas"></button>

            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="serviceCanvas" aria-labelledby="serviceCanvasLabel">
              <?= $this->include('repair/service-canvas') ?>
            </div>

          </div>
        </main>
    </div>
  </div>
  <?= $this->include('partials/footer-scripts') ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <!--  Flatpickr  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
  <script>
    $(document).ready(function(){
      $('#serviceTable').DataTable();

      $(document).on('click', '.serviceAction', function(e){
        e.preventDefault();
        var service_id = $(this).attr('data-service-id');
        if(!$("#serviceCanvas").hasClass( "show" )){
            $('#serviceCanvasBtn').trigger('click');
        }
        $.ajax({
          type:"POST",
          url:base_url+'/get-service-details',
          data:{service_id:service_id},
          success: function(response){
            $('#serviceCanvas').html(response);
          }
        });
      });

      $(".basicDate").flatpickr({
        enableTime: true,
        dateFormat: "F, d Y H:i"
      });

    });
  </script>
</body>

</html>
