
<main id="main" class="main">
    <div class="pageTitle">
      <h1> Branch Employees</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>branch-admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Branch Employees</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          
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
                    <th>Branch</th>                  
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>

                <?php
                
                $i = 1;
                foreach ($employees as $employee) {
                  ?>
                 
                  <tr>
                    <td><?=$i; ?></td>
                    <td><?=$employee->name; ?></td>
                    <td><?=date('F j Y - g:ia', strtotime($employee->hire_date)) ?></td>
                    <td><?= $employee->job_title; ?></td>
                    <td><?= $employee->branch_name; ?></td>
                    <td>
                      
                      <button type="button" id="view_btn" data-id="<?=$employee->employee_id; ?>" class="btn btn-primary bi bi-search"> Details</button>
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
 
<div class="modal fade" id="viewEmployeeModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Employee Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <form id="viewEmployeesForm">
              <div class="card-body">

                <div class="row mb-2 mt-2">                           
                  <div class="col">
                    <label for="fname">First Name</label>
                    <input type="text" id="lname"  class="form-control" placeholder="first name"readonly>
                  </div>  
                  <div class="col">
                    <label for="fname">Last Name</label>
                    <input type="text" id="lname"  class="form-control" placeholder="last name" readonly>
                  </div>   
                </div>
                
                <div class="row mb-2">                           
                  <div class="col">
                    <label for="email">Email</label>
                    <input type="email" id="email"  class="form-control" readonly>
                  </div>  
                  
                </div>
                <div class="row mb-2">                           
                  <div class="col">
                    <label for="contact">Contact</label>
                    <input type="text" id="contact" class="form-control" readonly>
                  </div>  
                  <div class="col">
                    <label for="address">Address</label>
                    <input type="text" id="address"  class="form-control" readonly>
                  </div>   
                </div>

                <div class="row mb-2">
                  <div class="col">
                    <label for="Job Title">Job Title</label>
                    <input type="text" id="job-title" class="form-control" value="" readonly>
                  </div>
                  <div class="col">
                    <label for="branch">Assigned Branch</label>
                   <input type="text" class="form-control" id="assigned-branch" value="" readonly>
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
</div><!-- End Add Modal-->
<!---------------end of all Modal---------------------->
  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="<?= base_url();?>assets/js/branch-manager/branch_employees.js"></script>