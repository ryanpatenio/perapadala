
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Branches</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Branches</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newBranchModal" type="button"><i class="bi bi-plus-circle"> New</i></button>

        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Branch Name</th>  
                    <th>Location</th>   
                    <th>Branch Manager</th>             
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
  
                <?php 
                  
                  $i = 1;
                  foreach ($branches as $branch) { ?>                   
                    
                    <tr>
                        <td><?= $i;?></td>
                        <td><?=$branch->branch_name; ?></td>
                        <td><?= $branch->location; ?></td>
                        <td>
                        <?php
                        //check if Bm is Null
                        $bm = $branch->BM;
                        $status = '';
                        $color = '';
                        if($bm === '' || $bm === null || $bm === 'null'){
                          $status = 'No Assigned Branch Manager';
                          $color = 'text-danger';
                        }else{
                          $status =  $branch->BM;
                          $color = '';
                        }

                        ?>
                        
                        <?=$status ?>
                      
                      </td>
                       
                        <td>
                          <button type="button" id="edit_branch_btn" data-id="<?=$branch->branch_id ?>" class="btn btn-warning bi bi-pencil"> Modify</button>
                         <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                        </td>
                      </tr>

                 <?php $i++; }

                ?>

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>
   


    </section>



<!--------------All Modal-------------------->
  
   <div class="modal fade" id="newBranchModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Branch</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="newBranchForm" >
                <div class="card-body">

                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Branch Name</label>
                      <input type="text" name="branchName" placeholder="Branch Name" class="form-control" required>
                    </div>      
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Location</label>
                      <select name="location" id="" class="form-select"required>
                        <?php
                        
                        foreach ($locations as $location) { ?>
                            <option value="<?= $location->location_id?>">(Phil) <strong id="region"><?= $location->region_name?></strong>| <strong id="prov"><?= $location->province_name?></strong> | <strong id="city"> <?= $location->city?></strong> | <strong id="street"><?= $location->street_name;?></strong></option>
                       <?php }
                        
                        ?>

                      </select>
                    </div>      
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Select Branch Manager ( Optional )</label>
                      <select name="BM" id="" class="form-select">
                          <option option value="">Select</option>
                          <?php
                          foreach ($BMemployees as $employee) { ?>
                              <option value="<?=$employee->employee_id ?>"><?=$employee->employee_name?> (BM)</option>

                        <?php  }
                          
                          
                          ?>
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

      <div class="modal fade" id="editBranchModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Branch</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="upBranchForm" >

                <input type="hidden" name="branch_id" id="current-branch-id">
                <input type="hidden" name="currentBMhidden" id="current-bm-hidden">
                <input type="hidden" id="current-location-hidden" name="currentLocationHidden">            


                <div class="card-body">

                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Branch Name</label>
                      <input type="text" placeholder="Branch Name" name="branch" id="branch-name" class="form-control">
                    </div>      
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Location</label>
                      <select name="location" id="" class="form-select"required>
                        <option value="" id="current-location"></option>
                        <?php
                        
                        foreach ($locations as $location) { ?>
                            <option value="<?= $location->location_id?>">(Phil) <strong id="region"><?= $location->region_name?></strong>| <strong id="prov"><?= $location->province_name?></strong> | <strong id="city"> <?= $location->city?></strong> | <strong id="street"><?= $location->street_name;?></strong></option>
                       <?php }
                        
                        ?>

                      </select>
                    </div>      
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Select Branch Manager ( Optional )</label>
                      <select name="BM" id="BM" class="form-select">
                          <option value="" id="current-BM"></option>
                        
                          <?php
                          foreach ($BMemployees as $employee) { ?>
                              <option value="<?=$employee->employee_id ?>"><?=$employee->employee_name?> (BM)</option>

                        <?php  }
                          
                          
                          ?>
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


<!---------------end of all Modal---------------------->

  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="<?= base_url();?>assets/js/admin-ajax/branches.js"></script>