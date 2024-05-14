$(document).ready(function () {
    const viewModal = $('#viewEmployeeModal');

    $(document).on('click','#view_btn',function(e){
        e.preventDefault();
        resetForm($('#viewEmployeesForm'));
        const id = $(this).attr('data-id');
        $.ajax({
            url: 'get-branch-employee',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            
            beforeSend: function () {
                
            },

            success: function (data) {
                //res(data);

                $('#fname').val(data.fname);
                $('#lname').val(data.lname);
                $('#contact').val(data.contact);
                $('#address').val(data.address);
                $('#email').val(data.email);
                $('#job-title').val(data.job_title);
                $('#assigned-branch').val(data.branch_name);
                

                
            },

            error: function (xhr, status, error) {
                //res(xhr.responseText);
                if (xhr.responseJSON.message == 'id_null') {
                    msg('Oops! Unexpected Error!, ID null', 'error');
                }
                if (xhr.status == 500) {
                    msg('Oops! Unexpected Internal Server Error!', 'error');
                }
            }


        });

        $("#viewEmployeeModal").modal('show');


    });

});