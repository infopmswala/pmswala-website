<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor1">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<?php if(!empty(get_compnay_fav())){?>
	<link rel="icon" href="<?=base_url()?><?=get_compnay_fav()?>" type="image/png" />
	<?php } ?>
	<!--plugins-->
	<link href="<?=base_url()?>assets/backend/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/backend/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?=base_url()?>assets/backend/css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url()?>assets/backend/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?=base_url()?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?=base_url()?>assets/backend/css/app.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/backend/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/css/dark-theme.css" />
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/css/semi-dark.css" />

	<script src="<?=base_url()?>assets/sweetalerts/sweetalert.min.js"></script>
	<script src="<?=base_url()?>assets/sweetalerts/jquery.min.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>assets/sweetalerts/sweetalert.css" />
	<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>assets/backend/plugins/notifications/css/lobibox.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<title><?=$title?></title>
	<style>
		.ff_fileupload_wrap .ff_fileupload_dropzone:hover, .ff_fileupload_wrap .ff_fileupload_dropzone:focus, .ff_fileupload_wrap .ff_fileupload_dropzone:active { opacity: 1; background-color: #FDFDFD; border-color: <?=get_color_code();?> !important; }
		.fm-menu .list-group a:hover {
			background: <?=get_color_code();?> !important;
		}
		.topbar {
			background: <?=get_color_code();?> !important;
		}
		.user-info .user-name {
			color: #fff !important;
		}
		.user-info .designattion {
			color: #fff !important;
		}
		
		.topbar .navbar .navbar-nav .nav-link {
			color: #fff !important;
		}
		.a {
			color: <?=get_color_code();?> !important;
		}

		.nav-primary.nav-tabs .nav-link.active {
	    color: <?=get_color_code();?> !important;
	    border-color: <?=get_color_code();?>  <?=get_color_code();?>  #fff;
        }

		.border-primary{
			border-color: <?=get_color_code();?> !important;
		}
		.btn-primary {
			color: #fff;
            background-color: <?=get_color_code();?> !important;
            border-color: <?=get_color_code();?> !important;
		}
		
		.btn-primary:active{
			color: #fff;
           background-color: <?=get_color_code();?> !important;
           border-color: <?=get_color_code();?> !important;
           }
		   .text-primary{
			color: <?=get_color_code();?> !important;
		   }
		   .bx-color {
			color: <?=get_color_code();?> !important;
		   }
		   .page-item.active .page-link {
			z-index: 3;
            color: #fff !important;
            background-color: <?=get_color_code();?> !important;
            border-color: <?=get_color_code();?> !important;
		   }
		   .page-link:hover {
			     z-index: 2;
                 color: <?=get_color_code();?> !important;
                 background-color: #e9ecef;
                 border-color: #dee2e6;
		   }
		   .page-link {
			   color: <?=get_color_code();?> !important;
		   }
		   .bg-primary {
			color: <?=get_color_code();?> !important;
		   }
		   .btn-primary {
			color: #fff;
            background-color: <?=get_color_code();?> !important;
            border-color: 
		   }
		   .sidebar-wrapper .metismenu .mm-active>a {
			background: <?=get_color_code();?> !important;
		   }
		   .sidebar-wrapper .metismenu a:hover {
			background: <?=get_color_code();?> !important;
		   }
		   .logo-text {
			color: <?=get_color_code();?> !important;
		   }
		   .pace .pace-progress {
			background: <?=get_color_code();?> !important;
		   }
		   .pace .pace-activity {
			border-top-color: <?=get_color_code();?> !important;
            border-left-color: <?=get_color_code();?> !important;
		   }
		   .check:checked+.checktoggle {
			background-color: <?=get_color_code();?> !important;
		   }

		   /* html.color-sidebar .sidebar-wrapper {
			background-color: #000 !important;
			border-right: 1px solid rgb(228 228 228 / 0%);
		   } */
		</style>
</head>