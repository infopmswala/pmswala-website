<main class="main">
		<!-- Start Slider 
		============================================= -->
		<div class="hero-area pos-rel hero-overlay-2 hero-bg" style="background:url(<?=base_url()?><?=$td_update_single_slider['image'];?>)">
			<div class="hero-shapes">
				<span class="hero-c-1"></span>
				<span class="hero-c-2"></span>
				<span class="hero-c-3"></span>
				<span class="hero-c-4"></span>
				<span class="hero-c-5"></span>
				<img src="<?=base_url()?>assets/frontend/img/dot/dot-3.png" class="hero-dot-3" alt="no image">
			</div>
			<div class="hero-single">
				<div class="container">
					<div class="hero-wpr pos-rel">
						<div class="row g-5">
							<div class="col-xl-7">
								<div class="hero-content element-center">
									<div class="hero-content-desc">
										<span class="hero-sub-title wh mb-20">
											<span class="">
                							    <img src="<?=base_url()?>assets/frontend/img/favicon.png" style="height:30px">
                							</span>
										<?=$td_update_single_slider['title_1'];?>
										</span>
										<h2 class="hero-title">
										<?=$td_update_single_slider['title_2'];?>
										</h2>
                                        <p class="for-all"><?=$td_update_single_slider['title_3'];?></p>
                                          <p><?=$td_update_single_slider['title_4'];?></p>
										<div class="hero-btn">
											<a href="<?=base_url()?>about-us" class="btn-1 btn-md" style="background-color: #179c49;">
												Discover More
											</a>
											<a href="<?=base_url()?>contact-us" class="btn-1 btn-second btn-md">
												Contact Us
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-5">
								<div class="hero-pic">
									<img src="<?=base_url()?>assets/frontend/img/person/hdr-2.png" alt="no image">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Slider -->
		
		<!-- Start About
		============================================= -->
		<div class="about-area de-padding">
			<div class="container">
				<div class="about-wpr grid-2">
					
					
				</div>
                <?php foreach($td_section as $key => $val){ 
                if($val['slug'] == 'why-pmswala-investment'){?>
                <div class="row">
                <div class="col-md-6 wr-56">
               <img src="<?=base_url()?><?=$val['image'];?>" width="100%" alt="no image">
                </div>
                <div class="col-md-6">
                <div class="pl-30">
						<span class="hero-sub-title mb-20">
							<span class="">
							    <img src="<?=base_url()?>assets/frontend/img/favicon.png" style="height:30px">
							</span>
							<?=$val['title'];?>
						</span>
						<h2 class="heading-1 mb-20">
						<?=$val['sub_title'];?>
						</h2>
						<?=$val['description'];?>
						<a href="<?=base_url()?>invest" class="btn-1 btn-md">
							Invest
						</a>
					</div>
				
                </div>
                	
                </div>
                <?php } } ?>
			</div>
		</div>
		<!-- End About -->
		
        
        <div class="team-area de-padding bg-theme-3 overflow-hidden pos-rel">
			<img src="<?=base_url()?>assets/frontend/img/dot/service-wavy.png" class="team-wavy" alt="no image">
			<div class="container">
				<div class="row mb-30 align-items-center">
					<div class="col-xl-8">
						<span class="hero-sub-title mb-20">
						
							Services we provide
						</span>
						<h2 class="heading-1 text-white">
							Building your digital
							future with us
						</h2>
					</div>
					<!--<div class="col-xl-4">-->
					<!--	<div class="service-botam text-right">-->
					<!--		<a href="#" class="btn-1 btn-md">-->
					<!--			See More-->
					<!--		</a>-->
					<!--	</div>-->
					<!--</div>-->
				</div>
				<div class="service-wpr grid-4">
				    <?php foreach($td_services as $key => $val){ ?>
					<div class="service-box">
						<img src="<?=base_url()?>assets/frontend/img/vector/wash.png" class="service-wash" alt="no image">
						<div class="service-icon pos-rel srt">
							<img src="<?=base_url()?><?=$val['service_image'];?>" alt="" />
							
						</div>
						<div class="service-desc">
							<h4 class="heading-4"><?=$val['service_title'];?></h4>
							<p>
							<?=$val['service_short_description'];?>
							</p>
							<!--<a href="<?=base_url()?><?=$val['service_slug'];?>/" class="btn-text btn btn-lg">-->
							<!--	Read More-->
							<!--</a>-->
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- Start CTA
		============================================= -->
		<div class="cta-area hero-overlay hero-bg de-pt cta-btm" style="background:url(<?=base_url()?>assets/frontend/img/pictures/counter.jpg)">
			<div class="container">
				<div class="cta-wpr grid-2">
					<div class="cta-left">
						<span class="hero-sub-title wh mb-20">
							<span class="">
							    <img src="<?=base_url()?>assets/frontend/img/favicon.png" style="height:30px">
							</span>
							Get Consultation
						</span>
						<h2 class="heading-1 mb-0">
							Building your digital dream <br /> projects with us 
						</h2>
					</div>
					<div class="cta-right center-right">
						<a href="<?=base_url()?>contact-us" class="btn-1 btn-white btn-md">
							Contact Us
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- End CTA -->
		
		<!-- Start Counter
		============================================= -->
		<div class="counter-area counter-top-minus">
			<div class="container">
				<div class="counter-wpr hero-bg" style="background-image: url(<?=base_url()?>assets/frontend/img/shape/shape-1.png)">
					<div class="counter-1 grid-4">
					    <?php foreach($td_count_statistics as $key => $val){?>
						<div class="fun-fact">
							<div class="counter-icon">
								<i class="<?=$val['counter_icon'];?>"></i>
							</div>
							<div class="counter">
								<div class="timer" data-to="<?=$val['counter_timer'];?>" data-speed="2000"></div>
								<div class="operator"><?=$val['counter_operator'];?></div>
							</div>
							<span class="medium"><?=$val['counter_title'];?></span>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- End Counter -->
		<div class="why-area de-padding">
			<div class="container">
			    <?php foreach($td_section as $key => $val){ 
                if($val['slug'] == 'mastering-investments-making-informed-choices-for-optimal-returns'){?>
				<div class="why-wpr grid-2">
					<div class="why-left">
						<h2 class="heading-1" style="margin-top: 40px;">
					    <?=$val['title'];?>
						</h2>
						<p class="mb-30">
						<?=$val['description'];?>
						</p>
						
					</div>
					<div class="why-right">
						<div class="why-pics pos-rel">
							<img src="<?=base_url()?><?=$val['image'];?>" class="why-pic" alt="no image">
							<img src="<?=base_url()?>assets/frontend/img/ui/over-ui.jpg" class="why-ui" alt="no image">
							<img src="<?=base_url()?>assets/frontend/img/vector/box.png" class="why-box" alt="no image">
						</div>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>
		<!-- Start Service
		============================================= -->
		
		<!-- End Service -->
		
		
		
		<!-- Start Review
		============================================= -->
		<div class="review-area bg de-padding pos-rel">
			<div class="container container-stage">
				<div class="review-wpr">
					<div class="row g-0 align-items-center">
						<div class="col-xl-5">
							<div class="review-left ">
								<div class="review-left-content pos-rel">
									
									<div class="review-left-title-arrow">
										<h2 class="heading-5">What our client <br /> says</h2>
										<div class="review-slider-ico">
											<div class="swiper-button-next"></div>
											<div class="swiper-button-prev"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-7">
							<div class="reveiw-wpr review-sldr swiper">
							   
								<!-- Additional required wrapper -->
								<div class="swiper-wrapper">
									<!-- Single Item -->
									<?php foreach($td_testimonials as $key => $val){ ?>
									<div class="swiper-slide">
										<div class="review-single">
                                        <img src="<?=base_url()?>assets/frontend/img/quote.png" class="qu-01" alt="" />
											<h5 class="heading-5"><?=$val['name'];?></h5>
											<p><?=$val['message'];?></p>
											<span>
												<?=$val['role'];?>
											</span>
										</div>
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
		<!-- End Review -->
		
		
		
		<!-- Start Blog
		============================================= -->
		<div class="blog-area de-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 offset-xl-2">
						<div class="site-title text-center">
							<span class="hero-sub-title mb-20">
								<span class="">
    							    <img src="<?=base_url()?>assets/frontend/img/favicon.png" style="height:30px">
    							</span>
								Our Blog
							</span>
							<h2 class="heading-1 mb-0">
								Checkout our latest <br /> news and article
							</h2>
						</div>
					</div>
				</div>
				<div class="blog-wpr grid-3">
				    
				    <?php foreach($td_blog as $key => $val){?>
					<div class="blog-box">
						<div class="blog-pic">
							<img src="<?=base_url()?><?=$val['image']?>" alt="no image">
						</div>
						<div class="blog-desc">
							<!--<ul class="blog-meta-item">-->
							<!--	<li>-->
							<!--		<i class="fa-regular fa-user"></i>-->
							<!--		<a href="#">By admin</a>-->
							<!--	</li>-->
							<!--	<li>-->
							<!--		<i class="fa-regular fa-comments"></i>-->
							<!--		<a href="#">Comments (07)</a>-->
							<!--	</li>-->
							<!--</ul>-->
							<div class="blog-content">
								<h4 class="heading-4"><?=$val['title']?></h4>
                                <p><?=$val['short_description']?></p>
								
							</div>
							<div class="blog-bottom">
								<a href="<?=base_url()?><?=$val['slug']?>/" class="blog-btn">
									Read More 
									<i class="ti-arrow-top-right"></i>
								</a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- End Blog -->
		
	</main>	