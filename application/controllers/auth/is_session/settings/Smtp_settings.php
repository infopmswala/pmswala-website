<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smtp_settings extends My_Controller {
    var $data = array();
	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{  
		if($_POST){
			if($_POST["submit"] == 'smtp_settings'){
				$where = array("id" => $this->input->post("uid"));
				$data = array(
						'protocol' => $this->security->xss_clean($this->input->post("protocol")),
						'smtp_host' => $this->security->xss_clean($this->input->post("smtp_host")),
						'smtp_port' => $this->security->xss_clean($this->input->post("smtp_port")),
						'smtp_user' => $this->security->xss_clean($this->input->post("smtp_user")),
						'smtp_pass' => $this->security->xss_clean($this->input->post("smtp_pass")),
						'updated_by' => $this->session->userdata("id"),
						'updated_at' => date("Y-m-d H:i:s")
				);
				$where = array("id" => $this->input->post("uid"));
                $this->Main_model->update_data($where, $data, "td_smtp_settings");
                $this->session->set_flashdata("success", "Smtp Settings updated successfully.");
			}
		}
		$this->data = array(
			'title' => 'Smtp Settings - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		
		$where = array("status" => 1);
		$this->data["smtp_settings"] = $this->Main_model->get_data($where, "td_smtp_settings");
		$where = array("status" => "1");
         $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/settings/smtp_settings_view';
		$this->load->view('_backend_', $this->data);
	
	}

}
