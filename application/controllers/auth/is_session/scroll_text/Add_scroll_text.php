<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_scroll_text extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		if($_POST){
			if($_POST["submit"] == "td_scroll_text"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"scroll_text" => $this->security->xss_clean($this->input->post("scroll_text")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				$this->Main_model->insert_data($data, "td_scroll_text");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/scroll_text/list_scroll_text/");
			}
		}
		$this->data = array(
			'title' => 'Add Scroll Text - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/scroll_text/add_scroll_text_view';
        $this->load->view('_backend_', $this->data);
	}
}

