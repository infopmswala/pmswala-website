<main class="main">
        
		<!-- Start Breadcrumb
		============================================= -->
		<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/aboutbg.jpg)">
			<div class="container" style="margin-top:20px;">
				<div class="site-breadcrumb-wpr">
					<h2 class="breadcrumb-title">About Us</h2>
					<ul class="breadcrumb-menu clearfix">
						<li><a href="<?=base_url()?>">Home</a></li>
						<li class="active">About Us</li>
					</ul>
				</div>
			</div>
		</div>
        <!-- End Breadcrumb -->
        
		<!-- Start About
		============================================= -->
		<div class="about-area-2 pt-100">
			<div class="container">
			    <?php foreach($td_section as $key => $val){ 
                if($val['slug'] == 'about-us'){?>
				<div class="about-wpr-2 grid-2">
					<div class="about-left-2">
						<div class="about-left-pics-2 pos-rel">
							<img src="<?=base_url()?><?=$val['image'];?>" class="about-2-1" alt="no image">
							<div class="about-exp-yr pos-rel">
								<div class="about-exp">
									<h2 class="heading-2">3+</h2>
									<h5 class="heading-5 mb-0">Years Experience</h5>
								</div>
								<!--<img src="assets/img/person/person-1.png" alt="no image" class="about-exp-pic">-->
							</div>
						</div>
					</div>
					<div class="about-right-2 pl-30">
						<div class="about-right-up mb-30">
							<span class="hero-sub-title mb-20">
								<span class="">
    							    <img src="<?=base_url()?>assets/frontend/img/favicon.png" style="height:30px">
    							</span>
							<?=$val['title'];?>
							</span>
							<h2 class="heading-1 mb-0">
							<?=$val['sub_title'];?>
							</h2>
						</div>
						<p class="mb-30">
						<?=$val['description'];?>
						</p>
						
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>
		<!-- End About -->
		
		<!-- Start CTA
		============================================= -->
		<div class="cta-area hero-overlay hero-bg de-pt cta-btm" style="background:url(<?=base_url()?>assets/frontend/img/logo/aboutbg.jpg)">
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
						<a href="<?=base_url()?>about-us" class="btn-1 btn-md">
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
		
		<!-- Start Why Choose Us
		============================================= -->
		<div class="faq-area pos-rel de-padding">
			<div class="container">
				<div class="faq-wpr">
				     <?php foreach($td_section as $key => $val){ 
                if($val['slug'] == 'why-pmswala-investment'){?>
					<div class="row">
						<div class="col-xl-6">
							<div class="faq-pics pr-60">
								<!--<div class="faq-pic-1 pos-rel">
									<img src="assets/img/pictures/faq-3.jpg" alt="no image">
									<img src="assets/img/dot/faq-dot.png" class="faq-dot up-move" alt="no image">
								</div>-->
								<div class="faq-pic-2">
									<img src="<?=base_url()?><?=$val['image'];?>" alt="no image" width="100%" height="350px">
								</div>
								<!--<div class="faq-pic-3">
									<img src="assets/img/pictures/faq-2.jpg" alt="no image">
								</div>
								<div class="faq-pic-4 pos-rel">
									<img src="assets/img/pictures/faq-4.jpg" alt="no image">
								</div>-->
							</div>
						</div>
						<div class="col-xl-6">
							<div class="course-accordion">
								<span class="hero-sub-title  mb-20">
									<span class="">
    							    <img src="<?=base_url()?>assets/frontend/img/favicon.png" style="height:30px">
    							</span>
									<?=$val['title'];?>
								</span>
								<h2 class="heading-1 mb-30">
								<?=$val['sub_title'];?>
								</h2>
							   <?=$val['description'];?>
							</div>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</div>
		<!-- End Why Choose Us -->
		
        <div class="container-fluid bg-dark de-padding mt-5 pb-5">
          <div class="container">
            <h2 class="pb-3 pt-2 text-center mb-5 text-white">Our History</h2>
            <!--first section-->
            <div class="row align-items-center how-it-works">
              <div class="col-2 text-center bottom">
                <div class="circle">2021</div>
              </div>
              <div class="col-6">
                <p>Company was established to offer specialized portfolio management services to a wide range of investors. We generates income by facilitating client investments. The firm's minimum investment requirement is modest to accommodate small investors. Minimum 25Lakh</p>
              </div>
            </div>
            <!--path between 1-2-->
            <div class="row timeline">
              <div class="col-2">
                <div class="corner top-right"></div>
              </div>
              <div class="col-8">
                <hr/>
              </div>
              <div class="col-2">
                <div class="corner left-bottom"></div>
              </div>
            </div>
            <!--second section-->
            <div class="row align-items-center justify-content-end how-it-works">
              <div class="col-6 text-right">
                <p>As a consequence of its continuous expansion, the corporation raised the maximum investment threshold to 5Cr by 2022. This strengthens the company's foundation and instills trust among wealthy individuals and institutional investors who desire to allocate larger amounts of funds.</p>
              </div>
              <div class="col-2 text-center full">
                <div class="circle">2022</div>
              </div>
            </div>
            <!--path between 2-3-->
            <div class="row timeline">
              <div class="col-2">
                <div class="corner right-bottom"></div>
              </div>
              <div class="col-8">
                <hr/>
              </div>
              <div class="col-2">
                <div class="corner top-left"></div>
              </div>
            </div>
            <!--third section-->
            <div class="row align-items-center how-it-works">
              <div class="col-2 text-center top">
                <div class="circle">2023</div>
              </div>
              <div class="col-6">
                <p>As a consequence of its continuous expansion, the corporation raised the maximum investment threshold to 5Cr by 2022. This strengthens the company's foundation and instills trust among wealthy individuals and institutional investors who desire to allocate larger amounts of funds.</p>
              </div>
            </div>
            <div class="row timeline">
              <div class="col-2">
                <div class="corner top-right"></div>
              </div>
              <div class="col-8">
                <hr/>
              </div>
              <div class="col-2">
                <div class="corner left-bottom"></div>
              </div>
            </div>
            <div class="row align-items-center justify-content-end how-it-works">
              <div class="col-6 text-right">
                <p>We have a plan with a group of analysts and financial advisors to attain a total fund size of RS 20 Cr+ by May 2024</p>
              </div>
              <div class="col-2 text-center full">
                <div class="circle">2024</div>
              </div>
            </div>
            <div class="row timeline mb-5">
              <div class="col-2">
                <!--<div class="corner right-bottom"></div>-->
              </div>
              <div class="col-8">
                <hr/>
              </div>
              <div class="col-2">
                <div class="corner top-left"></div>
              </div>
            </div>
          </div>
        </div>
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
								    <?php foreach($td_testimonials as $key => $val){ ?>
									<!-- Single Item -->
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
									<!-- End Single Item -->
									<?php } ?>
									<!-- Single Item -->
									<div class="swiper-slide">
										<div class="review-single">
                                         <img src="<?=base_url()?>assets/frontend/img/quote.png" class="qu-01" alt="" />
											<h5 class="heading-5">Tamra J. Butler\Businessman</h5>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, adipisci, cupiditate. Quisquam architecto pariatur corrupti inventore quasi! Quae alias ipsa, distinctio placeat modi. Soluta, sequi eaque quas, numquam eos atque. 
											</p>
											<span>
												Quality Service 
											</span>
										</div>
									</div>
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
		<div class="faq-area pos-rel de-padding">
			<div class="container">
				<div class="faq-wpr">
					<div class="row">
						<div class="col-xl-6 m-auto">
							<div class="faq-pics pr-60 grid-2">
								<div class="faq-pic-1 pos-rel">
									<img src="<?=base_url()?>assets/frontend/img/logo/about-1.jpg" alt="no image" style="height:200px">
									<img src="<?=base_url()?>assets/frontend/img/dot/faq-dot.png" class="faq-dot up-move" alt="no image">
								</div>
								<div class="faq-pic-2">
									<!--<img src="assets/img/logo/about-2.jpg" alt="no image">-->
								</div>
								<div class="faq-pic-3">
									<!--<img src="assets/img/logo/faq-2.jpg" alt="no image">-->
								</div>
								<div class="faq-pic-4 pos-rel">
									<img src="<?=base_url()?>assets/frontend/img/logo/about-2.jpg" alt="no image" style="height:200px">
								</div>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="course-accordion">
								<span class="hero-sub-title  mb-20">
									<span class="">
    							    <img src="<?=base_url()?>assets/frontend/img/favicon.png" style="height:30px">
    							</span>
									FAQS
								</span>
								<h2 class="heading-1">
								Got Questions ?
								</h2>
								<p class="mb-30">
									If you have any other questions – please get in touch at <a href="mailto:info@pmswala.com"> info@pmswala.com</a>
								</p>
								<div class="accordion" id="accordionExample">
								    <?php foreach($td_faqs as $key => $val){ ?>
									<div class="accordion-item">
										<h2 class="accordion-header" id="heading<?=$key?>">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$key?>" aria-expanded="true" aria-controls="collapseOne">
											<?=$val['question'];?>
											</button>
										</h2>
										<div id="collapse<?=$key?>" class="accordion-collapse collapse" aria-labelledby="heading<?=$key?>" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<p class="mb-0">
                                                    <?=$val['answer'];?>
												</p>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>	