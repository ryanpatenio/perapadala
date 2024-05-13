 
    <div class="modal fade" id="editTransactionModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="updateTransactionForm" >
                <input type="hidden" id="trans-id" name="trans_id">
                <input type="hidden" id="trans-detail-id" name="trans_detail_id">
                <input type="hidden" id="customer-id" name="customer_id">

                <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="" class="form-label mb-2 fs-5">Transaction Code : </label>
                                    <label for="" class="form-label"><strong class="fs-4" id="trans-code"></strong> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">                                        
                                    <div class="mb-0">
                                        <label for="" class="form-label">Sender Name</label>
                                        <input type="text" name="sender_name" class="form-control" value="" id="sender-name" placeholder="">
                                    </div>                                       
                                </div>
                                <div class="col-md-6 mb-2">                                        
                                    <div class="mb-0">
                                        <label for="" class="form-label">Address </label>
                                        <input type="text" name="sender_address" class="form-control" value=""  id="sender-address" placeholder="">
                                    </div>                                       
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">                                        
                                    <div class="mb-0">
                                        <label for="" class="form-label">Name of Receiver </label>
                                        <input type="text" name="receiver_name" class="form-control" value=""  id="receiver-name" placeholder="">
                                    </div>                                       
                                </div>
                                <div class="col-md-6 mb-2">                                        
                                    <div class="mb-0">
                                        <label for="" class="form-label">address </label>
                                        <input type="text" name="receiver_address" class="form-control" value=""  id="receiver-address" placeholder="">
                                    </div>                                       
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">                                        
                                    <div class="mb-0">
                                        <label for="" class="form-label">Sender Contact Number  </label>
                                        <input type="text" name="sender_contact" class="form-control" value="" name=""  id="sender-contact" placeholder="">
                                    </div>                                       
                                </div>
                                
                                <div class="col-md-6 mb-2">                                        
                                    <div class="mb-0">
                                        <label for="" class="form-label">Receiver Contact Number</label>
                                        <input type="text" name="receiver_contact" class="form-control" value=""  id="receiver-contact" placeholder="">
                                    </div>                                       
                                </div>                                   
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2 mt-2">
                                    <label for="" class="form-label mb-2 fs-6">Relationship to the Sender: </label>
                                    <label for="" class="form-label"><strong class="fs-6" id="relation"> </strong> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="" class="form-label mb-2 fs-6">Purpose of Transaction: </label>
                                    <label for="" class="form-label"><strong class="fs-6" id="purpose"> </strong> </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="" class="form-label mb-2 fs-6">Amount : </label>
                                    <label for="" class="form-label"><strong class="fs-6" id="amount"> </strong> </label>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="" class="form-label mb-2 fs-6">Fee : </label>
                                    <label for="" class="form-label"><strong class="fs-6" id="fee">  Pesos</strong> </label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="" class="form-label mb-2 fs-6">Transaction Date:  </label>
                                    <label for="" class="form-label"><strong class="fs-6" id="trans-date"></strong> </label>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="" class="form-label mb-2 fs-6">Transaction Time:  </label>
                                    <label for="" class="form-label"><strong class="fs-6" id="trans-time"></strong> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Transaction Claimed</label>
                                

                                    <input type="input" readonly value="" class="form-control text-danger" id="trans-claimed">
                                </div>
                            </div>
                            
                            
                        </div>                       

                    </div>                       
                
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-secondary">Save</button>
                            
                        </div>
                 </form>
            </div>
        </div>
    </div><!-- End Edit Modal-->




    <div class="modal fade" id="viewTransactionModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="viewForm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="" class="form-label mb-2 fs-5">Transaction Code : </label>
                            <label for="" class="form-label"><strong class="fs-4" id="v-t-code"></strong> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">                                        
                            <div class="mb-0">
                                <label for="" class="form-label">Sender Name</label>
                                <input type="text" name="sender_name" readonly class="form-control" value="" id="v-sender-name" placeholder="">
                            </div>                                       
                        </div>
                        <div class="col-md-6 mb-2">                                        
                            <div class="mb-0">
                                <label for="" class="form-label">Address </label>
                                <input type="text" name="sender_address" readonly class="form-control" value=""  id="v-sender-address" placeholder="">
                            </div>                                       
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">                                        
                            <div class="mb-0">
                                <label for="" class="form-label">Name of Receiver </label>
                                <input type="text" name="receiver_name" readonly class="form-control" value=""  id="v-receiver-name" placeholder="">
                            </div>                                       
                        </div>
                        <div class="col-md-6 mb-2">                                        
                            <div class="mb-0">
                                <label for="" class="form-label">address </label>
                                <input type="text" name="receiver_address" readonly class="form-control" value=""  id="v-receiver-address" placeholder="">
                            </div>                                       
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">                                        
                            <div class="mb-0">
                                <label for="" class="form-label">Sender Contact Number  </label>
                                <input type="text" name="sender_contact" readonly class="form-control" value="" name=""  id="v-sender-contact" placeholder="">
                            </div>                                       
                        </div>
                        
                        <div class="col-md-6 mb-2">                                        
                            <div class="mb-0">
                                <label for="" class="form-label">Receiver Contact Number</label>
                                <input type="text" name="receiver_contact" readonly class="form-control" value=""  id="v-receiver-contact" placeholder="">
                            </div>                                       
                        </div>                                   
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2 mt-2">
                            <label for="" class="form-label mb-2 fs-6">Relationship to the Sender: </label>
                            <label for="" class="form-label"><strong class="fs-6" id="v-relation"> </strong> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="" class="form-label mb-2 fs-6">Purpose of Transaction: </label>
                            <label for="" class="form-label"><strong class="fs-6" id="v-purpose"> </strong> </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="" class="form-label mb-2 fs-6">Amount : </label>
                            <label for="" class="form-label"><strong class="fs-6" id="v-amount"> </strong> </label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="" class="form-label mb-2 fs-6">Fee : </label>
                            <label for="" class="form-label"><strong class="fs-6" id="v-fee">  Pesos</strong> </label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="" class="form-label mb-2 fs-6">Transaction Date:  </label>
                            <label for="" class="form-label"><strong class="fs-6" id="v-trans-date"></strong> </label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="" class="form-label mb-2 fs-6">Transaction Time:  </label>
                            <label for="" class="form-label"><strong class="fs-6" id="v-trans-time"></strong> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Transaction Claimed</label>
                        

                            <input type="input" readonly value="" class="form-control text-danger" id="v-trans-claimed">
                        </div>
                    </div>
                    
                    
                </div>                       

                    </div>                       
                
            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                           
                            
                        </div>
                 </form>
            </div>
        </div>
    </div><!-- End View Modal-->


