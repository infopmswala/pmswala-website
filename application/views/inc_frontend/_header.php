<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>	
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php
$error_message = '';
$success_message = '';
?>
	<?php 
       $where = array("status" => "1");
	   $result_array = array('result_array');
       $td_seo = $this->Main_model->get_data($where, "td_seo",null,null,null,null,$result_array);
    foreach($td_seo as $key => $val){ 
        if($this->uri->segment('1') == $val['url']){
        echo '<meta name="description" content="'.$val['meta_tag_description'].'">';
        echo '<meta name="keywords" content="'.$val['meta_tag_keywords'].'">';
        echo '<title>'.$val['meta_tag_title'].'</title>'; 
        }
    }
      if($this->uri->segment('1') == ""){
       $where = array("status" => "1","url" => "#");
       $row_array = array('row_array');
       $td_seo = $this->Main_model->get_data($where, "td_seo",null,null,null,null,null,$row_array);
        echo '<meta name="description" content="'.$td_seo['meta_tag_description'].'">';
        echo '<meta name="keywords" content="'.$td_seo['meta_tag_keywords'].'">';
        echo '<title>'.$td_seo['meta_tag_title'].'</title>'; 
      }
      if($this->uri->segment('1') == 'business-consulting' || $this->uri->segment('1') == 'it-services' || $this->router->fetch_method() == 'service_details'){
       $where = array("service_slug" => $this->uri->segment('1'));
	   $row_array = array('row_array');
       $td_services = $this->Main_model->get_data($where, "td_services",null,null,null,null,null,$row_array);  
       echo '<meta name="description" content="'.$td_services['meta_tag_description'].'">';
        echo '<meta name="keywords" content="'.$td_services['meta_tag_keywords'].'">';
        echo '<title>'.$td_services['meta_title'].'</title>'; 
      }
    ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/frontend/img/logo/logo.png">
	<!-- ========== Start Stylesheet ========== -->
	<link href="<?=base_url()?>assets/frontend/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/all.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/animate.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/themify-icons.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/icofont.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/flaticon.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/bootstrap-icons.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/bsnav.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/preloader.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/magnific-popup.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/swiper-bundle.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/css/jquery-ui.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/frontend/style.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/frontend/style.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/frontend/css/responsive.css" rel="stylesheet" />
	<!-- ========== End Stylesheet ========== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BDWQC1ZBRG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BDWQC1ZBRG');
</script>
</head>