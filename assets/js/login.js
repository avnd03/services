$(function(){
  $('#loginForm').validetta({
      showErrorMessages : true,
      display : 'bubble',
      bubblePosition: 'bottom',
      realTime : true,
      onValid : function(e){
          e.preventDefault();
          $('#loginFormBtn').addClass('btn-loading');
          $.ajax({
            type:"POST",
            url:base_url+'/login-check',
            data:$("#loginForm").serialize(),
            success: function(response){
              if(response == '901'){
                notif({
                    msg: "Invalid User Account!",
                    type: "error"
                });
              }
              if(response == '902'){
                notif({
                    msg: "Account Disabled!",
                    type: "error"
                });
              }
              if(response == '903'){
                notif({
                    msg: "Invalid Password!",
                    type: "error"
                });
              }
              if(response == '900'){
                notif({
                    msg: "Login Success!",
                    type: "success"
                });
                setTimeout(function(){
                    window.location.href = base_url;
                }, 1000);
              }
              $('#loginFormBtn').removeClass('btn-loading');
            }
          });
      }
  },{
      required  : 'Required',
  });
});
