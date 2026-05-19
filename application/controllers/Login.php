<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
  public function __construct(){
	  parent::__construct();
	  $this->load->model('Main_model');
	   $this->load->model('Email_model');
	  $this->load->model('User_model');
	  $this->load->library('session');
      $this->load->helper('security');
  }
  
  public function landing_page(){
       $this->data['title'] = 'Login| User';
      $this->load->view('user/landing_page_view', $this->data);
  }
  public function login_password(){
      $this->data['title'] = 'Login| User';
      $this->load->view('user/login_password_view', $this->data);
  }
  public function index(){
      $this->data['title'] = 'Login| User';
      $this->load->view('user/login_view', $this->data);
  }
 
 public function user_login(){
     if ($_POST){
		$rules = array('phone' => array('field' => 'phone', 'label' => 'phone', 'rules' => 'trim|required'),'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required'));
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() != FALSE) {
					 $phone = $this->input->post("phone");
					 $details = $this->User_model->get_user_details_from_id($phone);
                     $session_data = array('user_id' => $details['id'],'phone' => $details['phone']);
                     $this->session->set_userdata($session_data);
					if (!empty($details)) {
						$this->session->set_flashdata('success', 'You are successfully logged in');
						redirect(base_url() . 'auth/is_session/user/dashboard/');
					} else {
						$this->session->set_flashdata('error', 'Wrong Login Details');
						redirect(base_url()."login/user_login/");
					}
				}
			}
     $this->data['title'] = 'Login| User';
    $this->load->view('user/user_login_view', $this->data); 
 }
 public function reg_save(){
		$data = array('success' => false, 'messages' => array());
		$this->load->library('form_validation');
        $this->form_validation->set_rules("phone", "Phone","required|numeric|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]|is_unique[td_users.phone]");
        $this->form_validation->set_rules("full_name", "Full Name","required");
        $this->form_validation->set_rules("password", "Password","required|min_length[8]|max_length[25]");
        $this->form_validation->set_rules("conf_password", "Confirm Password",'required|matches[password]');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->load->library('form_validation');
		if ($this->form_validation->run()) {
			$data = array("phone" => xss_clean($this->input->post("phone")),"name" => xss_clean($this->input->post("full_name")),"password" => md5($this->input->post("password")),"password_int" => xss_clean($this->input->post("password")),"created_at" => date("y-m-d H:i:s"));
            $this->Main_model->insert_data($data, "td_users");
            $data['success'] = true;
		}else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);

	}
	
 public function check_strong_password($str)
    {
       if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
         return TRUE;
       }
       $this->form_validation->set_message('check_strong_password', 'The password field must be contains at least one letter and one digit.');
       return FALSE;
    }
  
	 public function save(){
		$data = array('success' => false, 'messages' => array());
		$this->load->library('form_validation');
        $this->form_validation->set_rules("phone", "Phone", "required|numeric|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]");
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->load->library('form_validation');
		if ($this->form_validation->run()) {
		    $verify_code = rand(1000,9999);
		    $phone = $this->input->post("phone");
		     //send_mobile_otp($phone,$verify_code);
		     $get_phone = $this->db->select('phone')->from('td_users')->where('phone', $phone)->get()->row()->phone;
		    if(empty($get_phone)){
			$data = array("phone" => xss_clean($this->input->post("phone")),
			               "otp" => xss_clean($verify_code),
			               "name" => xss_clean($this->input->post("name")),
			               "email" => xss_clean($this->input->post("email")),
			               "created_at" => date("y-m-d H:i:s")
			               );
            $this->Main_model->insert_data($data, "td_users");
		    }else{
		      $data = array("otp" => xss_clean($verify_code),"updated_at" => date("y-m-d H:i:s"));
		      $where = array("phone" => $phone);
			  $this->Main_model->update_data($where, $data, "td_users");
		    }
		   
		     //$this->Email_model->send_mail_otp($verify_code);
		     //send_mobile_otp($verify_code);
		      $this->Main_model->send_mobile_otp($phone, $verify_code);
		    $this->session->set_userdata('verify_user_phone', $phone);
            $data['success'] = true;
		}else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);

	}
 
 
 

   function user_verify(){
       $get_phone = $this->session->userdata('verify_user_phone');
       //print_r($get_phone);exit;
       if(!empty($get_phone)){
       $get_otp = $this->db->select('otp')->from('td_users')->where('phone', $get_phone)->get()->row()->otp;
        $get_post_otp = $this->input->post("one_value").''.$this->input->post("two_value").''.$this->input->post("three_value").''.$this->input->post("four_value");
       if($_POST){
           if($_POST["submit"] == "user_verify_otp"){
       if($get_otp == $get_post_otp){
          $details = $this->User_model->get_user_details_from_id($get_phone);
         $session_data = array('user_id' => $details['id'],'phone' => $details['phone']);
         $this->session->set_userdata($session_data);
        if($details['name'] == ''){
             redirect(base_url() . 'auth/is_session/user/dashboard/moredetails_view', 'refresh'); die(); 
         } else{
              redirect(base_url() . 'auth/is_session/user/dashboard/', 'refresh'); die(); 
         }
       
       }else{
           $this->session->set_flashdata("error","invalid OTP");
           redirect(base_url() . 'login/user_verify/', 'refresh'); die();
       }
           }
       }
       }else{
           redirect(base_url() . 'login/', 'refresh'); die();
       }
       $this->data='';
       $this->load->view('user/user_verify_view', $this->data);
   }
   
   function resend_otp(){
        $get_phone = $this->session->userdata('verify_user_phone');
        $verify_code = rand(1000,9999);
        $data = array("otp" => xss_clean($verify_code),"updated_at" => date("y-m-d H:i:s"));
		$where = array("phone" => $get_phone);
	    $this->Main_model->update_data($where, $data, "td_users");
	     $this->Email_model->send_mail_otp($verify_code);
	     $this->session->set_flashdata("success", "Otp Resend successfully");  
	    redirect(base_url() . 'login/user_verify/', 'refresh'); die();
   }
   
   function logout(){
       $user_id = $this->session->userdata('user_id');
        $this->session->set_userdata($user_id);
        redirect(base_url()."login/");
   }
   
   function welcome(){
       $this->data['_view_'] = 'user/dashboard_view';
        $this->load->view('_user_');
   }
   
}