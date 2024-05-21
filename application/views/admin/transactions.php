
<main id="main" class="main" style="filter: blur(4px);">
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
                    <th>Branch</th>
                    <th>Status</th>                 
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
              <?php
              
              $i = 1;

              foreach ($transactions as $transaction) { ?>
                 <tr>
                        <td><?=$i; ?></td>
                        <td><?=$transaction->transaction_code; ?></td>
                        <td><?=$transaction->branch_name; ?></td>
                        
                        <td><?=date('F j, Y', strtotime($transaction->transaction_date)) ?></td>
                        <td>

                        <?php
                        $status = '';
                        $color = '';
                        if($transaction->status === 0 || $transaction->status === '0'){
                          $status = 'IN PROGRESS';
                          $color = 'warning';
                        }else{
                          $status = 'CLAIMED';
                          $color = 'success';
                        }
                        
                        ?>

                          <button class="btn btn-<?=$color; ?> btn-sm"><?= $status; ?></button>
                        </td>
                       
                        <td>
                          <button type="button" id="view_btn" data-id="<?=$transaction->transaction_id; ?>" class="btn btn-primary bi bi-search">View</button>
                         <!--  <button type="button" class="btn btn-secondary bi bi-folder-symlink"> Archive</button> -->
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
<div class="modal fade" id="viewTransactionModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Transaction Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" id="viewForm" >
              <div class="card-body">

                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Transaction Code</label>                
                    <input type="text" id="v-trans-code" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Transaction Date</label>                
                    <input type="text" id="v-trans-date" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Sender</label>                
                    <input type="text" id="v-sender-name" class="form-control"  readonly>  
                  </div>  
                  <div class="col mb-2">
                  <label for="validationDefault01" class="form-label">Sender Contact</label>                
                    <input type="text" id="v-sender-contact" class="form-control"  readonly>  
                  </div>     
                </div>

                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Receiver</label>                
                    <input type="text" id="v-receiver-name" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Receiver Contact</label>                
                    <input type="text" id="v-receiver-contact" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Purpose of Transaction</label>                
                    <input type="text" id="v-purpose" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Sender Relation</label>                
                    <input type="text" id="v-relation" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Branch Name</label>                
                    <input type="text" id="v-branch-name" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Branch Personnel Incharge</label>                
                    <input type="text" id="v-incharge" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Amount</label>                
                    <input type="text" id="v-amount" class="form-control"  readonly>  
                  </div>  
                   <div class="col">
                  <label for="validationDefault01" class="form-label">Fees</label>                
                    <input type="text"id="v-fee" class="form-control"  readonly>  
                  </div>   
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Status</label>                
                    <input type="text"id="v-in-progress" class="form-control text-danger"  readonly>  
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
  <script type="text/javascript" src="<?= base_url();?>assets/js/admin-ajax/transaction.js"></script>