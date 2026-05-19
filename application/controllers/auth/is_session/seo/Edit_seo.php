<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_seo extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_information = $this->Main_model->get_data($where, "td_information");
		if($_POST){
		if($_POST["update"] == "add_seo"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
				    'page_name' => $this->security->xss_clean($this->input->post("page_name")),
				     'url' => $this->input->post("url"),
				// 	'meta_tag_title' => $this->security->xss_clean($this->input->post("meta_tag_title")),
				// 	'meta_tag_description' => $this->security->xss_clean($this->input->post("meta_tag_description")),
				// 	'meta_tag_keywords' => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
				'meta_tag_title' => $this->security->xss_clean($this->input->post("meta_tag_title")),
					'meta_tag_description' => $this->security->xss_clean($this->input->post("meta_tag_description")),
					'meta_tag_keywords' => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_seo");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/seo/list_seo/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit SEO - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["td_seo"] = $this->Main_model->get_data($where, "td_seo");
        $this->data['_view_'] = 'backend/seo/edit_seo_view';
        $this->load->view('_backend_', $this->data);
	}



}