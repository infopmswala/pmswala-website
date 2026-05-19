    <main class="main">
		<!--<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/aboutbg.jpg)">-->
		<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/contact.jpg)">

			<div class="container">
				<div class="site-breadcrumb-wpr">
					<h2 class="breadcrumb-title">Product</h2>
					<ul class="breadcrumb-menu clearfix">
						<li><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Product</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="team-area de-padding">
			<div class="container">
			    <div class="row">
			        <div class="col-12">
			            <h2 class="text-center">Long-Term Gain Strategy</h2>
			        </div>
			    </div>
				<div class="team-wpr row mt-5">
				    
				      <?php
                                    $i=1;
                                    if(!empty($tbl_invest))
                                    {
                                        foreach($tbl_invest as $row){
                                    ?>
				    <div class="service-block-two col-lg-4 col-md-6 col-sm-12">
    					<div class="inner-box">
    						<div class="image">
    							<img src="<?=base_url()?><?=$row->image?>" alt="no image">
    							<div class="overlay-box">
    								<div class="overlay-inner">
    									<div class="content">
    										<div class="text"><?=$row->short_description?>
                                            </div>
    									</div>
    								</div>
    							</div>
    						</div>
    						<div class="lower-box">
    							<div class="box-inner">
    								<div class="icon">
    								    <i class="<?=$row->icon?>"></i>
    								</div>
    								<!--<h5><a href="https://pmswala.com/invoice-discounting">Invoice Discounting</a></h5>-->
    								<h5><a href=""><?=$row->title?></a></h5>
    							</div>
    						</div>
    					</div>
    				</div>
    		 <?php  $i++; }  } else { }?>
    		
    		
    		
    			</div>
			</div>
		</div>
		<!-- End Team -->

		<div class="team-area">
		    <div class="container">
    		    <div class="row">
    		        <div class="col-12">
    		             <h2 class="text-center text-success">Invest with PMS Wala - Tailor-made Solutions for your Financial Success</h2>
    		             <p class="text-center">Want to just take your investment strategy to a whole new level? PMS Wala provides you with 
    		             an array of investment products that can help you meet any financial goal, be it conservative or aggressive in nature.
    		             
    		             <br>
    		             Our team of experts offers end-to-end Portfolio Management Services to help you make informed decisions on the way to achieving your financial goals.  Our Investment Solutions

    		             </p>
    		        </div>
    		    </div>
    		      <?php foreach($tbl_investment as $key => $val){ 
                if($val['slug'] == 'Equity-Portfolios'){?>
    		    <div class="row mt-5">
    		        <div class="col-12 col-md-5 order-2 order-md-1">
    		            <img src="<?=base_url()?><?=$val['image'];?>">
    		        </div>
		            <div class="col-12 col-md-7 m-auto text-center order-1 order-md-2">
		                    <h3 class="text-success"><?=$val['title'];?></h3>
		                    <p><?=$val['short_description'];?></p>
		            </div>
    		    </div>
    		    	<?php } } ?>
    		    	 <?php foreach($tbl_investment as $key => $val){ 
                if($val['slug'] == 'Debt-Portfolios'){?>
    		    <div class="row mt-5">
		            <div class="col-12 col-md-7 m-auto text-center">
	                    <h4 class="text-success"><?=$val['title'];?></h4>
	                    <p><?=$val['short_description'];?></p>
		            </div>
		            <div class="col-12 col-md-5">
    		            <img src="<?=base_url()?><?=$val['image'];?>">
    		        </div>
		        </div>
		        	<?php } } ?>
		        		 <?php foreach($tbl_investment as $key => $val){ 
                if($val['slug'] == 'Hybrid-Portfolios'){?>
    		    <div class="row mt-5">
    		        <div class="col-12 col-md-5 order-2 order-md-1">
    		            <img src="<?=base_url()?><?=$val['image'];?>">
    		        </div>
		            <div class="col-12 col-md-7 m-auto text-center order-1 order-md-2">
	                     <h4 class="text-success"><?=$val['title'];?></h4>
	                    <p><?=$val['short_description'];?></p>
	                </div>
	            </div>
	            	<?php } } ?>
	            	 <?php foreach($tbl_investment as $key => $val){ 
                if($val['slug'] == 'Custom-Solutions'){?>
    		    <div class="row mt-5">
	                <div class="col-12 col-md-7 m-auto text-center">
	                     <h4 class="text-success"><?=$val['title'];?></h4>
	                   <p><?=$val['short_description'];?></p>
	                </div>
	                <div class="col-12 col-md-5">
	                   <img src="<?=base_url()?><?=$val['image'];?>">
	                </div>
	            </div>
	            	<?php } } ?>
		    </div>
		</div>
		<div class="partner-area de-padding">
			<div class="container">
				<div class="">
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
                                        	<!-- Single Item -->
                                        	  <?php
                                    $i=1;
                                    if(!empty($tbl_companies))
                                    {
                                        foreach($tbl_companies as $row){
                                    ?>
										<div class="swiper-slide">
											<img src="<?=base_url()?><?=$row->image?>" class="partner-logo" alt="<?=$row->title?>">
										</div>
									 <?php  $i++; }  } else { }?>
									
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