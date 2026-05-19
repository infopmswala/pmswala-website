    <!-- End header -->
    
    <main class="main">
        
        <div class="row">
            <div class="col-12">
                <div class="hero-sldr swiper bannerbg text-sm-center1">
                    <div class="swiper-wrapper m-auto text-center">
                        
                        <?php
                                    $i=1;
                                    if(!empty($td_banner))
                                    {
                                        foreach($td_banner as $row){
                                    ?>
                        <div class="swiper-slide">
                            <img src="<?=base_url()?><?=$row->image?>" class="banner"  alt="<?=$row->title?>" width="100%">
                        </div>
                       <?php  $i++; }  } else { }?>
                        
                    </div>
                      <?php foreach($td_section as $key => $val){ 
                if($val['slug'] == 'why-invest-with-us'){?>
                    <div class="container">
                        <div class="row bannercontent g-5">
                            <div class="col-12">
                                <h1 class="text-white fs-34"><?=$val['title'];?></h1>
                                <p><?=$val['sub_title'];?></p>
                                <img src="<?=base_url()?>assets/frontend/img/partner/play.png" class="playstore"/>
                            </div>
                            <div class="col-12 col-md-12 col-xl-10">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <div class="border border-success p-3 rounded-4 border-4">
                                            <h3 class="font-size text-white"><?=$val['current_aum'];?></h3>
                                            <p>Current<br> AUM</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="border border-success p-3 rounded-4 border-4">
                                            <h3 class="font-size text-white"><?=$val['years_portfolio'];?></h3>
                                            <p>Years of Portfolio<br> Management</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="border border-success p-3 rounded-4 border-4">
                                            <h3 class="font-size text-white"><?=$val['products_portfolio'];?></h3>
                                            <p>Products under <br>our Portfoliio</p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="border border-success p-3 rounded-4 border-4">
                                            <h3 class="font-size text-white"><span class="fs-5">Upto</span><?=$val['return_investment'];?></h3>
                                            <p>Return on<br> Investment</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    	<?php } } ?>
                </div>
                <!--<div class="bannerbg">
                    <img src="<?=base_url()?>assets/frontend/img/vector/image-000.png" class="banner" width="100%">
                    <div class="row bannercontent">
                        <div class="col-12">
                            <h1 class="text-white">Better Choices. Confident Investing.</h1>
                            <p>Wealth management that is unbiased, expert-backed and personalised.</p>
                            <button class="btn-light text-dark btn fs-2 w-50 btn-lg"><img width="35" height="35" src="https://img.icons8.com/ios/35/google-play--v1.png"/>
                            Play Store</button>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
           <?php foreach($td_section as $key => $val){ 
                if($val['slug'] == 'about-us'){?>
        <div class="container-lg">
            <div class="about-area de-padding text-sm-center1">
                <div class="row g-5">
                    <div class="col-12 col-md-6">
                        <h1 class="text-success"><?=$val['title'];?></h1>
                        <h4 class="mt-5">"<?=$val['sub_title'];?>"</h4>
                            <img src="<?=base_url()?><?=$val['image'];?>" class="rounded shadow aboutimage">
                    </div>
                    <div class="col-12 col-md-6">
                        
                        <p><span class="text-success fw-bold">Established in May 2022,</span><?=$val['description1'];?>
                        </p>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li>
                                        <h5>People</h5>
                                    </li>
                                    <li><h5>Philosophy</h5></li>
                                    <li><h5>Performance</h5></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul>
                                    <li><h5>Portfolio</h5></li>
                                    <li><h5>Price</h5></li>
                                </ul>
                            </div>
                        </div>
                       <p>
						<?=$val['description2'];?>
						</p>
                                <a href="<?=base_url()?>frontend/about" class="btn btn-success btn-lg fs-2 fw-bold" type="button">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        	<?php } } ?>
         <div class="de-padding bg-blue mt-0">
            <div class="container-lg">
                <div class="row g-5 m-auto justify-content-center">
                    <div class="col-12 mb-5 mt-0">
                        <h2 class="text-center text-success">Our Products</h2>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="row g-5 nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            
                             <?php
                                    $i=1;
                                    if(!empty($tbl_product))
                                    {
                                        foreach($tbl_product as $row){
                                            $id=$row->id;
                                            if($id == '1'){
                                                $status ="active";
                                            }else{
                                                 $status ="";
                                            }
                                    ?>
                     
                            <div class="col-12">
                                
                                <div class="zoom border p-3 ps-5 rounded-5 shadow nav-link <?php echo $status; ?>" id="p<?=$row->id?>-tab" data-bs-toggle="pill" data-bs-target="#p<?=$row->id?>" role="tab" aria-controls="distribution" aria-selected="true">
                                    <div class="d-flex">
                                        <img src="<?=base_url()?><?=$row->image?>" class="rounded-circle" width="60px" height="50px">
                                        <div class="d-block my-auto ms-5">
                                            <h5 class="m-0"><?=$row->title?></h5>
                                            <p class="m-0 text-dark"><?=$row->short_description?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php  $i++; }  } else { }?>
                         
                         
                         
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="tab-content" id="v-pills-tabContent">
                            
                              <?php
                                    $i=1;
                                    if(!empty($tbl_product))
                                    {
                                        foreach($tbl_product as $row){
                                            $id=$row->id;
                                            if($id == '1'){
                                                $status ="show active";
                                            }else{
                                                 $status ="";
                                            }
                                    ?>
                     
                            
                            <div class="tab-pane fade <?php echo $status; ?>" id="p<?=$row->id?>" role="tabpanel" aria-labelledby="p<?=$row->id?>-tab" tabindex="0">
                                <div class="card bg-gray p-5 rounded-5 shadow border-none">
                                    <div class="card-body bg-white p-0 rounded-5">
                                        <div class="card-img m-auto p-0 text-center">
                                            <img src="<?=base_url()?><?=$row->image?>" class="servicesimage">
                                        </div>
                                        <div class="card-content p-5">
                                            <h3 class="text-success"><?=$row->title?></h3>
                                            <h6><?=$row->short_description?></h6>
                                           <?=$row->description?>
                                        </div>
                                    </div>
                        <a href="/Services">    
                        <button class="btn btn-success btn-sm fs-2 mt-3 rounded-5"  type="button">Explore Now</button>
                        </a>
                                </div>
                            </div>
                            <?php  $i++; }  } else { }?>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-lg de-padding">
            <div class="row g-5">
                <div class="col-12 mb-5">
                    <h2 class="text-center text-success">Why PMSwala</h2>
                    <h4 class="text-center mt-3">We offer India’s safest stack of investments</h4>
                </div>
                <div class="col-12 mt-5">
                    <div class="ptnr-sldr1 swiper">
                        <div class="swiper-wrapper m-auto text-center">
                              <?php  $i=1;
                                    if(!empty($tbl_why_pmswala))
                                    {
                                        foreach($tbl_why_pmswala as $row){
                                    ?>
                            <div class="swiper-slide">
                                <img src="<?=base_url()?><?=$row->image?>" class="mb-4" style="height:100px;">
                                <h5><?=$row->title?></h5>
                                <p><?=$row->description?></p>
                            </div>
                             <?php  $i++; }  } else { }?>
                            
    					</div>
    					
                    </div>
                </div>
            </div>
        </div>
        <div class="journey">
            <div class="container-lg de-padding journeycontent p-5">
                <div class="row g-5 text-center">
                    <div class="col-12 mb-5">
                        <h2 class="text-center text-white">Our Journey</h2>
                    </div>
                    
                     <?php  $i=1;
                                    if(!empty($tbl_journey))
                                    {
                                        foreach($tbl_journey as $row){
                                    ?>
                    <div class="col-12 col-md-3 mb-5">
                        <div class="border border-success rounded-4 p-3 border-4 position-relative h-120">
                            <img width="80" height="80" class="mb-4" src="<?=base_url()?><?=$row->image?>" alt="rupee"/>
                            <h6 class="text-center text-white"><?=$row->title?></h6>
                            <h3 class="text-center text-white m-0"><?=$row->description?></h3>
                        </div>
                    </div>
                     <?php  $i++; }  } else { }?>
                    
                    
                </div>
            </div>
        </div>
        
        <div class="de-padding container-lg p-5">
            <div class="row g-5">
                <div class="col-12">
                    <h2 class="text-center text-success">Fund Usage</h2>
                    <p>The objective of the strategy is to secure long term gains from the
                        investments in the combinations of large and mid size companies
                        which are compliant. It Includes investments in the industries in
                        following sectors.
                        </p>
                </div>
                <div class="col-12 col-md-4">
                    <div class="row g-5">
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/gas.png"/>
                                <h4 class="ms-3 my-auto">Mines Oil & Gas</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/industrial.png"/>
                                <h4 class="ms-3 my-auto">Capital Goods & Industrials</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/reception.png"/>
                                <h4 class="ms-3 my-auto">Hospitality</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/invoice.png"/>
                                <h4 class="ms-3 my-auto">Invoice Discounting</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/automative.png"/>
                                <h4 class="ms-3 my-auto">Automotive</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <img src="<?=base_url()?>assets/frontend/img/ui/track-illustration.png">
                </div>
                <div class="col-12 col-md-4">
                    <div class="row g-5">
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/manufacturing.png"/>
                                <h4 class="ms-3 my-auto">Manufacturing</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/real.png"/>
                                <h4 class="ms-3 my-auto">Real Estate</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/heart.png"/>
                                <h4 class="ms-3 my-auto">Healthcare</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/retail.png"/>
                                <h4 class="ms-3 my-auto">Retail</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <img class="fund_icons" src="<?=base_url()?>assets/frontend/img/dot/construction.png"/>
                                <h4 class="ms-3 my-auto">Construction</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--<div class="bg-blue">
            <div class="container-lg de-padding p-5">
                <div class="row">
                     <div class="col-12">
                        <h2 class="text-center text-success">Our Customer Says</h2>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-4">
                        <iframe width="100%" height="352" class="rounded-5" src="https://www.youtube.com/embed/9hFtfvtZhfc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="col-12 col-md-4">
                        <iframe width="100%" height="352" class="rounded-5" src="https://www.youtube.com/embed/9hFtfvtZhfc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="col-12 col-md-4">
                        <iframe width="100%" height="352" class="rounded-5" src="https://www.youtube.com/embed/9hFtfvtZhfc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="de-padding container-lg p-5 mt-5 mb-5">
            <div class="row">
                <div class="col-12 text-center m-auto">
                    <h2 class="text-success">Certificates</h2>
                </div>
            </div>
            <div class="row g-5 mt-5">
                <div class="col-12">
    			    <div class="work-sldr swiper">
                        <div class="swiper-wrapper m-auto text-center">
                              <?php  $i=1;
                                    if(!empty($tbl_certificate))
                                    {
                                        foreach($tbl_certificate as $row){
                                    ?>
                            
                            <div class="swiper-slide">
        			            <img src="<?=base_url()?><?=$row->image?>" class="mb-5 me-3" style="height:130px">
        			        </div>
        			    
        			      <?php  $i++; }  } else { }?>
        			    
        			    </div>
        			</div>
    			</div>
			</div>
        </div>
    </main>
