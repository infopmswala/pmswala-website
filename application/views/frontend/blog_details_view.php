<style>
    @media only screen and (min-width: 991px) and (max-width: 1200px){
.site-breadcrumb {
     margin-top: 0px; 
}
}

.site-breadcrumb {
    height: 40vh;
    background-size: cover !important;
    background-repeat: no-repeat !important;
    background-position: center 10% !important;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    z-index: 3;
}
</style>
		<main class="main">

		<!-- Start Breadcrumb
		============================================= -->
		<div class="site-breadcrumb" style="background: url(<?=base_url()?>assets/frontend/img/pictures/breadcrumb.jpg)">
			<div class="container">
				<div class="site-breadcrumb-wpr">
					<h2 class="breadcrumb-title"><?=$td_blog['title'];?></h2>
					<ul class="breadcrumb-menu clearfix">
						<li><a href="<?=base_url()?>">Home</a></li>
							<li><a href="<?=base_url()?>blog/">Blog</a></li>
						<li class="active"><?=$td_blog['title'];?></li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End  Breadcrumb -->

		<!-- Start Blog Single
		============================================= -->
		<div class="blog-single-area bg de-padding">
			<div class="container">
				<div class="blog-single-wpr">
					<div class="row ps g-5">
						<div class="col-xl-8 m-auto">
							<div class="theme-single blog-single">
								<div class="theme-pic">
									<img src="<?=base_url()?><?=$td_blog['image'];?>" class="big-pic" alt="thumb">
								</div>
								<div class="theme-info p-50">
									<div class="theme-desc">
										<h2 class="heading-2">
										<?=$td_blog['title'];?>
										</h2>
										<p class="mb-30"><?=$td_blog['description'];?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Blog Single -->

	</main>