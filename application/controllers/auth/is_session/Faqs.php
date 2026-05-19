<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faqs extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function add_faq($module_id){  
		if($_POST){
			if($_POST["submit"] == "td_faqs"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"question" => $this->security->xss_clean($this->input->post("question")),
					"answer"  => $this->security->xss_clean($this->input->post("answer")),
					"portfolio_id"  => $this->security->xss_clean($this->input->post("menu_id")) ?? '',
					"module_id"  => $module_id,
					"meta_title"  => $this->security->xss_clean($this->input->post("meta_title")),
                    "meta_keywords"  => $this->security->xss_clean($this->input->post("meta_keywords")),
                    "meta_description"  => $this->security->xss_clean($this->input->post("meta_description")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if(!empty($_FILES['faq_image']['tmp_name'])){
				if (is_uploaded_file($_FILES['faq_image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/faq/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = "*";
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('faq_image', FALSE) && is_uploaded_file($_FILES['faq_image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/faqs/add_faq/'.$module_id.'/');
                    } else {
                        $out = $this->upload->data();
                        $data['faq_image'] = 'uploads/faq/' . $out['orig_name'];
                    }
                }
				}
				$this->Main_model->insert_data($data, "td_faqs");
                $this->session->set_flashdata("success", "Data added successfully");
                if(!empty($_GET['portfolio_id'])){
                redirect(base_url() . "auth/is_session/faqs/faqs_list/".$module_id.'/?portfolio_id='.$_GET['portfolio_id']);
                }else{
                 redirect(base_url() . "auth/is_session/faqs/faqs_list/".$module_id.'/');
                }
			}
		}
		$this->data = array(
			'title' => 'Add faq - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/faqs/add_faqs_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function faqs_list($module_id){
	    $this->data = array(
			'title' => 'FAQS Modules -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $get_id = $_GET['portfolio_id'] ?? '';
		$id = encrypt_decrypt($get_id, 'decrypt');
	    $_table_name = 'td_faqs';
		$_like_name = 'question';
		if(!empty($_GET['portfolio_id'])){
		  $where = $module_id;
		  $sub = $id;
		 $_url = 'auth/is_session/faqs/faqs_list/'.$module_id.'/?portfolio_id='.$_GET['portfolio_id'];  
		 $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,$where,$sub),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,$where,$sub);
		}else{
		  $where = $module_id;
		 $_url = 'auth/is_session/faqs/faqs_list/'.$module_id.'/';   
		 $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,$where),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,$where);
		}
        
		
        
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/faqs/list_faqs_view';
        $this->load->view('_backend_', $this->data);
	    
	}
	
	public function edit_faq($module_id){
	    $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		
        if($_POST){
            if($_POST["update"] == "td_faqs"){   
			$data = array(
                "question" => $this->security->xss_clean($this->input->post("question")),
                "answer"  => $this->input->post("answer"),
                "meta_title"  => $this->security->xss_clean($this->input->post("meta_title")),
                "meta_keywords"  => $this->security->xss_clean($this->input->post("meta_keywords")),
                "meta_description"  => $this->security->xss_clean($this->input->post("meta_description")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
        
        if(!empty($_FILES['faq_image']['tmp_name'])){
            if (is_uploaded_file($_FILES['faq_image']['tmp_name'])) {
				$config1['upload_path'] = './uploads/faq/';
				$config1['allowed_types'] = '*';
				$config1['max_size'] = '*';
				$config1['overwrite'] = false;
				$config1['file_name'] = rand() . '_' . time();
				$this->load->library('upload', $config1);
				$this->upload->initialize($config1);
				if (!$this->upload->do_upload('faq_image', FALSE) && is_uploaded_file($_FILES['faq_image']['tmp_name'])) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata("error", '<p style="color:red">faq ' . $error['error'] . ' for Logo</p>');
					redirect(base_url() . "auth/is_session/faq/edit_faq/'.$module_id.'/'.'.?jwt_token=".$get_id);
				  } else {
					$out = $this->upload->data();
					$data['faq_image'] = './uploads/faq/' . $out['orig_name'];
				}
		}}else{
			    $data['faq_image'] = '';
		}
            $where = array("id" => $this->input->post("update_id"));
			$this->Main_model->update_data($where, $data, "td_faqs");
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . 'auth/is_session/faqs/faqs_list/'.$module_id.'/');
			}
        }
            $this->data = array(
                'title' => 'Edit faqs -Dashboard',
                'heading' => 'My Heading',
                'message' => 'My Message'
            );
            $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("id" => $id);
            $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs");
            $where = array("status" => "1","module_id"=>$module_id);
    		$row_array = array('row_array');
            $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
             $this->data['_view_'] = 'backend/faqs/edit_faqs_view';
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
            $id = $this->Main_model->save($m,'td_faqs');
			if($id){
            $this->session->set_flashdata("success", "Status updated successfully");				
			redirect($_SERVER['HTTP_REFERER']);
			}else{
			    $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
    }
    
    public function delete_faq($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_faqs');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);

    }
}

