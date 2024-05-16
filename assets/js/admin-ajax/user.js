$(document).ready(function () {
    
    const addModal = $('#newUserModal');
    const editModal = $('#editUserModal');
    
    $(document).on('click','#edit_user_btn',function(e){
        e.preventDefault();

        editModal.modal('show');


    });

    $('#userForm').submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
            url: 'admin-add-user',
            method: 'post',
            data: formData,
            dataType: 'json',
            
            beforeSend: function () {
                
            },

            success: function (resp) {
                // res(resp);
                formModalClose(addModal, $('#userForm'));
                if (resp.message == 'success') {
                    message('New User Added Successfully!', 'success');
                }
            },

            error: function (xhr, status, error) {
               // res(xhr.responseText);
                if (xhr.responseJSON.message == 'email_exist') {
                    msg('Email is Already Exist', 'info');
                }
                if (xhr.responseJSON.message == 'validation_error') {
                    msg('Oops! Unexpected Validation Error!', 'error');
                }
                if (xhr.responseJSON.message == 'error') {
                    msg('Oops! Unexpected Error!', 'error');
                }
            }

        });



    });


});