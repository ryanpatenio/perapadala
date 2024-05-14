$(document).ready(function () {
    const profileModal = $('#profileModal');
    
    $('#codeForm').submit(function (e) {
        e.preventDefault();
        
        const formData = $(this).serialize();

        $.ajax({
            url: '/perapadala/checkMyCode',
            method: 'post',
            data: formData,
            dataType: 'json',
            
            beforeSend: function () {
                
            },

            success: function (data) {
                res(data)
                if (data.message == 'success') {
                    
                    const url = '/perapadala/checkCode/'+data.id;
                    // Send the encrypted transaction code via URL to printmepage.php
                    msgThenRedirect('Transaction Found!','success',url)
                }
            },

            complete: function () {
                
            },

            error: function (xhr,status,error) {
                res(xhr.responseText);
                if (xhr.responseJSON.message == 'No_data_found') {
                    msg('No Data Found!', 'error');
                }
                
            }

        });

    });

    $(document).on('click', '#claim', function (e) {
        e.preventDefault();
        
        const id = $('#id').val();

        if (id !== null || id !== '') {
            swal({
                title: "Are you sure you want Claim this Transaction?",
                text:'Please Click the `OK` Button to Continue!',
                icon: "info",
                buttons: true,
                dangerMode: true,
          }).then((willconfirmed) => {
    
                if(willconfirmed){
                
                    $.ajax({
                        url: '/perapadala/claim-transaction',
                        method: 'post',
                        data:{id:id},
                        dataType: 'json',
                        
                        beforeSend: function () {
                            
                        },
        
                        success: function (resp) {
                           
                            if (resp.message == 'success') {
                                message('Transaction Claim Successfully!', 'success');
                            }
                        },
                        complete: function () {
                            
                        },
        
                        error: function (xhr, status, error) {
                            res(xhr.responseText);
                            if (xhr.status == 500) {
                                msg('Oops Unexpected Internal Server Error!');
                            }
                        }
        
                    });
        
                }
          });
          
         



        } else {
            alert('null');
        }

    });

    $(document).on('click', '#profile-btn', function (e) {
        e.preventDefault();
        const id = $(this).attr('data-id');

        $.ajax({
            url: '/perapadala/get-bp-profile',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            beforeSend: function () {
                
            },
            success: function (data) {
                //res(data);
                
                $('#emp-id').val(data.employee_id);

                $('#fname').val(data.fname);
                $('#lname').val(data.lname);
                $('#e-mail').val(data.email);
                $('#contact').val(data.contact);
                $('#address').val(data.address);
                $('#job-title').val(data.job_title);
                $('#branch-assigned').val(data.branch_name);

                profileModal.modal('show');
                
            },

            error: function (xhr, status, error) {
                res(xhr.responseText);
            }

        });

       
    });

    $('#profileForm').submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        swal({
            title: "Are you sure you want Update your Profile?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if (willconfirmed) {
                    
                    $.ajax({
                        url: '/perapadala/update-bp-profile',
                        method: 'post',
                        data: formData,
                        dataType: 'json',
                        
                        beforeSend: function () {
                            
                        },
            
                        success: function (resp) {
                            //res(resp)
                            formModalClose(profileModal, $('#profileForm'));
                            if (resp.message == 'success') {
                                message('Profile Updated Sucessfully!', 'success');
                            }
                        },
            
                        error: function (xhr, status, error) {
                           // res(xhr.responseText);
                            if (xhr.responseJSON.message == 'error_val') {
                                msg('Oops! Unexpected Error! Validation run False', 'error');
                            }
                            if (xhr.responseJSON.message == 'null_id') {
                                msg('Oops! Unexpected Error!, ID found Null', 'error');
                            }
                            if (xhr.responseJSON.message == 'error') {
                                msg('Oops! Unexpected Internal Server Error!', 'error');
                            }
                        }
            
            
                    });


                }
        });

      
        

    });

});