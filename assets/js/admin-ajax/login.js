$(document).ready(function () {
    $('#masterForm').submit(function (e) {
        e.preventDefault();
    
        let formData = $(this).serialize();
    
        $.ajax({
            url: 'admin-login-process',
            method: 'post',
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            beforeSend: function () {              
                // For example, you can disable form inputs
                $('#masterForm :input').prop('disabled', true);
                $('#master_login_btn').prop('disabled', true);
            },
            success: function (resp) {
               // res(resp);
                if (resp.message == 'success') {
                   Redirect('admin','Attempting to login...');
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX errors
                //res(xhr.responseText);
                if (xhr.responseJSON.message == 'invalid_credentials') {
                    msg('Invalid Email OR Password!', 'error');
                }
                if (xhr.responseJSON.message == 'inactive') {
                    msg('Your Account is Banned', 'error');
                }
            },
            complete: function () {
                // Re-enable UI elements after processing
                $('#masterForm :input').prop('disabled', false);
                $('#master_login_btn').prop('disabled', false);
            }
        });
    });
    
    


});