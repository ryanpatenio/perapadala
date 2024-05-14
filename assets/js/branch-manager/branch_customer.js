$(document).ready(function () {

    const editModal = $('#editCustomerModal');
    
    $(document).on('click','#edit_customer_btn',function(e){
        e.preventDefault();

        resetForm($('#updateCustomerForm'));
        const id = $(this).attr('data-id');

        $.ajax({
            url: '/perapadala/edit-branch-customer',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            beforeSend: function () {
                
            },

            success: function (data) {
                //res(data);
                $('#customer-id').val(data.customer_id);
                $('#customer-name').val(data.name);
                $('#contact').val(data.contact);
                $('#address').val(data.address);

            },

            error: function (xhr, status, error) {
                res(xhr.responseText);
            }

        });

        $("#editCustomerModal").modal('show');


    });

    $('#updateCustomerForm').submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        
        swal({
            title: "Are you sure you want Update this Customer?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){
                $.ajax({
                    url: 'update-branch-customer',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    
                    beforeSend: function () {
                        
                    },
        
                    success: function (resp) {
                       // res(resp);
                        formModalClose(editModal, $('#updateCustomerForm'));
                        if (resp.message == 'success') {
                            message('Customer Updated Successfully!', 'success');
                        }
                    },
        
                    error: function (xhr, status, error) {
                       // res(xhr.responseText);
                        if (xhr.status == 500) {
                            msg('Oops! Unexpected Internal Server Error!', 'error');
                        }
                        if (xhr.responseJSON.message == 'validation_error') {
                            msg('Oops! Validation Error!', 'error');
                        }
                    }
        
        
                });


            }
        });
     
    });

});