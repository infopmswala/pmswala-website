<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class List_seo extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List SEO -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $pagination = $this->paginate(base_url() . 'auth/is_session/seo/list_seo/', $this->Get_paginated_model->get_paginated_seo_count(),10);
        $this->data['td_seo'] = $this->Get_paginated_model->get_paginated_seo($pagination['per_page'], $pagination['offset']);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/seo/list_seo_view';
        $this->load->view('_backend_', $this->data);
    }
    public function delete_seo($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_seo');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/seo/list_seo/");
    }

    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_seo');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/seo/list_seo/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/seo/list_seo/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/seo/list_seo/'));
	    }
    }
}

