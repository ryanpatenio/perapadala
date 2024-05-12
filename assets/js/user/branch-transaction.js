$(document).ready(function () {
    const editModal = $('#editTransactionModal');
    const viewModal = '';

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
               // res(data);

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

});