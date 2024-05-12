
<section id="features">
            <div class="container px-5 ">
                <div class="row gx-5 align-items-center mt-5">
                    <div class="col-lg-12 order-lg-0 mb-5 mb-lg-0">

                         <div class="mb-5 mb-lg-0 text-center text-lg-center ">
                            <h4 class=" lh-1 mb-3" style="font-size: 50px;">Branch Transaction.</h4>
                            
                        </div>
                        <div class="container-fluid px-5 py-3">
                           
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Sender</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                            
                            if(!empty($all_branch_transactions)){
                                $i = 1;
                             foreach ($all_branch_transactions as $transaction) {
                                ?>

                                <tr>
                                    <td><?=$i; ?></td>
                                    <td><?=$transaction->transaction_code; ?></td>
                                    <td><?=$transaction->name; ?></td>
                                    <td><?= $transaction->amount; ?></td>
                                    <td><?=date('F j Y - g:ia', strtotime($transaction->transaction_date)) ?></td>
                                    <td>
                                        <button type="button" id="edit-btn" data-id="<?= $transaction->transaction_id; ?>" class="btn btn-warning btn-md bi bi-pencil cursor">edit</button>
                                        <button type="button" id="view-btn" data-id="<?= $transaction->transaction_id; ?>" class="btn btn-primary btn-md bi bi-search cursor">view</button>
                                    </td>
                                </tr>

                               
                         <?php $i++;  }

                            }
                            
                            
                            ?>

                           
                                               
                            </tbody>
                        </table>
                           
                           
                        </div>
                    </div>

                   
                </div>
            </div>
        </section>