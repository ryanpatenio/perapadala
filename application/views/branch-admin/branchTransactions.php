
<main id="main" class="main">
    <div class="pageTitle">
      <h1>Branch Transactions</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>admin">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Branch Transactions</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section profile">

     <div class="row">
        

              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newTransactionModal" type="button"><i class="bi bi-plus-circle"> New</i></button>

        </div>



          <div class="card-body">
            <div class="table-responsive">
              <table class="table datatable table-light" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>transaction Code</th>
                    <th>Date</th>
                    <th>Status</th>                 
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                     <?php
                    $i = 1;

                    foreach ($transactions as $transaction) {
                      ?>
                     <tr>
                        <td><?=$i; ?></td>
                        <td><?=$transaction->transaction_code; ?></td>
                        <td><?=date('F j Y g:ia', strtotime($transaction->transaction_date)) ?></td>
                        <td>
                          <?php
                          $status = '';
                          $color = '';

                          if($transaction->status == 0 || $transaction->status === '0'){
                            $status = 'IN PROGRESS';
                            $color = 'warning';
                          }else{
                            $status = 'CLAIMED';
                            $color = 'success';
                          }
                          
                          
                          ?>
                        <button class="btn btn-<?=$color; ?> btn-sm"><?= $status; ?></button></td>
                       
                        <td>
                          <button type="button" id="view_btn" data-id="<?= $transaction->transaction_id; ?>" class="btn btn-primary bi bi-search">View</button>
                          <button type="button" id="edit_trans_btn" data-id="<?= $transaction->transaction_id; ?>" class="btn btn-warning bi bi-pencil"> Modify</button>
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
  
  <div class="modal fade" id="newTransactionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Send Money</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <form method="POST" id="addTransactionForm" >

               <div class="card-body">
                    <div class="row">
                          <div class="col-md-6 mb-2">                                        
                              <div class="mb-0">
                                  <label for="" class="form-label">Name of Sender </label>
                                  <input type="text" class="form-control"  id="" placeholder="">
                              </div>                                       
                          </div>
                          <div class="col-md-6 mb-2">                                        
                              <div class="mb-0">
                                  <label for="" class="form-label">Address </label>
                                  <input type="text" class="form-control"  id="" placeholder="">
                              </div>                                       
                          </div>
                      
                      </div>
                      <div class="row">
                          <div class="col-md-6 mb-2">                                        
                              <div class="mb-0">
                                  <label for="" class="form-label">Name of Receiver </label>
                                  <input type="text" class="form-control"  id="" placeholder="">
                              </div>                                       
                          </div>
                          <div class="col-md-6 mb-2">                                        
                              <div class="mb-0">
                                  <label for="" class="form-label">address </label>
                                  <input type="text" class="form-control" id="" placeholder="">
                              </div>                                       
                          </div>
                      
                      </div>
                      <div class="row">
                          <div class="col-md-6 mb-2">                                        
                              <div class="mb-0">
                                  <label for="" class="form-label">Sender Contact Number  </label>
                                  <input type="text" class="form-control"  id="" placeholder="">
                              </div>                                       
                          </div>
                          
                          <div class="col-md-6 mb-2">                                        
                              <div class="mb-0">
                                  <label for="" class="form-label">Receiver Contact Number</label>
                                  <input type="text" class="form-control"  id="" placeholder="">
                              </div>                                       
                          </div>                                   
                      </div>
                      <div class="row">
                          <div class="col-md-6 mb-2">
                              <label for="" class="form-label mb-2 ">Relationship to the Sender: </label>
                              <input type="text" class="form-control" placeholder="Relationship">
                          </div>
                          <div class="col-md-6 mb-2">
                              <label for="" class="form-label mb-2 ">Purpose of Transaction: </label>
                              <input type="text" class="form-control" placeholder="Purpose of transaction">
                          </div>
                      
                      </div>
                      

                      <div class="row mt-2">
                          <div class="col-md-6 mb-2">
                              <label for="" class="form-label mb-2">Amount : </label>
                              <input type="number" class="form-control" placeholder="Amount">
                          </div>
                          <div class="col-md-6 mb-2">
                              <label for="" class="form-label mb-2">Fee : </label>
                              <input type="number" readonly class="form-control" placeholder="Fee">
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

  <div class="modal fade" id="editTransactionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Transaction</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="upTransactionForm" >
            <div class="card-body">
            <div class="row">
                  <div class="col-md-6 mb-2">                                        
                      <div class="mb-0">
                          <label for="" class="form-label">Name of Sender </label>
                          <input type="text" name="upNameOfSender" class="form-control"  id="" placeholder="">
                      </div>                                       
                  </div>
                  <div class="col-md-6 mb-2">                                        
                      <div class="mb-0">
                          <label for="" class="form-label">Address </label>
                          <input type="text" name="upSenderAddress" class="form-control"  id="" placeholder="">
                      </div>                                       
                  </div>
              
              </div>
              <div class="row">
                  <div class="col-md-6 mb-2">                                        
                      <div class="mb-0">
                          <label for="" class="form-label">Name of Receiver </label>
                          <input type="text" name="upNameOfReceiver" class="form-control"  id="" placeholder="">
                      </div>                                       
                  </div>
                  <div class="col-md-6 mb-2">                                        
                      <div class="mb-0">
                          <label for="" class="form-label">address </label>
                          <input type="text" name="upReceiverAddress" class="form-control" id="" placeholder="">
                      </div>                                       
                  </div>
              
              </div>
              <div class="row">
                  <div class="col-md-6 mb-2">                                        
                      <div class="mb-0">
                          <label for="" class="form-label">Sender Contact Number  </label>
                          <input type="text" name="upSenderContact" class="form-control"  id="" placeholder="">
                      </div>                                       
                  </div>
                  
                  <div class="col-md-6 mb-2">                                        
                      <div class="mb-0">
                          <label for="" class="form-label">Receiver Contact Number</label>
                          <input type="text" name="upReceiverContact" class="form-control"  id="" placeholder="">
                      </div>                                       
                  </div>                                   
              </div>
              <div class="row">
                  <div class="col-md-6 mb-2">
                      <label for="" class="form-label mb-2 ">Relationship to the Sender: </label>
                      <input type="text" class="form-control" name="upRelationshipTotheSender" placeholder="Relationship">
                  </div>
                  <div class="col-md-6 mb-2">
                      <label for="" class="form-label mb-2 ">Purpose of Transaction: </label>
                      <input type="text" name="upPurposeOfTransaction" class="form-control" placeholder="Purpose of transaction">
                  </div>
              
              </div>
              

              <div class="row mt-2">
                  <div class="col-md-6 mb-2">
                      <label for="" class="form-label mb-2">Amount : </label>
                      <input type="number" name="upAmount" class="form-control" placeholder="Amount">
                  </div>
                  <div class="col-md-6 mb-2">
                      <label for="" class="form-label mb-2">Fee : </label>
                      <input type="number" name="upFee" readonly class="form-control" placeholder="Fee">
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

<!-----view Transaction Modal---->

<div class="modal fade" id="viewTransactionModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Transaction Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" id="upcat" >
              <div class="card-body">

                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Transaction Code</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Transaction Date</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Sender</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col mb-2">
                  <label for="validationDefault01" class="form-label">Sender Contact</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>

                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Receiver</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Receiver Contact</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Purpose of Transaction</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Sender Relation</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-2">                
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Branch Name</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>  
                  <div class="col">
                  <label for="validationDefault01" class="form-label">Branch Personnel Incharge</label>                
                    <input type="text" class="form-control"  readonly>  
                  </div>     
                </div>
                <div class="row mb-2">                
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
                  <div class="d-flex align-item-center justify-content-center">
                    <button class="btn btn-primary  btn-gradient">In Progress</button>
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

    $(document).on('click','#view_btn',function(e){
        e.preventDefault();

        $("#viewTransactionModal").modal('show');


    });
    $(document).on('click','#edit_trans_btn',function(e){
        e.preventDefault();

        $("#editTransactionModal").modal('show');


    });
    

})


  </script>