<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_social extends My_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('Get_paginated_model');
	}
	
	public function index()
	{  
		$this->data = array(
			'title' => 'List Social - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $pagination = $this->paginate(base_url() . 'auth/is_session/social_settings/list_social/', $this->Get_paginated_model->get_paginated_td_social_count(),10);
		$this->data['td_social'] = $this->Get_paginated_model->get_paginated_td_social($pagination['per_page'], $pagination['offset']);
        $this->data['start'] = $pagination['start'];
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/social_media/list_social_view';
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
            $id = $this->Main_model->save($m,'td_social');
			if($id){
			redirect(site_url('auth/is_session/social_settings/list_social/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/social_settings/list_social/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/social_settings/list_social/'));
	    }
    }
    public function delete_social($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_social');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/social_settings/list_social/");
    }


	public function sorting(){
		$position = $this->input->post('position');
		$table_name = 'td_social';
		$this->Main_model->UpdateMenu($position,$table_name);
	}
}
