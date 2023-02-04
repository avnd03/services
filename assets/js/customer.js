$(function(){
  $('#addCustomerForm').validetta({
      showErrorMessages : true,
      display : 'bubble',
      bubblePosition: 'bottom',
      realTime : true,
      onValid : function(e){
          e.preventDefault();
          $('#addCustomerFormBtn').addClass('btn-loading');
          $.ajax({
            type:"POST",
            url:base_url+'/save-customer',
            data:$("#addCustomerForm").serialize(),
            success: function(response){
              if(response == '900'){
                notif({
                    msg: "Customer Added Success!",
                    type: "success"
                });
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
              }
              $('#addCustomerFormBtn').removeClass('btn-loading');
            }
          });
      }
  },{
      required  : 'Required',
      email : 'Invalid Email'
  });

  $(document).on('click', '.editCustomer', function(){
    var customer_id = $(this).attr('cid');
    if(!$("#editCustomerModal").hasClass( "show" )){
        $('#editCustomerModalBtn').trigger('click');
    }
    $.ajax({
      type:"POST",
      url:base_url+'/get-customer',
      data:{
        customer_id:customer_id,
        page:'customer'
      },
      success: function(response){
        $('#editCustomerModalContent').html(response);
      }
    });
  });

});
