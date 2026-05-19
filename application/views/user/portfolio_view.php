<style>
    .card-body {
    padding: .5rem !important;
}
</style>
<main class="main-wrapper">
        <div class="container-fluid">
            <div class="mt-5">
                <div class="page-header d-flex align-items-center justify-content-between mr-bottom-30">
                    <div class="left-part">
                        <h3 class="text-dark">Portfolios</h3>
                    </div>
                </div>

                <div class="row g-3">
                    <?php foreach($td_portfolio as $key => $val){ ?>
                    <div class="col-xl-12 col-xxl-12 col-12 col-md-12">
                        <div class="card border-0 shadow">
                            <div class="card-body gap-2 gap-lg-2">
                                <div class="row">
                                    <div class="col-6 col-md-2 m-auto text-center">
                                        <img src="<?=base_url()?><?=$val['portfolio_image'];?>" height="80px">
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <h5 class="text-green"><?=$val['title_1'];?></h5>
                                         <p class="text-truncate"><?=$val['title_2'];?></p>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <!-- <h6>Open Date</h6>
                                        <p>11 Oct 2023</p> -->
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <!-- <h6>Closure Date</h6>
                                        <p>03 Feb 2024</p> -->
                                    </div>
                                    <div class="col-12 col-md-2 m-auto text-center">
                                        <a href="<?=base_url()?>auth/is_session/user/portfolios/investment?jwt_token=<?php echo encrypt_decrypt($val['id'], 'encrypt')?>" type="button"
                                        class="btn btn-accent-01 btn-sm text-dark mt-3">View Details</a>
                                    </div>
                                </div>
                                <div class="bg-success-01 p-2 p-xxl-1 rounded-2 mt-1">
                                    <div class="row">
                                        <div class="col-12 col-md-2"></div>
                                        <div class="col-6 col-md-4">
                                            <p class="mb-1"><span class="fw-bold">Investment:</span>
                                            <span><?=$val['investment'];?></span></p>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <p class="mb-1"><span class="fw-bold">Period:</span>
                                            <span><?=$val['period'];?></span></p>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <p class="mb-1"><span class="fw-bold">ROI:</span>
                                            <span><?=$val['interest'] ;?>%</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <script>
         document.getElementById("portfolio").classList.add('active');
          document.getElementById("dashboard").removeClass('active');
    </script>