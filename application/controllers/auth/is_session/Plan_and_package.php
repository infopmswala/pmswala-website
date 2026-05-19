<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Plan_and_package extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function edit(){
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_price_list = $this->Main_model->get_data($where, "td_price_list");
		if($_POST){
			if($_POST["update"] == "td_price_list"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    "plan_and_package_name" => $this->security->xss_clean($this->input->post("plan_and_package_name")),
                    "plan_and_package_pricing" => $this->security->xss_clean($this->input->post("plan_and_package_pricing")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_price_list");
				$id_tecnico = !empty($_POST['pricing_item']);
                $count = !empty(count($id_tecnico));
                $data2 =array();
                for ($i=0; $i <$count; $i++) {
                    $data2 = array(
                        'plan_and_package_id'=>$td_price_list[0]->plan_and_package_id,
                        'pricing_item'=> !empty($_POST['pricing_item'][$i]),
                        "created_at" => date("y-m-d H:i:s"),
					    "created_by" => $this->session->userdata("id")
                    );
                    $this->Main_model->insert_data($data2, "td_price_item_list");
                 }
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/plan_and_package/list/");
			}
		}
		$this->data = array(
			'title' => 'Edit Plan & Package - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("id" => $id);
        $this->data["td_price_list"] = $this->Main_model->get_data($where, "td_price_list");
        $where = array("status" => "1",'module_type' => 'service');
        $this->data["td_services"] = $this->Main_model->get_data($where, "td_modules");
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/plan_and_package/edit_plan_and_package_view';
        $this->load->view('_backend_', $this->data);
	}
	public function list(){
		if($_POST){
			if(!empty($_POST["submit"]) == "td_price_list"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    "plan_and_package_id" => random_number(4),
					"plan_and_package_servies" => $this->security->xss_clean($this->input->post("plan_and_package_servies")),
                    "plan_and_package_name" => $this->security->xss_clean($this->input->post("plan_and_package_name")),
                    "plan_and_package_pricing" => $this->security->xss_clean($this->input->post("plan_and_package_pricing")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				$this->Main_model->insert_data($data, "td_price_list");
                $id_tecnico = $_POST['pricing_item'];
                $count = count($_POST['pricing_item']);
                $data2 =array();
                for ($i=0; $i <$count; $i++) {
                    $data2 = array(
                        'plan_and_package_id'=>$data['plan_and_package_id'],
                        'pricing_item'=>$_POST['pricing_item'][$i],
                        "created_at" => date("y-m-d H:i:s"),
					    "created_by" => $this->session->userdata("id")
                    );
                    $this->Main_model->insert_data($data2, "td_price_item_list");
                 }
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/plan_and_package/list/");
			   }
		}  
		$this->data = array(
			'title' => 'Plan & Package -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'td_price_list';
		$_like_name = 'title';
        $_url = 'auth/is_session/plan_and_package/list/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1",'module_type' => 'service');
        $this->data["td_services"] = $this->Main_model->get_data($where, "td_modules");
        $this->data['_view_'] = 'backend/plan_and_package/plan_and_package_view';
        $this->load->view('_backend_', $this->data);
    }
    public function delete_price_list($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_price_list');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);
    }

	public function delete_price_itme_list($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_price_item_list');
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
            $id = $this->Main_model->save($m,'td_price_list');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/plan_and_package/list/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/plan_and_package/list/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/plan_and_package/list/'));
	    }
    }
}

