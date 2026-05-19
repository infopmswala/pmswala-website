<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
var $data = array();
  public function __construct(){
	  parent::__construct();
	  $this->check_session();
	  $this->load->model('Main_model');
	  $this->load->model('User_model');
	  $this->load->library('user_agent');
  }
	public function index()
	{
			if ($_POST) {
				$rules = array(
					'email' => array('field' => 'email', 'label' => 'email', 'rules' => 'trim|required'),
					'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required'),
				);
				$this->form_validation->set_rules($rules);
				if ($this->form_validation->run() != FALSE) {
					$out = $this->User_model->login_user();
					if ($out == true) {
						$this->session->set_flashdata('success', 'You are successfully logged in');
						redirect(base_url() . 'auth/is_session/dashboard/');
					} else {
						$this->session->set_flashdata('error', 'Wrong Login Details');
						redirect(base_url()."auth/log_session/login/");
					}
				}
			}
			$this->data = array(
				'title' => get_compnay_title() . ' | Login'
			);
			$where = array("status" => 1);
			$this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
		    $this->load->view('backend/login_view', $this->data);
	}

	function check_session(){
		$user_ID = $this->session->userdata('id');
		if($user_ID){
			redirect('auth/is_session/dashboard/');
		}
	}

}