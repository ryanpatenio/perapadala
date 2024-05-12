
 <section class="cta">
            <div class="cta-content">
                <div class="container px-5">
                    <h2 class="text-white display-1 lh-1 mb-4">
                        Stop waiting.
                        <br />
                        Start building.
                    </h2>
                    <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Download for free</a>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


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

