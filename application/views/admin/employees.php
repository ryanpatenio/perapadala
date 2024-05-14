
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
                <?php 
                $i = 1;

                foreach ($employees as $employee) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?=$employee->name ?></td>
                        <td><?=$employee->hire_date ?></td>
                        <td><?=date('F j, Y', strtotime($employee->hire_date)) ?></td>
                       
                        <td>
                          <button type="button" id="edit_btn" data-id="<?=$employee->employee_id ?>" class="btn btn-warning btn-sm bi bi-pencil"> Modify</button>
                        <?php
                        #condition if this employee already assigned
                        if($employee->branch_id != 0){ ?>
                            <button type="button" id="remove-btn" data-id="<?=$employee->employee_id ?>" class="btn btn-danger btn-sm bi bi-pencil"> Remove</button>
                       <?php }else{ ?>

                        <button type="button" id="assign-btn" data-id="<?=$employee->employee_id ?>" class="btn btn-success btn-sm bi bi-pencil"> Assign</button>

                      <?php }
                        
                        ?>

                          
                          <button type="button" id="viewBtn" data-id="<?=$employee->employee_id ?>" class="btn btn-primary btn-sm bi bi-search"> Details</button>
                        </td>
                    </tr>
              <?php $i++;  }
                
                ?>

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
                      <form method="POST" id="newEmployeeForm" >
                        <div class="card-body">

                          <div class="row mb-2 mt-2">                           
                            <div class="col">
                              <label for="fname">First Name</label>
                              <input type="text" name="fname" class="form-control" placeholder="first name" required>
                            </div>  
                            <div class="col">
                              <label for="fname">Last Name</label>
                              <input type="text" name="lname" class="form-control" placeholder="last name" required>
                            </div>   
                          </div>
                          
                          <div class="row mb-2">                           
                            <div class="col">
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                            </div>  
                            <div class="col">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control" placeholder="password" required>
                            </div>   
                          </div>
                          <div class="row mb-2">                           
                            <div class="col">
                              <label for="contact">Contact</label>
                              <input type="text" name="contact" class="form-control" placeholder="contact" required>
                            </div>  
                            <div class="col">
                              <label for="address">Address</label>
                              <input type="text" name="address" class="form-control" placeholder="address" required>
                            </div>   
                          </div>

                          <div class="row mb-2">
                            <div class="col">
                              <label for="Job Title">Job Title </label>
                              <select name="job" id="job" class="form-select" required>
                               
                                <?php
                                  foreach ($jobs as $job) { ?>
                                     <option value="<?= $job->job_id?>"><?= $job->name?></option>

                                <?php  }
                                
                                ?>
                              </select>
                            </div>
                          
                            <div class="col">
                              <label for="">Hire Date</label>
                              <input type="date" name="hireDate" class="form-control" required>
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
                      <input type="hidden" name="id" id="e-id">
                      <input type="hidden" id="old-job" name="old_job">
                      <input type="hidden" id="old-email" name="old_email">

                        <div class="card-body">

                            <div class="row mb-2 mt-2">                           
                              <div class="col">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="edit-fname" class="form-control" placeholder="first name">
                              </div>  
                              <div class="col">
                                <label for="fname">Last Name</label>
                                <input type="text" name="lname" id="edit-lname" class="form-control" placeholder="last name">
                              </div>   
                            </div>

                            <div class="row mb-2">                           
                              <div class="col">
                                <label for="email">Email</label>
                                <input type="email" name="up_email" id="edit-email" class="form-control" placeholder="E-mail">
                              </div>  
                              <div class="col">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password">
                              </div>   
                            </div>
                            <div class="row mb-2">                           
                              <div class="col">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" id="edit-contact" class="form-control" placeholder="contact">
                              </div>  
                              <div class="col">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="edit-address" class="form-control" placeholder="address">
                              </div>   
                            </div>

                            <div class="row mb-2">
                              <div class="col">
                                <label for="Job Title">Select Job </label>
                                <select name="job"  class="form-select" required>
                                  <option value="" id="current-job"></option>
                               <?php
                                 foreach ($jobs as $job) { ?>
                                    <option value="<?= $job->job_id?>"><?= $job->name?></option>

                               <?php  }
                               
                               ?>
                             </select>
                              </div>
                                <div class="col">
                                  <label for="">Hire Date</label>
                                  <input type="date" name="hireDate" id="hire-date" class="form-control" required>
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
                                <label for="fname">Name</label>
                                <input type="text" readonly id="name" class="form-control" placeholder="Name">
                              </div>  
                              
                            </div>

                            <div class="row mb-2">                           
                              <div class="col">
                                <label for="email">Email</label>
                                <input type="email" readonly id="e-mail" class="form-control" placeholder="E-mail">
                              </div>  
                              
                            </div>
                            <div class="row mb-2">                           
                              <div class="col">
                                <label for="contact">Contact</label>
                                <input type="text" readonly id="contact" class="form-control" placeholder="contact">
                              </div>  
                              <div class="col">
                                <label for="address">Address</label>
                                <input type="text" readonly id="address" class="form-control" placeholder="address">
                              </div>   
                            </div>

                            <div class="row mb-2">
                              <div class="col">
                                <label for="Job Title">Job</label>
                                <input type="text" id="job-name" readonly class="form-control" value="">
                              </div>
                              <div class="col">
                                <label for="branch">Assigned Branch</label>
                                <input type="text" id="branch-name" readonly class="form-control" value="">
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


              <div class="modal fade" id="assignModal" tabindex="-1">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Assign Branch</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="assignForm" >
                        <input type="hidden" id="employee-id" name="id">
                        <input type="hidden" id="job-id" name="job_id">
                        <input type="hidden" id="job-code" name="job_code">
                        <div class="card-body">
                                
                          <div class="row mb-2">
                            <div class="col">
                              <label for="">Employee Name</label>
                              <input type="text" id="employee-name" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col">
                              <label for="">Job Title</label>
                              <input type="text" id="job-title" readonly class="form-control">
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col">
                              <label for="">Select Branch</label>
                                <select name="branch" id="branch" class="form-select">
                                  <option value="">Select</option>
                                 
                                </select>
                            </div>
                          </div>
                            
                        </div>                                            
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary ">Save</button>
                      
                    </div>
                </form>
                  </div>
                </div>
              </div><!-- End assign Modal-->

              <div class="modal fade" id="removeAssignModal" tabindex="-1">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Assign Branch</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" id="removeEmployeeForm" >
                        <input type="hidden" id="emp-id" name="emp_id">
                        <input type="hidden" id="jb-code" name="job_code">
                        <input type="hidden" id="branch-id" name="branch_id">
                        <div class="card-body">
                                
                          <div class="row mb-2">
                            <div class="col">
                              <label for="">Employee Name</label>
                              <input type="text" id="emp-name" class="form-control" readonly>
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col">
                              <label for="">Job Title</label>
                              <input type="text" id="jb-title" readonly class="form-control">
                            </div>
                          </div>
                          <div class="row mb-2">
                            <div class="col">
                              <label for="">Branch Assigned</label>
                              <input type="text" id="branch-assigned" readonly class="form-control">
                            </div>
                          </div>
                          
                            
                        </div>                                            
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger ">Remove</button>
                      
                    </div>
                </form>
                  </div>
                </div>
              </div><!-- End assign Modal-->


<!---------------end of all Modal---------------------->




  </main> <!------------- end of Main ----->

  <script type="text/javascript" src="<?= base_url();?>assets/js/admin-ajax/employees.js"></script>
  
