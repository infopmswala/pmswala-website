<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Count_statistics extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function add_count_statistics($module_id){  
		if($_POST){
			if($_POST["submit"] == "td_count_statistics"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"counter_icon" => $this->security->xss_clean($this->input->post("counter_icon")),
					"counter_timer"  => $this->security->xss_clean($this->input->post("counter_timer")),
					"module_id"  => $module_id,
					"counter_operator"  => $this->security->xss_clean($this->input->post("counter_operator")),
                    "counter_title"  => $this->security->xss_clean($this->input->post("counter_title")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				$this->Main_model->insert_data($data, "td_count_statistics");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/count_statistics/list_count_statistics/".$module_id.'/');
			}
		}
		$this->data = array(
			'title' => 'Add Count Statistics - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/count_statistics/add_count_statistics_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function list_count_statistics($module_id){
	    $this->data = array(
			'title' => 'Count Statistics Modules -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
	    $_table_name = 'td_count_statistics';
		$_like_name = 'counter_title';
        $_url = 'auth/is_session/count_statistics/list_count_statistics/'.$module_id.'/';
		$where = $module_id;
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,$where),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,$where);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/count_statistics/list_count_statistics_view';
        $this->load->view('_backend_', $this->data);
	    
	}
	
	public function edit_count_statistics($module_id){
	    $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
        if($_POST){
            if($_POST["update"] == "td_count_statistics"){   
			$data = array(
                "counter_icon" => $this->security->xss_clean($this->input->post("counter_icon")),
				"counter_timer"  => $this->security->xss_clean($this->input->post("counter_timer")),
				"counter_operator"  => $this->security->xss_clean($this->input->post("counter_operator")),
                "counter_title"  => $this->security->xss_clean($this->input->post("counter_title")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
            $where = array("id" => $id);
			$this->Main_model->update_data($where, $data, "td_count_statistics");
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . 'auth/is_session/count_statistics/list_count_statistics/'.$module_id.'/');
			}
        }
            $this->data = array(
                'title' => 'Edit Count Statistics -Dashboard',
                'heading' => 'My Heading',
                'message' => 'My Message'
            );
            $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("id" => $id);
            $this->data["td_count_statistics"] = $this->Main_model->get_data($where, "td_count_statistics");
            $where = array("status" => "1","module_id"=>$module_id);
    		$row_array = array('row_array');
            $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
             $this->data['_view_'] = 'backend/count_statistics/edit_count_statistics_view';
             $this->load->view('_backend_', $this->data);
	}
	
	public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_count_statistics');
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
    
    public function delete_count_statistics($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_count_statistics');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);

    }
}

