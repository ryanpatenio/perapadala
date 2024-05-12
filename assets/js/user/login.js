$(document).ready(function () {
   
    $('#loginForm').submit(function (e) {
        e.preventDefault();
        
        const formData = $(this).serialize();

        $.ajax({
            url: '/perapadala/emp-login',
            method: 'post',
            data: formData,
            dataType: 'json',
            
            success: function (resp) {
                res(resp);
                if (resp.message == 'success_bm') {
                    msgThenRedirect('Login Successfully!', 'success','/perapadala/branch-admin');
                }
                if (resp.message == 'success_bp') {
                    msgThenRedirect('Login Successfully!', 'success','/perapadala');
                }
            },

            error: function (xhr, status, error) {
                res(xhr.responseText);
                if (xhr.responseJSON.message == 'Invalid') {
                    msg('Invalid Username or Password!', 'error');
                }
                if (xhr.responseJSON.message == 'no_branch_assign') {
                    msg('Account Found! But No Branch Assign Yet!, Contact your Administrator! Before you can use the System', 'info');
                }
            }


        });

    });

    $('#logout').click(function (e) {
        e.preventDefault();


        swal({
            title: "Are you sure you want End this Session?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
      }).then((willconfirmed) => {

        if(willconfirmed){
          
            $.ajax({
                url: '/perapadala/log-out',
                method: 'get',
                
                success: function (resp) {
                    res(resp)
                    if (resp.message == 'success') {
                        msgThenRedirect('Logout Successfully!', 'success','/perapadala');
                   }
                },
                error: function (xhr, status, error) {
                    res(xhr.responseText)
                }
    
            });

         }
      });
       
    })


});