
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
                                <input type="email" name="email" id="edit-email" class="form-control" placeholder="E-mail">
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

  <script>
    $(document).ready(function(){
    const addModal = $('#employeeModal');
    const editModal = $('#editEmployeeModal');
    const viewModal = $('#viewEmployeeModal');
    const assignModal = $('#assignModal');
    const removeModal = $('#removeAssignModal');

      $('#newEmployeeForm').submit(function(e){
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
          url:'<?=base_url();?>admin-addEmployee',
          method:'post',
          data:formData,
          dataType:'json',

          success:function(response){
             //res(response)
            formModalClose(addModal,$('#newEmployeeForm'));

            if(response.message == 'success'){
              message('New Employee added Successfully!','success');
            }
          },

          error:function(xhr,status,error){
            res(xhr.responseText);
            if(xhr.responseJSON.message == 'email_exist'){
              msg('Email is already Exist','info');
              $('#email').val('').focus();
            }
            if(xhr.status == 400){
              msg('Oops! Validation error','error');
            }
            if(xhr.status == 500){
              msg('Oops! unexpected Internal Server Error!','error');
            }
          }
          

        });

      });


      $(document).on('click','#edit_btn',function(e){
        e.preventDefault()

        //reset form first
        resetForm($('#updateForm'));
        const id = $(this).attr('data-id');
        
        $.ajax({
          url:'<?=base_url();?>admin-edit-employee',
          method:'post',
          data:{id:id},
          dataType:'json',

          success:function(data){
            $('#e-id').val(data.employee_id);
            
            $('#edit-fname').val(data.fname);
            $('#edit-lname').val(data.lname);
            $('#edit-email').val(data.email);
            $('#edit-contact').val(data.contact);
            $('#edit-address').val(data.address);
            
            //job
            $('#current-job').val(data.job_id);
            $('#current-job').text(data.job_title);
            $('#old-job').val(data.job_id);

            //date
            $('#hire-date').val(data.hire_date);

            $('#editEmployeeModal').modal('show');

          },

          error:function(xhr,status,error){
            
            res(xhr.responseText);
            if(xhr.status == 400){
              msg('Oops! unexpected Error return ID null','error');
            }
            if(xhr.status == 500){
              msg('Oops! unexpected Internal Server Error','error');
             
            }
           
          }

        });
     
      });

      $('#updateForm').submit(function(e){
        e.preventDefault();
        const formData = $(this).serialize();
        swal({
            title: "Are you sure you want Update this Employee?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

          if(willconfirmed){

            $.ajax({
                url:'<?=base_url();?>admin-update-employee',
                method:'post',
                data:formData,
                dataType:'json',

                success:function(response){
                  //res(response)
                  formModalClose(editModal,$('#updateForm'));
                  if(response.message == 'success'){
                    message('Employee Updated Successfully!','success');
                  }
                },

                error:function(xhr,status,error){
                  //res(xhr.responseText);
                  if(xhr.responseJSON.message == 'email_exist'){
                    msg('Email is already Exist','info');
                  
                  }
                  if(xhr.responseJSON.message == 'BP_hasBranch_assign'){
                    msg('Oops! This employee is already assigned to a branch. If you want to change their job title, you must first remove the branch assignment','error');
                  }
                  if(xhr.responseJSON.message == 'AS_hasBranch_assign'){
                    msg('Oops! This employee is already assigned to a branch. If you want to change their job title, you must first remove the branch assignment','error');
                  }

                  if(xhr.responseJSON.message == 'id_null'){
                    msg('Oops Unexpected error return ID null','error');
                  }
                  if(xhr.status == 500){
                    msg('Oopss! unexpected Internal Server Error','error');
                  }
                  if(xhr.responseJSON.message == 'bm_assigned'){
                    formModalClose(editModal,$('#updateForm'));
                    msgThenRedirect("Oops! This employee is currently assigned to one or more branches. If you want to change their job title, you must first remove the employee's assignment from the branch(es). After dismissing this error, you will be redirected to the branches page, where you can locate the employee by name.",'error','<?=base_url()?>admin-branches');
                  }
                }

           });

          }
        });

        

      });
      
      $(document).on('click','#assign-btn',function(e){
        e.preventDefault();
        const id = $(this).attr('data-id');       
        resetForm($('#assignForm'));
        $('#branch').empty();

        $.ajax({
          url:'<?=base_url();?>admin-get-employee-name',
          method:'post',
          data:{id:id},
          dataType:'json',

          success:function(data){
           // res(data)

          let info = data.emp_info;
          let branches = data.branches;
          
            //set basic info
          $('#employee-name').val(info.fname + ' ' + info.lname);
          $('#job-title').val(info.job_title);
          $('#employee-id').val(info.employee_id);
          $('#job-id').val(info.job_id);
          $('#job-code').val(info.job_code);

           //set data in the select option
           // Check if branches is an array
          if (Array.isArray(branches)) {
              // If branches contains only one item
              if (branches.length === 1) {
                  let branch = branches[0];
                  $('#branch').append('<option value="' + branch.branch_id + '">' + branch.branch_name + '</option>');
              } else {
                  // If branches contains more than one item
                  $.each(branches, function(index, value) {
                      $('#branch').append('<option value="' + value.branch_id + '">' + value.branch_name + '</option>');
                  });
              }
          } else {
              // If branches is not an array but a single object
              $('#branch').append('<option value="' + branches.branch_id + '">' + branches.branch_name + '</option>');
          }

             
            
          },

          error:function(xhr,status,error){
            res(xhr.responseText);
          }

        });
        assignModal.modal('show');

      });

      $('#assignForm').submit(function(e){
        e.preventDefault();

        const formData = $(this).serialize();
        swal({
            title: "Are you sure you want the assigned branch of this Employee?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willconfirmed) => {

          if(willconfirmed){

            $.ajax({
                url:"<?=base_url();?>admin-assignEmployee",
                method:'post',
                data:formData,
                dataType:'json',

                success:function(resp){
                  //res(resp);
                  formModalClose(assignModal,$('#assignForm'));
                  if(resp.message == 'success'){
                    message('The employee has been successfully assigned to the branches','success');
                  }
                },

                error:function(xhr,status,error){
                  res(xhr.reponseText);
                  if(xhr.status == 400){
                    msg('Oops! unexpected error return validation error','error');
                  }
                  if(xhr.status == 500){
                    msg('Oops! unexpected Internal server error!','error');
                  }
                }

        });

          }
        });


      });

      $(document).on('click','#remove-btn',function(e){
          e.preventDefault();

            resetForm($('#removeEmployeeForm'));
            const id = $(this).attr('data-id');
              $.ajax({
                  url:'<?=base_url();?>admin-get-assignBranch',
                  method:'post',
                  data:{id:id},
                  dataType:'json',

                  success:function(data){
                    //res(data);
                    $('#emp-name').val(data.emp_name);
                    $('#jb-title').val(data.job_title);
                    $('#branch-assigned').val(data.branch_name)

                    $('#emp-id').val(data.employee_id);
                    $('#jb-code').val(data.job_code);
                    $('#branch-id').val(data.branch_id);
                    removeModal.modal('show');
                  },
                  error:function(xhr,status,error){
                    res(xhr.responseText);
                  }

          });        
              
      });

      $('#removeEmployeeForm').submit(function(e){
        e.preventDefault();

        const formData  = $(this).serialize();
        swal({
            title: "Are you sure you want remove the assigned branch of this Employee?",
            text:'Please Click the `OK` Button to Continue!',
            icon: "info",
            buttons: true,
            dangerMode: true,
            }).then((willconfirmed) => {

              if(willconfirmed){

                  $.ajax({
                    url:'<?=base_url();?>admin-removeAssignBranch',
                    method:'post',
                    data:formData,
                    dataType:'json',

                    success:function(resp){
                      //res(resp)
                      formModalClose(removeModal,$('#removeEmployeeForm'));
                      if(resp.message == 'success'){
                        message('Employee Assigned Branches was successfully remove','success');
                      }
                    },

                    error:function(xhr,status,error){
                      res(xhr.responseText)
                      if(xhr.status == 500){
                        msg('Oops! unexpected Internal Server Error!','error');
                      }
                      if(xhr.status == 400){
                        msg('Oops! unexpected Error Return Validation error!','error');
                      }
                    }

                  });

              }
            });


      });


      $(document).on('click','#viewBtn',function(e){
        e.preventDefault()
        resetForm($('#viewForm'));
        const id = $(this).attr('data-id');
       
        $.ajax({
          url:'<?=base_url();?>admin-get-employee-details',
          method:'post',
          data:{id:id},
          dataType:'json',

          success:function(data){
            
            $('#name').val(data.emp_name);   
              
            $('#e-mail').val(data.email);  
            $('#contact').val(data.contact);
            $('#address').val(data.address);
           
            $('#job-name').val(data.job_title);
            if(data.branch_name === null){
              $('#branch-name').val('No assigned branch');
            }else{
              $('#branch-name').val(data.branch_name);
            }
            $('#viewEmployeeModal').modal('show');
           
          },

          error:function(xhr,status,error){
            res(xhr.responseText);
            if(xhr.status == 500){
              msg('Oops! unexpected Internal Server Error!','error');
            }
          }


        });

       
      
      });
      

    });
  </script>
  
