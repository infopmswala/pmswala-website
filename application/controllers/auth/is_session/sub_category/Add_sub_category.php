<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_sub_category extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		if($_POST){
			if($_POST["submit"] == "sub_category"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				  
				   $where = array("category_id" => $this->input->post("category"));
				   $td_category = $this->Main_model->get_data($where, "td_category");
				$data = array(
				
					"sub_category_id" => random_number(),
					"category_id" => $td_category[0]->category_id,
					"category" => $td_category[0]->category,
					"category_slug" => $td_category[0]->category_slug,
					"sub_category" => xss_clean($this->input->post("sub_category")),
					"sub_category_slug" => xss_clean(get_url($this->input->post("sub_category_slug"))),
					"meta_tag_title" => xss_clean($this->input->post("meta_tag_title")),
					"meta_tag_keywords" => xss_clean($this->input->post("meta_tag_keywords")),
					"meta_tag_description" => xss_clean($this->input->post("meta_tag_description")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				// if (is_uploaded_file($_FILES['sub_category_image']['tmp_name'])) {
    //                 $config1['upload_path'] = './uploads/sub_category/';
    //                 $config1['allowed_types'] = '*';
    //                 $config1['max_size'] = "*";
    //                 $config1['overwrite'] = false;
    //                 $config1['file_name'] = rand() . '_' . time();
    //                 $this->load->library('upload', $config1);
    //                 $this->upload->initialize($config1);
    //                 if (!$this->upload->do_upload('sub_category_image', FALSE) && is_uploaded_file($_FILES['sub_category_image']['tmp_name'])) {
    //                     $error = array('error' => $this->upload->display_errors());
    //                     $this->session->set_flashdata("error", $error['error']);
    //                     redirect(base_url() . 'auth/is_session/sub_category/add_sub_category/');
    //                 } else {
    //                     $out = $this->upload->data();
    //                     $data['sub_category_image'] = 'uploads/sub_category/' . $out['orig_name'];
    //                 }
    //             }
				$this->Main_model->insert_data($data, "td_sub_category");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/sub_category/list_sub_category/");
			}
		
		}
		$this->data = array(
			'title' => 'Add Sub Category - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
		$where = array("status" => "1");
        $this->data["td_category"] = $this->Main_model->get_data($where, "td_category");
        $this->data['_view_'] = 'backend/sub_category/add_sub_category_view';
        $this->load->view('_backend_', $this->data);
	}



}