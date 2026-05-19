<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_info extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function user_list(){
	    $this->data = array(
			'title' => 'List User -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_url = 'auth/is_session/users_info/user_list/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_users_info_count(),10);
		$this->data['user_list'] = $this->Get_paginated_model->get_paginated_users_info($pagination['per_page'], $pagination['offset']);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/users_info/list_users_info_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function user_list_add(){
	    if($_POST){
	        if($_POST["submit"] == "add_user"){
	            if ($_FILES['image']['name'] != '') {                          
                    $image_name='image';$folder_name='profile';$height='345';$width='1350';
                    $image=$this->Main_model->image_upload($image_name,$folder_name,$height,$width); 
                 }else{
                    $image=$old_image;
                 }
	            $data = array(
	                  "image" => "uploads"."/"."profile"."/".$image,
	                  "user_id" => 'PMS'.random_number(4),
	                  "phone" => xss_clean($this->input->post("phone")),
        		       "name" => xss_clean($this->input->post("name")),
        		       "email" => xss_clean($this->input->post("email")),
        		       "city" => xss_clean($this->input->post("city")),
        		       "address" => xss_clean($this->input->post("address")),
        		       "created_at" => date("y-m-d H:i:s")
        		);
                $this->Main_model->insert_data($data, "td_users");
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/users_info/user_list/");
	        }
	    }
	    $this->data = array(
			'title' => 'Add User -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/users_info/add_users_info_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function user_list_edit(){
	    $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		$where = array("id" =>  $id);
        $td_users = $this->Main_model->get_data($where, "td_users");
		$get_image = explode("/",$td_users[0]->image);
        $old_image= $get_image[2] ?? '';  
		if ($_POST) {
            if ($_POST["update"] == "update_user") {
                if ($_FILES['image']['name'] != '') {                          
                    $image_name='image';$folder_name='profile';$height='345';$width='1350';
                    $image=$this->Main_model->image_upload($image_name,$folder_name,$height,$width); 
                 }else{
                    $image=$old_image;
                 }
				$data = array(
                       "image" => "uploads"."/"."profile"."/".$image,
					   "phone" => xss_clean($this->input->post("phone")),
        		       "name" => xss_clean($this->input->post("name")),
        		       "email" => xss_clean($this->input->post("email")),
        		        "date_of_birth" => xss_clean($this->input->post("date_of_birth")),
        		        "c_address_1" => xss_clean($this->input->post("c_address_1")),
        		        "c_address_2" => xss_clean($this->input->post("c_address_2")),
        		        "c_city" => xss_clean($this->input->post("c_city")),
        		        "c_state" => xss_clean($this->input->post("c_state")),
        		        "c_zip" => xss_clean($this->input->post("c_zip")),
        		        "p_address_1" => xss_clean($this->input->post("p_address_1")),
        		        "p_address_2" => xss_clean($this->input->post("p_address_2")),
        		        "p_city" => xss_clean($this->input->post("p_city")),
        		        "p_state" => xss_clean($this->input->post("p_state")),
        		        "p_zip" => xss_clean($this->input->post("p_zip")),
        		       "updated_at" => date("y-m-d H:i:s"));
                        $where = array('id' => $this->input->post("id"));
                        $this->Main_model->update_data($where, $data, 'td_users');
                    $this->session->set_flashdata("success", 'User Info updated successfully.');
                    redirect(base_url()."auth/is_session/users_info/user_list/");
			}
			
		}
	    $this->data = array(
			'title' => 'List User -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("id" => $id);
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users");
        $this->data['_view_'] = 'backend/users_info/edit_users_info_view';
        $this->load->view('_backend_', $this->data);
	}
	
	
	public function user_payment_info(){
	    $this->data = array(
			'title' => 'List Payment Info -Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_url = 'auth/is_session/users_info/user_payment_info/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_users_payment_info_count(),10);
		$this->data['td_payment_transactions'] = $this->Get_paginated_model->get_paginated_users_payment_info($pagination['per_page'], $pagination['offset']);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/users_info/list_user_payment_info_view';
        $this->load->view('_backend_', $this->data);
	}
	
	
	public function user_list_view(){
	    $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		if(!empty($id)){
		    
		}else{
		    redirect(base_url()."auth/is_session/users_info/user_list/");
		}
	    $this->data = array(
			'title' => 'User Info - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1",'id'=>$id);
        $row_array = array('row_array');
        $this->data['td_users'] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_nominee_details'] = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_kyc_details'] = $this->Main_model->get_data($where, "td_user_kyc_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_bank_details'] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        
        // $where = array("status" => "1",'user_id'=>$id);
        // $result_array = array('result_array');
        // $order_by = array('id','DESC');
        // $this->data['td_payment_transactions'] = $this->Main_model->get_data($where, "td_payment_transactions",null,$order_by,null,null,$result_array);
        $this->data['td_payment_transactions'] = $this->db->select('por.*,pt.transaction_id as transaction_id,pt.amount as payment_amount, pt.period as pay_period, pt.interest as pay_interest, pt.pay_mode,pt.sub_earnings,pt.maturity_amount,pt.maturity_date')->from('td_portfolio as por')->join('td_payment_transactions as pt', 'pt.purchase=por.id')->where('pt.user_id',$id)->where('por.module_id',9163)->order_by('pt.created_at','DESC')->get()->result_array();
        //print_r($td_payment_transaction);exit;
        $this->data['_view_'] = 'backend/users_info/user_list_view';
        $this->load->view('_backend_', $this->data);
	}
	
	public function showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this->input->post('idname');
	        $m['payment_status']=$this->input->post('feature');
	        if(empty($m['payment_status'])){
	            $m['payment_status']=1;
	        }
            $id = $this->Main_model->save($m,'td_payment_transactions');
			if($id){			
                $this->session->set_flashdata("success", "Status updated successfully");				
			redirect(site_url('auth/is_session/users_info/user_payment_info/'));
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect(site_url('auth/is_session/users_info/user_payment_info/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/users_info/user_payment_info/'));
	    }
    }
    
    public function kyc_approval_status(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run()) {
	        $m['id']=$this->input->post('idname');
	        $m['approval_status']=$this->input->post('feature');
	        if(empty($m['approval_status'])){
	            $m['approval_status']=1;
	        }
            $id = $this->Main_model->save($m,'td_user_kyc_details');
			if($id){			
                $this->session->set_flashdata("success", "Kyc Status updated successfully");				
			redirect($_SERVER['HTTP_REFERER']);
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
    }
    
    public function bank_approval_status(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run()) {
	        $m['id']=$this->input->post('idname');
	        $m['approval_status']=$this->input->post('feature');
	        if(empty($m['approval_status'])){
	            $m['approval_status']=1;
	        }
            $id = $this->Main_model->save($m,'td_user_bank_details');
			if($id){			
                $this->session->set_flashdata("success", "Bank Approved Successfully");				
			redirect($_SERVER['HTTP_REFERER']);
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
    }
    
    
    public function nominee_approval_status(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run()) {
	        $m['id']=$this->input->post('idname');
	        $m['approval_status']=$this->input->post('feature');
	        if(empty($m['approval_status'])){
	            $m['approval_status']=1;
	        }
            $id = $this->Main_model->save($m,'td_user_nominee_details');
			if($id){			
                $this->session->set_flashdata("success", "Nominee Approved successfully");				
			redirect($_SERVER['HTTP_REFERER']);
			}else{
			   $this->session->set_flashdata('error', 'Something Went Wrong.');
			   redirect($_SERVER['HTTP_REFERER']);
			}
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
    }
    
    public function user_showpay(){
	    $this->form_validation->set_rules('idname','catid', 'trim|required');	
	    if ($this->form_validation->run ()) {
	        $m['id']=$this->input->post('idname');
	        $m['status']=$this->input->post('feature');
	        if(empty($m['status'])){
	            $m['status']=0;
	        }
            $id = $this->Main_model->save($m,'td_users');
			if($m['status'] == 1){			
                $this->session->set_flashdata("success", "User Active Successfully.");				
			redirect(site_url('auth/is_session/users_info/user_list/'));
			}else{
			   $this->session->set_flashdata('error', 'User InActive Successfully.');
			   redirect(site_url('auth/is_session/users_info/user_list/'));
			}
	    }else{
	        redirect(site_url('auth/is_session/users_info/user_list/'));
	    }
    }
    
    public function delete_user($id){
        $this->db->where('id', $id);
        $this->db->delete('td_users');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/users_info/user_list/");
    }
    
     public function delete_user_help_support($id){
        $this->db->where('id', $id);
        $this->db->delete('td_help_and_support');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect(base_url()."auth/is_session/users_info/user_help_support/");
    }
     public function user_payment_info_history_download(){
            $page_name = 'user_payment_info/history_download';	
             $q = trim($this->input->get('q', true));
            $Fdate = trim($this->input->get('Fdate', true));
            $Tdate = trim($this->input->get('Tdate', true));
            if (!empty($q)) {
                $this->db->like('td_payment_transactions.transaction_id', $q);
            }
            if (!empty($Fdate) & !empty($Tdate)) {
                   $this->db->where('td_payment_transactions.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
              }
            $query = $this->db->get('td_payment_transactions');
            if($query->num_rows() > 0){
            $this->Main_model->CSV_download($page_name,$query);
            }else{
                $this->session->set_flashdata('error', 'No data Found');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        
          public function user_withdrawal_request_info_history_download(){
            $page_name = 'user_withdrawal_info/history_download';	
             $q = trim($this->input->get('q', true));
            $Fdate = trim($this->input->get('Fdate', true));
            $Tdate = trim($this->input->get('Tdate', true));
            // if (!empty($q)) {
            //     $this->db->like('td_payment_transactions.transaction_id', $q);
            // }
            // if (!empty($Fdate) & !empty($Tdate)) {
            //       $this->db->where('td_payment_transactions.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
            //   }
            // $query = $this->db->get('td_payment_transactions');
            
            
             $q = trim($this->input->get('q', true));
             $Fdate = trim($this->input->get('Fdate', true));
            $Tdate = trim($this->input->get('Tdate', true));
            if (!empty($q)) {
                $this->db->like('wq.transaction_id', $q);
            }
             if(!empty($Fdate) & !empty($Tdate)) {
                $this->db->where('wq.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
              }
             $this->db->select('wq.transaction_id as withdrawal_request_id, wq.message as message, wq.user_id as user_id, wq.id as id, wq.purchase as purchase, wq.created_at as created_at,wq.payment_status as payment_status,us.name,pt.amount as amount')->from('td_withdrawal_request wq')->join('td_users us','us.id = wq.user_id')->join('td_payment_transactions pt','pt.id = wq.payment_id');
            $this->db->order_by("wq.id", "desc");
            $query = $this->db->get();
            if($query->num_rows() > 0){
            $this->Main_model->CSV_download($page_name,$query);
            }else{
                $this->session->set_flashdata('error', 'No data Found');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
        
         public function user_list_history_download(){
            $page_name = 'user_list/history_download';	
             $q = trim($this->input->get('q', true));
            $Fdate = trim($this->input->get('Fdate', true));
            $Tdate = trim($this->input->get('Tdate', true));
            $this->db->select('name,email,phone,city,address,created_at');
            if (!empty($q)) {
                $this->db->like('td_users.phone', $q);
            }
            if (!empty($Fdate) & !empty($Tdate)) {
                   $this->db->where('td_users.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
              }
            $query = $this->db->get('td_users');
            if($query->num_rows() > 0){
            $this->Main_model->CSV_download($page_name,$query);
            }else{
                $this->session->set_flashdata('error', 'No data Found');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        
     public function user_help_support(){
	    $this->data = array(
			'title' => 'List Help & Support - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_table_name = 'td_help_and_support';
		$_like_name = 'ticket_id';
        $_url = 'auth/is_session/users_info/user_help_support/';;
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_table_count($_table_name,$_like_name,null),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_table($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,null);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/users_info/list_user_help_support_view';
        $this->load->view('_backend_', $this->data);
	}
	
    public function add_user_help_support(){
        if ($_POST) {
            if ($_POST["update"] == "add_user_help_support") {
                $data = array('status' =>$this->security->xss_clean($this->input->post("status")),
                "message"  => $this->security->xss_clean($this->input->post("message")));
                $where = array("id" => $this->input->post("id"));
			    $this->Main_model->update_data($where, $data, "td_help_and_support");
    			$this->session->set_flashdata("success", "Data updated successfully.");
    			redirect(base_url() . "auth/is_session/users_info/user_help_support/");
            }}
        
    }
    
    
     public function payment_status(){
        if ($_POST) {
            if ($_POST["update"] == "payment_status") {
                if($this->input->post("status") == 'Pending'){
                    $data = array('payment_status' =>0,"message"  => $this->security->xss_clean($this->input->post("message")));
                }elseif($this->input->post("status") == 'failed'){
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->payment_failed_user($email);
                    $data = array('payment_status' =>2,"message"  => $this->security->xss_clean($this->input->post("message")));
                }else{
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->payment_success_user($email);
                    $data = array('payment_status' =>1,"message"  => $this->security->xss_clean($this->input->post("message")));
                }
                $where = array("id" => $this->input->post("id"));
			    $this->Main_model->update_data($where, $data, "td_payment_transactions");
    			$this->session->set_flashdata("success", "Data updated successfully.");
    			redirect(base_url() . "auth/is_session/users_info/user_payment_info/");
            }}
        
    }
    
    
    public function withdrawal_request_payment_status(){
        if ($_POST) {
            if ($_POST["update"] == "payment_status") {
                if($this->input->post("status") == 'Pending'){
                    $data = array('payment_status' =>0,"message"  => $this->security->xss_clean($this->input->post("message")));
                }elseif($this->input->post("status") == 'failed'){
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->payment_failed_user($email);
                    $data = array('payment_status' =>2,"message"  => $this->security->xss_clean($this->input->post("message")));
                }else{
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->payment_success_user($email);
                    $data = array('payment_status' =>1,"message"  => $this->security->xss_clean($this->input->post("message")));
                }
                $where = array("id" => $this->input->post("id"));
			    $this->Main_model->update_data($where, $data, "td_withdrawal_request");
    			$this->session->set_flashdata("success", "Data updated successfully.");
    			redirect(base_url() . "auth/is_session/users_info/user_withdrawal_request/");
            }}
        
    }
    
    
    
     public function kyc_pan_status(){
        if ($_POST) {
            if ($_POST["update"] == "kyc_pan_status") {
                if($this->input->post("status") == 'accepted'){
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->kyc_pan_approval_successful($email);
                    $data = array('pan_status' =>1);
                }elseif($this->input->post("status") == 'rejected'){
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->kyc_pan_rejected_successful($email);
                    $data = array('pan_status' =>0);
                }
                $where = array("id" => $this->input->post("id"));
			    $this->Main_model->update_data($where, $data, "td_user_kyc_details");
    			$this->session->set_flashdata("success", "Data updated successfully.");
    			redirect($_SERVER['HTTP_REFERER']);
            }}
        
    }
    
    
    public function kyc_aadhar_status(){
        if ($_POST) {
            if ($_POST["update"] == "kyc_aadhar_status") {
                if($this->input->post("status") == 'accepted'){
                    $data = array('aadhar_status' =>1);
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->kyc_aadhar_approval_successful($email);
                }elseif($this->input->post("status") == 'rejected'){
                     $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->kyc_aadhar_rejected_successful($email);
                    $data = array('aadhar_status' =>0);
                }
                $where = array("id" => $this->input->post("id"));
			    $this->Main_model->update_data($where, $data, "td_user_kyc_details");
    			$this->session->set_flashdata("success", "Data updated successfully.");
    			redirect($_SERVER['HTTP_REFERER']);
            }}
        
    }
    
    
     public function bank_status(){
        if ($_POST) {
            if ($_POST["update"] == "bank_status") {
                if($this->input->post("status") == 'accepted'){
                    $data = array('approval_status' =>1);
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->bank_details_approval_successful($email);
                }elseif($this->input->post("status") == 'rejected'){
                    $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->bank_details_rejected_successful($email);
                    $data = array('approval_status' =>0);
                }
                $where = array("id" => $this->input->post("id")); 
			    $this->Main_model->update_data($where, $data, "td_user_bank_details");
    			$this->session->set_flashdata("success", "Data updated successfully.");
    			redirect($_SERVER['HTTP_REFERER']);
            }}
        
    }
    
     public function nominee_status(){
        if ($_POST) {
            if ($_POST["update"] == "nominee_status") {
                if($this->input->post("status") == 'accepted'){
                     $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->nominee_details_approval_successful($email);
                    $data = array('approval_status' =>1);
                }elseif($this->input->post("status") == 'rejected'){
                     $email = get_user_email($this->input->post("user_id"));
                    $this->Email_model->nominee_details_rejected_successful($email);
                    $data = array('approval_status' =>0);
                }
                $where = array("id" => $this->input->post("id")); 
			    $this->Main_model->update_data($where, $data, "td_user_nominee_details");
    			$this->session->set_flashdata("success", "Data updated successfully.");
    			redirect($_SERVER['HTTP_REFERER']);
            }}
        
    }
    
    
    public function edit_pan_card_list_view(){
         $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		if($_POST){
            if($_POST["update"] == "update_pan_details"){   
			$data = array(
                "pan_number" => xss_clean($this->input->post("pan_number")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
                
               if(!empty($_FILES['pan_front_side']['tmp_name'])){
			      if(is_uploaded_file($_FILES['pan_front_side']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/profile/';
                    $config1['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = 'pan_front_side'.'_'.rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('pan_front_side', FALSE) && is_uploaded_file($_FILES['pan_front_side']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/users_info/edit_nominee_list_view/?jwt_token='.$get_id.'/');
                    } else {
                        $out = $this->upload->data();
                        $data['pan_front_side'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }}
                if(!empty($_FILES['pan_back_side']['tmp_name'])){
                 if(is_uploaded_file($_FILES['pan_back_side']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/profile/';
                    $config1['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = 'pan_back_side'.'_'.rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('pan_back_side', FALSE) && is_uploaded_file($_FILES['pan_back_side']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                       redirect(base_url() . 'auth/is_session/users_info/edit_nominee_list_view/?jwt_token='.$get_id.'/');
                    } else {
                        $out = $this->upload->data();
                        $data['pan_back_side'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }}
            $where = array("user_id" => $id);
			$this->Main_model->update_data($where, $data, "td_user_kyc_details");
			 $email = get_user_email($id);
			$this->Email_model->kyc_received_email_to_user($email);
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . 'auth/is_session/users_info/user_list_view/?jwt_token='.$get_id.'/');
			}
        }
		if(!empty($id)){
		}else{
		    redirect(base_url()."auth/is_session/users_info/user_list/");
		}
         $this->data = array(
			'title' => 'User Info - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1",'id'=>$id);
        $row_array = array('row_array');
        $this->data['td_users'] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_nominee_details'] = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_kyc_details'] = $this->Main_model->get_data($where, "td_user_kyc_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_bank_details'] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $this->data['td_payment_transactions'] = $this->db->select('por.*,pt.transaction_id as transaction_id,pt.amount as payment_amount, pt.period as pay_period, pt.interest as pay_interest, pt.pay_mode,pt.sub_earnings,pt.maturity_amount,pt.maturity_date')->from('td_portfolio as por')->join('td_payment_transactions as pt', 'pt.purchase=por.id')->where('pt.user_id',$id)->where('por.module_id',9163)->order_by('pt.created_at','DESC')->get()->result_array();
        $this->data['_view_'] = 'backend/users_info/edit_pan_card_list_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    public function edit_aadhar_card_list_view(){
         $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
		if($_POST){
            if($_POST["update"] == "update_aadhar_details"){   
			$data = array(
                "aadhar_number" => xss_clean($this->input->post("aadhar_number")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
                
             if(!empty($_FILES['aadhar_front_side']['tmp_name'])){
                if(is_uploaded_file($_FILES['aadhar_front_side']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/profile/';
                    $config1['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = 'aadhar_front_side'.'_'.rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('aadhar_front_side', FALSE) && is_uploaded_file($_FILES['aadhar_front_side']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/users_info/edit_nominee_list_view/?jwt_token='.$get_id.'/');
                    } else {
                        $out = $this->upload->data();
                        $data['aadhar_front_side'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }}
                if(!empty($_FILES['aadhar_back_side']['tmp_name'])){
                 if(is_uploaded_file($_FILES['aadhar_back_side']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/profile/';
                    $config1['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = 'aadhar_back_side'.'_'.rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('aadhar_back_side', FALSE) && is_uploaded_file($_FILES['aadhar_back_side']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/users_info/edit_nominee_list_view/?jwt_token='.$get_id.'/');
                    } else {
                        $out = $this->upload->data();
                        $data['aadhar_back_side'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }}
            $where = array("user_id" => $id);
			$this->Main_model->update_data($where, $data, "td_user_kyc_details");
			$email = get_user_email($id);
			$this->Email_model->kyc_received_email_to_user($email);
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . 'auth/is_session/users_info/user_list_view/?jwt_token='.$get_id.'/');
			}
        }
		if(!empty($id)){
		}else{
		    redirect(base_url()."auth/is_session/users_info/user_list/");
		}
         $this->data = array(
			'title' => 'User Info - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1",'id'=>$id);
        $row_array = array('row_array');
        $this->data['td_users'] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_nominee_details'] = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_kyc_details'] = $this->Main_model->get_data($where, "td_user_kyc_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_bank_details'] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $this->data['td_payment_transactions'] = $this->db->select('por.*,pt.transaction_id as transaction_id,pt.amount as payment_amount, pt.period as pay_period, pt.interest as pay_interest, pt.pay_mode,pt.sub_earnings,pt.maturity_amount,pt.maturity_date')->from('td_portfolio as por')->join('td_payment_transactions as pt', 'pt.purchase=por.id')->where('pt.user_id',$id)->where('por.module_id',9163)->order_by('pt.created_at','DESC')->get()->result_array();
        $this->data['_view_'] = 'backend/users_info/edit_aadhar_card_list_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
     public function edit_date_of_birth_list_view(){
         $get_id = $_GET['jwt_token'];
		 $id = encrypt_decrypt($get_id, 'decrypt');
        if($_POST){
            if($_POST["update"] == "update_date_of_birth"){   
			$data = array(
                "date_of_birth" => $this->security->xss_clean($this->input->post("date_of_birth")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
            $where = array("user_id" => $id);
			$this->Main_model->update_data($where, $data, "td_user_kyc_details");
			$email = get_user_email($id);
			$this->Email_model->kyc_received_email_to_user($email);
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . 'auth/is_session/users_info/user_list_view/?jwt_token='.$get_id.'/');
			}
        }
         $this->data = array(
			'title' => 'User Info - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1",'id'=>$id);
        $row_array = array('row_array');
        $this->data['td_users'] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_nominee_details'] = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_kyc_details'] = $this->Main_model->get_data($where, "td_user_kyc_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_bank_details'] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $this->data['td_payment_transactions'] = $this->db->select('por.*,pt.transaction_id as transaction_id,pt.amount as payment_amount, pt.period as pay_period, pt.interest as pay_interest, pt.pay_mode,pt.sub_earnings,pt.maturity_amount,pt.maturity_date')->from('td_portfolio as por')->join('td_payment_transactions as pt', 'pt.purchase=por.id')->where('pt.user_id',$id)->where('por.module_id',9163)->order_by('pt.created_at','DESC')->get()->result_array();
        $this->data['_view_'] = 'backend/users_info/edit_date_of_birth_list_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
     public function edit_bank_details_list_view(){
         $get_id = $_GET['jwt_token'];
		 $id = encrypt_decrypt($get_id, 'decrypt');
        if($_POST){
            if($_POST["update"] == "update_bank_details"){   
			$data = array(
                "bank_name" => $this->security->xss_clean($this->input->post("bank_name")),
                "ac_number" => $this->security->xss_clean($this->input->post("ac_number")),
                "ifsc" => $this->security->xss_clean($this->input->post("ifsc")),
                "branch_name" => $this->security->xss_clean($this->input->post("branch_name")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
            $where = array("user_id" => $id);
			$this->Main_model->update_data($where, $data, "td_user_bank_details");
			$bank_name = xss_clean($this->input->post("bank_name"));
		      $ac_number = xss_clean($this->input->post("ac_number"));
		      $ifsc = xss_clean($this->input->post("ifsc"));
		      $branch_name = xss_clean($this->input->post("branch_name"));
			$email = get_user_email($id);
			$this->Email_model->bank_received_email_to_user($bank_name,$ac_number,$ifsc,$branch_name,$email);
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . 'auth/is_session/users_info/user_list_view/?jwt_token='.$get_id.'/');
			}
        }
         $this->data = array(
			'title' => 'User Info - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1",'id'=>$id);
        $row_array = array('row_array');
        $this->data['td_users'] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_nominee_details'] = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_bank_details'] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $this->data['td_payment_transactions'] = $this->db->select('por.*,pt.transaction_id as transaction_id,pt.amount as payment_amount, pt.period as pay_period, pt.interest as pay_interest, pt.pay_mode,pt.sub_earnings,pt.maturity_amount,pt.maturity_date')->from('td_portfolio as por')->join('td_payment_transactions as pt', 'pt.purchase=por.id')->where('pt.user_id',$id)->where('por.module_id',9163)->order_by('pt.created_at','DESC')->get()->result_array();
        $this->data['_view_'] = 'backend/users_info/edit_bank_details_list_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    public function edit_nominee_list_view(){
         $get_id = $_GET['jwt_token'];
		 $id = encrypt_decrypt($get_id, 'decrypt');
        if($_POST){
            if($_POST["update"] == "update_nominee_details"){   
			$data = array(
                "nominee_name" => xss_clean($this->input->post("nominee_name")),
		        "nominee_date_of_birth" => xss_clean($this->input->post("nominee_date_of_birth")),
		        "relation" => xss_clean($this->input->post("relation")),
		        "nominee_aadhar_card_number" => xss_clean($this->input->post("nominee_aadhar_card_number")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
            // if(!empty($_FILES['nominee_id_proof']['tmp_name'])){
            //      if(is_uploaded_file($_FILES['nominee_id_proof']['tmp_name'])) {
            //         $config1['upload_path'] = './uploads/profile/';
            //         $config1['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG';
            //         $config1['max_size'] = '*';
            //         $config1['overwrite'] = false;
            //         $config1['file_name'] = 'nominee_id_proof'.'_'.rand() . '_' . time();
            //         $this->load->library('upload', $config1);
            //         $this->upload->initialize($config1);
            //         if (!$this->upload->do_upload('nominee_id_proof', FALSE) && is_uploaded_file($_FILES['nominee_id_proof']['tmp_name'])) {
            //             $error = array('error' => $this->upload->display_errors());
            //             $this->session->set_flashdata("error", $error['error']);
            //             redirect(base_url() . 'auth/is_session/users_info/edit_nominee_list_view/?jwt_token='.$get_id.'/');
            //         } else {
            //             $out = $this->upload->data();
            //             $data['nominee_id_proof'] = 'uploads/profile/' . $out['orig_name'];
            //         }
            //     }}
            $where = array("user_id" => $id);
			$this->Main_model->update_data($where, $data, "td_user_nominee_details");
			$nominee_name = xss_clean($this->input->post("nominee_name"));
    		$nominee_email = xss_clean($this->input->post("nominee_email"));
    		$nominee_phone = xss_clean($this->input->post("nominee_phone"));
    // 		if($_FILES['nominee_id_proof']['tmp_name']){
    // 		    $nominee_id_proof = base_url().''.$data['nominee_id_proof'];;
    // 		}else{
    // 		    $where = array("status" => "1",'user_id'=>$id);
    //             $row_array = array('row_array');
    //             $td_user_nominee_details_image = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);
    // 		    $nominee_id_proof = base_url().''.$td_user_nominee_details_image['nominee_id_proof'];
    // 		}
            //$email = get_user_email($id);
    		//$this->Email_model->nominee_received_email_to_user($nominee_name,$nominee_email,$nominee_phone,$email);
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . 'auth/is_session/users_info/user_list_view/?jwt_token='.$get_id.'/');
			}
        }
        $this->data = array(
			'title' => 'User Info - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1",'id'=>$id);
        $row_array = array('row_array');
        $this->data['td_users'] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_nominee_details'] = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);

        $where = array("status" => "1",'user_id'=>$id);
        $row_array = array('row_array');
        $this->data['td_user_bank_details'] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $this->data['td_payment_transactions'] = $this->db->select('por.*,pt.transaction_id as transaction_id,pt.amount as payment_amount, pt.period as pay_period, pt.interest as pay_interest, pt.pay_mode,pt.sub_earnings,pt.maturity_amount,pt.maturity_date')->from('td_portfolio as por')->join('td_payment_transactions as pt', 'pt.purchase=por.id')->where('pt.user_id',$id)->where('por.module_id',9163)->order_by('pt.created_at','DESC')->get()->result_array();
        $this->data['_view_'] = 'backend/users_info/edit_nominee_list_view';
        $this->load->view('_backend_', $this->data);
    }
    
    
    function user_withdrawal_request(){
        $this->data = array(
			'title' => 'User Withdrawal Request - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
        );
        $_url = 'auth/is_session/users_info/user_payment_info/';
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_user_withdrawal_request_count(),10);
		$this->data['td_withdrawal_request'] = $this->Get_paginated_model->get_paginated_user_withdrawal_request_payment_info($pagination['per_page'], $pagination['offset']);
        $this->data['start'] = $pagination['start'];
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/users_info/user_withdrawal_request_view';
        $this->load->view('_backend_', $this->data);
    }
    
   
}