$(document).ready(function () {

  
    
    $('#transactionForm').submit(function (e) {
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
                    url: 'user-create-transaction',
                    method: 'post',
                    data: formData,
                    dataType: 'json',
        
                    beforeSend: function() {
                        $('#send-btn').prop('disabled', true);
                    },
                    
                    success: function (resp) {
                        resetForm($('#transactionForm'));
                        res(resp)
                        if (resp.message == 'success') {
        
                            const url = 'print-transaction/'+resp.id;
                            // Send the encrypted transaction code via URL to printmepage.php
                            msgThenRedirect('New Transaction Created Successfully','success',url)
                        
        
                        }
                    },
                    complete: function () {
                        $('#send-btn').prop('disabled', false);
                    },
        
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        
                    if (xhr.responseJSON.message == 'fees_null') {
                        msg('Fees is Required! amount Transaction must be not less than 50 Pesos', 'info');
                    }
                    }
        
                });

            }
        });
      

    })

});

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


const getFee = () => {
    
    $.ajax({
        url: 'get-fee',
        method: 'post',
        dataType: 'json',
        
        success: function (data) {
           // res(data);
            let percent = data.percent;
            let p = '%';
            $('#percent').val(percent + p);

            var decimalPercent = parseFloat(percent) / 100;

            $('#percent').attr('data-id', decimalPercent);
            
          
        },

        error: function (xhr, status, error) {
           // res(xhr.responseText);
            if (xhr.responseJSON.message == 'fee_null') {
                msg('No Percent Set in the Database! Report it to your Admin Immediately!', 'info');
            }

        }
        

    });
}

function encryptData(data, key) {
    return CryptoJS.AES.encrypt(data, key).toString();
}


getFee();