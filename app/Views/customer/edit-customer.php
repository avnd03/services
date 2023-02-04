<form id="saveCustomerForm" method="post">
    <div class="modal-header">
        <h5 class="modal-title" id="addCustomerModalLabel">Add Customer</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="form-group mb-3">
        <label class="form-label">Name</label>
        <input class="form-control" type="text" name="name" value="<?=$customer['name']?>" data-validetta="required">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Phone/Mobile No.</label>
        <input class="form-control" type="text" name="phone" value="<?=$customer['phone']?>" data-validetta="required" >
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Email</label>
        <input class="form-control" type="email" name="email" value="<?=$customer['email']?>" data-validetta="email,required" >
      </div>
      <div class="form-group mb-3">
        <label class="form-label">City</label>
        <input class="form-control" type="text" name="city" value="<?=$customer['city']?>" >
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Address</label>
        <textarea class="form-control" name="address" ><?=$customer['address']?></textarea>
      </div>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="customer_id" value="<?=$customer['id']?>" />
      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
      <button id="saveCustomerFormBtn" class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
<script>
$('#saveCustomerForm').validetta({
    showErrorMessages : true,
    display : 'bubble',
    bubblePosition: 'bottom',
    realTime : true,
    onValid : function(e){
        e.preventDefault();
        $('#saveCustomerFormBtn').addClass('btn-loading');
        $.ajax({
          type:"POST",
          url:base_url+'/save-customer',
          data:$("#saveCustomerForm").serialize(),
          success: function(response){
            if(response == '900'){
              notif({
                  msg: "Customer Updated Success!",
                  type: "success"
              });
              setTimeout(function(){
                  window.location.reload();
              }, 1000);
            }
            $('#saveCustomerFormBtn').removeClass('btn-loading');
          }
        });
    }
},{
    required  : 'Required',
    email : 'Invalid Email'
});
</script>
