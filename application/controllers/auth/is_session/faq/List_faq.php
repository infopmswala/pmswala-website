<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_faq extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Faq - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $pagination = $this->paginate(base_url() . 'auth/is_session/faq/list_faq/', $this->Get_paginated_model->get_paginated_td_faqs_count(),10);
		$this->data['td_faqs'] = $this->Get_paginated_model->get_paginated_td_faqs($pagination['per_page'], $pagination['offset']);
		$this->data['start'] = $pagination['start'];
        $this->data['_view_'] = 'backend/faqs/list_faqs_view';
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
            $id = $this->Main_model->save($m,'td_faqs');
			if($id){
        			
			redirect(site_url('auth/is_session/faq/list_faq/'));
			
			}else{
			   redirect(site_url('auth/is_session/faq/list_faq/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/faq/list_faq/'));
	    }
    }
    public function delete_faq($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_faqs');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/faq/list_faq/");

    }

}