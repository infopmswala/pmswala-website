<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_banner extends My_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Main_model');
		$this->check_session();
	}	
	public function index(){ 
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_banner = $this->Main_model->get_data($where, "td_banner");
		if($_POST){
		if($_POST["update"] == "banner"){
			$data = array(
				"id" =>$id,
				"title" => xss_clean($this->input->post("title")),
				// "url" => xss_clean($this->input->post("url")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
				$config1['upload_path'] = './uploads/banner/';
				$config1['allowed_types'] = '*';
				$config1['max_size'] = '*';
				$config1['overwrite'] = false;
				$config1['file_name'] = rand() . '_' . time();
				$this->load->library('upload', $config1);
				$this->upload->initialize($config1);
				if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
					redirect(base_url() . "auth/is_session/banner/edit_banner");
				} else {
                    $where = array("id" => $this->uri->segment(6));
                     $td_banner = $this->Main_model->get_data($where, "td_banner");
					$out = $this->upload->data();
					$data['image'] = './uploads/banner/' . $out['orig_name'];
				}
			}
			$where = array("id" => $id);
			$this->Main_model->update_data($where, $data, "td_banner");
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . "auth/is_session/banner/list_banner/");
			}
		}
            $this->data = array(
                'title' => 'Edit Banner-Dashboard',
                'heading' => 'My Heading',
                'message' => 'My Message'
            );
            $where = array("status" => "1");
             $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("id" => $id);
            $this->data["td_banner"] = $this->Main_model->get_data($where, "td_banner");
            $this->data['_view_'] = 'backend/banner/edit_banner_view';
            $this->load->view('_backend_', $this->data);
        }

    



}