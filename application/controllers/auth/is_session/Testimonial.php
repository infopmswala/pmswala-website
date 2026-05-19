<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonial extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function testimonial_list($module_id){  
		$this->data = array(
			'title' => 'List Testimonial -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
         $_table_name = 'td_testimonials';
		$_like_name = 'name';
        $_url = 'auth/is_session/testimonial/testimonial_list/'.$module_id.'/';
		$where = $module_id;
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,$where),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,$where);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/testimonials/list_testimonials_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function add_testimonial($module_id){
	    if($_POST){
			if($_POST["submit"] == "testimonial"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"name" => xss_clean($this->input->post("name")),
					"module_id" => $module_id,
					"role" => xss_clean($this->input->post("role")),
                    "message" => xss_clean($this->input->post("message")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if(!empty($_FILES['image']['tmp_name'])){
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
                        redirect(base_url() . 'auth/is_session/testimonial/add_testimonial/'.$module_id);
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/testimonial/' . $out['orig_name'];
                    }
                }
				}
				$this->Main_model->insert_data($data, "td_testimonials");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/testimonial/testimonial_list/".$module_id);
		
			}
		
		}
		$this->data = array(
			'title' => 'Add Testimonial - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/testimonials/add_testimonials_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function edit_testimonial($module_id){
	    $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_testimonials = $this->Main_model->get_data($where, "td_testimonials");
		if($_POST){
		if($_POST["update"] == "testimonial"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"name" => xss_clean($this->input->post("name")),
					"role" => xss_clean($this->input->post("role")),
                    "message" => xss_clean($this->input->post("message")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if(!empty($_FILES['image']['tmp_name'])){
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
			    }}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_testimonials");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/testimonial/testimonial_list/".$module_id);
			}
		
		}
		$this->data = array(
			'title' => 'Edit Testimonial - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $where = array("id" => $id);
		$row_array = array('row_array');
        $this->data["td_testimonials"] = $this->Main_model->get_data($where, "td_testimonials",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/testimonials/edit_testimonials_view';
        $this->load->view('_backend_', $this->data);
	}
    public function delete_testimonials($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_testimonials');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_testimonials');
			if($id){		
                $this->session->set_flashdata("success", "Status updated successfully");					
			redirect($_SERVER['HTTP_REFERER']);
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
    }
}

