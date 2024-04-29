 const apexChart = "#reportsChart";

    var options = {
        series: [{
                        //   name: 'Sales',
                        //   data: [31, 40, 28, 51, 42, 82, 56],
                        // }, {
                          name: 'Revenue',
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
                          type: 'date',//lower date
                          // categories: ["2022-09-19", "2023-09-19", "2024-09-19", "2025-09-19", "2026-09-19", "2027-09-19"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy'
                          },
        // colors: [primary, danger, '', '', '']
    }
}




getGraph();

function getGraph(){

 var chart = new ApexCharts(document.querySelector(apexChart), options);
    chart.render();



  $.ajax({
        url:'#',
        type: 'POST',
        dataType: 'json',
        async: true,
        cache: false,

        

        success:function(response){
          // console.log(data[0].revenue);
          const revenue = [];
          const customer = [];
          const yy = [];
          $.each(response, function(i, item) {
            // alert(data[i].PageName);
              revenue.push(item.revenue);
              customer.push(item.customer_count);
              yy.push(item.year);
             //console.log(item.revenue);
               chart.updateSeries([{
                name: 'Revenue',
                data: revenue,
              
              },{name:'Customers',data:customer}]); 

              chart.updateOptions({
                xaxis: {
                  
                  categories: yy
                }

              });
                
               //console.log(item.year+' '+item.revenue)
        });
        
     }
             
});
}




