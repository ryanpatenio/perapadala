
<section id="features">
            <div class="container px-5">
                <div class="row gx-5 align-items-center mt-5">
                    <div class="col-lg-12 order-lg-0 mb-5 mb-lg-0">

                         <div class="mb-5 mb-lg-0 text-center text-lg-center ">
                            <h4 class=" lh-1 mb-3" style="font-size: 50px;">Transaction.</h4>
                            
                        </div>
                        <div class="container-fluid px-5 py-3">
                            <div class="card">
                                <div class="card-header">
                                    Transaction Information
                                </div>

                                <!---Hidden ID--->
                                <input type="hidden" name="id" id="id" value="<?= $trans_data['transaction_id'] ?>">

                                <div class="card-body py-4">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="" class="form-label mb-2 fs-5">Transaction Code : </label>
                                            <label for="" class="form-label"><strong class="fs-4"><?= $trans_data['transaction_code'] ?></strong> </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Sender Name</label>
                                                <input type="text" class="form-control" value="<?= $trans_data['senderName'] ?> " readonly id="" placeholder="">
                                            </div>                                       
                                        </div>
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Address </label>
                                                <input type="text" class="form-control" value="<?= $trans_data['senderAddress'] ?> " readonly id="" placeholder="">
                                            </div>                                       
                                        </div>
                                   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Name of Receiver </label>
                                                <input type="text" class="form-control" value="<?= $trans_data['receiverName'] ?> " readonly id="" placeholder="">
                                            </div>                                       
                                        </div>
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">address </label>
                                                <input type="text" class="form-control" value="<?= $trans_data['receiverAddress'] ?> " readonly id="" placeholder="">
                                            </div>                                       
                                        </div>
                                   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Sender Contact Number  </label>
                                                <input type="text" class="form-control" value="<?= $trans_data['senderContact'] ?> " name="" readonly id="" placeholder="">
                                            </div>                                       
                                        </div>
                                       
                                        <div class="col-md-6 mb-2">                                        
                                            <div class="mb-0">
                                                <label for="" class="form-label">Receiver Contact Number</label>
                                                <input type="text" class="form-control" value="<?= $trans_data['senderContact'] ?> " readonly id="" placeholder="">
                                            </div>                                       
                                        </div>                                   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2 mt-2">
                                            <label for="" class="form-label mb-2 fs-5">Relationship to the Sender: </label>
                                            <label for="" class="form-label"><strong class="fs-5"><?= $trans_data['sender_relation'] ?> </strong> </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="" class="form-label mb-2 fs-5">Purpose of Transaction: </label>
                                            <label for="" class="form-label"><strong class="fs-5"><?= $trans_data['purpose'] ?> </strong> </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="" class="form-label mb-2 fs-5">Amount : </label>
                                            <label for="" class="form-label"><strong class="fs-5"><?= $trans_data['amount'] ?> </strong> </label>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="" class="form-label mb-2 fs-5">Fee : </label>
                                            <label for="" class="form-label"><strong class="fs-5"><?= $trans_data['fee'] ?>  Pesos</strong> </label>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="" class="form-label mb-2 fs-5">Transaction Date:  </label>
                                            <label for="" class="form-label"><strong class="fs-5"><?= date('F j Y g:ia', strtotime($trans_data['transaction_date'])) ?></strong> </label>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="" class="form-label mb-2 fs-5">Transaction Time:  </label>
                                            <label for="" class="form-label"><strong class="fs-5"><?= date('g:ia', strtotime($trans_data['transaction_date'])) ?></strong> </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Transaction Claimed</label>
                                        <?php
                                        $status = '';
                                        if($trans_data['transaction_claimed'] === null || $trans_data['transaction_claimed'] === ''){
                                            $status = 'Not Claim Yet!';
                                        }else{
                                            $status = date('F j Y g:ia', strtotime($trans_data['transaction_claimed']));
                                        }
                                        
                                        
                                        ?>

                                            <input type="input" readonly value="<?= $status?>" class="form-control text-danger">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="d-grid">
                                        <?php
                                        $status = '';
                                        $name = '';
                                        $color = '';

                                        if($trans_data['status'] == 0 || $trans_data['status'] == '0'){
                                            $status = '';
                                            $name = 'Claim';
                                            $color = 'dark';
                                        }else{
                                            $status = 'disabled';
                                            $name = 'Claimed';
                                            $color = 'success';
                                        }

                                        
                                        ?>

                                            <button type="button" id="claim" <?=$status; ?> class="btn btn-<?=$color ?> btn-gradient p-2 mt-2"><?=$name; ?></button>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                           
                           
                        </div>
                    </div>

                   
                </div>
            </div>
        </section>