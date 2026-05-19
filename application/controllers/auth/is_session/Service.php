<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends My_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function edit($module_id){
	
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_services = $this->Main_model->get_data($where, "td_services");
		if($_POST){
			if($_POST["update"] == "service_edit"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                   "service_title" => $this->security->xss_clean($this->input->post("service_title")),
                    "module_id" => $this->security->xss_clean($module_id),
					"service_slug" => $this->security->xss_clean(create_slug($this->input->post("service_slug"))),
					"service_short_description" => $this->security->xss_clean($this->input->post("service_short_description")),
					"service_description" => $this->input->post("service_description"),
					"meta_title" => $this->security->xss_clean($this->input->post("meta_title")),
					"meta_tag_description" => $this->security->xss_clean($this->input->post("meta_tag_description")),
					"meta_tag_keywords" => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if(!empty($_FILES['service_image']['tmp_name'])){
					if (is_uploaded_file($_FILES['service_image']['tmp_name'])) {
						$config1['upload_path'] = './uploads/service/';
						$config1['allowed_types'] = '*';
						$config1['max_size'] = '*';
						$config1['overwrite'] = false;
						$config1['file_name'] = $data['service_slug'];
						$this->load->library('upload', $config1);
						$this->upload->initialize($config1);
						if (!$this->upload->do_upload('service_image', FALSE) && is_uploaded_file($_FILES['service_image']['tmp_name'])) {
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata("error", $error['error']);
							redirect(base_url() . 'auth/is_session/service/edit/'.$module_id.'/'.$get_id.'/');
						} else {
							$out = $this->upload->data();
							$data['service_image'] = 'uploads/service/' . $out['orig_name'];
						}
					}
				}
				
				if(!empty($_FILES['service_icon']['tmp_name'])){
					if (is_uploaded_file($_FILES['service_icon']['tmp_name'])) {
						$config1['upload_path'] = './uploads/service/';
						$config1['allowed_types'] = '*';
						$config1['max_size'] = '*';
						$config1['overwrite'] = false;
						$config1['file_name'] = $data['service_slug'].''.rand() . '_' . time();
						$this->load->library('upload', $config1);
						$this->upload->initialize($config1);
						if (!$this->upload->do_upload('service_icon', FALSE) && is_uploaded_file($_FILES['service_icon']['tmp_name'])) {
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata("error", $error['error']);
							redirect(base_url() . 'auth/is_session/service/edit/'.$module_id.'/'.$get_id.'/');
						} else {
							$out = $this->upload->data();
							$data['service_icon'] = 'uploads/service/' . $out['orig_name'];
						}
					}
				}
					if(!empty($_FILES['service_banner_image']['tmp_name'])){
					if (is_uploaded_file($_FILES['service_banner_image']['tmp_name'])) {
						$config1['upload_path'] = './uploads/service/';
						$config1['allowed_types'] = '*';
						$config1['max_size'] = '*';
						$config1['overwrite'] = false;
						$config1['file_name'] =$data['service_slug'].'-'.'banner';
						$this->load->library('upload', $config1);
						$this->upload->initialize($config1);
						if (!$this->upload->do_upload('service_banner_image', FALSE) && is_uploaded_file($_FILES['service_banner_image']['tmp_name'])) {
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata("error", $error['error']);
							redirect(base_url() . 'auth/is_session/service/edit/'.$module_id.'/'.$get_id.'/');
						} else {
							$out = $this->upload->data();
							$data['service_banner_image'] = 'uploads/service/' . $out['orig_name'];
						}
					}
				}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_services");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/service/service_list/".$module_id.'/');
			}
		}
		$this->data = array(
			'title' => 'Edit Service Modules - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("id" => $id);
		$row_array = array('row_array');
        $this->data["td_services"] = $this->Main_model->get_data($where, "td_services",null,null,null,null,null,$row_array);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/service/edit_service_view';
        $this->load->view('_backend_', $this->data);
	}

	public function service_add($module_id){
		if($_POST){
			if($_POST["submit"] == "service_add"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"service_title" => $this->security->xss_clean($this->input->post("service_title")),
                    "module_id" => $this->security->xss_clean($module_id),
						"service_slug" => $this->security->xss_clean(create_slug($this->input->post("service_slug"))),
					"service_short_description" => $this->security->xss_clean($this->input->post("service_short_description")),
					"service_description" => $this->input->post("service_description"),
					"meta_title" => $this->security->xss_clean($this->input->post("meta_title")),
					"meta_tag_description" => $this->security->xss_clean($this->input->post("meta_tag_description")),
					"meta_tag_keywords" => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if(!empty($_FILES['service_image']['tmp_name'])){
					if (is_uploaded_file($_FILES['service_image']['tmp_name'])) {
						$config1['upload_path'] = './uploads/service/';
						$config1['allowed_types'] = '*';
						$config1['max_size'] = '*';
						$config1['overwrite'] = false;
						$config1['file_name'] = $data['service_slug'];
						$this->load->library('upload', $config1);
						$this->upload->initialize($config1);
						if (!$this->upload->do_upload('service_image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata("error", $error['error']);
							redirect(base_url() . 'auth/is_session/service/service_add/'.$module_id);
						} else {
							$out = $this->upload->data();
							$data['service_image'] = 'uploads/service/' . $out['orig_name'];
						}
					}
				}else{
					$data['service_image'] = '-';
				}
				
					if(!empty($_FILES['service_icon']['tmp_name'])){
					if (is_uploaded_file($_FILES['service_icon']['tmp_name'])) {
						$config1['upload_path'] = './uploads/service/';
						$config1['allowed_types'] = '*';
						$config1['max_size'] = '*';
						$config1['overwrite'] = false;
						$config1['file_name'] = $data['service_slug'].''.rand() . '_' . time();
						$this->load->library('upload', $config1);
						$this->upload->initialize($config1);
						if (!$this->upload->do_upload('service_icon', FALSE) && is_uploaded_file($_FILES['service_icon']['tmp_name'])) {
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata("error", $error['error']);
							redirect(base_url() . 'auth/is_session/service/service_add/'.$module_id);
						} else {
							$out = $this->upload->data();
							$data['service_icon'] = 'uploads/service/' . $out['orig_name'];
						}
					}
				}else{
					$data['service_icon'] = '-';
				}
				
				if(!empty($_FILES['service_banner_image']['tmp_name'])){
					if (is_uploaded_file($_FILES['service_banner_image']['tmp_name'])) {
						$config1['upload_path'] = './uploads/service/';
						$config1['allowed_types'] = '*';
						$config1['max_size'] = '*';
						$config1['overwrite'] = false;
						$config1['file_name'] =$data['service_slug'].'-'.'banner';
						$this->load->library('upload', $config1);
						$this->upload->initialize($config1);
						if (!$this->upload->do_upload('service_banner_image', FALSE) && is_uploaded_file($_FILES['service_banner_image']['tmp_name'])) {
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata("error", $error['error']);
							redirect(base_url() . 'auth/is_session/service/service_add/'.$module_id);
						} else {
							$out = $this->upload->data();
							$data['service_banner_image'] = 'uploads/service/' . $out['orig_name'];
						}
					}
				}else{
					$data['service_banner_image'] = '-';
				}
				$this->Main_model->insert_data($data, "td_services");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/service/service_list/".$module_id.'/');
			}
		}
		$this->data = array(
			'title' => 'Add Service Modules -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
		$where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/service/add_service_view';
        $this->load->view('_backend_', $this->data);
    }

	public function service_list($module_id){
		$this->data = array(
			'title' => 'Service Modules -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$_table_name = 'td_services';
		$_like_name = 'service_title';
        $_url = 'auth/is_session/service/service_list/'.$module_id;
		$where = $module_id;
		$order_by = array('id');
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,$where),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,$where);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
		$where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/service/list_service_view';
        $this->load->view('_backend_', $this->data);
    }
    public function delete_service($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_services');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function showpay($module_id){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_services');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/service/service_list/'.$module_id.'/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/service/service_list/'.$module_id.'/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/service/service_list/'.$module_id.'/'));
	    }
    }
}

