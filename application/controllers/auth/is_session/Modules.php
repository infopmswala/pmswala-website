<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modules extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function edit(){
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_modules = $this->Main_model->get_data($where, "td_modules");
		if($_POST){
			if($_POST["update"] == "td_modules"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    "module_name" => $this->security->xss_clean($this->input->post("module_name")),
                    "module_type" => $this->security->xss_clean($this->input->post("module_type")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_modules");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/modules/modules_list/");
			}
		}
		$this->data = array(
			'title' => 'Edit Module - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("id" => $id);
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules");
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/modules/edit_modules_view';
        $this->load->view('_backend_', $this->data);
	}
	public function modules_list(){
		if($_POST){
			if(!empty($_POST["submit"]) == "td_modules"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    "module_id" => random_number(4),
					"module_name" => $this->security->xss_clean($this->input->post("module_name")),
                    "module_type" => $this->security->xss_clean($this->input->post("module_type")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				$this->Main_model->insert_data($data, "td_modules");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/modules/modules_list/");
			   }
		}  
		$this->data = array(
			'title' => 'Modules -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $pagination = $this->paginate(base_url() . 'auth/is_session/modules/modules_list/', $this->Get_paginated_model->get_paginated_modules_count(),10);
        $this->data['td_modules'] = $this->Get_paginated_model->get_paginated_modules($pagination['per_page'], $pagination['offset']);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/modules/list_modules_view';
        $this->load->view('_backend_', $this->data);
    }
    public function delete_modules($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_modules');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/modules/modules_list/");
    }

    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_modules');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/modules/modules_list/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/modules/modules_list'));
			}
	    }else{
	        redirect(site_url('auth/is_session/modules/modules_list'));
	    }
    }
}

