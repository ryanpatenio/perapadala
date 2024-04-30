
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



                      <tr>
                        <td>1</td>
                        <td>Bacolod Branch</td>
                        <td>Bacolod City | Lacson St.</td>
                        <td>Jedi diah Araceli</td>
                       
                        <td>
                          <button type="button" id="edit_branch_btn" data-id="" class="btn btn-warning bi bi-pencil"> Modify</button>
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
  
   <div class="modal fade" id="newBranchModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Branch</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="addcat" >
                <div class="card-body">

                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Branch Name</label>
                      <input type="text" placeholder="Branch Name" class="form-control">
                    </div>      
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Location</label>
                      <select name="selectLocation" id="" class="form-select">
                        <option value="">Sipalay City</option>
                      </select>
                    </div>      
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Select Branch Manager ( Optional )</label>
                      <select name="selectBM" id="" class="form-select">
                      <option value="">Select</option>
                      <option value="">James Canlas</option>
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
              <form method="POST" id="addcat" >
                <div class="card-body">

                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Branch Name</label>
                      <input type="text" placeholder="Branch Name" class="form-control">
                    </div>      
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Location</label>
                      <select name="selectLocation" id="" class="form-select">
                        <option value="">Sipalay City</option>
                      </select>
                    </div>      
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="">Select Branch Manager ( Optional )</label>
                      <select name="selectBM" id="" class="form-select">
                      <option value="">Select</option>
                      <option value="">James Canlas</option>
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

    $(document).on('click','#edit_branch_btn',function(e){
        e.preventDefault();

        $("#editBranchModal").modal('show');


    });

})


  </script>
