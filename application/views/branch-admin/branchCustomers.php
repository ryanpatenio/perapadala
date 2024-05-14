
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Branch Customer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Branch Customer</li>
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
                    <th>Customer Name</th>                  
                    <th>Date</th>               
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
              
                <?php
                
                $i = 1;
                foreach ($customers as $customer) {
                  ?>
                    <tr>
                        <td><?=$i; ?></td>
                        <td><?=$customer->name; ?></td>                       
                        <td><?=date('F j Y - g:ia', strtotime($customer->transaction_date)) ?></td>
                       
                        <td>
                          <button type="button" id="edit_customer_btn" data-id="<?=$customer->customer_id; ?>" class="btn btn-warning bi bi-pencil"> Modify</button>
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
  

<div class="modal fade" id="editCustomerModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" id="updateCustomerForm" >
                <input type="hidden" id="customer-id" name="customer_id">
                <div class="card-body">

                  <div class="row mb-2">
                    <div class="col">
                      <label for="validationDefault01" class="form-label">Customer Name</label>                  
                      <input type="text" class="form-control" name="customer_name" id="customer-name"  required>  
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="validationDefault01" class="form-label">Contact</label>                  
                      <input type="text" class="form-control" maxlength="11" name="contact" id="contact"  required>  
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <label for="validationDefault01" class="form-label">Adress</label>                  
                      <input type="text" class="form-control" name="address" id="address"  required>  
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
</div><!-- End Edit Modal-->

  <!---------------end of all Modal---------------------->

  </main> <!------------- end of Main ----->
  <script type="text/javascript" src="<?= base_url();?>assets/js/branch-manager/branch_customer.js"></script>