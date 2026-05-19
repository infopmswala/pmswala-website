	<main class="main">

		<!-- Start Breadcrumb
		============================================= -->
		<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/pictures/breadcrumb.jpg)">
			<div class="container">
				<div class="site-breadcrumb-wpr">
					<h2 class="breadcrumb-title">Latest Blog</h2>
					<ul class="breadcrumb-menu clearfix">
						<li><a href="<?=base_url()?>">Home</a></li>
						<li class="active">Latest Blog</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Breadcrumb -->

		<!-- Start Blog
		============================================= -->
		<div class="blog-area de-padding">
			<div class="container">
				<div class="blog-wpr grid-3">
				    <?php foreach($td_blog as $key => $val){ ?>
					<div class="blog-box">
						<div class="blog-pic">
							<img src="<?=base_url()?><?=$val['image'];?>" alt="no image">
						</div>
						<div class="blog-desc">
							<div class="blog-bottom">
							    <h5><?=$val['title'];?></h5>
							    <p><?=$val['short_description'];?></p>
								<a href="<?=base_url()?><?=$val['slug'];?>/" class="blog-btn">
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