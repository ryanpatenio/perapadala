<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pera Padala</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <!----- Jquery 3.1 CDN ---->
        <script src="<?= base_url();?>assets/admin-assets/vendor/jquery-min.js"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="<?= base_url()?>">LBB Pera Padala & Money Changer ( Branch Name )</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                       
                        <?php
                        $login = false;
                        
                        if(!$login){
                            ?>
                         <!-- <li class="nav-item"><a class="nav-link me-lg-3" href="#features">Our Service</a></li>
                         <li class="nav-item"><a class="nav-link me-lg-3" href="#download">Download</a></li> -->
                         <li class="nav-item px-1 "><a class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0"  data-bs-toggle="modal" data-bs-target="#CodeModal">Claim</a></li>
                         <li class="nav-item px-1"><a class="btn btn-danger rounded-pill px-3 mb-2 mb-lg-0"  href="sendTransaction">Send Money</a></li>
                         <li class="nav-item px-1"><a class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0"  href="branchTransaction">All Transaction</a></li>

                            <?php  
                        }else{ ?>

                          
                            
                   <?php     }
                        
                        
                        ?>
                    </ul>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <span class="d-flex align-items-center">
                            <i class="bi-lock-fill me-2"></i>
                            <span class="small">Login</span>
                        </span>
                    </button>
                  
                    
                </div>
            </div>
        </nav>
      