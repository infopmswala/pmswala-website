<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class List_blog extends My_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->data = array('title' => 'List Blog | Admin');
        $_table_name = 'td_blog';
		$_like_name = 'title';
        $_url = 'auth/is_session/blog/list_blog/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['td_blog'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/blog/list_blog_view';
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
            $id = $this->Main_model->save($m,'td_blog');
			if($id){				
			redirect(site_url('auth/is_session/blog/list_blog/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/blog/list_blog/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/blog/list_blog/'));
	    }
    }

    public function delete_blog($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_blog');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/blog/list_blog/");
    }

    
}

