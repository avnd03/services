$(function(){
  $('#saveCategoryForm').validetta({
      showErrorMessages : true,
      display : 'bubble',
      bubblePosition: 'bottom',
      realTime : true,
      onValid : function(e){
          e.preventDefault();
          $('#saveCategoryFormBtn').addClass('btn-loading');
          $.ajax({
            type:"POST",
            url:base_url+'/save-category',
            data:$("#saveCategoryForm").serialize(),
            success: function(response){
              if(response == '900'){
                notif({
                    msg: "Category Saved Success!",
                    type: "success"
                });
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
              }
              $('#saveCategoryFormBtn').removeClass('btn-loading');
            }
          });
      }
  },{
      required  : 'Required',
      email : 'Invalid Email'
  });

  $(document).on('click', '.editCategory', function(){
    var scat_id = $(this).attr('scat_id');
    if(!$("#addCategoryModal").hasClass( "show" )){
        $('#addCategoryModalBtn').trigger('click');
    }
    $.ajax({
      type:"POST",
      url:base_url+'/get-category',
      data:{scat_id:scat_id},
      success: function(response){
        var res = $.parseJSON(response);
        $('#addCategoryModal #cat_name').val(res.name);
        $('#addCategoryModal #scat_id').val(res.id);
      }
    });
  });

});
