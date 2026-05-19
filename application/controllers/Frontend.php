<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend extends CI_Controller {
  public function __construct(){
	  parent::__construct();
	  $this->load->model('Main_model');
	  $this->load->model('Email_model');
  }

	public function index() {
        $this->data = array('title' => 'PMSWALA | HOME');
        $where = array("pro_status" => "1");
        $this->data["td_banner"] = $this->Main_model->get_data($where, "td_banner");
        $where = array("status" => "1");
        $this->data["tbl_product_category"] = $this->Main_model->get_data($where, "tbl_product_category");
        $where = array("status" => "1");
        $this->data["tbl_why_pmswala"] = $this->Main_model->get_data($where, "tbl_why_pmswala");
        $where = array("status" => "1");
        $this->data["tbl_journey"] = $this->Main_model->get_data($where, "tbl_journey");
        $where = array("status" => "1");
        $this->data["tbl_certificate"] = $this->Main_model->get_data($where, "tbl_certificate");
        $where = array("status" => "1");
        $this->data["tbl_product"] = $this->Main_model->get_data($where, "tbl_product");
        $where = array("status" => "1");
	      $result_array = array('result_array');
	      $select = array('title','slug','description','description1','description2','sub_title','image','current_aum','years_portfolio','products_portfolio','return_investment');
        $this->data["td_section"] = $this->Main_model->get_data($where, "td_section",$select,null,null,null,$result_array);
       $where = array("status" => "1");
      $row_array = array('row_array');
      $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
        $where = array("status" => "1");
        $this->data["td_social"] = $this->Main_model->get_data($where, "td_social");
        $this->data['_view_'] = 'new_frontend/home_view';
        $this->load->view('_frontend_', $this->data);

    }
    
  
    public function about(){
     $where = array("status" => "1");
     $row_array = array('row_array');
     $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
     $where = array("status" => "1");
	   $result_array = array('result_array');
	   $select = array('title','slug','description','description1','description2','sub_title','image','current_aum','years_portfolio','products_portfolio','return_investment');
     $this->data["td_section"] = $this->Main_model->get_data($where, "td_section",$select,null,null,null,$result_array);
     $where = array("status" => "1");
     $this->data["tbl_journey"] = $this->Main_model->get_data($where, "tbl_journey");   
     $where = array("status" => "1");
     $this->data["tbl_about"] = $this->Main_model->get_data($where, "tbl_about");   
     $where = array("status" => "1");
	   $result_array = array('result_array');
     $this->data["tbl_about_innerpage"] = $this->Main_model->get_data($where, "tbl_about_innerpage",null,null,null,null,$result_array);  
     $where = array("status" => "1","module_id"=>3539);
	   $result_array = array('result_array');
	   $select = array('name','role','message');
     $this->data["td_testimonials"] = $this->Main_model->get_data($where, "td_testimonials",$select,null,null,null,$result_array);  
     $where = array("pro_status" => "1","module_id"=>6714);
	   $result_array = array('result_array');
	   $order_by = array('id','DESC');
	   $select = array('question','answer','id');
     $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs",$select,$order_by,null,null,$result_array); 
     $this->data['_view_'] = 'new_frontend/about_view';
    $this->load->view('_frontend_', $this->data);
  }
  
  
  
  public function contact_us(){
      $where = array("status" => "1");
      $row_array = array('row_array');
      $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
      $this->data['_view_'] = 'new_frontend/conact_view';
      $this->load->view('_frontend_', $this->data);
  }
  public function thank_you(){
      $where = array("status" => "1");
      $row_array = array('row_array');
      $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
      $this->data['_view_'] = 'new_frontend/thankyou_view';
      $this->load->view('_thankyou_', $this->data);
  }
  
   public function invest(){
      $where = array("status" => "1");
      $row_array = array('row_array');
      $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
      $where = array("status" => "1");
      $this->data["tbl_invest"] = $this->Main_model->get_data($where, "tbl_invest");
      $where = array("status" => "1");
	    $result_array = array('result_array');
	    $select = array('title','slug','short_description','image');
      $this->data["tbl_investment"] = $this->Main_model->get_data($where, "tbl_investment",$select,null,null,null,$result_array); 
      $where = array("status" => "1");
      $this->data["tbl_companies"] = $this->Main_model->get_data($where, "tbl_companies");
      $this->data['_view_'] = 'new_frontend/invest_view';
      $this->load->view('_frontend_', $this->data);
  }
  

  
  public function plans(){
      $where = array("status" => "1");
      $row_array = array('row_array');
      $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
      $where = array("status" => "1");
      $this->data["tbl_plans"] = $this->Main_model->get_data($where, "tbl_plans");
      $this->data['_view_'] = 'new_frontend/plans_view';
      $this->load->view('_frontend_', $this->data);
  }
  
  
   public function blog(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
         $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
       $where = array("status" => "1","module_id"=>2926);
	   $result_array = array('result_array');
	   $select = array('title','slug','image','short_description');
       $this->data["td_blog"] = $this->Main_model->get_data($where, "td_blog",$select,null,null,null,$result_array);
      $this->data['_view_'] = 'new_frontend/blog_view';
      $this->load->view('_frontend_', $this->data);
  }
  
  
 public function blog_details(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
         $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
       
       $where = array("status" => "1","slug"=>$this->uri->segment(1));
       $row_array = array('row_array');
       $this->data['td_blog'] = $this->Main_model->get_data($where, "td_blog",null,null,null,null,null,$row_array);
      $this->data['_view_'] = 'new_frontend/blog_details_view';
      $this->load->view('_frontend_', $this->data);
  }
  
  public function Services(){
    // Fetching common data like settings, etc.
    $where = array("status" => "1");
    $row_array = array('row_array');
    $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings", null, null, null, null, null, $row_array);

    // Load the view for the services page
    $this->data['_view_'] = 'new_frontend/Services';
    $this->load->view('_frontend_', $this->data);
}

  
}