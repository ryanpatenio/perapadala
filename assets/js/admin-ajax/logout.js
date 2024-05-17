$(document).ready(function () {
    const logoutModal = $('#logoutModal_AD');

    $(document).on('click', '#logout-admin', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'admin-log-out',
            method: 'get',
            
            success: function (resp) {
                // res(resp)
                modalClose(logoutModal);
                if (resp.message == 'success') {
                    msgThenRedirect('Logout Successfully!', 'success','/perapadala/admin-login');
               }
            },
            error: function (xhr, status, error) {
                res(xhr.responseText)
            }

        });

    });


    $(document).on('click','#sign_out_btn_ad',function(e){
        e.preventDefault();
        logoutModal.modal('show');
      });
      

});