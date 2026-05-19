   
	<main class="main">
        
		<!-- Start Breadcrumb
		============================================= -->
		<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/invest.jpg)">
			<div class="container">
				<div class="site-breadcrumb-wpr">
					<h2 class="breadcrumb-title">Invest</h2>
					<ul class="breadcrumb-menu clearfix">
						<li><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Invest</li>
					</ul>
				</div>
			</div>
		</div>
        <!-- End Breadcrumb -->
        
      	<!-- Start Team
		============================================= -->
		<div class="team-area bg de-padding">
			<div class="container">
			    <h2 class="text-center">Long-Term Gain Strategy</h2>
				<div class="team-wpr row mt-5">
				    <?php foreach($td_services as $key => $val){?>
				    <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
    					<div class="inner-box">
    						<div class="image">
    							<img src="<?=base_url()?><?=$val['service_image'];?>" alt="no image">
    							<div class="overlay-box">
    								<div class="overlay-inner">
    									<div class="content">
    										<div class="text"><?=$val['service_short_description'];?></div>
    									</div>
    								</div>
    							</div>
    						</div>
    						<div class="lower-box">
    							<div class="box-inner">
    								<div class="icon">
    								    <i class="<?=$val['service_icon'];?>"></i>
    								</div>
    								<!--<h5><a href="<?=base_url()?><?=$val['service_slug'];?>"><?=$val['service_title'];?></a></h5>-->
    								<h5><a href=""><?=$val['service_title'];?></a></h5>
    							</div>
    						</div>
    					</div>
    				</div>
    				<?php } ?>
				</div>
			</div>
		</div>
		<!-- End Team -->
		<div class="team-area pt-5">
			<div class="container">
			    <div class="row">
			        <div class="col-12">
			            <h3 class="text-center">INVESTMENT PLAN</h3>
			        </div>
			    </div>
			    <section class="ps-timeline-sec">
                    <div class="container">
                        <ol class="ps-timeline">
                            <li>
                                <div class="img-handler-top">
                                    <h4>INR 50K - 1L</h4>
                                    <p>Get upto 12% </p>
                                </div>
                                <div class="ps-bot">
                                    <a href="<?=base_url()?>contact-us" class="btn btn-success btn-lg fs-2">Invest</a>
                                </div>
                                <span class="ps-sp-top">01</span>
                            </li>
                            <li>
                                <div class="img-handler-bot">
                                    <h4>INR 1L - 2L</h4>
                                    <p>Get upto 14%</p>
                                </div>
                                <div class="ps-top">
                                    <a href="<?=base_url()?>contact-us" class="btn btn-success btn-lg fs-2">Invest</a>
                                </div>
                                <span class="ps-sp-bot">02</span>
                            </li>
                            <li>
                                <div class="img-handler-top">
                                    <h4>INR 2L - 5L</h4>
                                    <p>Get upto 18% </p>
                                </div>
                                <div class="ps-bot">
                                    <a href="<?=base_url()?>contact-us" class="btn btn-success btn-lg fs-2">Invest</a>
                                </div>
                                <span class="ps-sp-top">03</span>
                            </li>
                            <li>
                                <div class="img-handler-bot">
                                    <h4>INR 6L - 10L</h4>
                                    <p>Get upto 20% </p>
                                </div>
                                <div class="ps-top">
                                    <a href="<?=base_url()?>contact-us" class="btn btn-success btn-lg fs-2">Invest</a>
                                </div>
                                <span class="ps-sp-bot">04</span>
                            </li>
                            <li>
                                <div class="img-handler-top">
                                    <h4>INR 15L & Above</h4>
                                    <p>Get upto 22% </p>
                                </div>
                                <div class="ps-bot">
                                    <a href="<?=base_url()?>contact-us" class="btn btn-success btn-lg fs-2">Invest</a>
                                </div>
                                <span class="ps-sp-top">05</span>
                            </li>
                        </ol>
                    </div>
                </section>
			</div>
		</div>
		<div class="partner-area de-padding bg">
			<div class="container">
				<div class="partner-wpr">
					<div class="row g-5 align-items-center">
						<div class="col-xl-4">
							<div class="partner-left">
								<h3 class="heading-3 mb-20">We've worked with over 80+ companies globally</h3>
								
							</div>
						</div>
						<div class="col-xl-8">
							<div class="partner-right">
								<div class="ptnr-sldr swiper">
									<!-- Additional required wrapper -->
									<div class="swiper-wrapper">
                                        <?php foreach($td_development_environments as $key => $val){ ?>
										<!-- Single Item -->
										<div class="swiper-slide">
											<img src="<?=base_url()?><?=$val['image'];?>" class="partner-logo" alt="<?=$val['name'];?>">
										</div>
										<?php } ?>
										<!-- End Single Item -->
									</div>
									<!-- Pagination -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>	