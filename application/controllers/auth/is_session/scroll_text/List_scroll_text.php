<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_scroll_text extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Scroll Text -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $pagination = $this->paginate(base_url() . 'auth/is_session/scroll_text/list_scroll_text/', $this->Get_paginated_model->get_paginated_scroll_text_count(),10);
        $this->data['td_scroll_text'] = $this->Get_paginated_model->get_paginated_scroll_text($pagination['per_page'], $pagination['offset']);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/scroll_text/list_scroll_text_view';
        $this->load->view('_backend_', $this->data);
    }
    public function delete_scroll_text($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_scroll_text');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/scroll_text/list_scroll_text/");
    }

	public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
			$m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_scroll_text');
			if(!empty($m['status'])){
			 $this->session->set_flashdata("success","Scroll Text Add  successfully");
			redirect(site_url('auth/is_session/scroll_text/list_scroll_text/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Scroll Text Disable  successfully');
			   redirect(site_url('auth/is_session/scroll_text/list_scroll_text/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/scroll_text/list_scroll_text/'));
	    }
    }
}

