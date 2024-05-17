$(document).ready(function () {
    const editModal = $('#editTransactionModal'); 
    const addModal = $('#newTransactionModal');

    $('#addForm').submit(function (e) {
        e.preventDefault();
        
        const formData = $(this).serialize();

        swal({
            title: "Are you sure you want Create This Transaction?",
            text:'Please Review it Carefully!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){
                $.ajax({
                    url: 'add-bm-transaction',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    
                    beforeSend: function () {
                        
                    },
        
                    success: function (resp) {
                        res(resp);
                        resetForm($('#addForm'));
                        if (resp.message == 'success') {
                           
                            const url = 'print-me/'+resp.id;
                            // Send the encrypted transaction code via URL to printmepage.php
                            msgThenRedirect('New Transaction Created Successfully','success',url)
                        }
                    },
        
                    error: function (xhr, status, error) {
                        res(xhr.responseText);
                        if (xhr.responseJSON.message == 'fees_null') {
                            msg('Fees is Required! amount Transaction must be not less than 50 Pesos', 'info');
                        }
                    }
        
                });


            }
        });



    });

    $(document).on('click', '#print_trans_btn', function (e) {
        e.preventDefault();
        
        const id = $(this).attr('data-id');
       
        const url = 'print-me/'+id;
       // Delay the redirection by 1 second (1000 milliseconds)
        setTimeout(function() {
            window.location.href = url;
        }, 1000);

    });
    
    $(document).on('click','#view_btn',function(e){
        e.preventDefault();
        resetForm($('#viewForm'));
        const id = $(this).attr('data-id');


        $.ajax({
            url: 'get-branch-transaction',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            beforeSend: function () {
                
            },
            success: function (data) {
               // res(data);
                $('#v-trans-code').val(data.transaction_code);
                $('#v-trans-date').val(data.transaction_date);

                $('#v-sender-contact').val(data.contact);
                $('#v-sender-name').val(data.customer_name);

                $('#v-receiver-name').val(data.receiver_name);
                $('#v-receiver-contact').val(data.receiver_contact);
               
                $('#v-purpose').val(data.purpose);
                $('#v-relation').val(data.sender_relation);
                $('#v-branch-name').val(data.branch_name);
                $('#v-incharge').val(data.employee_incharge);

                $('#v-amount').val(data.amount);
                $('#v-fee').val(data.fee);

                //status
                let stat = data.status;
                let st = '';
                
                if (stat === 1 || stat === '1') {
                    st = 'Claimed';
                } else {
                    st = 'IN PROGRESS';
                }
                $('#v-in-progress').val(st);

                //Modal
                $("#viewTransactionModal").modal('show');

            },

            error: function (xhr, status, error) {
                res(xhr.responseText);
            }

        });

      


    });
    $(document).on('click','#edit_trans_btn',function(e){
        e.preventDefault();
        resetForm($('#updateForm'));
        const id = $(this).attr('data-id');
        
        $.ajax({
            url: 'get-transaction-data',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            beforeSend: function () {
                
            },
            success: function (data) {
               // res(data);
                getFee();
                
                $('#transaction_id').val(data.transaction_id);
                $('#customer-id').val(data.customer_id);
                $('#td-id').val(data.transaction_details_id);

                $('#sender-name').val(data.customer_name);
                $('#sender-address').val(data.address);
                $('#r-name').val(data.receiver_name);
                $('#r-address').val(data.receiver_address);
                $('#sender-contact').val(data.contact);
                $('#r-contact').val(data.receiver_contact);
                $('#purpose').val(data.purpose);
                $('#relation').val(data.sender_relation);
                $('#amount').val(data.amount);
                $('#fee').val(data.fee);


                $("#editTransactionModal").modal('show');
            },
            error: function (xhr, status, error) {
                res(xhr.responseText);
            }

        });
      


    });

    $('#updateForm').submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();
        swal({
            title: "Are you sure you want Update this Transaction?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

            if(willconfirmed){
            
                $.ajax({
                    url: 'update-bm-side-transaction',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    
                    beforeSend: function () {
                        
                    },
                    success: function (resp) {
                        // res(resp);
                        formModalClose(editModal, $('#updateForm'));
                        if (resp.message == 'success') {
                            message('Transaction Updated Successfully!', 'success');
                        }
                    },
                    error: function (xhr, status, error) {
                        //res(xhr.responseText);
                        if (xhr.responseJSON.message == 'id_null') {
                            msg('Oops! Validation Error! ID found Null', 'error');
                        }
                        if (xhr.responseJSON.message == 'validation_false') {
                            msg('Oops! Validation Error! Some Field Required!', 'error');
                        }
                        if (xhr.status == 500) {
                            msg('Oops! Internal Server Error!', 'error');
                        }
                    }
        
                });
        

            }
        });
      
    });

})



const autoCalculateFee = (amount, percent) => {
   
    // Calculate the fee
    var fee = percent * parseFloat(amount);
    return fee.toFixed(2); // Round to 2 decimal places
}

// Attach an event listener to the amount input field
$('#amount').on('keyup', function () {
    //check if the amount is null
    let amountField = $('#amount').val();

    //set the fee to null first
    $('#fee').val('');

    if (amountField === '') {
        
    } else {
         // Get the amount entered by the user
        const amount = $(this).val();
        const percent = $('#percent').attr('data-id');
        // Calculate the fee based on the percentage and amount
        const fee = autoCalculateFee(amount, percent);
        // Set the value of the fee input field
        $('#fee').val(fee);

    }
       
});

//for adding form
$('#amountadd').on('keyup', function () {
    //check if the amount is null
    let amountField = $('#amountadd').val();

    //set the fee to null first
    $('#feeadd').val('');

    if (amountField === '') {
        
    } else {
         // Get the amount entered by the user
        const amount = $(this).val();
        const percent = $('#percentadd').attr('data-id');
        // Calculate the fee based on the percentage and amount
        const fee = autoCalculateFee(amount, percent);
        // Set the value of the fee input field
        $('#feeadd').val(fee);

    }
       
});


const getFee = () => {
    
    $.ajax({
        url: 'bm-get-fee',
        method: 'post',
        dataType: 'json',
        
        success: function (data) {
           // console.log(data);
            let percent = data.percent;
            let p = '%';
            $('#percent').val(percent + p);

            var decimalPercent = parseFloat(percent) / 100;

            $('#percent').attr('data-id', decimalPercent);

            //for add Form

            $('#percentadd').val(percent + p);

            var decimalPercent = parseFloat(percent) / 100;

            $('#percentadd').attr('data-id', decimalPercent);
            
          
        },

        error: function (xhr, status, error) {
           // console.log(xhr.responseText);
            if (xhr.responseJSON.message == 'fee_null') {
                msg('No Percent Set in the Database! Report it to your Admin Immediately!', 'info');
            }

        }
        

    });
}

getFee();