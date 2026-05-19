<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_careers extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		if($_POST){
			if($_POST["submit"] == "td_careers"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"job_title" => $this->security->xss_clean($this->input->post("job_title")),
					"job_title_slug" => $this->security->xss_clean($this->input->post("job_title")),
					"location"  => $this->security->xss_clean($this->input->post("location")),
					"job_type"  => $this->input->post("job_type"),
					"meta_title"  => $this->security->xss_clean((!empty($this->input->post('meta_title'))) ? $this->input->post('meta_title') : ''),
                    "meta_keywords"  => $this->security->xss_clean((!empty($this->input->post('meta_keywords'))) ? $this->input->post('meta_keywords') : ''),
                    "meta_description"  => $this->security->xss_clean((!empty($this->input->post('meta_description'))) ? $this->input->post('meta_description') : ''),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				$this->Main_model->insert_data($data, "td_careers");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/careers/list_careers/");
			}
		}
		$this->data = array(
			'title' => 'Add careers - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/careers/add_careers_view';
        $this->load->view('_backend_', $this->data);
	}
}

