<style>
    .card-body {
    padding: .5rem !important;
    overflow-x:hidden;
}
</style>
<main class="main-wrapper">
    <div class="container-fluid">
        <div class="mt-5">
            <div class="page-header d-flex align-items-center justify-content-between mr-bottom-30">
                <div class="left-part">
                    <h3 class="text-dark">My Portfolios</h3>
                </div>
            </div>

            <div class="row g-3">
                <?php 
                 if(!empty($my_portfolio)){
                foreach($my_portfolio as $key => $val){?>
                <div class="col-xl-12 col-xxl-12 col-12 col-md-6">
                    <div class="card border-0 shadow">
                        <div class="card-body gap-2 gap-lg-2">
                            <div class="row">
                                <div class="col-6 col-md-2 m-auto text-center">
                                    <img src="<?=base_url()?><?=$val['portfolio_image'];?>" height="80px">
                                </div>
                                <div class="col-6 col-md-4">
                                    <h5 class="text-green"><?=$val['title_1'];?></h5>
                                     <p><?=$val['title_2'];?></p>
                                </div>
                                <div class="col-6 col-md-4">
                                        <h6>Date & Time</h6>
                                        <p><?=Dateconversion($val['buy_time']);?>, <?=Timeconversion($val['buy_time']);?></p>
                                    </div>
                                <div class="col-6 col-md-2 m-auto">
                                    <a href="<?=base_url()?>auth/is_session/user/portfolios/my_portfolio_details/?transaction_id=<?=$val['transaction_id'];?>" type="button"
                                    class="btn btn-accent-01 btn-sm text-dark mt-3">View Details</a>
                                </div>
                            </div>
                            <div class="bg-success-01 p-2 p-xxl-1 rounded-2 mt-1">
                                <div class="row">
                                    <div class="col-6 col-md-2 d-none d-md-block"></div>
                                    <div class="col-6 col-md-4">
                                        <p class="mb-1"><span class="fw-bold">Investment:</span>
                                        <span><?=$val['investment'];?></span></p>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <p class="mb-1"><span class="fw-bold">Period:</span>
                                        <span><?=$val['period'];?></span></p>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <p class="mb-1"><span class="fw-bold">ROI:</span>
                                        <span><?=$val['interest'];?>%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }else{ ?>
                <div class="col-xl-12 col-xxl-12 col-12 col-md-6">
                    <h6 style="text-align: center;color: red;">No Data Found</h6>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<script>
         document.getElementById("myportfolio").classList.add('active');
    </script>