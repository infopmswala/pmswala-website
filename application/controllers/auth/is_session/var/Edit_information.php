<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_information extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_information = $this->Main_model->get_data($where, "td_information");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'information_title' => $this->security->xss_clean($this->input->post("information_title")),
					'information_title_slug' => $this->security->xss_clean(get_url($this->input->post("information_title"))),
					'description' => $this->input->post("description"),
					'meta_tag_title' => $this->security->xss_clean($this->input->post("meta_tag_title")),
					'meta_tag_description' => $this->security->xss_clean($this->input->post("meta_tag_description")),
					'meta_tag_keywords' => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_information");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/information/list_information/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Editorial Board - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["td_information"] = $this->Main_model->get_data($where, "td_information");
        $this->data['_view_'] = 'backend/information/edit_information_view';
        $this->load->view('_backend_', $this->data);
	}



}