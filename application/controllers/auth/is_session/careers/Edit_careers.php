<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_careers extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
        $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
        if($_POST){
            if($_POST["update"] == "td_careers"){   
			$data = array(
				"job_title" => $this->security->xss_clean($this->input->post("job_title")),
				"job_title_slug" => $this->security->xss_clean($this->input->post("job_title")),
				"location"  => $this->security->xss_clean($this->input->post("location")),
				"job_type"  => $this->input->post("job_type"),
				"meta_title"  => $this->security->xss_clean((!empty($this->input->post('meta_title'))) ? $this->input->post('meta_title') : ''),
				"meta_keywords"  => $this->security->xss_clean((!empty($this->input->post('meta_keywords'))) ? $this->input->post('meta_keywords') : ''),
				"meta_description"  => $this->security->xss_clean((!empty($this->input->post('meta_description'))) ? $this->input->post('meta_description') : ''),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
           
            $where = array("id" => $id);
			$this->Main_model->update_data($where, $data, "td_careers");
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . "auth/is_session/careers/list_careers/");
			}
        }
            $this->data = array(
                'title' => 'Edit Careers -Dashboard',
                'heading' => 'My Heading',
                'message' => 'My Message'
            );
            $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("id" => $id);
            $this->data["td_careers"] = $this->Main_model->get_data($where, "td_careers");
             $this->data['_view_'] = 'backend/careers/edit_careers_view';
             $this->load->view('_backend_', $this->data);

        }

    



}

