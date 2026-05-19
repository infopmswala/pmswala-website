<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_applied_careers extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Applied Careers - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $pagination = $this->paginate(base_url() . 'auth/is_session/careers/list_applied_careers/', $this->Get_paginated_model->get_paginated_td_submit_career_count(),10);
		$this->data['td_submit_career'] = $this->Get_paginated_model->get_paginated_td_submit_career($pagination['per_page'], $pagination['offset']);
		$this->data['start'] = $pagination['start'];
        $this->data['_view_'] = 'backend/careers/list_applied_careers_view';
        $this->load->view('_backend_', $this->data);
	}

    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['pro_status']=$this -> input -> post('feature');
	        if(empty($m['pro_status'])){
	            $m['pro_status']=0;
	        }
            $id = $this->Main_model->save($m,'td_careers');
			if(!empty($m['pro_status'])){
			 $this->session->set_flashdata("success","Careers Active successfully");
			redirect(site_url('auth/is_session/careers/list_careers/'));
			}else{
			   $this->session->set_flashdata('error', 'Careers Disable  successfully');
			   redirect(site_url('auth/is_session/careers/list_careers/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/careers/list_careers/'));
	    }
    }
    public function delete_careers($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_careers');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/careers/list_careers/");

    }

}