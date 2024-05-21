$(document).ready(function () {
    $('#main').css('filter', 'none');
    $('#loader').hide();


    branchIncomeToday();
    incomeThisMonth();
    customerCountToday();
    branchEmployees();
    

    //set interval 10 seconds
    setInterval(function () {
        branchIncomeToday(); 
        incomeThisMonth();
        customerCountToday();
        branchEmployees();

    }, 10000);

});


const branchIncomeToday = () => {
    let income = $('#income-this-day');
    $.ajax({
        url: 'branch-get-income-this-day',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
           // $('#loader').show();
            // $('#main').addClass('blur');
           
        },

        success: function (data) {
         //res(data);
           
            if (data.message == 'no_data') {
                income.text('₱' + ' 0');
            } else {
                income.text('₱' + data.branch_income);
            }
        },

        complete: function () {
           // $('#loader').hide();
            //$('#main').removeClass('blur');
           
        },

        error: function (xhr, status, error) {
            res(xhr.responseText);
           // $('#loader').hide();
            //$('#main-content').removeClass('blur');
        }

    });
}

const incomeThisMonth = () => {
    let income = $('#income-this-month');

    $.ajax({
        url: 'branch-get-income-this-month',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
          
        },

        success: function (data) {
        // res(data);
           
            if (data.message == 'no_data') {
                income.text('₱' + ' 0');
            } else {
                income.text('₱' + data.branch_income);
            }
        },

        complete: function () {
          
        },

        error: function (xhr, status, error) {
            res(xhr.responseText);
           
        }

    });
}

const customerCountToday = () => {
    let customers = $('#customers-count');

    $.ajax({
        url: 'branch-get-customer-count-today',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
          
        },

        success: function (data) {
         //res(data);
           
            if (data.message == 'no_data') {
                customers.text('' + ' 0');
            } else {
                customers.text('' + data.customer_count);
            }
        },

        complete: function () {
          
        },

        error: function (xhr, status, error) {
            res(xhr.responseText);
           
        }

    });
}

const branchEmployees = () => {
    let employees = $('#employees-count');

    $.ajax({
        url: 'branch-get-employees-count',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
          
        },

        success: function (data) {
        // res(data);
           
            if (data.message == 'no_data') {
                employees.text('' + ' 0');
            } else {
                employees.text('' + data.employee_count);
            }
        },

        complete: function () {
          
        },

        error: function (xhr, status, error) {
            res(xhr.responseText);
           
        }

    });
}

