<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_testimonial extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_testimonials = $this->Main_model->get_data($where, "td_testimonials");
        $get_image = explode("/",$td_testimonials[0]->image);
        $old_image= $get_image[3];
       
		if($_POST){
		if($_POST["update"] == "testimonial"){
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
					$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
					redirect(base_url() . "auth/is_session/testimonials/edit_testimonial/index?jwt_token=".$get_id);
				} else {
                    $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_testimonials");
					$out = $this->upload->data();
					$data['image'] = './uploads/testimonial/' . $out['orig_name'];
				}
			}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_testimonials");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/testimonials/list_testimonial/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Testimonial - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["td_testimonials"] = $this->Main_model->get_data($where, "td_testimonials");
        $this->data['_view_'] = 'backend/testimonials/edit_testimonials_view';
        $this->load->view('_backend_', $this->data);
	}



}