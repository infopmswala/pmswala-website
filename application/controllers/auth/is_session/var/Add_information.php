<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_section extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'information_title' => $this->security->xss_clean($this->input->post("information_title")),
					'information_title_slug' => $this->security->xss_clean(get_url($this->input->post("information_title"))),
					'description' => $this->input->post("description"),
					'meta_tag_title' => $this->security->xss_clean($this->input->post("meta_tag_title")),
					'meta_tag_description' => $this->security->xss_clean($this->input->post("meta_tag_description")),
					'meta_tag_keywords' => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
                $this->Main_model->insert_data($data, "td_information");
                $this->session->set_flashdata("success", "Data added successfully.");
			}

		
			redirect(base_url() . "auth/is_session/var/list_section/");
        }
        		$this->data = array(
        		'title' => 'Add Information - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $this->data['_view_'] = 'backend/information/add_information_view';
            $this->load->view('_backend_', $this->data);
	}
}