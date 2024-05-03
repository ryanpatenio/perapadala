
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Regions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Regions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newRegionModal" type="button"><i class="bi bi-plus-circle"> New</i></button>

        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Region</th> 
                    <th>Country</th>                 
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                
                <?php

                $i = 1;

                foreach ($regions as $region) {
                  ?>
                  <tr>
                    <td><?= $i;?></td>
                    <td><?= $region->region_name?></td>
                    <td><?= $region->country_name?></td>
                    <td>
                      <button type="button" id="edit_region_btn" data-id="<?=$region->region_id?>" class="btn btn-warning bi bi-pencil"> Modify</button>
                      <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                    </td>
                  </tr>


<?php $i++;
                }
                
                ?>

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>

    </section>



<!--------------All Modal-------------------->
  
  <div class="modal fade" id="newRegionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">New Region</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
                <div class="modal-body">
                    <form method="POST" id="newRegionForm" >
                        <div class="card-body">
                            <div class="row mb-2">
                              <div class="col">
                                  <label for="validationDefault01" class="form-label">Region Name</label>
                                  <input type="text" class="form-control" id="region-name" name="regionName"  required> 
                              </div>                                
                            </div>
                            <div class="row mb-2">
                              <div class="col">
                              <label for="validationDefault01" class="form-label">Country Name</label></label>
                              <select name="country" id="country" class="form-select" required>
                                <option value="">Select</option>
                                <?php
                                $i = 1;
                                
                                foreach ($countries as $country) { ?>
                                  <option value="<?= $country->country_id?>"><?= $country->name?></option>
                             <?php $i++;   }

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

<div class="modal fade" id="editRegionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Region</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form method="POST" id="upRegionForm" >
                      <input type="hidden" id="up-region-id" name="regionID">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Region Name</label>
                                <input type="text" class="form-control" id="up-region-name" name="upRegion"  required> 
                            </div>                                
                        </div>
                        <div class="row mb-2">
                          <div class="col">
                            <label for="">Country</label>
                            <select name="country" id="country" class="form-control">
                              <option value="" id="current-country"></option>
                              <?php
                              
                              foreach ($countries as $country) { ?>

                                <option value="<?=$country->country_id?>"><?= $country->name?></option>

                           <?php   }
                              
                              ?>
                            </select>
                          </div>
                        </div>
                    </div>                                           
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="save" id="update" value="Save">
                </div>
            </form>
        </div>
    </div>
</div><!-- End Edit Modal-->

<!---------------end of all Modal---------------------->

</main> <!------------- end of Main ----->

<script>
$(document).ready(function(){
const addModal = $('#newRegionModal');
const editModal = $('#editRegionModal');

    $('#newRegionForm').submit(function(e){
      e.preventDefault();

      const formData = $(this).serialize();
        $.ajax({
            url:'<?=base_url();?>admin-addRegion',
            method:'post',
            data:formData,
            dataType:'json',

            success:function(response){
              //console.log(response)
              formModalClose(addModal,$("#newRegionForm"));
              if(response.message == 'success'){
                message('New Region Added Successfully!','success');
              }

            },

            error:function(xhr,status,error){
              console.log(xhr.responseText)
              if(xhr.status == 400){
                msg('Oops! unexpected Error!','error');
              }
            }
        })

    })

    $(document).on('click','#edit_region_btn',function(e){
        e.preventDefault();

        const id = $(this).attr('data-id');
        //reset form first
        resetForm($('#upRegionForm'));

        $.ajax({
          url:'<?= base_url();?>admin-editRegion',
          method:'post',
          data:{id:id},
          dataType:'json',

          success:function(data){
           
            $('#up-region-id').val(data.region_id);
            $('#up-region-name').val(data.region_name);
            $('#current-country').text(data.country_name);
            $('#current-country').val(data.country_id);
            $("#editRegionModal").modal('show');
          },

          error:function(xhr,status,error){
            console.log(xhr.responseText)
          }

        })
        


    });

    $('#upRegionForm').submit(function(e){
      e.preventDefault()

      const formData = $(this).serialize();
        $.ajax({
          url:'<?=base_url();?>admin-updateRegion',
          method:'post',
          data:formData,
          dataType:'json',

          success:function(response){
           // console.log(response)
            formModalClose(editModal,$('#upRegionForm'));
            if(response.message == 'success'){
              message('Region Updated Successfully!','success');
            }
          },
          error:function(xhr,status,error){
            console.log(xhr.responseText)
            if(xhr.status == 400){
              msg('Opps! validation Error','error');
            }
            if(xhr.status == 401){
              msg('Oops! Id return Null!','error');
            }
            if(xhr.status == 500){
              msg('Oops! internal Server Error return false!','error');
            }
          }

        });
    })

})

</script>

  
