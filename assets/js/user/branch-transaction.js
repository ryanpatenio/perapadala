$(document).ready(function () {
    const editModal = $('#editTransactionModal');
    const viewModal = $('#viewTransactionModal');

    $(document).on('click', '#edit-btn', function (e) {
        e.preventDefault();
        //reset form first
        resetForm($('#updateTransactionForm'));

        //trans id
        const id = $(this).attr('data-id');

        $.ajax({
            url: 'get-transaction',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            success: function (data) {
                //res(data);

                //set Important ID
                $('#trans-id').val(data.transaction_id);
                $('#customer-id').val(data.sender_customer_id);
                $('#trans-detail-id').val(data.transaction_details_id);

                 // Original date string
                var originalDateString = data.transaction_date;
                var originalDateStringTrans_claimed = data.transaction_claimed;

                // Parse the original date string using Moment.js
                var parsedDate = moment(originalDateString, 'YYYY-MM-DD HH:mm:ss');
                var parseDate2 = moment(originalDateStringTrans_claimed, 'YYYY-MM-DD HH:mm:ss');

                // Format the parsed date as desired
                var formattedDate = parsedDate.format('MMMM Do YYYY');
                var formattedTime = parsedDate.format('h:mm:ss a');

                //Format Transaction Claimed
                let formattedDate2 = parseDate2.format('MMMM Do YYYY, h:mm:ss a');

                $('#trans-date').text(formattedDate);
                $('#trans-time').text(formattedTime);
                $('#trans-claimed').val(formattedDate2);

                $('#trans-code').text(data.transaction_code);

                $('#sender-name').val(data.senderName);
                $('#sender-address').val(data.senderAddress);
                $('#receiver-name').val(data.receiverName);
                $('#receiver-address').val(data.receiverAddress);
                $('#sender-contact').val(data.senderContact);
                $('#receiver-contact').val(data.receiverContact);

                $('#relation').text(data.sender_relation);
                $('#purpose').text(data.purpose);
                $('#amount').text(data.amount);
                $('#fee').text(data.fee);



                editModal.modal('show');
            },

            error: function (xhr, status, error) {
                res(xhr.responseText);
            }

        });

        

    });

    $('#updateTransactionForm').submit(function (e) {
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
                    url: 'update-branch-transaction',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    
                    beforeSend: function () {
                        
                    },
                    success: function (resp) {
                       // res(resp);
                        formModalClose(editModal, $('#updateTransactionForm'));
                        if (resp.message == 'success') {
                            message('Transaction Updated Successfully!', 'success');
                        }
                    },
        
                    error: function (xhr, status, error) {
                        res(xhr.responseText);
                        if (xhr.responseJSON.message == 'error_null') {
                            msg('Oops! ID Found Null', 'error');
                        }
                        if (xhr.responseJSON.message == 'error') {
                            msg('Oops! unexpected Internal Server Error', 'error');
                        }
                    }
        
        
                });


            }
        });

       

    });

    $(document).on('click', '#view-btn', function (e) {
        e.preventDefault();

        //clear the form first
        resetForm($('#viewForm'));
        const id = $(this).attr('data-id');
        
        $.ajax({
            url: 'view-transaction',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            success: function (data) {
               
                // Original date string
                var originalDateString = data.transaction_date;
                var originalDateStringTrans_claimed = data.transaction_claimed;

                // Parse the original date string using Moment.js
                var parsedDate = moment(originalDateString, 'YYYY-MM-DD HH:mm:ss');
                var parseDate2 = moment(originalDateStringTrans_claimed, 'YYYY-MM-DD HH:mm:ss');

                // Format the parsed date as desired
                var formattedDate = parsedDate.format('MMMM Do YYYY');
                var formattedTime = parsedDate.format('h:mm:ss a');

                //Format Transaction Claimed
                let formattedDate2 = parseDate2.format('MMMM Do YYYY, h:mm:ss a');

                $('#v-trans-date').text(formattedDate);
                $('#v-trans-time').text(formattedTime);
                $('#v-trans-claimed').val(formattedDate2);

                $('#v-t-code').text(data.transaction_code);

                $('#v-sender-name').val(data.senderName);
                $('#v-sender-address').val(data.senderAddress);
                $('#v-receiver-name').val(data.receiverName);
                $('#v-receiver-address').val(data.receiverAddress);
                $('#v-sender-contact').val(data.senderContact);
                $('#v-receiver-contact').val(data.receiverContact);

                $('#v-relation').text(data.sender_relation);
                $('#v-purpose').text(data.purpose);
                $('#v-amount').text(data.amount);
                $('#v-fee').text(data.fee);
                 

                viewModal.modal('show');
            },

            error: function (xhr, status, error) {
                res(xhr.responseText);
            }

        });


    });
});