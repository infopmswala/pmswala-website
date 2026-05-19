<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_social extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){   
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		if($_POST){
	    if($_POST["update"] == "social"){
		$data = array(
				"id" => $id,
				"name" => $this->security->xss_clean($this->input->post("name")),
				'code' => $this->security->xss_clean($this->input->post('code')),
				"link" => $this->security->xss_clean($this->input->post("link")),
				"social_status" => $this->security->xss_clean($this->input->post("social_status")),
				'updated_by' => $this->session->userdata("id"),
				'updated_at' => date("Y-m-d H:i:s")
			);
			
			$where = array("id" => $id);
			$this->Main_model->update_data($where, $data, "td_social");
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . "auth/is_session/social_settings/list_social/");
			}
		}
			$this->data = array(
				'title' => 'Edit Social - Dashboard',
				'heading' => 'My Heading',
				'message' => 'My Message'
			);
		$where = array("id" => $id);
		$this->data["td_social"] = $this->Main_model->get_data($where, "td_social");
		$where = array("status" => "1");
		$this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/social_media/edit_social_view';
        $this->load->view('_backend_', $this->data);
	}
    
	

}