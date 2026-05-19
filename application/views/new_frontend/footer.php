<a href="https://api.whatsapp.com/send?phone=+91 9800080063 &amp; text=Welcome to PMSWala" class="float" target="_blank">
<img src="https://img.icons8.com/3d-fluency/60/null/whatsapp.png" class="my-float">
</a>
    <footer class="footer overflow-hidden">
		<div class="footer-up de-padding">
			<div class="px-5">
			
				<div class="row g-3 mb-3">
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="footer-widget about-us">
							<a href="<?=base_url()?>">
							    <img src="<?=base_url()?>assets/frontend/img/logo/logo.png" style="height:150px;">
							</a>
							<p>Your financial goals are our top
                                priority. Let us help you navigate the
                                ups and downs of the market with our
                                expert portfolio management services,
                                tailored to your unique needs and risk
                                tolerance.</p>
						</div>
					</div>
					<div class="col-xl-2 col-lg-6 col-md-6">
						<div class="footer-widget footer-link">
						    <h4 class="text-white fw-bold">Info</h4>
							<ul class="footer-list">
							    <li>
									<a href="<?=base_url()?>frontend">
										<span class="zoom">
										Home 
										</span>
									</a>
								</li>
								<li>
									<a href="<?=base_url()?>frontend/about">
										<span class="zoom">
										About Us 
										</span>
									</a>
								</li>
								<li>
									<a href="<?=base_url()?>invest">
										<span class="zoom">
										Invest
										</span>
									</a>
								</li>
								<li>
									<a href="<?=base_url()?>blog">
										<span class="zoom">
										Blogs
										</span>
									</a>
								</li>
								<li>
									<a href="<?=base_url()?>frontend/conact">
										<span class="zoom">
										Contact Us
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="footer-widget footer-link">
						    <h4 class="text-white fw-bold">Useful Links</h4>
							<ul class="footer-list">
							     <?php 
        					     $where = array("status" => "1");
                                 $td_information = $this->Main_model->get_data($where, "td_information");
                                 foreach($td_information as $key => $val){
        					     ?>
								<li>
									<a href="<?=base_url()?><?=$val->information_title_slug?>/">
										<span class="zoom">
										<?=$val->information_title?>
										</span>
									</a>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6">
						<div class="footer-widget">
						    <h4 class="text-white fw-bold">Contact Us</h4>
                            <ul class="footer-list">
							    <li>
							        <a href="tel:+91 7351010107"><i class="fa fa-phone"></i> +91 7351010107</a>
							    </li>
							    <li>
							        <a href="mailto:info@pmswala.com"><i class="fa fa-envelope"></i> info@pmswala.com</a>
							    </li>
							    <li>
							        <a href=""><i class="fa fa-map-pin"></i> 1 Floor 122, building, Western Pearl, Hitech City Rd, Kondapur, Telangana 500084</a>
							    </li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="copyright py-4">
			<div class="ps-5 pe-5">
				<div class="copyright-element d-flex align-items-center">
					<p class="mb-0">Copyright 2024 PMSwala</p>
					<ul class="footer-social text-center mx-auto">
						<li><a href="https://www.instagram.com/" target=”_blank”><i class="bi bi-instagram"></i></a></li>
						<li><a href="https://twitter.com/" target=”_blank”><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://www.facebook.com/" target=”_blank”><i class="fab fa-facebook"></i></a></li>
						<li><a href="https://www.linkedin.com/" target=”_blank”><i class="fab fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--<div class="top-bar-area pos-rel topbar-white">
			<span class="top-bar-shape"></span>
			<div class="row">
				<div class="col-xl-8 col-lg-6">
					<div class="top-box-wrp d-flex justify-content-md-center align-items-center">
						<div class="top-box top-location mr-30">
							<i class="fa-solid fa-location-dot"></i>
							<span>Hitech City Rd, Kondapur, Telangana 500084</span>
						</div>
						<div class="top-email top-box mr-30">
							<i class="fa-solid fa-envelope"></i>
							<span>info@pmswala.com</span>
						</div>
						<div class="top-phone top-box">
							<i class="fa-solid fa-phone"></i>
							<span>9800080063</span>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6">
					<div class="top-bar-social">
						<ul class="top-social">
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>-->
	</footer>
	<!-- End Footer -->
	
	<!-- Start Scroll top
	============================================= -->
	<!-- End Scroll top-->
	
	<!-- jQuery Frameworks
    ============================================= -->
	<script src="<?=base_url()?>assets/frontend/js/jquery-3.7.0.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/popper.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/bsnav.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/isotope.pkgd.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/wow.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/count-to.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/progress-bar.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/jquery.easypiechart.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/typed.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/YTPlayer.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/jquery.appear.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/jquery.easing.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/swiper-bundle.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/active-class.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>assets/frontend/js/main.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js'></script>
	<script src="<?=base_url()?>assets/frontend/js/calculator.js"></script>
</body>


</html>