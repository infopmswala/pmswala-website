<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invest extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Invest -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_invest';
		$_like_name = 'title';
        $_url = 'auth/is_session/invest/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_invest'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/invest/list_invest_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    
    function add(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
					'icon' => $this->input->post("icon"),
					'short_description' => $this->input->post("short_description"),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
				if(!empty($_FILES['image']['tmp_name'])){	
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/invest/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/invest/add/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/invest/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_invest");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/invest/");
            }
        		$this->data = array(
        		'title' => 'Add Invest - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
           
            $this->data['_view_'] = 'backend/invest/add_invest_view';
            $this->load->view('_backend_', $this->data);
	}

    function edit(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_invest= $this->Main_model->get_data($where, "tbl_invest");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'title' => $this->security->xss_clean($this->input->post("title")),
					'short_description' => $this->input->post("short_description"),
					'icon' => $this->input->post("icon"),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				    if(!empty($_FILES['image']['tmp_name'])){
					if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$config1['upload_path'] = './uploads/invest/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
						redirect(base_url() . "auth/is_session/invest/edit");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_invest = $this->Main_model->get_data($where, "tbl_invest");
						$out = $this->upload->data();
						$data['image'] = './uploads/invest/' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_invest");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/invest/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Invest - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_invest"] = $this->Main_model->get_data($where, "tbl_invest");
        $this->data['_view_'] = 'backend/invest/edit_invest_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_invest");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/invest/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_invest');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/invest/");
    }
 
  
  
    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_invest');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/invest/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/invest/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/invest/'));
	    }
    }
    
   
   
   
   	public function investment(){  
		$this->data = array(
			'title' => 'List Investment Option -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_investment';
		$_like_name = 'title';
        $_url = 'auth/is_session/invest/investment';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_investment'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/invest/list_investment_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    
    function add_investment(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
					'short_description' => $this->input->post("short_description"),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
				if(!empty($_FILES['image']['tmp_name'])){	
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/invest/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/invest/add_investment/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/invest/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_investment");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/invest/investment");
            }
        		$this->data = array(
        		'title' => 'Add Investment - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
           
            $this->data['_view_'] = 'backend/invest/add_investment_view';
            $this->load->view('_backend_', $this->data);
	}

    function edit_investment(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_investment= $this->Main_model->get_data($where, "tbl_investment");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'title' => $this->security->xss_clean($this->input->post("title")),
					'short_description' => $this->input->post("short_description"),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				    if(!empty($_FILES['image']['tmp_name'])){
					if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$config1['upload_path'] = './uploads/invest/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
						redirect(base_url() . "auth/is_session/invest/edit_investment");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_investment = $this->Main_model->get_data($where, "tbl_investment");
						$out = $this->upload->data();
						$data['image'] = './uploads/invest/' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_investment");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/invest/investment");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Investment - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_investment"] = $this->Main_model->get_data($where, "tbl_investment");
        $this->data['_view_'] = 'backend/invest/edit_investment_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete_investment($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_investment");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/invest/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_investment');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/invest/investment");
    }
 
  
  
    public function showpay_investment(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_investment');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/invest/investment'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/invest/investment'));
			}
	    }else{
	        redirect(site_url('auth/is_session/invest/investment'));
	    }
    }
  
  
  public function companies(){  
		$this->data = array(
			'title' => 'List Companies  -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_companies';
		$_like_name = 'title';
        $_url = 'auth/is_session/invest/companies';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_companies'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/invest/list_companies_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    
    function add_companies(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
				if(!empty($_FILES['image']['tmp_name'])){	
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/invest/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/invest/add_companies/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/invest/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_companies");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/invest/companies");
            }
        		$this->data = array(
        		'title' => 'Add Investment - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
           
            $this->data['_view_'] = 'backend/invest/add_companies_view';
            $this->load->view('_backend_', $this->data);
	}

    function edit_companies(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_companies= $this->Main_model->get_data($where, "tbl_companies");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'title' => $this->security->xss_clean($this->input->post("title")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				    if(!empty($_FILES['image']['tmp_name'])){
					if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$config1['upload_path'] = './uploads/invest/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
						redirect(base_url() . "auth/is_session/invest/edit_companies");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_companies = $this->Main_model->get_data($where, "tbl_companies");
						$out = $this->upload->data();
						$data['image'] = './uploads/invest/' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_companies");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/invest/companies");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Companies - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_companies"] = $this->Main_model->get_data($where, "tbl_companies");
        $this->data['_view_'] = 'backend/invest/edit_companies_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete_companies($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_companies");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/invest/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_companies');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/invest/companies");
    }
 
  
  
    public function showpay_companies(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_companies');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/invest/companies'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/invest/companies'));
			}
	    }else{
	        redirect(site_url('auth/is_session/invest/companies'));
	    }
    }
}

