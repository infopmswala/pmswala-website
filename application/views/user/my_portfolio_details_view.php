<style>
    .card-body {
    padding: .5rem !important;
}
.table{
    vertical-align:sub;
}
</style>
<main class="main-wrapper">
    <div class="container-fluid">
        <div class="mt-5">
            <div class="row">
                <div class="col-12 col-md-8 m-auto">
                    <div class="card shadow rounded-2">
                        <div class="p-5">
                            <h2 class="text-center mt-3 text-green">Portfolio Details</h2>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="border p-3 rounded-2 pb-0">
                                        <div class="row">
                                            <div class="col-6 text-start">
                                                <h6>Investment Amount:</h6>
                                                <p><?=numberFormat($td_payment_transactions['amount']);?></p>
                                            </div>
                                             <div class="col-6 text-end">
                                                <h6>ROI:</h6>
                                                <p><?=$td_payment_transactions['interest'];?>%</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-5">
                                <table class="table text-nowrap">
                                    <tbody>
                                        <tr>
                                            <th class="border-bottom w-50 border-gray border-opacity-50">
                                                <h6>Fund Type:</h6>
                                            </th>
                                            <td class="text-end border-bottom border-gray border-opacity-50"><?=$td_payment_transactions['portfolio_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th class="border-bottom w-50 border-gray border-opacity-50">
                                                <h6>Investment Period:</h6>
                                            </th>
                                            <td class="text-end border-bottom border-gray border-opacity-50"><?=$td_payment_transactions['period'];?> Days</td>
                                        </tr>
                                        <!--<tr>-->
                                        <!--    <th class="border-bottom w-50 border-gray border-opacity-50">-->
                                        <!--        <h6>Payout Mode:</h6>-->
                                        <!--    </th>-->
                                        <!--    <td class="text-end border-bottom border-gray border-opacity-50"><?=$td_payment_transactions['pay_mode'];?></td>-->
                                        <!--</tr>-->
                                        <tr>
                                            <th class="border-bottom w-50 border-gray border-opacity-50">
                                                <h6>Maturity Date:</h6>
                                            </th>
                                            <td class="text-end border-bottom border-gray border-opacity-50"><?=Dateconversion($td_payment_transactions['maturity_date']);?></td>
                                        </tr>
                                         <tr>
                                            <th class="border-bottom w-50 border-gray border-opacity-50">
                                                <h6><?=$td_payment_transactions['pay_mode'];?> Earnings:</h6>
                                            </th>
                                            <td class="text-end border-bottom border-gray border-opacity-50"><?=numberFormat($td_payment_transactions['sub_earnings']);?></td>
                                        </tr>
                                        <tr>
                                            <th class="border-bottom w-50 border-gray border-opacity-50">
                                                <h6>Maturity Amount:</h6>
                                            </th>
                                            <td class="text-end border-bottom border-gray border-opacity-50"><?=numberFormat($td_payment_transactions['maturity_amount']);?></td>
                                        </tr>
                                        <tr>
                                            <th class="w-50 m-auto text-center" colspan="2">
                                            <?php if(empty($td_withdrawal_request) || $td_withdrawal_request['payment_status'] == 2){ ?>
                                            <form action="<?=base_url()?>auth/is_session/user/portfolios/withdrawal_request/" method="post">
                                             <!-- <input type="hidden" id="portfolio_id" name="portfolio_id" value="<?=$td_payment_transactions['purchase'];?>">
                                             <input type="hidden" id="payment_id" name="payment_id" value="<?=$td_payment_transactions['id'];?>"> -->

                                            <button type="button" data-bs-target="#startinvesting2" data-bs-toggle="modal" class="btn btn-accent-01 btn-sm text-dark mt-3">Withdrawal Request</button>
                                            </form>
                                            <?php }else{ ?>
                                            <?php if($td_withdrawal_request['payment_status'] == 0){ ?>
                                                <h5><span>Withdrawal Request: </span> <span class="text-warning">Pending</span></h5>
                                                <?php }elseif($td_withdrawal_request['payment_status'] == 2){ ?>
                                                <h5><span>Withdrawal Request: </span> <span class="text-danger">Failed</span></h5>
                                                <?php }else{ ?>
                                                <h5><span>Withdrawal Request: </span> <span class="text-green">Success</span></h5>
                                                <?php } ?>
                                            <?php } ?>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="startinvesting2" aria-hidden="true" aria-labelledby="startinvestingLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            
            <div class="modal-content">
                <div class="modal-header">
                   <a class="text-dark fs-40" data-bs-target="#startinvesting" data-bs-toggle="modal">
                   </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                           
                            <p><?=$td_update_content['description'];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>