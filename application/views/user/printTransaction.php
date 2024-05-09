
<section id="features">

    <div class="container">

    <div class="mb-5 mb-lg-0 text-center text-lg-center" style="margin-top: 50px;">
        <h4 class="lh-1 mb- pt" style="font-size: 50px;">Print Transaction.</h4>
        
    </div>
    
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center text-lg-center">
                             <h5 class="card-title ct-title">LBB Pera Padala</h5>
                             
                        </div>
                        <hr class="ct-hr">
                        <div class="row mt-2 mb-2">
                            <div class="col">
                            <p class="card-text">Transaction Code: <strong id="trans-code"><?= $transaction_data['transaction_code'] ?></strong> </p>

                            </div>
                            <div class="col">
                                <p class="card-text" id="trans-date">Date Time: <strong><?= date('F j Y g:ia', strtotime($transaction_data['transaction_date'])) ?></strong> </p>
                            </div>
                        </div>

                        <hr style="margin-bottom:2px;">
                        <h6><strong>Sender</strong></h6>
                        <hr class="" style="margin-top: -5px;">
                        <div class="row mb-2">
                            <div class="col">
                                <p class="card-text" style="margin:auto">Name: <strong id="sender-name"><?=$transaction_data['senderName'];?></strong> </p>
                                <p class="card-text" style="margin:auto">Contact : <strong id="sender-contact"><?= $transaction_data['senderContact']; ?></strong></p>
                                <p class="card-text" style="margin:auto">address : <strong id="sender-address"><?= $transaction_data['senderAddress']; ?></strong></p>
                            </div>
                            
                        </div>
                        
                        <hr style="margin-bottom:2px;">
                        <h6><strong>Receiver</strong></h6>
                        <hr class="" style="margin-top: -5px;">

                        <div class="row mb-2">
                            <div class="col">
                                <p class="card-text" style="margin:auto">Name: <strong id="r-name"><?= $transaction_data['receiverName']; ?></strong> </p>
                                <p class="card-text" style="margin:auto">Contact : <strong id="r-contact"><?=$transaction_data['receiverContact']; ?></strong></p>
                                <p class="card-text" style="margin:auto">address : <strong id="r-address"><?=$transaction_data['receiverAddress']; ?></strong></p>
                            </div>
                            
                        </div>
                       
                        <hr style="margin-bottom:2px;">
                        <h6><strong>Amount ₱ : </strong><strong id="amount"> <?=$transaction_data['amount']; ?></strong></h6>
                        <hr class="" style="margin-top: -5px;">

                        <div class="row mb-2">
                            <div class="col">
                                <p class="card-text" style="margin:auto">Purpose of Transaction: <strong id="purpose"><?=$transaction_data['purpose']; ?></strong> </p>
                                <p class="card-text" style="margin:auto">Relationship to Receiver : <strong id="relation"><?=$transaction_data['sender_relation']; ?></strong></p>
                               
                            </div>
                            
                        </div>
                        <div id="acknowledgmentMessage" class="text-center mt-2">
                           
                            <p style="color: blue;">By signing this form I acknowledge the transaction Under LBB Pera Padala are subject to Anti-Money-Laundering and Terrorist financing Prevention(AML-TFP) Laws and LBB Policies.</p>
                           
                        </div>

                        
                        <hr style="margin-bottom:2px;">
                        <h6><strong>Customer Service : </strong><strong> 0949599393 | lbbperapadala@example.com</strong></h6>
                        <hr class="" style="margin-top: -5px;">

                        <div class="row mt-5">
                            <div class="col">
                                <hr class="col-sm-10 px-">
                                <p class="card-text " style="margin-top: -10px;">Signature Over Printed Name</p>
                            </div>
                            <div class="col">
                                <hr class="col-sm-12">
                                <p class="card-text " style="margin-top: -10px;">Signature Over Printed Name of LBB Branch Personnel</p>

                            </div>
                        </div>


                       
                        <button class="btn btn-primary btn-print" onclick="printPage()">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


    <script>
        function printPage() {
            window.print();
        }
    </script>