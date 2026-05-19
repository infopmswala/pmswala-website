<main class="main-wrapper">
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 col-lg-12 col-xxl-12 m-auto">
                <div class="inner-contents">
                    <div class="page-header align-items-center mr-bottom-50">
                        <div class="text-center m-auto">
                            <h4 class="bg-lightgreen p-3 fw-semibold">Withdrawal</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr class="border-bottom w-50 border-gray border-opacity-50">
                                        <th><h6>Date & Time</h6></th>
                                        <th><h6>Withdrawal ID</h6></th>
                                        <th><h6>Purchase</h6></th>
                                        <th><h6>Mode of Payment </h6></th>
                                        <th><h6>Amount</h6></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($td_withdrawal_request as $key => $val){ ?>
                                    <tr class="border-bottom w-50 border-gray border-opacity-50">
                                        <td><p><?=Dateconversion($val['created_at']);?>, <?=Timeconversion($val['created_at']);?></p></td>
                                        <td><p>#<?=$val['transaction_id'];?></p></td>
                                        <td><p class="fs-14"><?=$val['portfolio_name'];?></p></td>
                                        <td><?php if($val['payment_status'] == 0){ ?>
                                            <p class="text-warning fw-bold">Pending</p>
                                            <?php }elseif($val['payment_status'] == 2){ ?>
                                            <p class="text-red fw-bold">Failed</p>
                                            <?php }else{ ?>
                                            <p class="text-green fw-bold">Success</p>
                                            <?php } ?>
                                        </td>
                                        <td><p class="fw-semibold">₹ <?=$val['amount'];?></p></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--<div class="rounded-2 p-3">
                        <div class="row border-bottom border-gray mb-3">
                            <div class="col-6 col-md-3">
                                <h6>Date & Time</h6>
                            </div>
                            <div class="col-6 col-md-2">
                                <h6>Withdrawal Id</h6>
                            </div>
                            <div class="col-6 col-md-3">
                                <h5>Purchase</h5>
                            </div>
                            <div class="col-6 col-md-2">
                                <h6>Mode of Payment </h6>
                            </div>
                            <div class="col-6 col-md-2">
                                <h6>Amount</h6>
                            </div>
                        </div>
                        <?php foreach($td_withdrawal_request as $key => $val){ ?>
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <p><?=Dateconversion($val['created_at']);?>, <?=Timeconversion($val['created_at']);?></p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <p>#<?=$val['transaction_id'];?></p>
                                </div>
                                <div class="col-6 col-md-3">
                                    <p class="fs-14"><?=$val['portfolio_name'];?>
                                    </p>
                                </div>
                                <div class="col-6 col-md-2">
                                    <?php if($val['payment_status'] == 0){ ?>
                                    <p class="text-warning fw-bold">Pending</p>
                                    <?php }elseif($val['payment_status'] == 2){ ?>
                                    <p class="text-red fw-bold">Failed</p>
                                    <?php }else{ ?>
                                    <p class="text-green fw-bold">Success</p>
                                    <?php } ?>
                                </div>
                                <div class="col-6 col-md-2">
                                    <p class="fw-semibold">₹ <?=numberFormat($val['amount']);?>/-</p>
                                </div>
                            </div>
                            <hr class="text-gray">
                        <?php } ?>
                    </div>-->
                    <div class="row">
                        <div class="col-12">
                            <div class="p-3 d-flex justify-content-end text-end">
                                <h5 class="me-4">Total Withdrawals:
                                <?php if(!empty($td_sum_withdrawal_request['amount'])){ ?>
                                <span class="fw-semibold ms-5 me-2">₹ <?=numberFormat($td_sum_withdrawal_request['amount']);?>/-</span></h5>
                                <?php }else{ ?>
                                 <span class="fw-semibold ms-5 me-2">₹  0 /-</span></h5>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.getElementById("withdrawl").classList.add('active');
</script>