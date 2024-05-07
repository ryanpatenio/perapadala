
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Transactions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Transactions</li>
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
                    <th>Transaction Code</th>
                    
                    <th>Date</th>
                    <th>Status</th>                 
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>



                      <tr>
                        <td>1</td>
                        <td>19230SDSWE</td>
                        
                        <td>April 4 2024</td>
                        <td><button class="btn btn-success btn-sm">In Progress</button></td>
                       
                        <td>
                          <button type="button" id="view_btn" data-id="" class="btn btn-primary bi bi-search">View</button>
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
  <div class="modal fade" id="viewTransactionModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Transaction Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
              <div class="card-body">

                <div class="row mb-1">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Transaction Code</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Transaction Date</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-1">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Sender</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Sender Contact</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>

                <div class="row mb-1">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Receiver</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Receiver Contact</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-1">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Purpose of Transaction</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Sender Relation</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-1">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Branch Name</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Branch Personnel Incharge</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-1">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Amount</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Fees</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row">
                  <div class="d-flex align-item-center justify-content-center mt-5">
                    <button class="btn btn-primary  btn-gradient">In Progress</button>
                  </div>
                </div>



              </div>                       
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           
          </div>
   
        </div>
      </div>
    </div><!-- End Edit Modal-->

<!---------------end of all Modal---------------------->

  </main> <!------------- end of Main ----->
 
  
   
  <script>
$(document).ready(function(){

    $(document).on('click','#view_btn',function(e){
        e.preventDefault();

        $("#viewTransactionModal").modal('show');


    });

})


  </script>

