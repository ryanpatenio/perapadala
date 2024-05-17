$(document).ready(function () {
    const viewModal = $('#viewTransactionModal');
    
    $(document).on('click','#view_btn',function(e){
        e.preventDefault();


        resetForm($('#viewForm'));
        const id = $(this).attr('data-id');


        $.ajax({
            url: 'admin-get-branch-transaction',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            beforeSend: function () {
                
            },
            success: function (data) {
                //res(data);
                
                // Original date string
                var originalDateString = data.transaction_date;

                // Parse the original date string using Moment.js
                var parsedDate = moment(originalDateString, 'YYYY-MM-DD HH:mm:ss');

                //Format Transaction Claimed
                let formattedDate = parsedDate.format('MMMM Do YYYY, h:mm:ss a');


                $('#v-trans-code').val(data.transaction_code);
                $('#v-trans-date').val(formattedDate);

                $('#v-sender-contact').val(data.customer_contact);
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

              
                 viewModal.modal('show');

            },

            error: function (xhr, status, error) {
                //res(xhr.responseText);
                if (xhr.responseJSON.message == 'id_null') {
                    msg('Oops! Unexpected Error Return ID NULL', 'error');
                }
                if (xhr.responseJSON.message == 'error') {
                    msg('Oops! Unexpected Internal Server Error', 'error');
                }
            }

        });

      




    });


});