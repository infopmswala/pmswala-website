<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_social extends My_Controller {
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index()
	{  
		if($_POST){
			if($_POST["submit"] == "social"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"name" => $this->security->xss_clean($this->input->post("name")),
					"code" => $this->security->xss_clean($this->input->post("code")),
					"link" => $this->security->xss_clean($this->input->post("link")),
					"social_status" => $this->security->xss_clean($this->input->post("social_status")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				$this->Main_model->insert_data($data, "td_social");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/social_settings/list_social/");
			}
		}
		$this->data = array(
			'title' => 'Add Social - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
		 $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
		 $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/social_media/add_social_view';
        $this->load->view('_backend_', $this->data);
	}

}
