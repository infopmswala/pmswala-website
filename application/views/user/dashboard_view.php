
<main class="main-wrapper">
        <div class="container-fluid">
            <div class="page-header d-flex align-items-center justify-content-between mr-bottom-30">
                <div class="left-part mt-5">
                    <h3 class="text-dark">Dashboard</h3>
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-12 col-md-4">
                    <div class="card shadow rounded-2 bg-accent-01 bg-opacity-25">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-block">
                                    <h5 class="fw-normal">Total Portfolio</h5>
                                    <p class="fs-23 fw-bold text-dark"> <?=numberFormat($count_portfolios);?></p>
                                </div>
                                <img src="<?=base_url()?>assets/user/assets/img/svg/pie-chart.png" height="70px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow rounded-2 bg-yellow bg-opacity-25">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-block">
                                    <h5 class="fw-normal">Total Investment</h5>
                                    <?php if(!empty($total_invested_amount['amount'])){ ?>
                                    <p class="fs-23 fw-bold">₹ <?=numberFormat($total_invested_amount['amount']) ?? 0;?></p>
                                    <?php }else{ ?>
                                    <p class="fs-23 fw-bold">₹ 0</p>
                                    <?php } ?>
                                </div>
                                <img src="<?=base_url()?>assets/user/assets/img/svg/rupee.png" height="70px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow rounded-2 bg-success bg-opacity-10">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-block">
                                    <h5 class="fw-normal">Current Value</h5>
                                    <?php if(!empty($count_total_maturity_amount['maturity_amount'])){ ?>
                                    <p class="fs-23 fw-bold">₹ <?=numberFormat($count_total_maturity_amount['maturity_amount']) ?? 0;?></p>
                                     <?php }else{ ?>
                                    <p class="fs-23 fw-bold">₹ 0</p>
                                    <?php } ?>
                                </div>
                                <img src="<?=base_url()?>assets/user/assets/img/clients/save.png" height="70px">
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-6 col-md-3">-->
                <!--    <div class="card shadow rounded-2 bg-warning bg-opacity-10">-->
                <!--        <div class="card-body">-->
                <!--            <div class="d-flex justify-content-between">-->
                <!--                <div class="d-block">-->
                <!--                    <h5 class="fw-normal">ROI</h5>-->
                <!--                    <p class="fs-23 fw-bold">15%</p>-->
                <!--                </div>-->
                <!--                <img src="<?=base_url()?>assets/user/assets/img/svg/loan.png" height="70px">-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="row g-3 mt-3">
                <div class="col-12 col-lg-8">
                    <div class=" bg-lightgreen rounded-2 p-5 ">
                        <div class="row mt-5 bg-white p-3 rounded-2">
                            <div class="col-12">
                                <h4>Your Portfolio</h4>
                            </div>
                            <div class="col-12">
                                <div id="simple-donut"></div>
                            </div>
                        </div>
                        <!--<div class="card shadow mt-5">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-12 text-center">
                                        <h4 class="bg-green p-3 rounded-2 w-50 m-auto text-white">What's New</h4>
                                    </div>
                                </div>
                                <?php foreach($td_faqs as $key => $val){?>
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
                <div class="col-12 col-lg-4">
                    <div class=" bg-lightgreen rounded-2 p-3">
                        <!--<div class="row">-->
                        <!--    <div class="col-12">-->
                        <!--        <h5>Notifications</h5>-->
                        <!--    </div>-->
                        <!--    <div class="col-12">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-body">-->
                        <!--                <div class="row">-->
                        <!--                    <div class="col-12">-->
                        <!--                        <h6>We are launching new version of PMSWala <span class="fs-10 fw-medium text-gray">Jan 06 24</span></h6>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-12">-->
                        <!--                        <h6>We are launching new version of PMSWala <span class="fs-10 fw-medium text-gray">Jan 06 24</span></h6>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-12">-->
                        <!--                        <h6>We are launching new version of PMSWala <span class="fs-10 fw-medium text-gray">Jan 06 24</span></h6>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="row">
                            <div class="col-12">
                                <h5>Your Depository</h5>
                            </div>
                            <?php 
                            if(!empty($my_portfolio)){
                            foreach($my_portfolio as $key => $val){?>
                            <div class="col-12">
                                <div class="card">
                                    <a href="<?=base_url()?>auth/is_session/user/portfolios/my_portfolio_details/?transaction_id=<?=$val['transaction_id'];?>">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-block">
                                                <h4 class="text-green"><?=$val['title_1'];?></h4>
                                                 <h5><?=$val['title_2'];?></h5>
                                            </div>
                                            <img src="<?=base_url()?><?=$val['portfolio_image'];?>" height="90px">
                                        </div>
                                        <div class="bg-success-01 text-dark p-3 p-xxl-1 rounded-2 mt-1">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <p class="mb-1 fs-14">Investment:
                                                    <span class="fs-14"><?=$val['investment'];?></span></p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p class="mb-1 fs-14">Period:
                                                    <span class="fs-14"><?=$val['period'];?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            <?php } }else{ ?>
                            <div class="col-12"><h6 style="text-align: center;color: red;">No Data Found</h6></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row mt-5">
                <?php foreach($td_portfolio as $key => $val){ ?>
                <div class="col-12 col-md-4">
                     <div class="col-12">
                                <div class="card">
                                    <a href="<?=base_url()?>auth/is_session/user/portfolios/investment?jwt_token=<?php echo encrypt_decrypt($val['id'], 'encrypt')?>">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-block">
                                                <h6 class="text-green"><?=$val['title_1'];?></h6>
                                                 <p><?=$val['title_2'];?></p>
                                            </div>
                                            <img src="<?=base_url()?><?=$val['portfolio_image'];?>" height="90px" width="90px">
                                        </div>
                                        <div class="bg-success-01 p-3 text-dark p-xxl-1 rounded-2 mt-1">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <p class="mb-1 fs-14">Investment:
                                                    <span class="fs-14"><?=$val['investment'];?></span></p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p class="mb-1 fs-14">Period:
                                                    <span class="fs-14"><?=$val['period'];?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <script>
        document.getElementById("dashboard").classList.add('active');
    </script>
    <script src="<?=base_url()?>assets/user/plugins/apexchart/apexcharts.min.js"></script>
    <script src="<?=base_url()?>assets/user/plugins/apexchart/apexchart-inits/apexcharts-analytics-2.js"></script>
    <script>
        var options = {
            series: [<?=$total_invested_amount['amount'];?>, <?=$count_total_maturity_amount['maturity_amount'];?>],
            labels: ['Total Invested', 'Total Returns'],
            dataLabels: {
              enabled: true,
            //   formatter: function (series) {
            //     return series + "%"
            //   }
            },
            colors:['#a1a1a1', '#179c49', '#1d4263'],
            chart: {
                width: "80%",
                
                type: 'donut',
            },
            plotOptions: {
                pie: {
                    donut: {
                      labels: {
                        show: true,
                        total: {
                          showAlways: true,
                          show: true,
                          fontSize: '22px',
                          fontFamily: 'Helvetica, Arial, sans-serif',
                          fontWeight: 600,
                          color: '#179c49',
                          formatter: function (w) {
                            return w.globals.seriesTotals.reduce((a, b) => {
                              return a + b
                            }, 0)
                          }
                        }
                      }
                    }
                }
            },
            legend: {
                    onItemHover: {
                      toggleDataSeries: true
                    },
                    horizontalAlign: 'center',
                    position:'bottom',
                    formatter: function(val, opts) {
                        return val + " - " + opts.w.globals.series[opts.seriesIndex]
                      },
                       fontSize: '18px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                },
            responsive: [{
                breakpoint: 600,
                options: {
                chart: {
                    width: "100%",
                    height:"700px",
                },
                legend: {
                    onItemHover: {
                      toggleDataSeries: true
                    },
                    horizontalAlign: 'right',
                    position:'bottom'
                }
                }
            }]
        };
        
        var simple_donut = new ApexCharts(document.querySelector("#simple-donut"), options);
        simple_donut.render();
    </script>