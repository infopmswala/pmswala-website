<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_banner extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		if($_POST){
			if($_POST["submit"] == "banner"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"title" => xss_clean($this->input->post("title")),
					// "url" => xss_clean($this->input->post("url")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
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
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/banner/add_banner/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/banner/' . $out['orig_name'];
                    }
                }
				$this->Main_model->insert_data($data, "td_banner");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/banner/list_banner/");
			}
		
		}
		$this->data = array(
			'title' => 'Add Banner - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/banner/add_banner_view';
        $this->load->view('_backend_', $this->data);
	}


public function get_type_category_list($id){
	
		if($id=='category'){
		 $result = $this->db->get("td_category")->result_array();   
		}else{
	   $result = $this->db->get("td_sub_category")->result_array();
		}
       echo json_encode($result);
	}
}