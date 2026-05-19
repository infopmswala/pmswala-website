<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_price_list extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Price List -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $pagination = $this->paginate(base_url() . 'auth/is_session/pricelist/list_price_list/', $this->Get_paginated_model->get_paginated_td_price_list_count(),10);
        $this->data['td_price_list'] = $this->Get_paginated_model->get_paginated_td_price_list($pagination['per_page'], $pagination['offset']);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/pricelist/list_price_list_view';
        $this->load->view('_backend_', $this->data);
    }
    public function delete_price_list($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_price_list');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/pricelist/list_price_list/");
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
			if(!empty($m['status'])){
			 $this->session->set_flashdata("success","Price List Add  successfully");
			redirect(site_url('auth/is_session/pricelist/list_price_list/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Price List Disable  successfully');
			   redirect(site_url('auth/is_session/pricelist/list_price_list/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/pricelist/list_price_list/'));
	    }
    }
}

