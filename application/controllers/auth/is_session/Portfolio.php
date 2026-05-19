<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Portfolio extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function edit($module_id){
		$get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" => $id);
		$td_portfolio = $this->Main_model->get_data($where, "td_portfolio");
		if($_POST){
			if($_POST["update"] == "portfolio_edit"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"title_1" => $this->security->xss_clean($this->input->post("title_1")),
					"title_2" => $this->security->xss_clean($this->input->post("title_2")),
					"investment" => $this->security->xss_clean($this->input->post("investment")),
					"no_of_days" => $this->security->xss_clean($this->input->post("no_of_days")),
					"interest" => $this->security->xss_clean($this->input->post("interest")),
					"monthly_interest" => $this->security->xss_clean($this->input->post("monthly_interest")),
					"retune_value" => $this->security->xss_clean($this->input->post("retune_value")),
					"min_value" => $this->security->xss_clean($this->input->post("min_value")),
					"max_value" => $this->security->xss_clean($this->input->post("max_value")),
					"payout_year" => $this->security->xss_clean($this->input->post("payout_year")),
					"period" => $this->security->xss_clean($this->input->post("period")),
					"payout" => $this->security->xss_clean($this->input->post("payout")),
					"heading" => $this->security->xss_clean($this->input->post("heading")),
					"updated_at" => date("y-m-d H:i:s"),
					"updated_by" => $this->session->userdata("id"),
				);
				if (is_uploaded_file($_FILES['portfolio_image']['tmp_name'])) {
					$config1['upload_path'] = './uploads/portfolio/';
					$config1['allowed_types'] = '*';
					$config1['max_size'] = '*';
					$config1['overwrite'] = false;
					$config1['file_name'] = rand() . '_' . time();
					$this->load->library('upload', $config1);
					$this->upload->initialize($config1);
					if (!$this->upload->do_upload('portfolio_image', FALSE) && is_uploaded_file($_FILES['portfolio_image']['tmp_name'])) {
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata("error", '<p style="color:red">Course ' . $error['error'] . ' for Logo</p>');
						redirect(base_url() . "auth/is_session/portfolio/portfolio_list/edit".$get_id);
					} else {
						$out = $this->upload->data();
						$data['portfolio_image'] = './uploads/portfolio/' . $out['orig_name'];
					}
				}
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_portfolio");
                $this->session->set_flashdata("success", "Data updated successfully");
                redirect(base_url() . "auth/is_session/portfolio/portfolio_list/".$module_id.'/');
			}
		}
		$this->data = array(
			'title' => 'Edit Portfolio - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("id" => $id);
		$row_array = array('row_array');
        $this->data["td_portfolio"] = $this->Main_model->get_data($where, "td_portfolio",null,null,null,null,null,$row_array);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/portfolio/edit_portfolio_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function portfolio_add($module_id){
	    if($_POST){
			if($_POST["submit"] == "portfolio_add"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"title_1" => $this->security->xss_clean($this->input->post("title_1")),
					"title_2" => $this->security->xss_clean($this->input->post("title_2")),
					"investment" => $this->security->xss_clean($this->input->post("investment")),
					"period" => $this->security->xss_clean($this->input->post("period")),
					"payout" => $this->security->xss_clean($this->input->post("payout")),
					"interest" => $this->security->xss_clean($this->input->post("interest")),
					"monthly_interest" => $this->security->xss_clean($this->input->post("monthly_interest")),
					"retune_value" => $this->security->xss_clean($this->input->post("retune_value")),
					"min_value" => $this->security->xss_clean($this->input->post("min_value")),
					"payout_year" => $this->security->xss_clean($this->input->post("payout_year")),
					"max_value" => $this->security->xss_clean($this->input->post("max_value")),
					"slug" => $this->security->xss_clean(create_slug($this->input->post("title_1"))),
					"no_of_days" => $this->security->xss_clean($this->input->post("no_of_days")),
					"heading" => $this->security->xss_clean($this->input->post("heading")),
					"module_id" => $this->security->xss_clean($module_id),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				if (is_uploaded_file($_FILES['portfolio_image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/portfolio/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = "*";
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('portfolio_image', FALSE) && is_uploaded_file($_FILES['portfolio_image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/portfolio/portfolio_list/'.$module_id.'/');
                    } else {
                        $out = $this->upload->data();
                        $data['portfolio_image'] = 'uploads/portfolio/' . $out['orig_name'];
                    }
                }
				$this->Main_model->insert_data($data, "td_portfolio");
				$data_n = array(
				    "title" => $this->security->xss_clean($this->input->post("title_1")),
					"message" => $this->security->xss_clean($this->input->post("title_2")),
						"created_at" => date("y-m-d H:i:s"),
				    );
				$this->Main_model->insert_data($data_n, "td_notifications");
			   $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/portfolio/portfolio_list/".$module_id.'/');
			   }
		}
		$this->data = array(
			'title' => 'Add Portfolio - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/portfolio/add_portfolio_view';
        $this->load->view('_backend_', $this->data);
		
	}
	public function portfolio_list($module_id){
		  
		$this->data = array(
			'title' => 'Portfolio -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$_table_name = 'td_portfolio';
		$_like_name = 'title_1';
        $_url = 'auth/is_session/portfolio/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/portfolio/list_portfolio_view';
        $this->load->view('_backend_', $this->data);
    }
    
   
	
    public function delete_portfolio($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_portfolio');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_portfolio');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect($_SERVER['HTTP_REFERER']);
			}else{
			   $this->session->set_flashdata('success', 'Status updated successfully');
			   redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
    }
    
    
    public function list_fund_details($module_id){
        $get_id = $_GET['portfolio_id'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$this->data = array(
			'title' => 'List Fund Details -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$_table_name = 'td_fund_details';
		$_like_name = 'title_1';
		$sub = $id;
        $_url = 'auth/is_session/portfolio/list_fund_details/'.$module_id.'/?portfolio_id='.$_GET['portfolio_id'];
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,null,$sub),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,null,$sub);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/portfolio/list_fund_details_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    public function add_fund_details($module_id){
        $get_id = $_GET['portfolio_id'];
		$id = encrypt_decrypt($get_id, 'decrypt');
	    if($_POST){
			if($_POST["submit"] == "add_fund_details"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"fund_details_title" => $this->security->xss_clean($this->input->post("fund_details_title")),
					"fund_details_percentage" => $this->security->xss_clean($this->input->post("fund_details_percentage")),
					"short_description" => $this->security->xss_clean($this->input->post("short_description")),
					"description" => $this->security->xss_clean($this->input->post("description")),
					"portfolio_id" => $this->security->xss_clean($id),
					"module_id" => $this->security->xss_clean($module_id),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
				$this->Main_model->insert_data($data, "td_fund_details");
			   $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/portfolio/list_fund_details/".$module_id.'/?portfolio_id='.$_GET['portfolio_id']);
			   }
		}
		$this->data = array(
			'title' => 'Add Fund Details - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/portfolio/add_fund_details_view';
        $this->load->view('_backend_', $this->data);
		
	}
	
	 public function edit_fund_details($module_id){
	    if(!empty($_GET['jwt_fund_details'])){
	    $get_id = $_GET['jwt_fund_details'];
		$id = encrypt_decrypt($get_id, 'decrypt');
	     }
		
		
		if($_POST){
			if($_POST["update"] == "add_fund_details"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
				$data = array(
					"fund_details_title" => $this->security->xss_clean($this->input->post("fund_details_title")),
					"fund_details_percentage" => $this->security->xss_clean($this->input->post("fund_details_percentage")),
					"short_description" => $this->security->xss_clean($this->input->post("short_description")),
					"description" => $this->security->xss_clean($this->input->post("description")),
					"updated_at" => date("y-m-d H:i:s"),
					"updated_by" => $this->session->userdata("id"),
				);
                $where = array("id" => $id);
			    $this->Main_model->update_data($where, $data, "td_fund_details");
                $this->session->set_flashdata("success", "Data updated successfully");
                 redirect($_SERVER['HTTP_REFERER']);
			}
		}
		$this->data = array(
			'title' => 'Edit Fund Details - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("id" => $id);
		$row_array = array('row_array');
        $this->data["td_fund_details"] = $this->Main_model->get_data($where, "td_fund_details",null,null,null,null,null,$row_array);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","module_id"=>$module_id);
		$row_array = array('row_array');
        $this->data["td_modules"] = $this->Main_model->get_data($where, "td_modules",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/portfolio/edit_fund_details_view';
        $this->load->view('_backend_', $this->data);
	}
	public function fund_details_showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this -> input -> post('idname');
	        $m['status']=$this -> input -> post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_fund_details');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect($_SERVER['HTTP_REFERER']);
			}else{
			   $this->session->set_flashdata('success', 'Status updated successfully');
			   redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
    }
    
	public function delete_fund_details($id) {
        $this->db->where('id', $id);
        $this->db->delete('td_fund_details');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);
    }
}

