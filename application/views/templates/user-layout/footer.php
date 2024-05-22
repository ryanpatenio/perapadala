
 <section class="cta">
            <div class="cta-content">
                <div class="container px-5">
                    <h2 class="text-white display-1 lh-1 mb-4">
                       Perapadala
                        <br />
                        
                    </h2>
                    <!-- <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="#" target="_blank"></a> -->
                </div>
            </div>
        </section>
        <!-- App badge section-->
        <section class="bg-gradient-primary-to-secondary get-app" id="download">
            <div class="container px-5">
                <h2 class="text-center text-white font-alt mb-4">Get the app now!</h2>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                    <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
                    <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>
                </div>
            </div>
        </section>



<!-- Footer-->
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">LBB Pera Padala!</span></strong>. All Rights Reserved <?php $year = (new DateTime)->format("Y"); echo $year; ?></div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
        <!-- Login Modal-->

        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Login</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        
                        <form id="loginForm">
                     
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                             <!-- Password address input-->
                             <div class="form-floating mb-3">
                                <input class="form-control" name="password" id="password" type="password" placeholder="Password" data-sb-validations="required,password" />
                                <label for="password">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">An Password is required.</div>
                                
                            </div>
                          
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill btn-lg">Login</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
    <div class="modal fade" id="profileModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="profileForm">
                    <div class="card-body">
                        <input type="hidden" id="emp-id" name="emp_id">
                        <div class="row">
                            <div class="col-md-6 mb-2">                                        
                                <div class="mb-0">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" name="fname"  class="form-control" id="fname" value="" required>
                                </div>                                       
                            </div>
                            
                            <div class="col-md-6 mb-2">                                        
                                <div class="mb-0">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" name="lname"  class="form-control" id="lname" value=""  required>
                                </div>                                       
                            </div>                                   
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">                                        
                                <div class="mb-0">
                                    <label for="" class="form-label">E-mail</label>
                                    <input type="email" name="email"  class="form-control" id="e-mail" value="" required>
                                </div>                                       
                            </div>
                            
                            <div class="col-md-6 mb-2">                                        
                                <div class="mb-0">
                                    <label for="" class="form-label">Password (optional)</label>
                                    <input type="password" name="pass"  class="form-control" id="pass-word" value=""  >
                                </div>                                       
                            </div>                                   
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">                                        
                                <div class="mb-0">
                                    <label for="" class="form-label">Contact</label>
                                    <input type="text" name="contact" maxlength="11"  class="form-control" id="contact" value=""  required>
                                </div>                                       
                            </div>
                            
                            <div class="col-md-6 mb-2">                                        
                                <div class="mb-0">
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address"  class="form-control" id="address" value=""  required>
                                </div>                                       
                            </div>                                   
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">                                        
                                <div class="mb-0">
                                    <label for="" class="form-label">Job Title</label>
                                    <input type="text" name="" readonly  class="form-control text-danger" value="" id="job-title">
                                </div>                                       
                            </div>
                            
                            <div class="col-md-6 mb-2">                                        
                                <div class="mb-0">
                                    <label for="" class="form-label">Branch Assigned</label>
                                    <input type="text" name="" readonly id="branch-assigned" class="form-control text-danger" value="">
                                </div>                                       
                            </div>                                   
                        </div>
                        
                    
                    </div>                       

            </div>                                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                    </div>
                 </form>
            </div>
        </div>
    </div><!-- End profile Modal-->

        <!-- Code Form--->
        <div class="modal fade" id="CodeModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary-to-secondary p-4">
                        <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Put your Code Here!</h5>
                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0 p-4">
                        
                        <form id="codeForm" method="post">
                                               
                             <!-- Password address input-->
                             <div class="form-floating mb-3">
                                <input class="form-control" name="code" id="code" type="text" placeholder="Put your Code Here!..." data-sb-validations="required,code" />
                                <label for="Code">Code</label>
                                <div class="invalid-feedback" data-sb-feedback="code:required">An Password is required.</div>
                                
                            </div>
                          
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill btn-lg" id="btn-search-code">Search</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap core JS-->
        <script src="<?= base_url();?>assets/admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <script type="text/javascript" src="<?= base_url();?>assets/admin-assets/js/moment.js"></script>


    </body>
</html>
<script type="text/javascript" src="<?= base_url();?>assets/swal/sweet.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/admin-assets/js/msg.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/user/login.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/user/code.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/js/user/branch-transaction.js"></script>
<script>

$(document).ready(function(){
  

});

</script>

