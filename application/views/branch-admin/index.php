
<main id="main" class="main" style="filter: blur(4px);">

    <div class="page-title">
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
                      <h6 id="income-this-day"></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">20%</span> <span class="text-muted small pt-2 ps-1">100%</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


             <!-- Revenue Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                
                </div>

                <div class="card-body">
                  <h5 class="card-title">Income <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      ₱
                    </div>
                    <div class="ps-3">
                      <h6 id="income-this-month"></h6>
                    
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
                      <h6 id="customers-count">

                    
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
                        <h6 id="employees-count">

                   
                        </h6>
                        <span class="text-success small pt-1 fw-bold">2%</span> <span class="text-muted small pt-2 ps-1">23% From Last Year</span>

                      </div>
                    </div>

                  </div>
              </div>  

            </div><!-- End Employees Card -->

            <div class="col-xxl-8 col-xl-12">
                <div class="card info-card customers-card">
                  <div class="filter"></div>

                  <div class="card-body">
                    <h5 class="card-title">Branch Name <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-geo-alt"></i>
                      </div>
                      <div class="ps-3">
                        <h6>

                    <?php
                      $branch_name = $this->session->userdata('branch_name');
                      if(!$branch_name){
                        $branch_n = 'Error';
                      }else{
                        $branch_n = $branch_name;
                      }
                    ?>

                    <?= $branch_n; ?>
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
                        <th>#</th>
                        <th scope="col">#trans Code</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Fee</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    $i = 1;

                    foreach ($transactions as $transaction) {?>

                      <tr>
                          <td><?=$i; ?></td>
                          <th scope="row"><a href="#"><?=$transaction->transaction_code; ?></a></th>
                          <td><?=$transaction->customer_name; ?></td>
                          <td><?=$transaction->amount; ?></td>
                          <td><?=$transaction->fee; ?></td>

                          <?php
                          $status = '';
                          $color = '';

                          if($transaction->status == '0' || $transaction->status == 0){
                            $status = 'In Progress';
                            $color = 'warning';
                          }else{
                            $status = 'Claimed';
                            $color = 'success';
                          }

                          ?>
                          <td><span class="badge bg-<?=$color; ?>"><?=$status; ?></span></td>
                      </tr>

                  <?php $i++;  }
                    
                    ?>
                    
                    
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
 

<!-----checking if the user is ADMIN OR Staff to include the apex chart-->


<script src="<?= base_url();?>assets/admin-assets/vendor/apexcharts/apexcharts.min.js"></script>


<script type="text/javascript" src="<?= base_url();?>assets/js/branch-manager/dashboardReports.js"></script>


