<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_category extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Category-Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $pagination = $this->paginate(base_url() . 'auth/is_session/category/list_category/', $this->Get_paginated_model->get_paginated_category_count(),10);
        $this->data['td_category'] = $this->Get_paginated_model->get_paginated_category($pagination['per_page'], $pagination['offset']);
         $this->data['start'] = $pagination['start'];
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/category/list_category_view';
        $this->load->view('_backend_', $this->data);
	}

    public function delete_category($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_category');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/category/list_category/");
    }

    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['pro_status']=$this -> input -> post('feature');
	        if(empty($m['pro_status'])){
	            $m['pro_status']=0;
	        }
            $id = $this->Main_model->save($m,'td_category');
			if($id){
			
			redirect(site_url('auth/is_session/category/list_category/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/category/list_category/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/category/list_category/'));
	    }
    }
    
    
    public function category_showpay(){
	    $this->form_validation->set_rules('category_id','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('category_id');
	        $m['top_category']=$this -> input -> post('feature_id');
	        if(empty($m['top_category'])){
	            $m['top_category']=0;
	        }
            $id = $this->Main_model->save($m,'td_category');
			if(!empty($m['top_category'])){
			 $this->session->set_flashdata("success","Top Categories Add  successfully");
			redirect(site_url('auth/is_session/category/list_category/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Top Categories Disable  successfully');
			   redirect(site_url('auth/is_session/category/list_category/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/category/list_category/'));
	    }
    }

	public function menu_showpay(){
	    $this->form_validation->set_rules('show_menu','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('show_menu');
	        $m['show_menu']=$this -> input -> post('feature_id');
	        if(empty($m['show_menu'])){
	            $m['show_menu']=0;
	        }
            $id = $this->Main_model->save($m,'td_category');
			if(!empty($m['show_menu'])){
			 $this->session->set_flashdata("success","Show Menu Active Successfully");
			redirect(site_url('auth/is_session/category/list_category/'));
			}else{
			   $this->session->set_flashdata('error', 'Show Menu Disable  Successfully');
			   redirect(site_url('auth/is_session/category/list_category/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/category/list_category/'));
	    }
    }
}



