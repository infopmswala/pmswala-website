<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
public function edit($module_id){
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_development_environments = $this->Main_model->get_data($where, "td_development_environments");
		if($_POST){
			if($_POST["update"] == "td_development_environments"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    "name" => $this->security->xss_clean($this->input->post("name")),
                    "module_id" => $this->security->xss_clean($module_id),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$config1['upload_path'] = './uploads/environments/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red"> ' . $error['error'] . ' for Image</p>');
						redirect(base_url() . 'auth/is_session/gallery/list_gallery/edit/'.$module_id.'/'.$get_id.'/');
					} else {
						$where = array("id" => $id);
						$td_development_environments = $this->Main_model->get_data($where, "td_development_environments");
						 $base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);

						//print_r($td_development_environments[0]->image);exit;
						$get_image = explode("/",$td_development_environments[0]->image);
						if(isset($get_image[3])){
						$filePath = $get_image[3];
						unlink($base_dir."/uploads/environments/".$filePath);
						}
						$out = $this->upload->data();
						$data['image'] = '/uploads/environments/' . $out['orig_name'];
					}
				}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_development_environments");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/gallery/gallery_list/".$module_id.'/');
			}
		}
		$this->data = array(
			'title' => 'Edit Gallery - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("id" => $id);
        $this->data["td_development_environments"] = $this->Main_model->get_data($where, "td_development_environments");
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
         $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/gallery/edit_gallery_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function gallery_list($module_id){
		if($_POST){
			if($_POST["submit"] == "td_development_environments"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"name" => $this->security->xss_clean($this->input->post("name")),
					"module_id" => $this->security->xss_clean($module_id),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/environments/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = "*";
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['bill']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/gallery/list_gallery/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/environments/' . $out['orig_name'];
                    }
                }
				$this->Main_model->insert_data($data, "td_development_environments");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/gallery/gallery_list/".$module_id.'/');
			   }
		}  
		$this->data = array(
			'title' => 'Gallery Modules -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'td_development_environments';
		$_like_name = 'service_title';
        $_url = 'auth/is_session/gallery/gallery_list/'.$module_id.'/';
		$where = $module_id;
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,$where),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,$where);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/gallery/list_gallery_view';
        $this->load->view('_backend_', $this->data);
    }
    public function delete_gallery($id) {
        $where = array("id" => $id);
        $td_development_environments = $this->Main_model->get_data($where, "td_development_environments");
		$get_image = explode("/",$td_development_environments[0]->image);
		$filePath = $get_image[2];
		if(isset($filePath)){
		unlink("uploads/environments/".$filePath);
		}
        $this->db->where('id', $id);
        $this->db->delete('td_development_environments');
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
            $id = $this->Main_model->save($m,'td_information');
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

