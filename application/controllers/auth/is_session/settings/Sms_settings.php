<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_settings extends My_Controller {
    var $data = array();
	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{  
		if($_POST){
			if ($_POST["submit"] == "td_sms_settings") {
                $where = array("id" => $this->input->post("uid"));
                $td_sms_settings = $this->Main_model->get_data($where, "td_sms_general_settings");
                $data = array(
                    "sms_url" => $this->input->post("sms_url"),
                    "api_key" => $this->input->post("api_key"), 
					"sender_id" => $this->input->post("sender_id"), 
					"username" => $this->input->post("username"), 
                    'updated_by' => $this->session->userdata("id"),
                    'updated_at' => date("Y-m-d H:i:s")
                );
                $where = array("id" => $this->input->post("uid"));
                $this->Main_model->update_data($where, $data, "td_sms_general_settings");
                $this->session->set_flashdata("success", "Data updated successfully.");
            }
                    redirect(base_url() . "auth/is_session/settings/sms_settings/");
		}
		$this->data = array(
			'title' => 'SMS Settings - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$this->data["td_sms_settings"] = $this->Main_model->get_data(null, "td_sms_general_settings");
		$this->data["td_settings"] = $this->Main_model->get_data(null, "td_settings");
        $this->data['_view_'] = 'backend/settings/sms_settings_view';
		$this->load->view('_backend_', $this->data);
	
	}

}