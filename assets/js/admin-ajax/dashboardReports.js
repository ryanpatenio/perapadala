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
           // res(data);
           
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

document.addEventListener("DOMContentLoaded", () => {
    const apexChart = "#reportsChart";

    // Initial chart options
    var options = {
        series: [{
            name: 'Income',
            data: []
        }, {
            name: 'Customers',
            data: []
        }],
        chart: {
            height: 350,
            type: 'area',
            toolbar: {
                show: false
            },
        },
        markers: {
            size: 5
        },
        colors: ['#4154f1', '#2eca6a', '#ff771d'],
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.3,
                opacityTo: 0.4,
                stops: [0, 90, 100]
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        xaxis: {
            type: 'date',
            categories: []  // Initially empty, will be updated with data
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy'
            },
        }
    };

    // Create the chart
    var chart = new ApexCharts(document.querySelector(apexChart), options);
    chart.render();

    // Function to fetch data and update the chart
    function getGraph() {
        $.ajax({
            url: 'admin-get-chart', // Adjust this URL if necessary
            type: 'GET',
            dataType: 'json',
           
            success: function (response) {
                //res(response)
                const revenue = [];
                const customer = [];
                const dates = [];

                $.each(response, function(i, item) {
                    revenue.push(item.income);
                    customer.push(item.customer_count);
                    dates.push(item.year);
                });

                // Update chart series
                chart.updateSeries([{
                    name: 'Income',
                    data: revenue
                }, {
                    name: 'Customers',
                    data: customer
                }]);

                // Update chart x-axis
                chart.updateOptions({
                    xaxis: {
                        categories: dates
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Initial call to fetch and display data
    getGraph();

    setInterval(() => {
        getGraph(); 
    }, 10000);
});