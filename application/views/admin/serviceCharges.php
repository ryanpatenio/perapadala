
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Service Charge / Fees</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Service Charge</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#serviceChargeModal" type="button"><i class="bi bi-plus-circle"> New</i></button>

        </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Percent</th> 
                    <th>Status</th>                     
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php 
                  $i = 1;

                  foreach ($serviceFees as $fee) {
                    ?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?=$fee->percent ?>%</td>
                        <td>
                    <?php
                    $status = '';

                    if($fee->is_default == 1){
                      #default #set Status int DEFAULT
                      $status = 'DEFAULT';
                    }else{
                      $status = 'NOT DEFAULT';
                    }
                    echo $status;

                      ?>


                        </td>
                       
                        <td>
                          <button type="button" id="edit_serviceCharge_btn" data-id="<?=$fee->charge_id?>" class="btn btn-warning bi bi-pencil"> Modify</button>
                         <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                        </td>
                    </tr>

            <?php
                $i++;   }


                  ?>
                     

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>

    </section>



<!--------------All Modal-------------------->
  
  <div class="modal fade" id="serviceChargeModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Service Charges (fee)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body">
                <form method="POST" id="serviceChargeForm" >
                    <div class="card-body">
                      <div class="row mb-2">                        
                          <div class="col">
                            <label for="validationDefault01" class="form-label">Service Charge (%)</label>
                            <input type="number" class="form-control" id="" name="serviceCharge" step="any"  min="0.5" max="1000"   required>   
                          </div>    
                      </div>
                      <div class="row">                        
                          <div class="col">
                            <label for="validationDefault01" class="form-label">Default</label>
                            <select class="form-select" name="this_def" id="this-def" required>
                              <option value="1">Default</option>
                              <option value="0">Not Default</option>
                            </select>
                          </div>    
                      </div>
                    </div>                                
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" name="save" id="save" value="Save">
                </div>
            </form>
        </div>
      </div>
  </div><!-- End Add Modal-->

  <div class="modal fade" id="upServiceChargeModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Service Charges (fee)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
              <div class="modal-body">
                <form method="POST" id="upServiceChargeForm" >
                  <input type="hidden" id="charge-id" name="id">
                  <input type="hidden" id="old-default" name="old_default">
                    <div class="card-body">
                      <div class="row mb-2">                        
                          <div class="col">
                            <label for="validationDefault01" class="form-label">Service Charge (%)</label>
                            <input type="number" class="form-control" id="service-charge" name="serviceCharge"  required>   
                          </div>    
                      </div>
                      <div class="row">                        
                          <div class="col">
                            <label for="validationDefault01" class="form-label">Default</label>
                            <select name="is_default" id="is-default" class="form-control">
                              <option value="" id="current-default"></option>
                              <option value="1">Default</option>
                              <option value="0">Not Default</option>
                            </select>
                          </div>    
                      </div>
                    </div>                                
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" name="update" id="update" value="Save">
                </div>
            </form>
        </div>
      </div>
  </div><!-- End edit Modal-->


<!---------------end of all Modal---------------------->

  </main> <!------------- end of Main ----->

<script type="text/javascript" src="<?= base_url();?>assets/js/admin-ajax/serviceCharge.js"></script>
