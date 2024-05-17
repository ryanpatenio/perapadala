$(document).ready(function () {
    
    const addModal = $('#newUserModal');
    const editModal = $('#editUserModal');
    

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

    $(document).on('click','#edit_user_btn',function(e){
        e.preventDefault();
        resetForm($('#updateForm'));
        const id = $(this).attr('data-id');

        $.ajax({
            url: 'admin-get-user',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            beforeSend: function () {
                
            },

            success: function (data) {
                //res(data);
                $('#id').val(data.user_id);

                $('#name').val(data.name);
                $('#email').val(data.email);

                let role = data.role;
                if (role == 2) {
                    $('#current-role').val(data.role);
                    $('#current-role').text('Sub Admin');
                }

                editModal.modal('show');
            },
            error: function (xhr, status, error) {
                res(xhr.responseText);
                if (xhr.responseJSON.message == 'id_null') {
                    msg("Oops! Unexpected Error return ID NULL", 'error');
                }
                if (xhr.status == 500) {
                    msg('Oops! Unexpected Internal Server Error!', 'error');
                }
            }

        });

      


    });

    $('#updateForm').submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        swal({
            title: "Are you sure you want Update this User?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){
                $.ajax({
                    url: 'admin-update-user',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    
                    beforeSend: function () {
                        
                    },
        
                    success: function (resp) {
                       // res(resp);
                        formModalClose(editModal, $('#updateForm'));
                        if (resp.message == 'success') {
                            message('User Updated Successfully!', 'success');
                        }
                    },
                    error: function (xhr, status, error) {
                        //res(xhr.responseText);
                        if (xhr.responseJSON.message == 'email_exist') {
                            msg('Email is already exist!', 'info');
                        }
                        if (xhr.status == 500) {
                            msg('Oops! Unexpected Internal Server Error!', 'error');
                        }
                    }
        
        
                });


            }
        });

       


    });

    $(document).on('click', '#remove-btn', function (e) {
        e.preventDefault();

        const id = $(this).attr('data-id');

        swal({
            title: "Are you sure you want to Delete this User?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

                if(willconfirmed){
                    $.ajax({
                        url:'admin-delete-user',
                        method: 'post',
                        data: { id: id },
                        dataType: 'json',
                        
                        beforeSend: function () {
                            
            
                        },
            
                        success: function (resp) {
                            //res(resp);
                            if (resp.message == 'success') {
                                message('User Remove Successfully!', 'success');
                            }
                        },
            
                        error: function (xhr, status, error) {
                           // res(xhr.responseText);
                            if (xhr.responseJSON.message == 'id_null') {
                                msg('Oops! Unexpected Error Return ID Null', 'error');
                            }
                            if (xhr.status == 500) {
                                msg('Oops! Unexpected Internal Server Error!', 'error');
                            }
                        }
            
                    });     
                


                }
        });
        
      

    });


});