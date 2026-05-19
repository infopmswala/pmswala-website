<main class="main">
        
		<!-- Start Breadcrumb
		============================================= -->
		<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/breadcrumb.jpg)">
			<div class="container">
				<div class="site-breadcrumb-wpr">
					<h2 class="breadcrumb-title"><?=$td_information['information_title'];?></h2>
					<ul class="breadcrumb-menu clearfix">
						<li><a href="<?=base_url()?>">Home</a></li>
						<li class="active"><?=$td_information['information_title'];?></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="team-area bg de-padding">
			<div class="container">
			    <h2 class="text-center"><?=$td_information['information_title'];?></h2>
			    <div class="row">
			        <div class="col-12">
			            <?=$td_information['description'];?>
			        </div>
			    </div>
			</div>
		</div>
	</main>