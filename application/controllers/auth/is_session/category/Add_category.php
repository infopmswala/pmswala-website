<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_category extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		if($_POST){
			if($_POST["submit"] == "category"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"category_id" => random_number(),
					"category" => xss_clean($this->input->post("category")),
					"category_icon" => xss_clean($this->input->post("category_icon")),
					"meta_tag_title" => xss_clean($this->input->post("meta_tag_title")),
					"meta_tag_description" => xss_clean($this->input->post("meta_tag_description")),
					"meta_tag_keywords" => xss_clean($this->input->post("meta_tag_keywords")),
					"category_slug" => xss_clean(get_url($this->input->post("category_slug"))),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if (is_uploaded_file($_FILES['category_image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/category/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = "*";
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('category_image', FALSE) && is_uploaded_file($_FILES['category_image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/category/add_category/');
                    } else {
                        $out = $this->upload->data();
                        $data['category_image'] = 'uploads/category/' . $out['orig_name'];
                    }

                }
				$this->Main_model->insert_data($data, "td_category");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/category/list_category/");
			}
		
		}
		$this->data = array(
			'title' => 'Add category - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
		$where = array("status" => "1");
        $this->data["td_category"] = $this->Main_model->get_data($where, "td_category");
        $this->data['_view_'] = 'backend/category/add_category_view';
        $this->load->view('_backend_', $this->data);
	}



}