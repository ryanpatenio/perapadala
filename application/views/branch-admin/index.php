
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">

           

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                
                </div>

                <div class="card-body">
                  <h5 class="card-title">Branch Income <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      ₱
                    </div>
                    <div class="ps-3">
                      <h6>₱20 000</h6>
                      <span class="text-success small pt-1 fw-bold">20%</span> <span class="text-muted small pt-2 ps-1">100%</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                 
                </div>

                <div class="card-body">
                  <h5 class="card-title">Branch Customers <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>

                     23



                      </h6>
                      
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                  <div class="filter"></div>

                  <div class="card-body">
                    <h5 class="card-title">Branch Employees <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>

                      1000
                        </h6>
                        <span class="text-success small pt-1 fw-bold">2%</span> <span class="text-muted small pt-2 ps-1">23% From Last Year</span>

                      </div>
                    </div>

                  </div>
              </div>  

            </div><!-- End Employees Card -->

            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                  <div class="filter"></div>

                  <div class="card-body">
                    <h5 class="card-title">Branche Name <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-geo-alt"></i>
                      </div>
                      <div class="ps-3">
                        <h6>

                     Bacolod Branch
                        </h6>
                       
                      </div>
                    </div>

                  </div>
              </div>  

            </div><!-- End Branches Card -->

            <!-- Reports -->
           


          <!------------------Sections for admin----------------------->

           

          <div class="col-12">
              <div class="card">

                <div class="filter">
                 
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span></span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>


                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Branch Recent Transactions <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#trans Code</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                    
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    
<!-- 
                      <tr>
                        <th scope="row"><a href="#"><?php echo $data['order_code']; ?></a></th>
                        <td><?php echo $data['name']; ?></td>
                        <td><a href="index.php?page=product" class="text-primary"><?php echo $data['prod_name']; ?></a></td>
                        <td><?php echo $data['qty']; ?></td>
                        <td><?php echo '₱ '.$data['prod_price']; ?></td>
                       

                        <?php
                          $status = $data['status'];
                          $stat_res;$stat_col;
                          //delivered = 2
                          //claim = 1
                          //pending = 0
                          if($status === '0'){
                            $stat_res = 'unclaim';
                            $stat_col = 'danger';
                          }else if($status === '1'){
                            $stat_res = 'claim';
                            $stat_col = 'success';
                          }else if($status === '2'){
                            $stat_res = 'Delivered';
                            $stat_col = 'success';
                          }

                         ?>


                        <td><span class="badge bg-<?php echo $stat_col; ?>"><?php echo  $stat_res; ?></span></td>
                      </tr> -->



                     
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

 

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>

 



                    // document.addEventListener("DOMContentLoaded", () => {
                    //   new ApexCharts(document.querySelector("#reportsChart"), {
                    //     series: [{
                        //   name: 'Sales',
                        //   data: [31, 40, 28, 51, 42, 82, 56],
                        // }, {
           //                name: 'Revenue',
           //                data: [11, 32, 45, 32, 34, 52, 41]
           //              }, {
           //                name: 'Customers',
           //                data: [15, 11, 32, 18, 9, 24, 11]
           //              }],
           //              chart: {
           //                height: 350,
           //                type: 'area',
           //                toolbar: {
           //                  show: false
           //                },
           //              },
           //              markers: {
           //                size: 5
           //              },
           //              colors: ['#4154f1', '#2eca6a', '#ff771d'],
           //              fill: {
           //                type: "gradient",
           //                gradient: {
           //                  shadeIntensity: 1,
           //                  opacityFrom: 0.3,
           //                  opacityTo: 0.4,
           //                  stops: [0, 90, 100]
           //                }
           //              },
           //              dataLabels: {
           //                enabled: false
           //              },
           //              stroke: {
           //                curve: 'smooth',
           //                width: 2
           //              },
           //              xaxis: {
           //                type: 'datetime',//lower date
           //                categories: ["2016-09-19T00:00:00.000Z", "2017-09-19T01:30:00.000Z", "2019-09-19T02:30:00.000Z", "2020-09-19T03:30:00.000Z", "2021-09-19T04:30:00.000Z", "2022-09-19T05:30:00.000Z"]
           //              },
           //              tooltip: {
           //                x: {
           //                  format: 'dd/MM/yy HH:mm'
           //                },
           //              }
           //            }).render();
           //          });
         
           // var chart = new ApexCharts(document.querySelector(apexChart));
           //  chart.render();
                  </script>
                  <!-- End Line Chart -->


<!----------for notification script--------------->

<!-----checking if the user is ADMIN OR Staff to include the apex chart-->


<script src="<?= base_url();?>assets/admin-assets/vendor/apexcharts/apexcharts.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/admin-assets/lineChart.js"></script>

