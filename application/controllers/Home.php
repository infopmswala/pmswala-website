<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
  public function __construct(){
	  parent::__construct();
	  $this->load->model('Main_model');
	  $this->load->model('Email_model');
  }

	
  public function index(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
        $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
        $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_update_single_slider'] = $this->Main_model->get_data($where, "td_update_single_slider",null,null,null,null,null,$row_array);
       $where = array("status" => "1","module_id"=>3742);
	   $result_array = array('result_array');
	   $select = array('service_title','service_slug','service_short_description','service_image');
       $this->data["td_services"] = $this->Main_model->get_data($where, "td_services",$select,null,null,null,$result_array);
       $where = array("status" => "1","module_id"=>3539);
	   $result_array = array('result_array');
	   $select = array('name','role','message');
       $this->data["td_testimonials"] = $this->Main_model->get_data($where, "td_testimonials",$select,null,null,null,$result_array);
       
       $where = array("status" => "1");
	   $result_array = array('result_array');
	   $select = array('title','slug','description','sub_title','image');
       $this->data["td_section"] = $this->Main_model->get_data($where, "td_section",$select,null,null,null,$result_array);
       
       $where = array("status" => "1","module_id"=>2926);
	   $result_array = array('result_array');
	   $select = array('title','slug','image','short_description');
	   $order_by = array('id','DESC');
	   $limit = array(3,0);
       $this->data["td_blog"] = $this->Main_model->get_data($where, "td_blog",$select,$order_by,$limit,null,$result_array);
       $where = array("status" => "1","module_id"=>9895);
	   $result_array = array('result_array');
	   $limit = array(4,0);
	   $select = array('counter_icon','counter_timer','counter_operator','counter_title');
       $this->data["td_count_statistics"] = $this->Main_model->get_data($where, "td_count_statistics",$select,null,$limit,null,$result_array);
      $this->data['_view_'] = 'frontend/home_view';
      $this->load->view('_frontend_', $this->data);
  }

  
	

 public function about(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
        $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
       $where = array("pro_status" => "1","module_id"=>6714);
	   $result_array = array('result_array');
	   $order_by = array('id','DESC');
	   $select = array('question','answer','id');
       $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs",$select,$order_by,null,null,$result_array);
       $where = array("status" => "1","module_id"=>3539);
	   $result_array = array('result_array');
	   $select = array('name','role','message');
       $this->data["td_testimonials"] = $this->Main_model->get_data($where, "td_testimonials",$select,null,null,null,$result_array);
       $where = array("status" => "1","module_id"=>9895);
	   $result_array = array('result_array');
	   $limit = array(4,0);
	   $select = array('counter_icon','counter_timer','counter_operator','counter_title');
       $this->data["td_count_statistics"] = $this->Main_model->get_data($where, "td_count_statistics",$select,null,$limit,null,$result_array);
       
       $where = array("status" => "1");
	   $result_array = array('result_array');
	   $select = array('title','slug','description','sub_title','image');
       $this->data["td_section"] = $this->Main_model->get_data($where, "td_section",$select,null,null,null,$result_array);
       
      $this->data['_view_'] = 'frontend/about_us_view';
      $this->load->view('_frontend_', $this->data);
  }
  
   public function invest(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
        $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
       $where = array("status" => "1","module_id"=>1993);
	   $result_array = array('result_array');
	   $select = array('name','image');
       $this->data["td_development_environments"] = $this->Main_model->get_data($where, "td_development_environments",$select,null,null,null,$result_array);
       $where = array("status" => "1","module_id"=>5002);
	   $result_array = array('result_array');
	   $select = array('service_title','service_slug','service_icon','service_short_description','service_image');
       $this->data["td_services"] = $this->Main_model->get_data($where, "td_services",$select,null,null,null,$result_array);
       
      $this->data['_view_'] = 'frontend/invest_view';
      $this->load->view('_frontend_', $this->data);
  }
  
   public function contact_us(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
       $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
      $this->data['_view_'] = 'frontend/contact_us_view';
      $this->load->view('_frontend_', $this->data);
  }
  
  
   public function disclaimer(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
         $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
      $this->data['_view_'] = 'frontend/disclaimer_view';
      $this->load->view('_frontend_', $this->data);
  }
  
   public function privacy(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
         $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
      $this->data['_view_'] = 'frontend/privacy_view';
      $this->load->view('_frontend_', $this->data);
  }
  


      public function save(){
		$data = array('success' => false, 'messages' => array());
		$this->load->library('form_validation');
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|min_length[6]|xss_clean");
        $this->form_validation->set_rules("phone_no", "Phone", "required|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]");
        $this->form_validation->set_rules("name", "Name", "trim|required");
        $this->form_validation->set_rules("city", "city", "trim|required");
        $this->form_validation->set_rules("country", "country", "trim|required");

        $this->form_validation->set_rules("message1", "Message", "trim|required");
        $this->form_validation->set_rules('terms_agreement', 'Terms and Conditions', 'required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->load->library('form_validation');
		if ($this->form_validation->run()) {
			$data = array(
            "email" => xss_clean($this->input->post("email")),
            "phone" => xss_clean($this->input->post("phone_no")),
            "name" => xss_clean($this->input->post("name")),
            // "city" => xss_clean($this->input->post("city")),
            // "country" => xss_clean($this->input->post("country")),
            "message" => xss_clean($this->input->post("message1")),
            "created_at" => date("y-m-d H:i:s"),
            );
             $email_id = $this->input->post("email");
            $phone_no = $this->input->post("phone_no");
            $name = $this->input->post("name");
            $city = $this->input->post("city");
            $country = $this->input->post("country");

            $message = $this->input->post("message1");
            $this->Email_model->send_mail_contact_us($name,$email_id,$phone_no,$city,$country,$message);
            $this->Main_model->insert_data($data, "td_contact_us");
            $data['success'] = true;
		}else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);

	}


 public function service_details(){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
         $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);
      $this->data['_view_'] = 'frontend/service_details_view';
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
      $this->data['_view_'] = 'frontend/blog_details_view';
      $this->load->view('_frontend_', $this->data);
  }
  
  public function pages($slug = NULL){
		  $this->data = array(
            'title' => PAGE_LOGIN_TITLE,
            'description' => PAGE_LOGIN_DESCRIPTION,
            'keywords' => PAGE_LOGIN_KEYWORDS
        );
       $where = array("status" => "1");
       $row_array = array('row_array');
       $this->data['td_settings'] = $this->Main_model->get_data($where, "td_settings",null,null,null,null,null,$row_array);

       $slug = $slug ?: $this->uri->segment(1);

       $where = array("status" => "1", "service_slug" => $slug);
       $row_array = array('row_array');
       $this->data['td_services'] = $this->Main_model->get_data($where, "td_services", null, null, null, null, null, $row_array);
       if (!empty($this->data['td_services'])) {
           $this->data['_view_'] = 'frontend/service_details_view';
           $this->load->view('_frontend_', $this->data);
           return;
       }

       $where = array("status" => "1", "slug" => $slug);
       $row_array = array('row_array');
       $this->data['td_blog'] = $this->Main_model->get_data($where, "td_blog", null, null, null, null, null, $row_array);
       if (!empty($this->data['td_blog'])) {
           $this->data['_view_'] = 'frontend/blog_details_view';
           $this->load->view('_frontend_', $this->data);
           return;
       }

       $where = array("status" => "1", "information_title_slug" => $slug);
       $row_array = array('row_array');
       $this->data['td_information'] = $this->Main_model->get_data($where, "td_information", null, null, null, null, null, $row_array);
       if (!empty($this->data['td_information'])) {
           $this->data['_view_'] = 'frontend/privacy_view';
           $this->load->view('_frontend_', $this->data);
           return;
       }

       show_404();
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
      $this->data['_view_'] = 'frontend/blog_view';
      $this->load->view('_frontend_', $this->data);
  }
  
  
  
}