<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends My_Controller {
    public function __construct() {
        parent::__construct();
    }
    function blog_add($module_id){
        if($_POST){
			if($_POST["submit"] == "add_blog"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
                $where = array("category_id" => $this->input->post("category"));
                $td_category = $this->Main_model->get_data($where, "td_category");
                if($this->input->post("sub_category") != '-'){
                $where = array("sub_category_id" => $this->input->post("sub_category"));
                $td_sub_category = $this->Main_model->get_data($where, "td_sub_category");
                }
				$data = array(
                    "category_id" => $td_category[0]->category_id ?? '',
					"category" => $td_category[0]->category ?? '',
					"category_slug" => $td_category[0]->category_slug ?? '',
				    "sub_category_id" => (!empty($td_sub_category[0]->sub_category_id)) ? $td_sub_category[0]->sub_category_id : '-' ?? '',
					 "sub_category" => (!empty($td_sub_category[0]->sub_category)) ? $td_sub_category[0]->sub_category : '-' ?? '',
					"sub_category_slug" => (!empty($td_sub_category[0]->sub_category_slug)) ? $td_sub_category[0]->sub_category_slug : '-' ?? '',
                    "module_id" => $module_id,
                    "title" => $this->security->xss_clean($this->input->post("title")),
                    'slug' => $this->security->xss_clean(create_slug($this->input->post('slug'))),
                    "description" => $this->input->post("description"),
                    "short_description" => $this->input->post("short_description"),
                    "meta_title" => $this->security->xss_clean($this->input->post("meta_title")),
                    "meta_tag_description" => $this->security->xss_clean($this->input->post("meta_tag_description")),
                    "meta_tag_keywords" => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
               
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
                        redirect(base_url() . 'auth/is_session/blog/add_blog/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/blog/' . $out['orig_name'];
                    }
                }
				$this->Main_model->insert_data($data, "td_blog");
                $this->session->set_flashdata("success", "Blog added successfully");
                redirect(base_url() . "auth/is_session/blog/blog_list/".$module_id.'/');
			}
		}
        $this->data = array(
			'title' => 'Add Blog - Admin',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
        
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","pro_status" => "1");
        $this->data["td_category"] = $this->Main_model->get_data($where, "td_category");
        $where = array("status" => "1","pro_status" => "1");
        $this->data["td_sub_category"] = $this->Main_model->get_data($where, "td_sub_category");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/blog/add_blog_view';
        $this->load->view('_backend_', $this->data);
    }
    public function blog_list($module_id) {
        $this->data = array('title' => 'List Blog | Admin');
        $_table_name = 'td_blog';
		$_like_name = 'title';
        $_url = 'auth/is_session/blog/blog_list/'.$module_id;
        $where = $module_id;
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,$where),10);
		$this->data['td_blog'] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,$where);
        $this->data['start'] = $pagination['start'];
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/blog/list_blog_view';
        $this->load->view('_backend_', $this->data);
    }
    public function edit_blog($module_id){
        if(!empty($module_id)){
          $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_blog = $this->Main_model->get_data($where, "td_blog");
		        
		if($_POST){
		if($_POST["update"] == "blog"){
			
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"category_id" => $td_category[0]->category_id ?? '',
					"category" => $td_category[0]->category ?? '',
					"category_slug" => $td_category[0]->category_slug ?? '',
                     "sub_category_id" => (!empty($td_sub_category[0]->sub_category_id)) ? $td_sub_category[0]->sub_category_id : '-' ?? '',
					 "sub_category" => (!empty($td_sub_category[0]->sub_category)) ? $td_sub_category[0]->sub_category : '-' ?? '',
					"sub_category_slug" => (!empty($td_sub_category[0]->sub_category_slug)) ? $td_sub_category[0]->sub_category_slug : '-' ?? '',
                    "title" => $this->input->post("title"),
                     "short_description" => $this->input->post("short_description"),
                    "module_id" => $module_id,
                     'slug' => $this->security->xss_clean(create_slug($this->input->post('slug'))),
                    "description" => $this->input->post("description"),
                    "meta_title" => $this->security->xss_clean($this->input->post("meta_title")),
                    "meta_tag_description" => $this->security->xss_clean($this->input->post("meta_tag_description")),
                    "meta_tag_keywords" => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
                    "published_date" => $this->security->xss_clean($this->input->post("published_date")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				
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
						 $td_blog = $this->Main_model->get_data($where, "td_blog");
						$out = $this->upload->data();
						$data['image'] = './uploads/blog/' . $out['orig_name'];
					}
				}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_blog");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/blog/blog_list/".$module_id.'/');
			}
		
		}
		$this->data = array(
			'title' => 'Edit blog - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
		$where = array("status" => "1","pro_status" => "1");
        $this->data["td_category"] = $this->Main_model->get_data($where, "td_category");
        $where = array("status" => "1","pro_status" => "1");
        $this->data["td_sub_category"] = $this->Main_model->get_data($where, "td_sub_category");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $where = array("id" => $id);
		$row_array = array('row_array');
        $this->data["td_blog"] = $this->Main_model->get_data($where, "td_blog",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/blog/edit_blog_view';
        $this->load->view('_backend_', $this->data);  
        }else{
            
        }
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
			redirect($_SERVER['HTTP_REFERER']);
			
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
    }

    public function delete_blog($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_blog');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);
    }

    
}

