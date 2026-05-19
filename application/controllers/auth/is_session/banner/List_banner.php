<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_banner extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Banner-Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$pagination = $this->paginate(base_url() . 'auth/is_session/banner/list_banner/', $this->Get_paginated_model->get_paginated_banner_count(),10);
        $this->data['td_banner'] = $this->Get_paginated_model->get_banner_image($pagination['per_page'], $pagination['offset']);
         $this->data['start'] = $pagination['start'];
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/banner/list_banner_view';
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
            $id = $this->Main_model->save($m,'td_banner');
			if($id){				
			redirect(site_url('auth/is_session/banner/list_banner/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/banner/list_banner/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/banner/list_banner/'));
	    }
    }
    public function delete_banner($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_banner');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/banner/list_banner/");
    }

	public function sorting(){
		$position = $this->input->post('position');
		$table_name = 'td_banner';
		$this->Main_model->UpdateMenu($position,$table_name);
	}
}

