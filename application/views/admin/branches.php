
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
  
  <script>
$(document).ready(function(){
  const addModal = $('#newBranchModal');
  const editModal = $('#editBranchModal');

  var newOption = $('<option>', {
      value: 'rm',
      text: 'Remove Branch Manager',
      id:'rm'
    });
   
  $('#newBranchForm').submit(function(e){
    e.preventDefault()

    const formData = $(this).serialize();
      $.ajax({
          url:'<?=base_url();?>admin-add-branch',
          method:'post',
          data:formData,
          dataType:'json',

          success:function(response){
            //console.log(response)
            formModalClose(addModal,$('#newBranchForm'));
            if(response.message == 'success'){
              message('New Branch Created Successfully!','success');
            }
          },

          error:function(xhr,status,error){
            console.log(xhr.responseText);

            if(xhr.status == 400){
              msg('Oops! unexpected error return Validation_errors!','error');
            }
            if(xhr.status == 500){
              msg('Oops! unexpected Server Error!','error');
            }
          }

      });

  });

    $(document).on('click','#edit_branch_btn',function(e){
        e.preventDefault();
        //remove first the append remove option
        $('#rm').remove();

       $('#current-bm-hidden').val('');

        //lets reset edit form first
        resetForm($('#upBranchForm'));

        const id = $(this).attr('data-id');
          $.ajax({
            url:"<?= base_url();?>admin-edit-location",
            method:'post',
            data:{id:id},
            dataType:'json',

            success:function(data){
              //console.log(data);
              $("#editBranchModal").modal('show');

              //set the current location
              $("#current-location-hidden").val(data.location_id);

              $('#current-branch-id').val(data.branch_id);
              $('#branch-name').val(data.branch_name);
              $('#current-location').val(data.location_id);
              $('#current-location').text(data.province_name+' |'+data.city+' |'+data.street_name);
              
              if(data.BM === null || data.BM === ''){
                $('#current-BM').val('');
                $('#current-BM').text('select');
              }else{
                $('#current-BM').val(data.employee_id);
                $('#current-bm-hidden').val(data.employee_id);
                $('#current-BM').text(data.BM);
               //append option for in case the user want to remove the Branch Manager
                $('#BM').append(newOption);
              }
              
            
            },

            error:function(xhr,status,error){
              console.log(xhr.responseText);
              if(xhr.status == 500){
                msg('Oops! unexpected Internal Server Error!','error');
              }
            }


          });

       


    });

    $('#upBranchForm').submit(function(e){
      e.preventDefault();

      const formData = $(this).serialize();

      swal({
            title: "Are you sure you want Update this Branch?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
      }).then((willconfirmed) => {

        if(willconfirmed){
          
            $.ajax({
                url:'<?= base_url();?>admin-updateBranch',
                method:"post",
                data:formData,
                dataType:'json',

                success:function(response){
                  //console.log(response);
                  formModalClose(editModal,$('#upBranchForm'));
                  if(response.message == 'success'){
                    message('Branch Updated Successfully!','success');
                  }
                },

                error:function(xhr,status,error){
                  //console.log(xhr.responseText);
                  if(xhr.status == 400){
                    msg('Oops! unexpected error return Validation errors','error');
                  }
                  if(xhr.status == 500){
                    msg('Oops Unexpected Internal Server Error!','error');
                  }
                }

              });

         }
      });

       

    });

})


  </script>
