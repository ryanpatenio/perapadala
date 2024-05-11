$(document).ready(function () {
    
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

});