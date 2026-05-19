<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Pages -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_why_pmswala';
		$_like_name = 'title';
        $_url = 'auth/is_session/pages/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_why_pmswala'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/pages/list_whypmswala_view';
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
                        redirect(base_url() . 'auth/is_session/pages/add/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/pages/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_why_pmswala");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/pages/");
            }
        		$this->data = array(
        		'title' => 'Add Why pmswala - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("status" => "1");
        $this->data["tbl_why_pmswala"] = $this->Main_model->get_data($where, "tbl_why_pmswala");
            $this->data['_view_'] = 'backend/pages/add_whypmswala_view';
            $this->load->view('_backend_', $this->data);
	}
	

    
    function edit(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_why_pmswala= $this->Main_model->get_data($where, "tbl_why_pmswala");
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
						redirect(base_url() . "auth/is_session/pages/edit");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_why_pmswala = $this->Main_model->get_data($where, "tbl_why_pmswala");
						$out = $this->upload->data();
						$data['image'] = './uploads/pages/' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_why_pmswala");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/pages/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Why Pmawala - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_why_pmswala"] = $this->Main_model->get_data($where, "tbl_why_pmswala");
          $this->data['_view_'] = 'backend/pages/edit_whypmswala_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_why_pmswala");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/pages/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_why_pmswala');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/pages/");
    }
 
  
  
    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_why_pmswala');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/pages/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/pages/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/pages/'));
	    }
    }
    
   
   
   
   
   	public function journey(){  
		$this->data = array(
			'title' => 'List Journey -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_journey';
		$_like_name = 'title';
        $_url = 'auth/is_session/pages/journey';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_journey'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/pages/list_journey_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    function add_journey(){
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
                        redirect(base_url() . 'auth/is_session/pages/add_journey/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/pages/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_journey");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/pages/journey");
            }
        		$this->data = array(
        		'title' => 'Add Journey - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("status" => "1");
        $this->data["tbl_journey"] = $this->Main_model->get_data($where, "tbl_journey");
            $this->data['_view_'] = 'backend/pages/add_journey_view';
            $this->load->view('_backend_', $this->data);
	}
	

    
    function edit_journey(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_journey= $this->Main_model->get_data($where, "tbl_journey");
       	// print_r($tbl_journey);die;
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
						redirect(base_url() . "auth/is_session/pages/edit_journey");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_journey = $this->Main_model->get_data($where, "tbl_journey");
						$out = $this->upload->data();
						$data['image'] = './uploads/pages/journey' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_journey");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/pages/journey");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Journey - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_journey"] = $this->Main_model->get_data($where, "tbl_journey");
          $this->data['_view_'] = 'backend/pages/edit_journey_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete_journey($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_journey");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/pages/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_journey');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/pages/journey");
    }
 
  
  
    public function showpay_journey(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_journey');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/pages/journey'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/pages/journey'));
			}
	    }else{
	        redirect(site_url('auth/is_session/pages/journey'));
	    }
    }
    
   
   
   
   
   
   
   	public function certificate(){  
		$this->data = array(
			'title' => 'List Certificate -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_certificate';
		$_like_name = 'title';
        $_url = 'auth/is_session/pages/certificate';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_certificate'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/pages/list_certificate_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    function add_certificate(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
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
                        redirect(base_url() . 'auth/is_session/pages/add_certificate/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/pages/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_certificate");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/pages/certificate");
            }
        		$this->data = array(
        		'title' => 'Add Certificate - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("status" => "1");
        $this->data["tbl_certificate"] = $this->Main_model->get_data($where, "tbl_certificate");
            $this->data['_view_'] = 'backend/pages/add_certificate_view';
            $this->load->view('_backend_', $this->data);
	}
	

    
    function edit_certificate(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_certificate= $this->Main_model->get_data($where, "tbl_certificate");
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
						redirect(base_url() . "auth/is_session/pages/edit_certificate");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_certificate = $this->Main_model->get_data($where, "tbl_certificate");
						$out = $this->upload->data();
						$data['image'] = './uploads/pages/certificate' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_certificate");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/pages/certificate");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Certificate - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_certificate"] = $this->Main_model->get_data($where, "tbl_certificate");
          $this->data['_view_'] = 'backend/pages/edit_certificate_view';
        $this->load->view('_backend_', $this->data);
	}
	
	 

    public function delete_certificate($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_certificate");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/pages/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_certificate');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/pages/certificate");
    }
 
  
  
    public function showpay_certificate(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_certificate');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/pages/certificate'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/pages/certificate'));
			}
	    }else{
	        redirect(site_url('auth/is_session/pages/certificate'));
	    }
    }
    
   
   
}

