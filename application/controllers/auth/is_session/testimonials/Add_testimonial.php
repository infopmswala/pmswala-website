<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_testimonial extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		if($_POST){
			if($_POST["submit"] == "testimonial"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"testimonial_id" => random_number(),
					"name" => xss_clean($this->input->post("name")),
					"role" => xss_clean($this->input->post("role")),
                    "message" => xss_clean($this->input->post("message")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/testimonial/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/testimonials/add_testimonial/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/testimonial/' . $out['orig_name'];
                    }
                }
				$this->Main_model->insert_data($data, "td_testimonials");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/testimonials/list_testimonial");
			}
		
		}
		$this->data = array(
			'title' => 'Add Testimonial - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/testimonials/add_testimonials_view';
        $this->load->view('_backend_', $this->data);
	}



}