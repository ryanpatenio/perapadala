$(document).ready(function () {


    $('#profileAvatarForm').submit(function (e) {
        e.preventDefault();
    
        let fileInput = $('#my-avatar')[0];
        let file = fileInput.files[0];
    
        let formData = new FormData(this);
    
        // Check if a file is selected and validate its size
        if (file) {
            if (file.size > 5242880) { // 5MB in bytes
                msg('File size must not be greater than 5MB', 'info');
                return; // Stop form submission
            }
            formData.append('avatar', file); // Append the file to formData only if it exists
        }
    
        // Include CSRF token if applicable
        formData.append('csrf_token_name', '<?= $this->security->get_csrf_hash(); ?>');

        
        swal({
            title: "Are you sure you want Update Your Profile?",
            text: 'Please Click Ok Button To Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if (willconfirmed) {
                        
                $.ajax({
                    url: 'bm-avatar-upload',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(resp) {
                        //res(resp);
                        if (resp.message == 'success') {
                            message('Profile Update Successfully!', 'success');
                        }
                    },
                    error: function(xhr, status, error) {
                        //res(xhr.responseText);
                        if (xhr.status == 400) {
                            msg('Oops! Validation Error', 'error');
                        }
                        if (xhr.responseJSON && xhr.responseJSON.message == 'error') {
                            msg('Oops! Unexpected Internal Server Error!', 'error');
                        }
                    }
                });
            }

        });
    
    });
    
   
    $('#changePassForm').submit(function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        swal({
            title: "Are you sure you want Update your Password?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){
            

                $.ajax({
                    url: 'bm-change-pass',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    
                    beforeSend: function () {
                        
                    },
        
                    success: function (resp) {
                      //  res(resp);
                        resetForm($('#changePassForm'));
                        if (resp.message == 'success') {
                            message('Password Updated Successfully!', 'success');
                        }
                    },
        
                    error: function (xhr, status, error) {
                       // res(xhr.responseText);
                        if (xhr.responseJSON.message == 'pass_failed') {
                            msg('Current Password Does Not Match!', 'error');
                        }
                        if (xhr.status == 500) {
                            msg('Oops! Unexpected Internal Server Error', 'error');
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
    
    $('#my-avatar').change(function(e){
        e.preventDefault();
        let output_img = document.getElementById("display_avatar");
          output_img.src=URL.createObjectURL(event.target.files[0]);
            output_img.onload = function(){
              URL.revokeObjectURL(output_img.src);
            };
           
      });

});