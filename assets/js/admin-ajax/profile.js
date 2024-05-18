$(document).ready(function () {
    
    $('#changePasswordForm').submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        swal({
            title: "Are you sure you want Update Your Password",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){
                $.ajax({
                    url: 'admin-change-password',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    
                    beforeSend: function () {
                        
                    },
        
                    success: function (resp) {
                        //res(resp);
                        if (resp.message == 'success') {
                            message('Password Updated Successfully!', 'success');
                        }
                    },
        
                    complete: function () {
                        
                    },
        
                    error: function (xhr, status, error) {
                       // res(xhr.responseText);
                        if (xhr.responseJSON.message == 'old_password_not_match') {
                            msg('Current Password Not Match!', 'error');
                        }
                        if (xhr.status == 500) {
                            msg('Oops! Unexpected Internal Server Error!', 'error');
                        }
                            
                    }
        
                });
        


            }
        });

      
    });


    $('#re-password').on('keyup', function () {
        let err = $('#error_message');
        let newPass = $('#newPassword').val();
        let re_pass = $('#re-password').val();
        let saveBtn = $('#change-pass-btn');
    
        if (newPass !== '') {
            if (newPass === re_pass) {
                err.text('Password Match');
                err.css('color', 'green');
                saveBtn.prop('disabled', false); // Enable the button
            } else {
                err.text('Passwords do not match');
                err.css('color', 'red');
                saveBtn.prop('disabled', true); // Disable the button
            }
        } else {
            // Handle the case when the new password is empty
            err.text('');
            saveBtn.prop('disabled', true); // Disable the button
           
        }
    });

    $('#newPassword').on('keyup', function () {
        let err = $('#error_message');
        let newPass = $('#newPassword').val();
        let re_pass = $('#re-password').val();
        let saveBtn = $('#change-pass-btn');
    
        if (newPass !== '') {
            if (newPass === re_pass) {
                err.text('Password Match');
                err.css('color', 'green');
                saveBtn.prop('disabled', false); // Enable the button
            } else {
                err.text('Passwords do not match');
                err.css('color', 'red');
                saveBtn.prop('disabled', true); // Disable the button

            }
        } else {
            // Handle the case when the new password is empty
            err.text('');
            saveBtn.prop('disabled', true); // Disable the button
           
        }
    });

});