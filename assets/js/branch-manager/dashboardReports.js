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
            url: 'branch-get-chart', // Adjust this URL if necessary
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
