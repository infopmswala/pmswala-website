<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Var_section extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){  
		$this->data = array(
			'title' => 'List Var Section -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'td_section';
		$_like_name = 'title';
        $_url = 'auth/is_session/var_section/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data['td_information'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/var/list_var_view';
        $this->load->view('_backend_', $this->data);
    }
    
    function add(){
        if ($_POST) {
            if ($_POST["submit"] == "add_information") {
				$data = array(
					'title' => $this->security->xss_clean($this->input->post("title")),
					'slug' => $this->security->xss_clean(get_url($this->input->post("title"))),
					'description' => $this->input->post("description"),
					'sub_title' => $this->security->xss_clean($this->input->post("sub_title")),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
				if(!empty($_FILES['image']['tmp_name'])){	
				if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/blog/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/var_section/add/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/blog/' . $out['orig_name'];
                    }
                }}
				
                $this->Main_model->insert_data($data, "td_section");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/var_section/");
            }
        		$this->data = array(
        		'title' => 'Add Section - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		$where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $this->data['_view_'] = 'backend/var/add_var_view';
            $this->load->view('_backend_', $this->data);
	}

    
    function edit(){
       	$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_information = $this->Main_model->get_data($where, "td_section");
		if($_POST){
		if($_POST["update"] == "add_information"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
                    'title' => $this->security->xss_clean($this->input->post("title")),
					'description' => $this->input->post("description"),
					'description1' => $this->input->post("description1"),
					'description2' => $this->input->post("description2"),
					'sub_title' => $this->security->xss_clean($this->input->post("sub_title")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				    if(!empty($_FILES['image']['tmp_name'])){
					if (is_uploaded_file($_FILES['image']['tmp_name'])) {
					$config1['upload_path'] = './uploads/blog/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
						redirect(base_url() . "auth/is_session/blog/edit_blog");
					} else {
						$where = array("id" => $this->uri->segment(6));
						 $td_blog = $this->Main_model->get_data($where, "td_section");
						$out = $this->upload->data();
						$data['image'] = './uploads/blog/' . $out['orig_name'];
					}
				}}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_section");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/var_section/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit Section - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["td_information"] = $this->Main_model->get_data($where, "td_section");
        $this->data['_view_'] = 'backend/var/edit_var_view';
        $this->load->view('_backend_', $this->data);
	}

    public function delete($id) {
        $where = array("id" => $id);
        $td_news = $this->Main_model->get_data($where, "td_section");
		$get_image = explode("/",$td_news[0]->image);
		$filePath = $get_image[2];
		unlink("uploads/blog/".$filePath);
        $this->db->where('id', $id);
        $this->db->delete('td_section');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/var_section/");
    }

    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_section');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/var_section/'));
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/var_section/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/var_section/'));
	    }
    }

	function update_content(){
		if($_POST){
			if($_POST["update"] == "update_content"){
					$date = str_replace("/", "-", $this->input->post("date"));
					$date = date("Y-m-d", strtotime($date));
					$data = array(
						'description' => $this->input->post("description"),
						"created_at" => date("y-m-d H:i:s"),
						"created_by" => $this->session->userdata("id"),
					);
					$where = array("id" => 1);
					$this->Main_model->update_data($where, $data, "td_update_content");
					$this->session->set_flashdata("success", "Data updated successfully");
					redirect(base_url() . "auth/is_session/var_section/update_content/");
				}
			
			}
			$this->data = array(
				'title' => 'Edit Section - Dashboard',
				'heading' => 'My Heading',
				'message' => 'My Message'
			);
			$where = array("status" => "1");
			$this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
			$where = array("id" => 1);
			$this->data["td_update_content"] = $this->Main_model->get_data($where, "td_update_content");
			$this->data['_view_'] = 'backend/var/update_content_view';
			$this->load->view('_backend_', $this->data);
	}
}

