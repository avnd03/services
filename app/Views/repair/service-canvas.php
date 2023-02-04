<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<form method="post">
  <div class="offcanvas-header bg-light">
    <h5 class="offcanvas-title" id="serviceCanvasLabel">Service #<?=$service['id']?></h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="row mb-5">
      <div class="col-6">
        <h6>Customer Details</h6>
        <table class="table table-sm table-bordered">
          <tr><th>ID #</th><td><?=$service['customer_id']?></td></tr>
          <tr><th>Name</th><td><?=$controller->getCustomerField($service['customer_id'], 'name')?></td></tr>
          <tr><th>Phone/Mobile</th><td><?=$controller->getCustomerField($service['customer_id'], 'phone')?></td></tr>
          <tr><th>Email</th><td><?=$controller->getCustomerField($service['customer_id'], 'email')?></td></tr>
          <tr><th>Address</th><td><?=$controller->getCustomerField($service['customer_id'], 'address')?></td></tr>
        </table>
      </div>
      <div class="col-6">
        <h6>First Report</h6>
        <table class="table table-sm table-bordered">
          <tr><th>Walkin Date</th><td><?=date('d-m-Y', strtotime($service['created']))?></td></tr>
          <tr><th>Device</th><td><?=$service['model']?></td></tr>
          <tr><th>S.No./IMEI</th><td><?=$service['imei']?></td></tr>
          <tr><th>Service Category</th><td><?=$controller->getServiceCategoryName($service['service_cat_id'])?></td></tr>
          <tr><th>Compalaint</th><td><?=$service['complaint']?></td></tr>
        </table>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-6">
        <div class="form-group mb-3">
          <label class="form-label">Delivery Date</label>
          <input class="form-control basicDate" type="text" placeholder="Select Date..">
        </div>
        <div class="form-group mb-3">
          <label class="form-label">Technician Notes</label>
          <textarea name="technician_notes" class="form-control" name="address" rows="8"></textarea>
        </div>
      </div>
      <div class="col-6">

      </div>
    </div>
  </div>
  <div class="offcanvas-footer bg-light p-3">
    <button class="btn btn-secondary" type="button" data-bs-dismiss="offcanvas">Close</button>
    <button id="addCustomerFormBtn" class="btn btn-primary" type="submit">Submit</button>
  </div>
</form>
