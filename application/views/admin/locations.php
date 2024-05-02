
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
                    <th>Province Name</th>    
                    <th>City</th>      
                    <th>Street</th>                
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                      <tr>
                        <td>1</td>
                        <td>Negros Occidental </td>
                        <td>Bacolod City </td>
                        <td>Lacson St.</td>
                       
                        <td>
                          <button type="button" id="edit_location_btn" data-id="" class="btn btn-warning bi bi-pencil"> Modify</button>
                         <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
                        </td>
                      </tr>
                   

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
                    <form method="POST" id="addcat" >
                    <div class="card-body">
                        <div class="row">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Location Name</label>
                                <input type="text" class="form-control" id="location-name" name="locationNames"  required>  
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
                    <div class="card-body">
                        <div class="row">                       
                            <div class="col">
                                <label for="validationDefault01" class="form-label">Location Name</label>
                                <input type="text" class="form-control" id="upLocationName" name="upLocationName"  required>   
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

        $(document).on('click','#edit_location_btn',function(e){
            e.preventDefault();

            $("#upLocationModal").modal('show');


        });

    })

</script> 