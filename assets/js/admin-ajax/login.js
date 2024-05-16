$(document).ready(function () {
    $('#masterForm').submit(function (e) {
        e.preventDefault();
    
        let formData = $(this).serialize();
    
        $.ajax({
            url: 'admin-login-process',
            method: 'post',
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            beforeSend: function () {              
                // For example, you can disable form inputs
                $('#masterForm :input').prop('disabled', true);
            },
            success: function (resp) {
                res(resp);
            },
            error: function (xhr, status, error) {
                // Handle AJAX errors
                res(resp);
            },
            complete: function () {
                // Re-enable UI elements after processing
                $('#masterForm :input').prop('disabled', false);
            }
        });
    });
    
    


});