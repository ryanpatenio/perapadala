
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title class="tle">LBB Pera Padala</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url();?>assets/admin-assets/img/logo2.jpg" rel="icon">
  <link href="<?= base_url();?>assets/admin-assets/img/logo2.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url();?>assets/admin-assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url();?>assets/admin-assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url();?>assets/admin-assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url();?>assets/admin-assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url();?>assets/admin-assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url();?>assets/admin-assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url();?>assets/admin-assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url();?>assets/admin-assets/css/style.css" rel="stylesheet">

  <script src="<?= base_url();?>assets/admin-assets/vendor/jquery-min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
     @media print {
            /* Hide the header when printing */
            .navbar {
                display: none;
            }
            .sidebar{
              display: none;
            }
            .header{
              display: none;
            }
            .header-nav{
              display: none;
            }
            .toggle-sidebar-btn{
              display: none;
            }
            .logo{
              display: none;
            }
            .lgs{
              display: none;
            }
            .pageTitle{
              display: none;
            }
            .btn-print{
              display: none;
            }
            .tle{
              display: none;
            }
            footer{
              display: none;
            }

          }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center bg-dark">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= base_url()?>" class="logo d-flex align-items-center">
        <img class="lgs" src="<?= base_url();?>assets/admin-assets/img/logo.png" alt="">
        <span class="d-none d-lg-block " style="color: white;">Branch Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="color: white;"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <!-- <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button> -->
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <!-- <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a> -->
        </li><!-- End Search Icon-->

        </li> <!-- End Messages Nav -->

        <?php
        if(!$this->session->userdata['emp_id']){
          redirect(base_url());
        }

        $name = $this->session->userdata['emp_name'];
       
        $job_title = $this->session->userdata['job_title'];
        if($job_title == 'BM'){
          $job_name = 'Branch Manager';
        }else{
          $job_name = '';
        }


        #avatar
          $avatar = $this->session->userdata('avatar');
          $avatar_path = FCPATH . 'uploads/avatar/' . $avatar;
          $default_avatar = base_url('assets/admin-assets/avatar/no_avatar.png');

          if (file_exists($avatar_path) && !empty($avatar)) {
              $avatar_url = base_url('uploads/avatar/' . $avatar);
          } else {
              $avatar_url = $default_avatar;
          }


        
        ?>

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= $avatar_url; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white;"><?= $name; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">


              <h6><?=$name; ?></h6>
              <span><?=$job_name; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

          <!--   <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li> -->
           <!--  <li>
              <hr class="dropdown-divider">
            </li> -->

          <!--   <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> -->
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#" id="sign_out_btn_ad">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


<script type="text/javascript">
  


</script>