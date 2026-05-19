<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_job extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Job - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $pagination = $this->paginate(base_url() . 'auth/is_session/job/list_job/', $this->Get_paginated_model->get_paginated_td_job_count(),10);
		$this->data['td_job'] = $this->Get_paginated_model->get_paginated_td_job($pagination['per_page'], $pagination['offset']);
		$this->data['start'] = $pagination['start'];
        $this->data['_view_'] = 'backend/job/list_job_view';
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
            $id = $this->Main_model->save($m,'td_job');
			if($id){
        			
			redirect(site_url('auth/is_session/job/list_job/'));
			
			}else{
			   redirect(site_url('auth/is_session/job/list_job/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/job/list_job/'));
	    }
    }
    public function delete_job($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_job');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/job/list_job/");

    }

}