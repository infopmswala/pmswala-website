<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_seo extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		if ($_POST) {
            if ($_POST["submit"] == "add_seo") {
				$data = array(
				    	'page_name' => $this->security->xss_clean($this->input->post("page_name")),
				    		'url' => $this->input->post("url"),
					'meta_tag_title' => $this->security->xss_clean($this->input->post("meta_tag_title")),
					'meta_tag_description' => $this->security->xss_clean($this->input->post("meta_tag_description")),
					'meta_tag_keywords' => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
                $this->Main_model->insert_data($data, "td_seo");
                $this->session->set_flashdata("success", "Data added successfully.");
			}

		
			redirect(base_url() . "auth/is_session/seo/list_seo/");
        }
        		$this->data = array(
        		'title' => 'Add SEO - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $this->data['_view_'] = 'backend/seo/add_seo_view';
            $this->load->view('_backend_', $this->data);
	}
}