    <main class="main">
		<!--<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/aboutbg.jpg)">-->
		    <div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/contact.jpg)">

			<div class="container">
				<div class="site-breadcrumb-wpr">
					<h2 class="breadcrumb-title">Plans</h2>
					<ul class="breadcrumb-menu clearfix">
						<li><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Plans</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="team-area de-padding">
            <div class="container">
                <div class="row">
                    
                       <?php
                                    $i=1;
                                    if(!empty($tbl_plans))
                                    {
                                        foreach($tbl_plans as $row){
                                    ?>
                    <div class="col-12 col-md-4 text-center">
                        <img class="m-auto" width="53" height="53" 
                        src="<?=base_url()?><?=$row->image?>"/>
                        <h4 class="text-success"><?=$row->title?></h4>
                        <p><?=$row->description?></p>
                    </div>
                      <?php  $i++; }  } else { }?>
                    
                    
                </div>
            </div>
        </div>
        <div class="team-area de-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
            			<div class="details">
            				<div>
            					<div class="detail">
            						<p>Amount
            						</p>
            						<p id="loan-amt-text"></p>
            					</div>
            					<input type="range" id="loan-amount" min="0" max="10000000" step="50000">
            				</div>
            				<div>
            					<div class="detail">
            						<p>Tenure</p>
            						<p id="loan-period-text"></p>
            					</div>
            					<input type="range" id="loan-period" min="1" max="30" step="1">
            				</div>
            				<div>
            					<div class="detail">
            						<p>% Interest</p>
            						<p id="interest-rate-text"></p>
            					</div>
            					<input type="range" id="interest-rate" min="1" max="22" step="0.5">
            				</div>
            			</div>
            			<div class="footer1">
            				<p id="price-container"><span id="price">0</span></p>
            			</div>
                	</div>
                	<div class="col-12 col-md-6 m-auto text-center">
                			<canvas id="pieChart" class="piechart m-auto text-center align-items-center justify-content-center"></canvas>
                	</div>
                    
                </div>
                <div class="row mt-5">
                	<div class="col-6 col-md-4">
            			<div class='chart-details'>
            				<p style="color: #9088D2">Principal</p>
            				<p id="cp" style="color: #130F31; font-size: 17px;"></p>
            			</div>
                	</div>
                	<div class="col-6 col-md-4">
            			<div class='chart-details'>
            				<p style="color: #9088D2">Interest</p>
            				<p id="ci" style="color: #130F31; font-size: 17px;"></p>
            			</div>
            		</div>
                	<div class="col-6 col-md-4">
            			<div class='chart-details'>
            				<p style="color: #9088D2">Total Payable</p>
            				<p id="ct" style="color: #130F31; font-size: 17px;"></p>
            			</div>
                	</div>
                	<!--<div class="col-12">
                	    <canvas id="lineChart" height="100px" width="100%" class="linechart"></canvas>
                	</div>-->
                </div>
            </div>
        </div>
    </main>
