
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Employees</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Employees</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#employeeModal" type="button"><i class="bi bi-plus-circle"> New</i></button>

        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Hire Date</th>
                    <th>Job Title</th>                  
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>



                      <tr>
                        <td>1</td>
                        <td>Patricio Tan</td>
                        <td>January 4 2020</td>
                        <td>Branch Personnel</td>
                       
                        <td>
                          <button type="button" id="edit_employee" data-id="2" class="btn btn-warning btn-sm bi bi-pencil"> Modify</button>
                          <button type="button" id="viewBtn" class="btn btn-primary btn-sm bi bi-search"> Details</button>
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
  
            <div class="modal fade" id="employeeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">New Employee</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="addcat" >
                        <div class="card-body">

                          <div class="row mb-2 mt-2">                           
                            <div class="col">
                              <label for="fname">First Name</label>
                              <input type="text" name="fname" class="form-control" placeholder="first name">
                            </div>  
                            <div class="col">
                              <label for="fname">Last Name</label>
                              <input type="text" name="lname" class="form-control" placeholder="last name">
                            </div>   
                          </div>
                          
                          <div class="row mb-2">                           
                            <div class="col">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control" placeholder="E-mail">
                            </div>  
                            <div class="col">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control" placeholder="password">
                            </div>   
                          </div>
                          <div class="row mb-2">                           
                            <div class="col">
                              <label for="contact">Contact</label>
                              <input type="text" name="contact" class="form-control" placeholder="contact">
                            </div>  
                            <div class="col">
                              <label for="address">Address</label>
                              <input type="text" name="address" class="form-control" placeholder="address">
                            </div>   
                          </div>

                          <div class="row mb-2">
                            <div class="col">
                              <label for="Job Title">Select Job </label>
                              <select name="job" id="job" class="form-select">
                                <option value="">Branch Manager</option>
                              </select>
                            </div>
                            <div class="col">
                              <label for="branch"> Select Branches </label>
                              <select name="branch" id="job" class="form-select">
                                <option value="">Bacolod Branch</option>
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

              <div class="modal fade" id="editEmployeeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Employee</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="updateForm" >
                        <div class="card-body">

                            <div class="row mb-2 mt-2">                           
                              <div class="col">
                                <label for="fname">First Name</label>
                                <input type="text" name="edit_fname" class="form-control" placeholder="first name">
                              </div>  
                              <div class="col">
                                <label for="fname">Last Name</label>
                                <input type="text" name="edit_lname" class="form-control" placeholder="last name">
                              </div>   
                            </div>

                            <div class="row mb-2">                           
                              <div class="col">
                                <label for="email">Email</label>
                                <input type="email" name="edit_email" class="form-control" placeholder="E-mail">
                              </div>  
                              <div class="col">
                                <label for="password">Password</label>
                                <input type="password" name="edit_password" class="form-control" placeholder="password">
                              </div>   
                            </div>
                            <div class="row mb-2">                           
                              <div class="col">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" class="form-control" placeholder="contact">
                              </div>  
                              <div class="col">
                                <label for="address">Address</label>
                                <input type="text" name="edit_address" class="form-control" placeholder="address">
                              </div>   
                            </div>

                            <div class="row mb-2">
                              <div class="col">
                                <label for="Job Title">Select Job </label>
                                <select name="edit_job" id="edit_job" class="form-select">
                                  <option value="">Branch Manager</option>
                                </select>
                              </div>
                              <div class="col">
                                <label for="branch"> Select Branches </label>
                                <select name="edit_branch" id="edit_branc" class="form-select">
                                  <option value="">Bacolod Branch</option>
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

              
              <div class="modal fade" id="viewEmployeeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Employee Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="viewForm" >
                        <div class="card-body">

                            <div class="row mb-2 mt-2">                           
                              <div class="col">
                                <label for="fname">First Name</label>
                                <input type="text" readonly class="form-control" placeholder="first name">
                              </div>  
                              <div class="col">
                                <label for="fname">Last Name</label>
                                <input type="text" readonly class="form-control" placeholder="last name">
                              </div>   
                            </div>

                            <div class="row mb-2">                           
                              <div class="col">
                                <label for="email">Email</label>
                                <input type="email" readonly name="edit_email" class="form-control" placeholder="E-mail">
                              </div>  
                              
                            </div>
                            <div class="row mb-2">                           
                              <div class="col">
                                <label for="contact">Contact</label>
                                <input type="text" readonly class="form-control" placeholder="contact">
                              </div>  
                              <div class="col">
                                <label for="address">Address</label>
                                <input type="text" readonly class="form-control" placeholder="address">
                              </div>   
                            </div>

                            <div class="row mb-2">
                              <div class="col">
                                <label for="Job Title">Job</label>
                                <input type="text" readonly class="form-control" value="">
                              </div>
                              <div class="col">
                                <label for="branch">Assigned Branch</label>
                                <input type="text" readonly class="form-control" value="">
                              </div>
                            </div>



                        </div>                       
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                    </div>
                </form>
                  </div>
                </div>
              </div><!-- End Edit Modal-->

<!---------------end of all Modal---------------------->




  </main> <!------------- end of Main ----->

  <script>
    $(document).ready(function(){

      $(document).on('click','#edit_employee',function(e){
        e.preventDefault()

       // alert($(this).attr('data-id'))
       $('#editEmployeeModal').modal('show');

      });

      $(document).on('click','#viewBtn',function(e){
        e.preventDefault()

       // alert($(this).attr('data-id'))
       $('#viewEmployeeModal').modal('show');

      })
      

    });
  </script>
  
