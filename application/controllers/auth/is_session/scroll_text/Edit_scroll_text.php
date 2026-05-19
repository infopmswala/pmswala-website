<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_scroll_text extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_scroll_text = $this->Main_model->get_data($where, "td_scroll_text");
		if($_POST){
		if($_POST["update"] == "td_scroll_text"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'scroll_text' => $this->security->xss_clean($this->input->post("scroll_text")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_scroll_text");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/scroll_text/list_scroll_text/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Scroll Text - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["td_scroll_text"] = $this->Main_model->get_data($where, "td_scroll_text");
        $this->data['_view_'] = 'backend/scroll_text/edit_scroll_text_view';
        $this->load->view('_backend_', $this->data);
	}



}