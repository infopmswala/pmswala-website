<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_blog extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_blog = $this->Main_model->get_data($where, "td_blog");
		if($_POST){
		if($_POST["update"] == "blog"){
		   
			$where = array("category_id" => $this->input->post("category"));
			$td_category = $this->Main_model->get_data($where, "td_category");
			if($_POST['sub_category'] != '-'){
			$where = array("sub_category_id" => $this->input->post("sub_category"));
			$td_sub_category = $this->Main_model->get_data($where, "td_sub_category");
			}
			
			
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"category_id" => $td_category[0]->category_id,
					"category" => $td_category[0]->category,
					"category_slug" => $td_category[0]->category_slug,
                     "sub_category_id" => (!empty($td_sub_category[0]->sub_category_id)) ? $td_sub_category[0]->sub_category_id : '-',
					 "sub_category" => (!empty($td_sub_category[0]->sub_category)) ? $td_sub_category[0]->sub_category : '-',
					"sub_category_slug" => (!empty($td_sub_category[0]->sub_category_slug)) ? $td_sub_category[0]->sub_category_slug : '-',
                    "title" => $this->input->post("title"),
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
                redirect(base_url() . "auth/is_session/blog/list_blog/");
			}
		
		}
		$this->data = array(
			'title' => 'Edit blog - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["td_blog"] = $this->Main_model->get_data($where, "td_blog");
		$where = array("status" => "1","pro_status" => "1");
        $this->data["td_category"] = $this->Main_model->get_data($where, "td_category");
        $where = array("status" => "1","pro_status" => "1");
        $this->data["td_sub_category"] = $this->Main_model->get_data($where, "td_sub_category");
        $this->data['_view_'] = 'backend/blog/edit_blog_view';
        $this->load->view('_backend_', $this->data);
	}



}