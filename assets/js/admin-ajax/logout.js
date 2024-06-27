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
                    Redirect('/perapadala/admin-login','attempting to logout...');
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