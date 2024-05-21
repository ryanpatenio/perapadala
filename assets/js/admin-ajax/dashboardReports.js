$(document).ready(function () {

    $('#main').css('filter', 'none');
    $('#loader').hide();
   
    incomeThisDay();
    incomeThisMonth();
    customerThisYear();
    employeesCount();
    branchesCount();

    //creating Interval to load every 10 seconds
    setInterval(function() {
        incomeThisDay();
        incomeThisMonth();
        customerThisYear();
        employeesCount();
        branchesCount();
    }, 10000); 
   
});

const incomeThisDay = () => {
    let income = $('#income-this-day');
    $.ajax({
        url: 'admin-get-income-this-day',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
           // $('#loader').show();
            // $('#main').addClass('blur');
           
        },

        success: function (data) {
           // res(data);
           
            if (data.message == 'no_income') {
                income.text('₱' + ' 0');
            } else {
                income.text('₱' + data.income_this_day);
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
        url: 'admin-get-income-this-month',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
           // $('#loader').show();
            // $('#main').addClass('blur');
           
        },

        success: function (data) {
           // res(data);
           
            if (data.message == 'no_income') {
                income.text('₱' + ' 0');
            } else {
                income.text('₱' + data.income_this_month);
            }
        },

        complete: function () {
            //$('#loader').hide();
            //$('#main').removeClass('blur');
           
        },

        error: function (xhr, status, error) {
            res(xhr.responseText);
           // $('#loader').hide();
            //$('#main-content').removeClass('blur');
        }

    });
}

const customerThisYear = () => {
    let customer = $('#customer-count');
    $.ajax({
        url: 'admin-get-customer-count-this-year',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
            //$('#loader').show();
            // $('#main').addClass('blur');
           
        },

        success: function (data) {
           // res(data);
           
            if (data.message == 'no_data') {
                customer.text('' + ' 0');
            } else {
                customer.text('' + data.customer_count);
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

const employeesCount = () => {
    let employees = $('#employees-count');
    $.ajax({
        url: 'admin-get-employees-count',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
          
        },

        success: function (data) {
            //res(data);
           
            if (data.message == 'no_data') {
                employees.text(' 0');
            } else {
                employees.text('' + data.employees_count);
            }
        },

        complete: function () {
           
        },

        error: function (xhr, status, error) {
            res(xhr.responseText);
           
        }

    });

}

const branchesCount = () => {
    let branches = $('#branches-count');
    $.ajax({
        url: 'admin-get-branches-count',
        method: 'post',
        dataType: 'json',
        
        beforeSend: function () {
          
        },

        success: function (data) {
            res(data);
           
            if (data.message == 'no_data') {
                branches.text(' 0');
            } else {
                branches.text('' + data.branches_count);
            }
        },

        complete: function () {
           
        },

        error: function (xhr, status, error) {
            res(xhr.responseText);
           
        }

    });
}

