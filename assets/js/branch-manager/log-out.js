$(document).ready(function () {
    const logoutModal = $('#logoutModal_AD');

    $(document).on('click','#sign_out_btn_ad',function(e){
        e.preventDefault();
        $('#logoutModal_AD').modal('show');
    });
    
    

    $('#logout-yes').click(function (e) {
        e.preventDefault();
          
            $.ajax({
                url: '/perapadala/log-out',
                method: 'get',
                
                success: function (resp) {
                    // res(resp)
                    modalClose(logoutModal);
                    if (resp.message == 'success') {
                        msgThenRedirect('Logout Successfully!', 'success','/perapadala');
                   }
                },
                error: function (xhr, status, error) {
                    res(xhr.responseText)
                }
    
            });

       
    })

})