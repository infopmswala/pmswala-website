<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_settings extends My_Controller {
    var $data = array();
	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{  
		if($_POST){
			if ($_POST["submit"] == "td_payment_settings") {
                $where = array("id" => $this->input->post("uid"));
                $td_payment_settings = $this->Main_model->get_data($where, "td_payment_settings");
                $data = array(
                    "razorpay_key" => $this->input->post("razorpay_key"),
                    "razorpay_secret" => $this->input->post("razorpay_secret"), 
                    'updated_by' => $this->session->userdata("id"),
                    'updated_at' => date("Y-m-d H:i:s")
                );
                $where = array("id" => $this->input->post("uid"));
                $this->Main_model->update_data($where, $data, "td_payment_settings");
                $this->session->set_flashdata("success", "Data updated successfully.");
            }
                    redirect(base_url() . "auth/is_session/settings/payment_settings/");
		}
		$this->data = array(
			'title' => 'Payment Settings - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => 1);
		$this->data["td_payment_settings"] = $this->Main_model->get_data($where, "td_payment_settings");
        $where = array("status" => 1);
		$this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/settings/payment_settings_view';
		$this->load->view('_backend_', $this->data);
	
	}

}