<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_videos extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		if($_POST){
			if($_POST["submit"] == "td_videos"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"question" => $this->security->xss_clean($this->input->post("question")),
					"answer"  => $this->security->xss_clean($this->input->post("answer")),
					"meta_title"  => $this->security->xss_clean($this->input->post("meta_title")),
                    "meta_keywords"  => $this->security->xss_clean($this->input->post("meta_keywords")),
                    "meta_description"  => $this->security->xss_clean($this->input->post("meta_description")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if (is_uploaded_file($_FILES['video_image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/videos/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = "*";
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('video_image', FALSE) && is_uploaded_file($_FILES['video_image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/videos/add_videos/');
                    } else {
                        $out = $this->upload->data();
                        $data['video_image'] = 'uploads/videos/' . $out['orig_name'];
                    }
                }
				$this->Main_model->insert_data($data, "td_videos");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/videos/list_videos/");
			}
		}
		$this->data = array(
			'title' => 'Add videos - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/videos/add_videos_view';
        $this->load->view('_backend_', $this->data);
	}
}

