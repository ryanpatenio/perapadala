
<section id="features">
            <div class="container px-5">
                <div class="row gx-5 align-items-center mt-5">
                    <div class="col-lg-12 order-lg-0 mb-5 mb-lg-0">

                         <div class="mb-5 mb-lg-0 text-center text-lg-center ">
                            <h4 class=" lh-1 mb-3" style="font-size: 50px;">Send Money</h4>
                            
                        </div>
                        <div class="container-fluid px-5 py-3">
                            <div class="card">
                                <div class="card-header">
                                    Transaction Information
                                </div>
                                <div class="card-body py-4">
                                   <form method="post" id="transactionForm">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Name of Sender </label>
                                                <input type="text" name="nameOfSender"  class="form-control"  id="n-sender" placeholder="" required>
                                            </div>                                       
                                        </div>
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Address </label>
                                                <input type="text" name="senderAddress" class="form-control"  id="s-address" placeholder="" required>
                                            </div>                                       
                                        </div>
                                   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Name of Receiver </label>
                                                <input type="text" name="nameOfReceiver" class="form-control"  id="n-receiver" placeholder="" required>
                                            </div>                                       
                                        </div>
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">address </label>
                                                <input type="text" name="receiverAddress" class="form-control" id="r-address" placeholder="" required>
                                            </div>                                       
                                        </div>
                                   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Sender Contact Number  </label>
                                                <input type="text" name="senderContact" maxlength="11" class="form-control"  id="s-contact" placeholder="" required>
                                            </div>                                       
                                        </div>
                                       
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Receiver Contact Number</label>
                                                <input type="text" name="receiverContact" maxlength="11" class="form-control"  id="r-contact" placeholder=""required>
                                            </div>                                       
                                        </div>                                   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="" class="form-label mb-2 ">Relationship to the Sender: </label>
                                            <input type="text" name="senderRelation" id="rel-sender" class="form-control" placeholder="Relationship" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="" class="form-label mb-2 ">Purpose of Transaction: </label>
                                            <input type="text" name="purpose" class="form-control" id="purpose" placeholder="Purpose of transaction" required>
                                        </div>
                                    
                                    </div>
                                    

                                    <div class="row mt-2">
                                        <div class="col-md-5 mb-2">
                                            <label for="" class="form-label mb-2">Amount : </label>
                                            <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" required>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label for="" class="form-label mb-2">Percent : </label>
                                            <input type="text" name="percent" id="percent" data-id="" readonly class="form-control text-danger" placeholder="Fee" required>
                                        </div>
                                        <div class="col-md-5 mb-2">
                                            <label for="" class="form-label mb-2">Fee : </label>
                                            <input type="number" name="fee" id="fee" readonly class="form-control" placeholder="Fee" required>
                                        </div>
                                    </div>

         
                                    <div class="row">
                                        <div class="d-grid">
                                            <button type="submit" id="send-btn" class="btn btn-success btn-gradient p-2 mt-2">Send</button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                           
                            </form>
                        </div>
                    </div>

                   
                </div>
            </div>
        </section>
        <script type="text/javascript" src="<?= base_url();?>assets/js/user/sendTransaction.js"></script>