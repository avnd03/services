$(function(){
  $('#customerSelect').change(function(){
    var customer_id = $(this).val();
    $.ajax({
      type:"POST",
      url:base_url+'/get-customer',
      data:{
        customer_id:customer_id,
        page:'service'
      },
      success: function(response){
        var customer = $.parseJSON(response);
        if(customer){
          $('#customer_name').val(customer.name);
          $('#customer_email').val(customer.email);
          $('#customer_phone').val(customer.phone);
          $('#customer_city').val(customer.city);
          $('#customer_address').val(customer.address);
        }else{
          $('#customer_name').val('');
          $('#customer_email').val('');
          $('#customer_phone').val('');
          $('#customer_city').val('');
          $('#customer_address').val('');
        }
      }
    });
  });

  $('#serviceRepairForm').validetta({
      showErrorMessages : true,
      display : 'bubble',
      bubblePosition: 'bottom',
      realTime : true,
      onValid : function(e){
          e.preventDefault();
          $('#serviceRepairFormBtn').addClass('btn-loading');
          $.ajax({
            type:"POST",
            url:base_url+'/create-service',
            data:new FormData($('#serviceRepairForm')[0]),
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            success: function(response){
              var res = $.parseJSON(response);
              if(res.status == '900'){
                notif({
                    msg: "Service Added Success!",
                    type: "success"
                });
                setTimeout(function(){
                    window.location.href = base_url+'/service-detail/'+res.id;
                }, 1000);
              }
              $('#serviceRepairFormBtn').removeClass('btn-loading');
            }
          });
      }
  },{
      required  : 'Required',
      email : 'Invalid Email'
  });

  $('#serviceReportForm').validetta({
      showErrorMessages : true,
      display : 'bubble',
      bubblePosition: 'bottom',
      realTime : true,
      onValid : function(e){
          e.preventDefault();
          $('#serviceReportFormBtn').addClass('btn-loading');
          $.ajax({
            type:"POST",
            url:base_url+'/save-report',
            data:$('#serviceReportForm').serialize(),
            success: function(response){
              if(response == '900'){
                notif({
                    msg: "Saved Success!",
                    type: "success"
                });
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
              }
              $('#serviceReportFormBtn').removeClass('btn-loading');
            }
          });
      }
  },{
      required  : 'Required'
  });
});
