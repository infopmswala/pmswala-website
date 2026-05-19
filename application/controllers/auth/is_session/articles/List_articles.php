<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_articles extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Articles - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $pagination = $this->paginate(base_url() . 'auth/is_session/articles/list_articles/', $this->Get_paginated_model->get_paginated_td_articles_count(),10);
		$this->data['td_articles'] = $this->Get_paginated_model->get_paginated_td_articles($pagination['per_page'], $pagination['offset']);
		$this->data['start'] = $pagination['start'];
        $this->data['_view_'] = 'backend/articles/list_articles_view';
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
            $id = $this->Main_model->save($m,'td_articles');
			if($id){
        			
			redirect(site_url('auth/is_session/articles/list_articles/'));
			
			}else{
			   redirect(site_url('auth/is_session/articles/list_articles/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/articles/list_articles/'));
	    }
    }
    public function delete_articles($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_articles');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/articles/list_articles/");

    }

}