$(document).ready(function () {
    
    const addModal = $('#serviceChargeModal');
    const editModal = $('#upServiceChargeModal');

    $('#main').css('filter', 'none');
    $('#loader').hide();

    
    $('#serviceChargeForm').submit(function (e) {
        e.preventDefault();
        
        const formData = $(this).serialize();

        $.ajax({
            url: 'admin-add-service-fee',
            method: 'post',
            data: formData,
            dataType: 'json',
            
            success: function (resp) {
                //res(resp);
                formModalClose(addModal, $('#serviceChargeForm'));
                if (resp.message == 'success') {
                    message('New Service Fee added Successfully!', 'success');
                }
            },

            error: function (xhr, status, error) {
               // res(xhr.responseText);
                if (xhr.status == 500) {
                    msg('Oops! unexpected Error!', 'error');
                }
                if (xhr.status == 400) {
                    msg('Oops! Unexpected Validation Error!', 'error');
                }
            }

        });

    })

    $(document).on('click','#edit_serviceCharge_btn',function(e){
        e.preventDefault();
        //reset Form First
        resetForm($('#upServiceChargeForm'));

        const id = $(this).attr('data-id');
        $.ajax({
            url: 'admin-get-service-fee',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            success: function (data) {
                //res(data);
                //set charge id for update purpose
                $('#charge-id').val(data.charge_id);
                $('#old-default').val(data.is_default);

                $('#service-charge').val(data.percent);
                $('#current-default').val(data.is_default);
                if (data.is_default == '0') {
                    //not Default
                    $('#current-default').text('Not Default');
                } else {
                    //default
                    $('#current-default').text('Default');
                }
                $("#upServiceChargeModal").modal('show');
            },

            error: function (xhr, status, error) {
                //res(xhr.responseText);
                if (xhr.status == 400) {
                    msg('Oops! unexpected error return ID null', 'error');
                }
                if (xhr.status == 500) {
                    msg('Oops! unexpected Internal Server Error!', 'error');
                }
            }

        });
    


    });
    
    $('#upServiceChargeForm').submit(function (e) {
        e.preventDefault();
        
        const formData = $(this).serialize();

        swal({
            title: "Are you sure you want Update this Service Fee?",
            text:'Be careful to update this Service Data coz it will make a big changes in the system!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){
            
                $.ajax({
                    url: 'admin-update-fee',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    
                    success: function (resp) {
                        //res(resp);
                        formModalClose(editModal, $('#upServiceChargeForm'));
                        if (resp.message == 'success') {
                            message('Service Fee is updated successfully!', 'success');
                        }
                    },
        
                    error:function(xhr,status,error)
                    {
                        //res(xhr.responseText);
                        if (xhr.status == 400) {
                            msg('Oops! Unexpected Validation Erro!', 'error');
                        }
                        if (xhr.status == 401) {
                            msg('Oops! unexpected error! return ID null', 'error');
                        }
                        if (xhr.status == 500) {
                            msg('Oops! unexpected Internal Server Error!', 'error');
                        }
                    }
        
                });
        

            }
        });

     
    });


});