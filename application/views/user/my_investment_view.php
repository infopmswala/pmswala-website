<style>
   /* .input:focus, input:valid {
    outline: none;
    border: 1.5px solid #F5F5F5 !important;
}*/
.input:focus ~ label, input:valid ~ label {
    transform: none;
    background-color: transparent;
    padding: 0 0.2em;
    color: #000;
}
</style>

<?php 
                                                $currentDate = Date('d M Y', strtotime($td_portfolio_details['created_at']));
                                                $addDays = $td_portfolio_details['no_of_days'];
                                                $maturity_date = date('d M Y', strtotime($currentDate. ' + '.$addDays.' days'));
                                                $earlier = Date('Y-m-d');
                                                $later = Date('Y-m-d', strtotime($maturity_date));
                                                $start = strtotime($earlier);
                                                $end = strtotime($later);
                                                $abs_diff = ceil(abs($end - $start) / 86400);
                                                
                                            ?>

    <!-- Main Wrapper-->
    <main class="main-wrapper">
        <div class="container">
            <div class="inner-contents">
                <div class="page-header align-items-center justify-content-center mr-bottom-10">
                    <h3 class="mb-0 text-center"><?=$td_portfolio_details['title_1']?></h3>
                    <h4 class="text-center mt-3 fw-semibold"><?=$td_portfolio_details['title_2']?></h4>
                </div>
                <div class="card shadow bg-success bg-opacity-10 rounded-2 mt-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 m-auto text-center">
                                <img src="<?=base_url()?>assets/user/assets/img/clients/portfolio.png" height="250px" class="m-auto text-center">
                            </div>
                            <div class="col-12 col-md-4 m-auto text-center">
                                <div class="border-0 py-3">
                                    <h4 class="mb-3"> <?=$td_portfolio_details['heading']?></h4>
                                   
                                    <h2 class="fs-38 mb-0"><?=$td_portfolio_details['interest']?>% p.a</h2>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 m-auto">
                                <div class="border-0 py-3">
                                    <h5 class="fw-bold mb-1 text-center"><?php echo substr($td_portfolio_details['retune_value'], 0, 200)?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="accordion accordion-default mt-5" id="accordionExample">
                    <div class="row gy-4">
                        <div class="col-12 col-md-4">
                            <!-- Accordion item -->
                            <div class="accordion-item shadow">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button text-dark" type="button" data-bs-toggle="modal"
                                        data-bs-target="#fund" aria-expanded="false">See Fund Details</button>
                                </h2>
                                <!--<div class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample" id="collapseOne">
                                    <div class="accordion-body">
                                        <h2>Fund details</h2>
                                        <p class="text-dark">Detailed break-down of your investments</p>
                                        <?php foreach(array_slice($td_fund_details,0,1) as $key => $val){ ?>
                                        <button class="btn btn-gray" type="button" data-bs-toggle="modal"
                                            data-bs-target="#fund">
                                            <?=$val['fund_details_title'];?><span class="text-right"> <?=$val['fund_details_percentage'];?>%</span>
                                        </button><?php } ?>

                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <!-- Accordion item -->
                            <div class="accordion-item shadow">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button text-dark" type="button" data-bs-toggle="modal"
                                        data-bs-target="#invest" aria-expanded="false">Why invest?</button>
                                </h2>
                                <!--<div class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample" id="collapseTwo">
                                    <div class="accordion-body">
                                        <h2 class=""><?=$td_section['title'];?></h2>
                                        <p class="text-dark"><?=$td_section['sub_title'];?></p>
                                        <ul>
                                            <?php foreach($why_invest as $key => $val){?>
                                            <li><?=$val['answer'];?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <!-- Accordion item -->
                            <div class="accordion-item shadow">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button text-dark" type="button" data-bs-toggle="modal"
                                        data-bs-target="#faqs" aria-expanded="false">FAQ's</button>
                                </h2>
                                <!--<div class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample" id="collapseThree">
                                    <div class="accordion-body text-dark">
                                        <?php foreach($td_faqs as $key => $val){ ?>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Q: <?=$val['question'];?></h6>
                                                <p>A: <?=strip_tags($val['answer']);?></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-6 text-center m-auto">
                        <h3 class="bg-green text-white p-3 rounded-2">How much can I earn</h3>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-7">
                        <div class="card shadow rounded-2">
                            <div class="card-body">
                                <div class="row gy-2">
                                    <div class="col-12 col-md-6 mt-5">
                                          
                                        <h6>Investment Amount</h6>
                                          <input type="number" min="<?=$td_portfolio_details['min_value'];?>" max="<?=$td_portfolio_details['max_value'];?>" value="<?=$td_portfolio_details['min_value'];?>" id="investamount" class="form-control border" />
                                          <p class="mt-3 text-gray">Min: <?=$td_portfolio_details['min_value'];?> - Max: <?=$td_portfolio_details['max_value'];?></p>
                                          <span id="max_value" style="color:red;"></span>
                                    </div>
                                    <div class="col-12 col-md-6 mt-5">
                                        <!--<div class="d-flex">-->
                                        <!--    <h6 class="text-start">Investment Period</h6>-->
                                        <!--    <?php if($td_portfolio_details['payout'] == 'Yearly'){?>-->
                                        <!--    <span class="text-end ms-auto mt-1"><?=$td_portfolio_details['payout_year']?> Year(s)</span>-->
                                        <!--    <?php }else{ ?>-->
                                        <!--    <span class="text-end ms-auto mt-1"><?=$td_portfolio_details['payout_year']?> Monthly</span>-->
                                        <!--    <?php } ?>-->
                                        <!--</div>-->
                                        
                                        <div class="d-flex">
                                            <h6 class="text-start">Investment Period</h6>
                                            
                                            <span class="text-end ms-auto mt-1"><?=$abs_diff?> Days</span>
                                            
                                        </div>
                                        
                                        <!--<input type="text" id="investment" class="js-range-slider" name="my_range" value="1"-->
                                        <!--/>-->
                                    </div>
                                  
                                    
                                    <!-- <div class="col-12 col-md-6 mt-5">
                                        <div class="d-flex">
                                        <h6 class="text-start">Payout</h6></div>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payout" value="Monthly"  id="payout">
                                                <label class="form-check-label fs-14" for="monthly">
                                                    Monthly
                                                </label>
                                            </div>
                                            <div class="form-check ms-3">
                                                <input class="form-check-input" type="radio" name="payout" value="Yearly" id="payout" checked>
                                                <label class="form-check-label fs-14" for="yearly">
                                                    Yearly
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div> -->
                                    <p class="mt-5">Interest rate pre-populated based on your investment period</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="card shadow rounded-2">
                            <div class="card-body">
                                <h3>Summary</h3>
                                <div class="row gy-5 mt-3">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-left fw-semibold">Investment Amount</span>
                                            <span class="dottedline"></span>
                                            <span class="text-right">₹<span id="get_invest_amount"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <!--<div class="d-flex justify-content-between">-->
                                        <!--    <span class="text-left fw-semibold">Investment Period</span>-->
                                        <!--    <span class="dottedline"></span>-->
                                        <!--    <?php if($td_portfolio_details['payout'] == 'Yearly'){?>-->
                                        <!--    <span class="text-right"><?=$td_portfolio_details['payout_year']?> Years</span>-->
                                        <!--    <?php }else{ ?>-->
                                        <!--    <span class="text-right"><?=$td_portfolio_details['payout_year']?> Monthly</span>-->
                                        <!--    <?php } ?>-->
                                        <!--</div>-->
                                        
                                        <div class="d-flex justify-content-between">
                                            <span class="text-left fw-semibold">Investment Period</span>
                                            <span class="dottedline"></span>
                                            
                                            <span class="text-right"><?=$abs_diff?> Days</span>
                                            
                                        </div>
                                    </div>
                                    <!-- <div class="col-12">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-left fw-semibold">Payout Mode</span>
                                            <span class="dottedline"></span>
                                            <span class="text-right"><span id="payout_mode"></span></span>
                                        </div>
                                    </div> -->
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-left fw-semibold">Maturity Date</span>
                                            <span class="dottedline"></span>
                                            <?php 
                                                
                                                
                                            ?>
                                            <span class="text-right"><?php echo $maturity_date;?></span>
                                        </div>
                                    </div>
                                    <hr class=" mt-3">
                                     
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-left fw-semibold">ROI</span>
                                            <span class="dottedline"></span>
                                            <span class="text-right"><span id="get_interest"></span>%
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-left fw-semibold"><span class="me-1" id="years"></span>Earnings</span>
                                            <span class="dottedline"></span>
                                            <span class="text-right">₹<span id="interest_earning"></span>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between">
                                            <span class="text-left fw-semibold">Maturity Amount</span>
                                            <span class="dottedline"></span>
                                            <span class="text-right">₹<span id="total_earning"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <?php if(!empty($td_user_kyc_details) && isset($td_user_kyc_details) && $td_user_kyc_details['pan_status'] != 0 && $td_user_kyc_details['aadhar_status'] != 0){?>
                    <a href="" class="btn text-light btn-green btn-sm" type="button" data-bs-target="#startinvesting" data-bs-toggle="modal">Start Investing
                    </a>
                    <?php }elseif(!empty($td_user_kyc_details) && isset($td_user_kyc_details) && $td_user_kyc_details['pan_status'] == 0 && $td_user_kyc_details['aadhar_status'] == 0 && !empty($td_user_kyc_details)){ ?>
                    <p style="color: red;"><b>Note:</b> Kyc Under Verification</p>
                    <?php }else{ ?>
                    <p style="color: red;"><b>Note:</b> Please complete kyc before Investing <a href="<?=base_url()?>auth/is_session/user/profile/my_profile/">Click Here</a></p>
                    <?php } ?>
                    <p>Disclaimer: As per Government rules</p>
                </div>
                
                
            </div>
        </div>
    </main>
    <div class="modal fade" id="invest" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$td_section['title'];?></h4>
                    <button type="button" class="btn-close " data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-dark"><?=$td_section['sub_title'];?></p>
                            <ul>
                                <?php foreach($why_invest as $key => $val){?>
                                <li><?=$val['answer'];?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="faqs" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">FAQ's</h4>
                    <button type="button" class="btn-close " data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <?php foreach($td_faqs as $key => $val){ ?>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Q: <?=$val['question'];?></h6>
                                        <p>A: <?=strip_tags($val['answer']);?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="fund" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Fund Details</h4>
                    <button type="button" class="btn-close " data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Detailed break-down of your investments</p>
                    <div class="accordion accordion-flush" id="fundDetail">
                        <?php foreach($td_fund_details as $key => $val){ ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse<?=$val['id'];?>" aria-expanded="false"
                                    aria-controls="flush-collapse<?=$val['id'];?>"><?=$val['fund_details_title'];?> <span
                                        class="counter rounded-circle ms-5 text-right bg-white text-dark p-1"><?=$val['fund_details_percentage'];?>%</span></button>
                            </h2>
                            <div id="flush-collapse<?=$val['id'];?>" class="accordion-collapse collapse show"
                                data-bs-parent="#fundDetail">
                                <div class="accordion-body">
                                    <h6 class=""><?=$val['short_description'];?></h6>
                                    <?=$val['description'];?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="startinvesting" aria-hidden="true" aria-labelledby="startinvestingLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startinvestingLabel">Select payment method</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-accent-01 shadow rounded-2 p-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="upi" checked>
                            <label class="form-check-label" for="upi">
                                UPI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="banktransfer" checked>
                            <label class="form-check-label" for="banktransfer">
                                Bank Transfer
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info btn-sm" data-bs-target="#startinvesting2" data-bs-toggle="modal">Add ₹ <span id="new_total_earning"></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="startinvesting2" aria-hidden="true" aria-labelledby="startinvestingLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            
            <div class="modal-content">
                <div class="modal-header">
                   <a class="text-dark fs-40" data-bs-target="#startinvesting" data-bs-toggle="modal">
                       <i class="bi bi-arrow-left"></i>
                   </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="modal-title" id="startinvestingLabel2">Bank Account for Funds Transfer</h5>
                            <p>Register the following bank account as beneficiary in your account and transfer funds through NEFT/IMPS/RTGS.</p>
                        </div>
                    </div>
                    <div class="bg-accent-01 shadow rounded-2 p-3 mt-3">
                        <div class="row p-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="text-start">
                                        <h6>Account Number</h6>
                                    </div>
                                    <div class="text-end">
                                        <h6>000661900005679</h6>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-muted">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="text-start">
                                        <h6>IFSC Code</h6>
                                    </div>
                                    <div class="text-end">
                                        <h6>YESB0000006</h6>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-muted">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="text-start">
                                        <h6>Account Name</h6>
                                    </div>
                                    <div class="text-end">
                                        <h6>Capsure Wealth Advisory</h6>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-muted">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="text-start">
                                        <h6>SWIFT code</h6>
                                    </div>
                                    <div class="text-end">
                                        <h6>YESBINBB</h6>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-muted">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="text-start">
                                        <h6>Bank Name</h6>
                                    </div>
                                    <div class="text-end">
                                        <h6>YES BANK</h6>
                                    </div>
                                </div>
                            </div>
                            <hr class="text-muted">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="text-start">
                                        <h6>Branch</h6>
                                    </div>
                                    <div class="text-end">
                                        <h6>SOMAJIGUDA, HYDERABAD</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <p class="text-muted">Once you transfer funds above mentioned bank account, it may take upto 4 hours for RTGS/NEFT transaction and up to
                            45 minutes for an IMPS transaction to reflect in your PMSWala Account</p>
                            <p class="text-muted">*If you are using ICICI bank to add beneficiary, please select 'other bank payee' option </p>
                            <hr class="text-muted">
                            <h6 class="text-muted">Note: We strongly recommend adding above beneficiary by logging in to your bank's website/web-portal. Your 
                            bank's mobile app may not support addition of new beneficiary with alpha-numeric account number.</h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center m-auto">
                      <input type="hidden" id="user_id" name="user_id" value="<?=$this->session->userdata('user_id');?>">
                      <input type="hidden" id="mode_of_payment_status" name="mode_of_payment_status" value="Bank Account for Funds Transfer">
                      <?php 
                      $get_id = $_GET['jwt_token'];
                      $id = encrypt_decrypt($get_id, 'decrypt');
                      ?>
                      <input type="hidden" id="portfolio_id" name="portfolio_id" value="<?=$id;?>">
                      <input type="hidden" id="maturity_date" name="maturity_date" value="<?=$id;?>">
                       <span class="text-right"><span id="get_new_invest_amount" style="display:none;"></span></span>
                       <span class="text-right"><span id="get_new_investment" style="display:none;"></span></span>
                       <span class="text-right"><span id="payout_mode_new" style="display:none;"></span></span>
                    <button class="btn btn-primary"  id="bank_click" value="add_investment">Submit</button>
                </div>
            </div>
        </div>
    </div>
    
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var investamount = $('#investamount').val();
        var pay_mode = $("input[type='radio']:checked").val();
        sendAjaxRequest(investamount,pay_mode);
    });
    $('#investamount,input[name="payout"]').on('input', function() {
        var inputValue = $('#investamount').val(); 
         var pay_mode = $("input[type='radio']:checked").val(); 
        sendAjaxRequest(inputValue,pay_mode); 
    });
    
    function sendAjaxRequest(value,pay_mode) {
        var csrfToken = '<?= $this->security->get_csrf_hash(); ?>';
        var interest = <?=$td_portfolio_details['interest']?>;
        var portfolio_id = <?=$td_portfolio_details['id']?>;
        var payout = parseInt(<?=$td_portfolio_details['payout_year']?>);
        var payout_mode = pay_mode;
        var minValue = <?=$td_portfolio_details['min_value'];?>; 
        var maxValue = <?=$td_portfolio_details['max_value'];?>;
       
        if (value < minValue || value > maxValue) {
            $("#max_value").html("Input value must be between " + minValue + " and " + maxValue).show().fadeOut(3000);
            $('#investamount').empty();
            return;
        }
        
        $.ajax({
            url: '<?=base_url()?>auth/is_session/user/portfolios/get_investment_details/',
            method: 'POST',
            data: {
                investamount: value,
                interest: interest,
                payout: payout,
                portfolio_id:portfolio_id,
                payout_mode: payout_mode,
                csrf_test_name: csrfToken
            },
            success: function(response) {
                var val=JSON.parse(response);
                $('#get_invest_amount').empty();
                $('#interest_earning').empty();
                $('#get_interest').empty();
                $('#years').empty();
                $('#payouts').empty();
                $('#total_earning').empty();
                $('#new_total_earning').empty();
                $('#payout_mode').empty();
                $('#payout_mode_new').empty();
                // var per_day_earnings = Math.round(val.interest_earning/365);
                var per_day_earnings = val.interest_earning/365;
                var days = '<?php echo $abs_diff;?>';
                var interest = Math.round(per_day_earnings*days);
                var maturity_amount = parseInt(parseInt(interest)+parseInt(val.invest_amount));
                // $("#interest_earning").append(val.interest_earning);
                $("#interest_earning").append(interest.toFixed(0));
                // $("#total_earning").append(val.total_earning);
                $("#total_earning").append(maturity_amount.toFixed(0));
                $("#new_total_earning").append(val.invest_amount);
                $("#payout_mode").append(val.payout_mode);
                $("#get_interest").append(val.interest);
                $("#years").append(val.payout_mode);
                $("#payouts").append(val.payout);
                $("#get_invest_amount").append(val.invest_amount);
                //// new ////
                $('#get_new_invest_amount').empty();
                $("#get_new_invest_amount").append(val.invest_amount);
                
                $("#payout_mode_new").append(val.payout_mode);
                 
                //end new ///
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
<script>
$(document).ready(function() {
    $('#bank_click').on('click', function() {
        var get_new_invest_amount = $('#get_new_invest_amount').text();
        var portfolio_id = ($('#portfolio_id').val());
        var payout_mode = $('#payout_mode_new').text();
        var interest_earning = $('#interest_earning').text();
        var get_interest = $('#get_interest').text();
        var maturity_amount = $('#total_earning').text();
        var investment_period = '<?=$abs_diff;?>'
        var maturity_date = '<?php echo date("Y-m-d", strtotime($maturity_date));?>';
        $.ajax({
            url: '<?=base_url()?>auth/is_session/user/portfolios/submit_investment_details/',
            method: 'POST',
            data: { get_new_invest_amount: get_new_invest_amount, portfolio_id: portfolio_id, payout_mode: payout_mode, maturity_date: maturity_date, interest_earning: interest_earning, get_interest: get_interest, maturity_amount: maturity_amount, investment_period:investment_period},
            success: function(response) {
             var val=JSON.parse(response);
                if(val.success == 'successfully'){
                    window.location.replace("<?=base_url()?>auth/is_session/user/transaction/");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>
