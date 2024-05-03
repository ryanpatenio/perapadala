
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Locations</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Locations</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newLocationModal" type="button"><i class="bi bi-plus-circle"> New</i></button>

        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Country</th>
                    <th>Region</th>
                    <th>Province Name</th>    
                    <th>City</th>       
                     <th>Street</th>                
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                  <?php
                  $i = 1;

                  foreach ($locations as $location) { ?>
                      <tr>
                        <td><?= $i;?></td>
                        <td><?= $location->country_name?></td>
                        <td><?= $location->region_name?></td>
                        <td><?= $location->province_name?></td>
                        <td><?= $location->city?></td>
                        <td><?= $location->street_name?></td>
                       
                        <td>
                          <button type="button" id="edit_location_btn" data-id="<?= $location->location_id?>" class="btn btn-warning bi bi-pencil"> Modify</button>
                         <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                        </td>
                      </tr>

               <?php $i++;   }

                  ?>
                

                </tbody>
              </table>
            </div>
          </div>
         
        </div>
      </div>
   
    </section>


<!--------------All Modal-------------------->
  
  <div class="modal fade" id="newLocationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form method="POST" id="newLocationForm" >
                    <div class="card-body">
                        <div class="row mb-2">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Province Name</label>
                                <input type="text" class="form-control" id="province" name="province"  required>  
                            </div>     
                        </div>
                        <div class="row mb-2">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city"  required>  
                            </div>     
                        </div>
                        <div class="row mb-2">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Street</label>
                                <input type="text" class="form-control" id="street" name="street"  required>  
                            </div>     
                        </div>
                        <div class="row mb-2">
                          <div class="col">
                            <label for="">Country</label>
                            <select name="country" id="country" class="form-select" required>
                              <option value="">Select</option>
                              <?php 

                              foreach ($countries as $country) { ?>
                                  <option value="<?= $country->country_id?>"><?= $country->name?></option>
                                
                           <?php   }
                              
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col">
                            <label for="">Region</label>
                            <select name="region" id="region" class="form-select" required>
                              <option value="">Select</option>
                              <?php 

                              foreach ($regions as $region) { ?>
                                  <option value="<?= $region->region_id?>"><?= $region->region_name?></option>
                                
                           <?php   }
                              
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



    <div class="modal fade" id="upLocationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form method="POST" id="upLocationForm" >
                      <input type="hidden" id="location-id" name="locationID">
                    <div class="card-body">
                        <div class="row mb-2">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Province Name</label>
                                <input type="text" class="form-control" id="province-name" name="province"  required>   
                            </div>    
                        </div>
                        <div class="row mb-2">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">City</label>
                                <input type="text" class="form-control" id="city-name" name="city"  required>   
                            </div>    
                        </div>
                        <div class="row mb-2">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Street</label>
                                <input type="text" class="form-control" id="street-name" name="street"  required>   
                            </div>    
                        </div>
                        <div class="row mb-2">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Region</label>
                                <select name="region" id="region" class="form-select" required>
                                    <option value="" id="current-region"></option>
                                    <?php 

                                    foreach ($regions as $region) { ?>
                                        <option value="<?= $region->region_id?>"><?= $region->region_name?></option>
                                      
                                <?php   }
                                    
                                   ?>
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

  <script>

    $(document).ready(function(){
      const addModal = $('#newLocationModal');
      const editModal = $('#upLocationModal');

     

      $('#newLocationForm').submit(function(e){
        e.preventDefault();

        const formData = $(this).serialize();

          $.ajax({
            url:'<?=base_url();?>admin-add-location',
            method:'post',
            data:formData,
            dataType:'json',

            success:function(response){
             // console.log(response)
             formModalClose(addModal,$('#newLocationForm'));
              if(response.message == 'success'){
                message('New Location added Successfully!','success');
              }
            },

            error:function(xhr,status,error){
              console.log(xhr.responseText)
              if(xhr.status == 400){
                msg('Oops! unexpected error Return Validatin Error','error');
              }
              if(xhr.status == 500){
                msg('Oops! an error Occur in Server Side','error');
              }
            }

          })

      })


        $(document).on('click','#edit_location_btn',function(e){
            e.preventDefault();
            //reset Form first
            resetForm($('#upLocationForm'));

            //id
            const id = $(this).attr('data-id');
           
              $.ajax({
                  url:'<?=base_url();?>admin-editLocation',
                  method:'post',
                  data:{id:id},
                  dataType:'json',

                  success:function(data){
                    //console.log(data)
                    
                    $("#location-id").val(data.location_id);
                    $("#province-name").val(data.province_name);
                    $("#city-name").val(data.city);
                    $("#street-name").val(data.street_name);
                    $("#current-region").val(data.region_id);
                    $("#current-region").text(data.region_name);
                  },

                  error:function(xhr,status,error){
                    console.log(xhr.responseText);
                    if(xhr.status == 400){
                      msg('Oops! unexpected Error return Null','error')
                    }
                    if(xhr.status == 500){
                      msg('Oops! an error Occur Server Error','error');
                    }
                  }

              })
            $("#upLocationModal").modal('show');


        });

        $('#upLocationForm').submit(function(e){
          e.preventDefault();

          const formData = $(this).serialize();
            $.ajax({
              url:'<?=base_url();?>admin-update-location',
              method:'post',
              data:formData,
              dataType:'json',

              success:function(response){
                //console.log(response)
                formModalClose(editModal,$('#upLocationForm'));
                if(response.message == 'success'){
                  message('Location updated Successfully!','success');
                }
              },

              error:function(xhr,status,error){
                console.log(xhr.responseText);

                if(xhr.status == 400){
                  msg('Oops! validation error','error');
                }
                if(xhr.status == 401){
                  msg('Oops Unexpected error return Null','error');
                }
                if(xhr.status == 500){
                  msg('Oops! unexpected Server Error!','error');
                }
              }


            })
        })

    })

</script> 
