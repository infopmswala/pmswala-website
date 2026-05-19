<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo_settings extends My_Controller {
	var $data = array();
	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{   
		if ($_POST) {
        
            if ($_POST["submit"] == "analytics") {
               
				$data = array(
					'analytics' => $this->input->post("analytics"),
                    'updated_by' => $this->session->userdata("users_ID"),
                    'updated_at' => date("Y-m-d H:i:s"));
                        $where = array('status' => "1");
                        $this->Main_model->update_data($where, $data, 'td_seo_analytics');
                $this->session->set_flashdata("success", "Analytics updated successfully.");
			}

			if ($_POST["submit"] == "metakeyword") {
                $data = array(
					'meta_title' => $this->security->xss_clean($this->input->post("meta_title")),
					'metakeyword' => $this->security->xss_clean($this->input->post("metakeyword")),
					'meta_description' => $this->security->xss_clean($this->input->post("meta_description")),
                    'updated_by' => $this->session->userdata("users_ID"),
                    'updated_at' => date("Y-m-d H:i:s"));
                        $where = array('status' => "1");
                        $this->Main_model->update_data($where, $data, 'td_seo_analytics');
                $this->session->set_flashdata("success", "Metakeyword updated successfully.");
            }
            
            	if ($_POST["submit"] == "contact_metakeyword") {
                $data = array(
					'contact_meta_title' => $this->security->xss_clean($this->input->post("contact_meta_title")),
					'contact_metakeyword' => $this->security->xss_clean($this->input->post("contact_metakeyword")),
					'contact_meta_description' => $this->security->xss_clean($this->input->post("contact_meta_description")),
                    'updated_by' => $this->session->userdata("users_ID"),
                    'updated_at' => date("Y-m-d H:i:s"));
                        $where = array('status' => "1");
                        $this->Main_model->update_data($where, $data, 'td_seo_analytics');
                $this->session->set_flashdata("success", "Metakeyword updated successfully.");
            }
            redirect(base_url().'auth/is_session/seo_tools/seo_settings/');

        }
		$this->data = array(
			'title' => 'SEO Settings - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
	    
         $where = array("status" => "1");
         $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
         $where = array("status" => "1");
         $this->data["td_seo_analytics"] = $this->Main_model->get_data($where, "td_seo_analytics");
        $this->data['_view_'] = 'backend/seo_tools/seo_settings_view';
        $this->load->view('_backend_', $this->data);
	}
	private function hash_password($password){
		return password_hash($password, PASSWORD_BCRYPT);
	 }
	
}
