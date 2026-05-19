<!--<?php echo($this->uri->segment(3));?>-->
<style>
 .custom-title {
  font-size: 22px;
 }
 .cvb{
     padding:30px;
 }
</style>

<!--<p>This paragraph has a font size of 22 pixels.</p>-->
    <main class="main">
        
		<!-- Start Breadcrumb
		============================================= -->
		<!--<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/aboutbg.jpg)">-->
		    <div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/contact.jpg)">

			<div class="container">
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
		
		    <?php foreach($td_section as $key => $val){ 
                if($val['slug'] == 'about-us' ){?>
		<div class="about-area-2 pt-100 pb-100 text-sm-center1">
			<div class="container">
			    <div class="row">
			        <!--<div class="col-12 col-md-5 col-xl-6 m-auto">-->
			        <div class="col-12 col-md-4 col-xl-6 ">

                        <!--<h1 class="text-success"><?=$val['title'];?></h1>-->
                        <!--<h1 class="text-success">About PMS Wala: Expertise, Integrity, and Excellence in Portfolio Management</h1>-->
                        <h1 class="text-success">About PMS Wala: Expertise, Integrity, and Excellence in Portfolio Management</h1>

                        <!--<h4 class="mt-5">"<?=$val['sub_title'];?>"</h4>-->
                        <h4 class="mt-5">Greetings from PMS Wala, your go-to source for portfolio management services.</h4>

                        
                            <img src="<?=base_url()?><?=$val['image'];?>" class="rounded shadow aboutimage">
                    </div>
                    <div class="col-12 col-md-7 col-xl-6">
                        
                        <!--<p><span class="text-success fw-bold">Established in May 2022,</span><?=$val['description1'];?>-->
                        <p><span class="text-success fw-bold">Established in May 2022,</span>
                        
                        At PMS Wala, we are dedicated to offering Portfolio Management Services that are in accordance with your needs in relation to objectives. Our vision and mission statements explain the effectiveness of the commitment to excellence and customer service we pledge, to allow us to provide the best investment solutions meant to secure and grow your wealth.
                              <br>
                        We are determined to answer your needs and conjure investment solutions tailor-made according to your set goals.
                        <br>
                        <!--<b>Mission:</b> To empower investors in taking advantage of personalized and strategic consultancy portfolio management services that pave the way toward financial success and stability.-->
                        <!--<br>-->
                        
                        <!--<b>Vision:</b> To be the leading portfolio management service provider recognized for professional excellence, integrity, and reinforced client focus; creating durable values for our clients through innovative and effective investment strategies.-->
                        <!--<br>-->
                        </p>
                        
                        <p>
                       <b>Meet Our Team</b> 
                       
                       <br>
            
                       This is a team of sharp and experienced investment professionals who bring a pool of knowledge and skills to the table. We work interactively with you in offering customized investment strategies that are in line with your financial goals.
                          <br>
                       
                       

                        


                        
                        
                        
                        

                        </p>
                        <!--<div class="row">-->
                        <!--    <div class="col-6">-->
                        <!--        <ul>-->
                        <!--            <li>-->
                        <!--                <h5>People</h5>-->
                        <!--            </li>-->
                        <!--            <li><h5>Philosophy</h5></li>-->
                        <!--            <li><h5>Performance</h5></li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--    <div class="col-6">-->
                        <!--        <ul>-->
                        <!--            <li><h5>Portfolio</h5></li>-->
                        <!--            <li><h5>Price</h5></li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<p>	<?=$val['description'];?></p>-->
                        <p>
                            <b>Our Core Values</b>
                            <br>
                            
                            <b>Integrity:</b> In all our dealings, we uphold the best ethical standards to ensure that everything is open and trustworthy.
                            <br>
                            
         <b>Excellence:</b> Excellence is the hallmark of every pentad company's offering, either in terms of the firm's investment strategy or clients' service.
         <br>
         <b>Client-Centric Approach:</b> Your financial goals are our priority. We focus on delivering solutions that are individual per your needs.
         <br>

         Find out how partnering with PMS Wala offers you a solution developed from a philosophy of trust, expertise, and passion for achieving the best results for customers. Learn about the services that are offered here to assist you in reaching your investing goals.
         <br>
                            
                        </p>

                    </div>
			    </div>
			</div>
		</div>
			<?php } } ?>
		<!-- End About -->
		
		<div class="journey">
            <div class="container de-padding journeycontent px-5 pt-80 pb-80">
                <div class="row g-5 text-center">
                    <div class="col-12 mb-5">
                        <h1 class="text-center text-white">Our Journey</h1>
                    </div>
                      <?php  $i=1;
                                    if(!empty($tbl_journey))
                                    {
                                        foreach($tbl_journey as $row){
                                    ?>
                    <div class="col-12 col-md-3 mb-5">
                        <!--<div class="border border-success rounded-4 p-3 border-4 position-relative h-120">-->
                    <div class="border border-success rounded-4  border-4 position-relative cvb">

                            <img width="70" height="70" class="mb-4" src="<?=base_url()?><?=$row->image?>" alt="rupee"/>
                            <h6 class="text-center text-white"><?=$row->title?></h6>
                            <h3 class="text-center text-white m-0 custom-title"  ><?=$row->description?></h3>
                        </div>
                    </div>
                  
                  <?php  $i++; }  } else { }?>
                </div>
            </div>
        </div>
		
		<!-- Start Why Choose Us
		============================================= -->
		<div class="about-area-2 pt-100 pb-100 text-sm-center1">
			<div class="container">
			    <div class="row">
			        <div class="col-12 m-auto text-center">
			            <h1 class="text-success">Our Mission & Vision</h1>
			        </div>
			    </div>
			     <?php foreach($td_section as $key => $val){ 
                if($val['slug'] == 'Mission-Vision'){?>
			    <div class="row mt-5">
			        <div class="col-12 col-md-7 m-auto">
                        <!--<img src="<?=base_url()?>assets/frontend/img/ui/about.jpg" class="rounded shadow aboutimage">-->
                        
                        <div class="row mt-5">
                            <div class="col-12">
                                <h3 class="text-success"><?=$val['title'];?></h3>
                                <p><?=$val['description'];?></p>
                            </div>
                            <div class="col-12">
                                <h3 class="text-success"><?=$val['sub_title'];?></h3>
                                <p><?=$val['description1'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <img src="<?=base_url()?><?=$val['image'];?>" class="rounded shadow">
                    </div>
			    </div>
			    <?php } } ?>
			</div>
		</div>
		<!-- End Why Choose Us -->
		
        <div class="container-fluid bg-dark de-padding mt-5 pb-5">
          <div class="container">
            <h1 class="pb-3 pt-2 text-center mb-5 text-white">Road Map</h1>
            <!--first section-->
            <div class="row">
                <div class="col-12">
                	<div class="container">
                		<div id="timeline">
                		    
                		      <?php  $i=1;
                                    if(!empty($tbl_about))
                                    {
                                        foreach($tbl_about as $row){
                                            if($i == '2' || $i == '4'|| $i == '6'){
                                               $float ="right";
                                            }else{
                                                $float ="";
                                            }
                                    ?>
                		    
                			<div class="timeline-item">
                				<div class="timeline-icon">
                					   <i class="fa fa-map-marker-alt"></i>
                				</div>
                				<div class="timeline-content <?php echo $float; ?>">
                					<h2><?=$row->title?></h2>
                				<?=$row->description?>
                				</div>
                			</div>
                
                 <?php  $i++; }  } else { }?>
                
                
                		</div>
                	</div>
                </div>
            </div>
            <!--<div class="row align-items-center how-it-works mb-5 justify-content-center g-5">
              <div class="col-2 col-md-2 text-center bottom">
                <div class="circle">2022 Got Registered</div>
              </div>
              <div class="col-12 col-md-10">
                <p>The company was officially registered and commenced operations
                    with a team of two individuals. Within a remarkable six-month period,
                    the company expanded its team to comprise 13 experts and developed
                    a diverse portfolio featuring seven products. Securing investments
                    totaling 1.2 Crore from 20 customers, the company solidified its
                    foundation and earned the trust of a broad spectrum of investors,
                    ranging from small to medium to large enterprises.</p>
              </div>
            </div>
            <div class="row align-items-center justify-content-center how-it-works mb-5 g-5">
              <div class="col-12 col-md-10 text-right order-2 order-md-1">
                <p>As of the conclusion of 2023, we oversee a cumulative
                    investment portfolio of 10 crore, with a continuous
                    upward trajectory in assets under management. The
                    company remains dedicated to delivering
                    personalized investment services, upholding a
                    standard of transparency and dependability.</p>
              </div>
              <div class="col-2 text-center full order-1 order-md-2">
                <div class="circle">2023</div>
              </div>
            </div>
            <div class="row align-items-center how-it-works mb-5 justify-content-center g-5">
              <div class="col-2 col-md-2 text-center top">
                <div class="circle">2024</div>
              </div>
              <div class="col-12 col-md-10">
                <p>We expanded our product portfolio by introducing five new offerings, providing a comprehensive
                    range of services encompassing strategic investment, advisory, distribution, commodity, and currency.
                    This milestone positions us to cater to a diverse clientele, including High Net Worth Individuals (HNIs),
                    Ultra High Net Worth Individuals (UHNIs), NRIs, and institutions. Our enhanced capabilities enable us to
                    offer various portfolio management strategies, such as value investing, growth investing, income
                    investing, and quantitative investing, among others. This expansion allows us to deliver regular
                    updates and performance reports to our clients, striving to achieve superior returns on their
                    investments while effectively managing risks.</p>
              </div>
            </div>-->
          </div>
        </div>
        <div class="review-area de-padding">
            <div class="container">
                <?php foreach($tbl_about_innerpage as $key => $val){ ?>
                <div class="row">
                    <div class="col-12 col-md-4 text-center">
                        <h3 class="text-success"><?=$val['title'];?></h3>
                        <p><?=$val['description'];?></p>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <h3 class="text-success"><?=$val['title1'];?></h3>
                        <p><?=$val['description1'];?></p>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <h3 class="text-success"><?=$val['title2'];?></h3>
                        <p><?=$val['description2'];?></p>
                    </div>
                </div>
                 <?php } ?>
            </div>
        </div>
		<!-- Start Review
		============================================= -->
		<div class="review-area bg de-padding pos-rel">
			
			<div class="container container-stage">
				<div class="review-wpr mt-5">
					<div class="row g-5 align-items-center">
						<div class="col-xl-5">
							<div class="review-left ">
								<div class="review-left-content pos-rel">
									<div class="review-left-title-arrow">
										<h2 class="heading-5 mt-5 mb-5">What our client <br /> says</h2>
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
                                        <img src="https://pmswala.com/assets/frontend/img/quote.png" class="qu-01" alt="" />
											<h5 class="heading-5"><?=$val['name'];?></h5>
											<div>
												<p class="testimonial-text <?php if(strlen($val['message']) > 250): ?>clamped<?php endif; ?>" data-full-text="<?=htmlspecialchars($val['message']);?>">"<?=$val['message'];?>"</p>
												<?php if(strlen($val['message']) > 250): ?>
												<a href="javascript:void(0)" class="read-more" onclick="toggleReadMore(this)" title="<?=htmlspecialchars($val['message']);?>">Read more</a>
												<?php endif; ?>
											</div>
											<span>
												<?=$val['role'];?>										
											</span>
										</div>
									</div>
									<!-- End Single Item -->
									<?php } ?>
									
								
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
						<div class="col-md-4 col-lg-6 col-xl-6 m-auto">
							<div class="faq-pic">
								<div class="faq-pic-1 pos-rel">
									<img src="https://pmswala.com/assets/frontend/img/logo/faq.jpg" alt="no image" style="height:500px">
								</div>
							</div>
						</div>
						<div class="col-md-8 col-lg-6 col-xl-6">
							<div class="course-accordion">
								<span class="hero-sub-title  mb-20">
									<span class="">
    							    <img src="https://pmswala.com/assets/frontend/img/favicon.png" style="height:30px">
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
	<script>
	function toggleReadMore(element) {
		const paragraph = element.previousElementSibling;
		const isExpanded = paragraph.classList.contains('expanded');
		
		if (isExpanded) {
			paragraph.classList.remove('expanded');
			element.textContent = 'Read more';
		} else {
			paragraph.classList.add('expanded');
			element.textContent = 'Read less';
		}
	}
	</script>	
