<?php

$dashboard = new dash();
?>


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
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                 <!--  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
                </div>

                <div class="card-body">
                  <h5 class="card-title">Sales <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">

                    <?php
                    
                    $Mysales = $dashboard->getSalesToday();
                    $SalesIncrease = $dashboard->getSalesIncrease();
                    $SalesStatus = '';
                    $salesColorStatus;

                    if($SalesIncrease > -1){
                      $SalesStatus = 'Increase';
                      $salesColorStatus = 'success';
                    }else{
                      $SalesStatus = 'Decrease';
                      $salesColorStatus = 'danger';
                    }
                    
                    ?>
                      <h6>
                      ₱
                      <?php if($Mysales){ echo ' '.$Mysales; }else{echo "0"; }
                      
                      
                      ?>
                        
                      </h6>
                      <span class="text-<?php echo $salesColorStatus; ?> small pt-1 fw-bold"><?php if($SalesIncrease){echo $SalesIncrease; }else{echo '0'; } ?>%</span> <span class="text-muted small pt-2 ps-1"><?php echo $SalesStatus; ?> from Last Month</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                 <!--  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
                </div>

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      ₱
                    </div>
                    <div class="ps-3">
                      <h6>₱<?php
                      
                      $revenueThisMonth = $dashboard->revenueThisMonth();
                      $revenueStatus;
                      $ifIncrease;


                      //this is for status ** increase or Decrease
                      if($revenueThisMonth > -1 ){
                          $ifIncrease = 'Increase';
                        }else{
                          $ifIncrease = 'Decrease';
                        }


                        ///end of status

                        
                      if(!$revenueThisMonth){
                        echo "0";
                      }else{
                        echo ' '.$revenueThisMonth;
                        if($revenueThisMonth > -1 ){
                          $ifIncrease = 'Increase';
                        }else{
                          $ifIncrease = 'Decrease';
                        }
                      }
                      $revenuePercentThisMonth = $dashboard->revenuePercentThisMonth();
                      if($revenuePercentThisMonth > -1){
                        $revenueStatus = 'success';
                      }else{
                        $revenueStatus = 'danger';
                      }
                      
                      ?></h6>
                      <span class="text-<?php echo $revenueStatus; ?> small pt-1 fw-bold"><?php if($revenuePercentThisMonth){echo $revenuePercentThisMonth; }else{echo "0";} ?>%</span> <span class="text-muted small pt-2 ps-1"><?php echo $ifIncrease; ?> from last month</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <!-- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
                </div>

                <div class="card-body">
                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>

                      <?php 
                      
                      $data_user = $dashboard->getCountUserThisYear();
                      if($data_user){
                        echo $data_user;
                      }


                      $data_userPercent = $dashboard->getPercentCustomerCount();
                      $countPercent;
                      $colorStatusUser;
                      if($data_userPercent > -1){
                        $countPercent = 'Increase';
                        $colorStatusUser = 'success';
                      }else{
                        $countPercent = 'Decrease';
                        $colorStatusUser = 'danger';
                      }
                      
                      ?>



                      </h6>
                      <span class="text-<?php echo $colorStatusUser; ?> small pt-1 fw-bold"><?php if($data_userPercent){echo $data_userPercent; }else{echo "0";} ?>%</span> <span class="text-muted small pt-2 ps-1"><?php echo $countPercent; ?> From Last Year</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
           


          <!------------------Sections for admin----------------------->

            <?php
            if($user_data['type'] == '1'){
              ?>

          <div class="col-12">
              <div class="card">

                <div class="filter">
                  <!-- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
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
                 <!--  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul> -->
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Sales <span>| Today</span></h5>

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
                      <?php

                      $RcSalesProdToday = $dashboard->recentSalesProdToday();

                      if($RcSalesProdToday){
                       foreach ($RcSalesProdToday as $data) {
                         # code...
                          ?>

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
                      </tr>


                          <?php

                         }
                      }

                       ?>

                     
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <!-- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a> -->
                  <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow"> -->
                    <!-- <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li> -->

                   <!--  <li><a class="dropdown-item" href="#">Today</a></li> -->
                    <!-- <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li> -->
<!--                   </ul> -->
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                      $topSelling = $dashboard->topSellingToday();
                      if($topSelling){
                        foreach ($topSelling as $data_s) {
                          # code...
                          ?>  


                      <tr>
                        <th scope="row"><a href="#"><img src="assets/avatar/<?php echo $data_s['avatar'] ?>" alt=""></a></th>
                        <td><a href="index.php?page=product" class="text-primary fw-bold"><?php echo $data_s['prod_name']; ?></a></td>
                        <td><?php echo $data_s['prod_price']; ?></td>
                        <td class="fw-bold"><?php echo $data_s['sold']; ?></td>
                        <td><?php echo '₱ '.$data_s['revenue']; ?></td>
                      </tr>


                          <?php

                        }
                      }

                       ?>
                      
                     
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
             <!--  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul> -->
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

              <?php
             
            
              $AllDataActivity = $dashboard->getAllRecentActivity();

              if($AllDataActivity){
                foreach($AllDataActivity as $dataAct){
                $array = array(
                  'id'=>$dataAct['order_id']

                );

                $dataSingle = $dashboard->getRecentActivity($array['id']);
                for($i = 0; $i < count($array); $i++){
                  //checking if he ordered two or more product
                 if($dataSingle->counter > 1){
                  $etc = '<p>and more....</p>';
                 }else{
                  $etc = '';
                 }
                 //check if the value of time is minutes or hours
                 $time = $dataSingle->time;
                   
                 if($time <= 59){
                  $type = 'minute';
                  
                    if($time > 1){
                      $timeType = 'minutes';
                    }else{
                      $timeType = 'minute';
                    }
                 }
                 if($time >= 60){
                  $type = 'hour';
                    if($time > 60){
                      $timeType = 'hour';
                    }else if($time >= 120){
                      $timeType = 'hours';
                    }
                 }


                 $checkTime = $dashboard->getTimeOrdered($array['id'],$type);
                 

                ?>
                <div class="activity-item d-flex">
                  <div class="activite-label"><?php echo $checkTime.' '.$timeType; ?></div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                     <a href="#" class="fw-bold text-dark"><?php echo $dataSingle->name; ?> Ordered <?php echo $dataSingle->qty.' '.$dataSingle->prod_name.' '.$etc; ?></a> 
                  </div>
                </div><!-- End activity item-->
                
<?php
                }
              }
               
              }
              
              
              ?>




              </div>

            </div>
          </div><!-- End Recent Activity -->

<?php
              
            }
            
            
            ?>

        </div><!-- End Right side columns -->

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
<?php
//checking if the user is ADMIN OR Staff to include the apex chart
if($user_data['type'] == 1){
  ?>

<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script type="text/javascript" src="assets/lineChart.js"></script>
  <?php
}


 ?>
