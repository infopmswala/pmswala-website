<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Product -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_product';
		$_like_name = 'title';
        $_url = 'auth/is_session/product/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_product'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/product/list_product_view';
        $this->load->view('_backend_', $this->data);
    }
    
    	public function product_category(){  
		$this->data = array(
			'title' => 'List Category -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'tbl_product_category';
		$_like_name = 'title';
        $_url = 'auth/is_session/product/product_category';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['tbl_product_category'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/product/list_category_view';
        $this->load->view('_backend_', $this->data);
    }
    
    function add(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
					'description' => $this->input->post("description"),
					'short_description' => $this->input->post("short_description"),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
				if(!empty($_FILES['image']['tmp_name'])){	
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/product/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/product/add/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/product/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_product");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/product/");
            }
        		$this->data = array(
        		'title' => 'Add Product - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("status" => "1");
        $this->data["tbl_product_category"] = $this->Main_model->get_data($where, "tbl_product_category");
            $this->data['_view_'] = 'backend/product/add_product_view';
            $this->load->view('_backend_', $this->data);
	}
	
	function add_category(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
					'short_description' => $this->input->post("short_description"),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
				if(!empty($_FILES['image']['tmp_name'])){	
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/product/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/product/add_category/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/product/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "tbl_product_category");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/product_category/");
            }
        		$this->data = array(
        		'title' => 'Add Category - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $this->data['_view_'] = 'backend/product/add_category_view';
            $this->load->view('_backend_', $this->data);
	}


    
    function edit(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_product= $this->Main_model->get_data($where, "tbl_product");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'title' => $this->security->xss_clean($this->input->post("title")),
					'short_description' => $this->input->post("short_description"),
					'description' => $this->input->post("description"),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				    if(!empty($_FILES['image']['tmp_name'])){
					if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$config1['upload_path'] = './uploads/product/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
						redirect(base_url() . "auth/is_session/product/edit_product");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_product = $this->Main_model->get_data($where, "tbl_product");
						$out = $this->upload->data();
						$data['image'] = './uploads/product/' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_product");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/product/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Product - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_product"] = $this->Main_model->get_data($where, "tbl_product");
        $where = array("status" => "1");
        $this->data["tbl_product_category"] = $this->Main_model->get_data($where, "tbl_product_category");
        $this->data['_view_'] = 'backend/product/edit_product_view';
        $this->load->view('_backend_', $this->data);
	}
	
	  function edit_category(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$tbl_product_category = $this->Main_model->get_data($where, "tbl_product_category");
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
					$config1['upload_path'] = './uploads/product/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
						redirect(base_url() . "auth/is_session/product/edit_product");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $tbl_product_category = $this->Main_model->get_data($where, "tbl_product_category");
						$out = $this->upload->data();
						$data['image'] = './uploads/product/' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "tbl_product_category");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/product/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Category - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["tbl_product_category"] = $this->Main_model->get_data($where, "tbl_product_category");
        $this->data['_view_'] = 'backend/product/edit_category_view';
        $this->load->view('_backend_', $this->data);
	}

    public function delete($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_product");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/product/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_product');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/product/");
    }
  public function delete_category($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "tbl_product_category");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/product/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('tbl_product_category');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/product/product_category");
    }

  
  
    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_product');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/product/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/product/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/product/'));
	    }
    }
    
      public function showpay_category(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'tbl_product_category');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/product/product_category'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/product/product_category'));
			}
	    }else{
	        redirect(site_url('auth/is_session/product/product_category'));
	    }
    }
  
}

