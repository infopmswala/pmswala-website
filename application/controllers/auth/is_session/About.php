<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Road Map -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_about';
		$_like_name = 'title';
        $_url = 'auth/is_session/about/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_about'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/about/list_about_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    
    function add(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
					'description' => $this->input->post("description"),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
			
                $this->Main_model->insert_data($data, "tbl_about");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/about/");
            }
        		$this->data = array(
        		'title' => 'Add About - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
           
            $this->data['_view_'] = 'backend/about/add_about_view';
            $this->load->view('_backend_', $this->data);
	}

    function edit(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_about= $this->Main_model->get_data($where, "tbl_about");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'title' => $this->security->xss_clean($this->input->post("title")),
					'description' => $this->input->post("description"),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
			
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_about");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/about/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Road Map - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_about"] = $this->Main_model->get_data($where, "tbl_about");
        $this->data['_view_'] = 'backend/about/edit_about_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_about");
        $this->db->where('id', $id);
        $this->db->delete('tbl_about');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/about/");
    }
 
  
  
    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_about');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/about/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/about/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/about/'));
	    }
    }
    
   
   	public function innerpage(){  
		$this->data = array(
			'title' => 'List Inner Page -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_about_innerpage';
		$_like_name = 'title';
        $_url = 'auth/is_session/about/innerpage';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_about_innerpage'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/about/list_innerpage_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    
    function add_innerpage(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
					'description' => $this->input->post("description"),
					'title1' => $this->security->xss_clean($this->input->post("title1")),
					'description1' => $this->input->post("description1"),
					'title2' => $this->security->xss_clean($this->input->post("title2")),
					'description2' => $this->input->post("description2"),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
			
                $this->Main_model->insert_data($data, "tbl_about_innerpage");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/about/innerpage");
            }
        		$this->data = array(
        		'title' => 'Add About - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
           
            $this->data['_view_'] = 'backend/about/add_innerpage_view';
            $this->load->view('_backend_', $this->data);
	}

    function edit_innerpage(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_about_innerpage= $this->Main_model->get_data($where, "tbl_about_innerpage");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'title' => $this->security->xss_clean($this->input->post("title")),
					'description' => $this->input->post("description"),
					'title1' => $this->security->xss_clean($this->input->post("title1")),
					'description1' => $this->input->post("description1"),
					'title2' => $this->security->xss_clean($this->input->post("title2")),
					'description2' => $this->input->post("description2"),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
			
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_about_innerpage");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/about/innerpage");
			}
		
		}
		$this->data = array(
			'title' => 'Edit About - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_about_innerpage"] = $this->Main_model->get_data($where, "tbl_about_innerpage");
        $this->data['_view_'] = 'backend/about/edit_innerpage_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete_innerpage($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_about_innerpage");
        $this->db->where('id', $id);
        $this->db->delete('tbl_about_innerpage');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/about/innerpage");
    }
 
  
  
  	public function plans(){  
		$this->data = array(
			'title' => 'List Plans -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_plans';
		$_like_name = 'title';
        $_url = 'auth/is_session/about/plans';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_plans'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/about/list_plans_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    function add_plans(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
					'description' => $this->input->post("description"),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
				if(!empty($_FILES['image']['tmp_name'])){	
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/pages/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/about/add_plans/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/pages/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_plans");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/about/plans");
            }
        		$this->data = array(
        		'title' => 'Add Plans - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("status" => "1");
        $this->data["tbl_plans"] = $this->Main_model->get_data($where, "tbl_plans");
            $this->data['_view_'] = 'backend/about/add_plans_view';
            $this->load->view('_backend_', $this->data);
	}
	

    
    function edit_plans(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_plans= $this->Main_model->get_data($where, "tbl_plans");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'title' => $this->security->xss_clean($this->input->post("title")),
					'description' => $this->input->post("description"),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				    if(!empty($_FILES['image']['tmp_name'])){
					if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$config1['upload_path'] = './uploads/pages/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
						redirect(base_url() . "auth/is_session/plans/edit_plans");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_plans = $this->Main_model->get_data($where, "tbl_plans");
						$out = $this->upload->data();
						$data['image'] = './uploads/pages/' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_plans");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/about/plans/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Plans - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_plans"] = $this->Main_model->get_data($where, "tbl_plans");
          $this->data['_view_'] = 'backend/about/edit_plans_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete_plans($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_plans");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/pages/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_plans');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/about/plans");
    }
 
  
  
    public function showpay_plans(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_plans');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/about/plans'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/about/plans'));
			}
	    }else{
	        redirect(site_url('auth/is_session/about/plans'));
	    }
    }
  
  
  
  
}

