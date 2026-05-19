<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_settings extends My_Controller {
    var $data = array();
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){  
	    //print_r($_POST);exit;
		if($_POST){
			if ($_POST["submit"] == "general_settings") {
                $where = array("id" => $this->input->post("uid"));
                $td_settings = $this->Main_model->get_data($where, "td_settings");
                $data = array(
                    "footer" => $this->security->xss_clean($this->input->post("footer")),
                    "address" => $this->security->xss_clean($this->input->post("address")),
                    "hours" => $this->security->xss_clean($this->input->post("hours")),
                    "about" => $this->security->xss_clean($this->input->post("about")),
                    "color" => $this->input->post("color"),
                    "phone" => $this->security->xss_clean($this->input->post("phone")),
                    "email" => $this->security->xss_clean($this->input->post("email")),
                    "email_two" => $this->security->xss_clean($this->input->post("email_two")),
                    "title" => $this->security->xss_clean($this->input->post("title")),
                    'updated_by' => $this->session->userdata("id"),
                    'updated_at' => date("Y-m-d H:i:s")
                );

                if (is_uploaded_file($_FILES['logo']['tmp_name'])) {
                    $config1['upload_path'] = 'uploads/settings/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = "pmswala-logo";
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('logo', FALSE) && is_uploaded_file($_FILES['logo']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", '<p style="color:red">System Settings ' . $error['error'] . ' for Logo</p>');
                        redirect(base_url() . "auth/is_session/settings/general_settings/");
                    } else {
                        $out = $this->upload->data();
                        $data['logo'] = 'uploads/settings/' . $out['orig_name'];
                        
                    }
                }
                if (is_uploaded_file($_FILES['fav']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/settings/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = "pmswala-fav";
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('fav', FALSE) && is_uploaded_file($_FILES['fav']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", '<p style="color:red">System Settings ' . $error['error'] . ' for FAV</p>');
                        redirect(base_url() . "auth/is_session/settings/general_settings/");
                    } else {
                        $out = $this->upload->data();
                        $data['fav'] = 'uploads/settings/' . $out['orig_name'];
                        
                    }
                }
                $where = array("id" => $this->input->post("uid"));
                $this->Main_model->update_data($where, $data, "td_settings");
                $this->session->set_flashdata("success", "Data updated successfully.");
            }
                    redirect(base_url() . "auth/is_session/settings/general_settings/");
		}
		$this->data = array(
			'title' => 'General Settings - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		//$where = array("status" => "1");
        //$this->data["td_users"] = $this->Main_model->get_data($where, "td_users");
		$where = array("status" => 1);
		$this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/settings/general_settings_view';
		$this->load->view('_backend_', $this->data);
	
	}

}