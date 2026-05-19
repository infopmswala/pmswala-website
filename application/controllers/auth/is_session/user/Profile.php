<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends User_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
         $this->load->model('User_model');
    }
    public function index() {
        $this->data = array(
            'title' =>  get_compnay_title() .'| Dashboard'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_bank_details"] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_kyc_details"] = $this->Main_model->get_data($where, "td_user_kyc_details",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'user/welcome_profile_view';
        $this->load->view('_user_', $this->data);

    }

    
    public function bank(){
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_bank_details"] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'user/bank_details_view';
        $this->load->view('_user_', $this->data);
    }
    
    public function save_bank(){
		$data = array('success' => false, 'messages' => array());
		$this->load->library('form_validation');
        $this->form_validation->set_rules("bank_name", "Bank Name", "required");
        $this->form_validation->set_rules("ac_number", "AC Number", "required");
        $this->form_validation->set_rules("ifsc", "IFSC Code", "required");
        $this->form_validation->set_rules("ac_name", "Account Holder Name", "required");
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->load->library('form_validation');
		if ($this->form_validation->run()) {
		      $data = array(
		       "bank_name" => xss_clean($this->input->post("bank_name")),
		       "ac_number" => xss_clean($this->input->post("ac_number")),
		       "ifsc" => xss_clean($this->input->post("ifsc")),
		       "ac_name" => xss_clean($this->input->post("ac_name")),
		       "branch_name" => xss_clean($this->input->post("branch_name"))??'',
		       "user_id" => xss_clean($this->session->userdata('user_id')),
		      "updated_at" => date("y-m-d H:i:s"));
		      if(!empty($this->input->post("id"))){
		      $where = array("id" => $this->input->post("id"));
			  $this->Main_model->update_data($where, $data, "td_user_bank_details");  
		      }else{
		       $this->Main_model->insert_data($data, "td_user_bank_details");
		      }
		      $bank_name = xss_clean($this->input->post("bank_name"));
		      $ac_number = xss_clean($this->input->post("ac_number"));
		      $ifsc = xss_clean($this->input->post("ifsc"));
		      $branch_name = xss_clean($this->input->post("branch_name"));
		     $this->Email_model->bank_received_email_to_admin($bank_name,$ac_number,$ifsc,$branch_name);
		     $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
    	     $row_array = array('row_array');
             $td_users_email = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
             $email = $td_users_email['email'];
             $this->Email_model->bank_received_email_to_user($bank_name,$ac_number,$ifsc,$branch_name,$email);
            $data['success'] = true;
    		}else {
    			foreach ($_POST as $key => $value) {
    				$data['messages'][$key] = form_error($key);
    			}
		}
		echo json_encode($data);
    }
    
    public function my_profile(){
        //print_r($_POST);exit;
        $where = array("id" =>  $this->session->userdata('user_id'));
        $td_users = $this->Main_model->get_data($where, "td_users");
		$get_image = explode("/",$td_users[0]->image);
        $old_image= $get_image[2] ?? '';  
		if ($_POST) {
            if ($_POST["submit"] == "add_nominee") {
                if ($_FILES['image']['name'] != '') {                          
                    $image_name='image';$folder_name='profile';$height='345';$width='1350';
                    $image=$this->Main_model->image_upload($image_name,$folder_name,$height,$width); 
                 }else{
                    $image=$old_image;
                 }
                if(!empty($_FILES['image']['name'])){
                 $new_image = "uploads"."/"."profile"."/".$image;
                 }else{
                  $new_image = '';   
                 }
				$data = array(
                       "image" => $new_image,
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
        		       "filltoo" => xss_clean($this->input->post("filltoo")) ?? '0',
        		       "p_zip" => xss_clean($this->input->post("p_zip")),
        		       "updated_at" => date("y-m-d H:i:s"));
                        $where = array('id' => $this->session->userdata('user_id'));
                        $this->Main_model->update_data($where, $data, 'td_users');
                        
                        $data_1 = array("nominee_name" => xss_clean($this->input->post("nominee_name")),"nominee_date_of_birth" => xss_clean($this->input->post("nominee_date_of_birth")),
            		        "relation" => xss_clean($this->input->post("relation")),"user_id"=>$this->session->userdata('user_id'),"created_by" => date("y-m-d H:i:s"),
            		        "nominee_aadhar_card_number" => xss_clean($this->input->post("nominee_aadhar_card_number")));
                        $check_user = $this->db->select('user_id')->where('user_id',$this->session->userdata('user_id'))->get('td_user_nominee_details')->row_array();
                         if(!empty($check_user)){
                         $where = array('user_id' => $this->session->userdata('user_id'));
                         $this->Main_model->update_data($where, $data_1, 'td_user_nominee_details');
                         }else{
                           $this->Main_model->insert_data($data_1, "td_user_nominee_details");  
                         }
                        $this->session->set_flashdata("success", 'Profile updated successfully.');
                     redirect(base_url() . 'auth/is_session/user/profile/my_profile/');
			}
			
		}
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
         $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_bank_details"] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_nominee_details"] = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'user/my_profile_view';
        $this->load->view('_user_', $this->data);
    }
    
    public function kyc(){
        if($_POST) {
            if($_POST["submit"] == "kyc"){
               $check_user = $this->db->select('user_id')->where('user_id',$this->session->userdata('user_id'))->get('td_user_kyc_details')->row_array();
			  $data = array(
			       "pan_number" => xss_clean($this->input->post("pan_number")),
			       "aadhar_number" => xss_clean($this->input->post("aadhar_number")),
			       "date_of_birth" => xss_clean($this->input->post("date_of_birth")),
			       "user_id" => xss_clean($this->session->userdata('user_id')),
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
                        redirect(base_url() . 'auth/is_session/user/profile/kyc/');
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
                        redirect(base_url() . 'auth/is_session/user/profile/kyc/');
                    } else {
                        $out = $this->upload->data();
                        $data['pan_back_side'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }}
                
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
                        redirect(base_url() . 'auth/is_session/user/profile/kyc/');
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
                        redirect(base_url() . 'auth/is_session/user/profile/kyc/');
                    } else {
                        $out = $this->upload->data();
                        $data['aadhar_back_side'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }}
                
			 if(!empty($check_user)){
                 $this->session->set_flashdata("success", "KYC Details updated successfully.");
			     $where = array('user_id' => $this->session->userdata('user_id'));
                 $this->Main_model->update_data($where, $data, 'td_user_kyc_details');
                 $this->Email_model->kyc_received_email_to_admin();
			    }else{
			    $this->Main_model->insert_data($data, "td_user_kyc_details");
			    $this->Email_model->kyc_received_email_to_admin();
                $this->session->set_flashdata("success", "KYC Details added successfully");  
			    }
			    redirect(base_url() . "auth/is_session/user/profile/kyc/");
                 
            }
        	}
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
         $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_kyc_details"] = $this->Main_model->get_data($where, "td_user_kyc_details",null,null,null,null,null,$row_array);
        
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_bank_details"] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'user/kyc_view';
        $this->load->view('_user_', $this->data);
    }
    
    
    
    public function submit_kyc(){
        
        $check_user = $this->db->select('user_id')->where('user_id',$this->session->userdata('user_id'))->get('td_user_kyc_details')->row_array();
        $this->form_validation->set_rules('pan_card_number', 'PAN Card Number', 'required');
        $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'required');
        // $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        if($this->form_validation->run() == FALSE) {
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("user_id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_kyc_details"] = $this->Main_model->get_data($where, "td_user_kyc_details",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'user/kyc_view';
        $this->load->view('_user_', $this->data);
        } else {
			  $data = array(
			       "pan_number" => xss_clean($this->input->post("pan_card_number")),
			       "aadhar_number" => xss_clean($this->input->post("aadhar_number")),
			       "user_id" => xss_clean($this->session->userdata('user_id')),
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
                        redirect(base_url() . 'auth/is_session/user/profile/kyc/');
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
                        redirect(base_url() . 'auth/is_session/user/profile/kyc/');
                    } else {
                        $out = $this->upload->data();
                        $data['pan_back_side'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }}
                
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
                        redirect(base_url() . 'auth/is_session/user/profile/kyc/');
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
                        redirect(base_url() . 'auth/is_session/user/profile/kyc/');
                    } else {
                        $out = $this->upload->data();
                        $data['aadhar_back_side'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }}
                
			 if(!empty($check_user)){
                 $this->session->set_flashdata("success", "Thank you for submitting your documents. They are currently under verification and we will notify you once the process is complete.");
			     $where = array('user_id' => $this->session->userdata('user_id'));
			     //$this->Email_model->sub_kyc_to_admin();
                 $this->Main_model->update_data($where, $data, 'td_user_kyc_details');
                  $where = array('user_id' => $this->session->userdata('user_id'));
    		      $row_array = array('row_array');
                  $td_users_email = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
                  $email = $td_users_email['email'];
                 $this->Email_model->kyc_received_email_to_admin();
                 $this->Email_model->kyc_received_email_to_user($email);
			    }else{
			    $this->Main_model->insert_data($data, "td_user_kyc_details");
			    $where = array('id' => $this->session->userdata('user_id'));
    		    $row_array = array('row_array');
                $td_users_email = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
                $email = get_user_email($td_users_email['email']);
			    $this->Email_model->kyc_received_email_to_admin();
			    $this->Email_model->kyc_received_email_to_user($email);
                $this->session->set_flashdata("success", "Thank you for submitting your documents. They are currently under verification and we will notify you once the process is complete.");  
			    }
			    redirect(base_url() . "auth/is_session/user/profile/submit_kyc/");
        }
        
    }
     
    public function nominee(){
        if($_POST){
            if($_POST["submit"] == "add_nominee"){
             $data = array(
		       "nominee_name" => xss_clean($this->input->post("nominee_name")),
		       "nominee_date_of_birth" => xss_clean($this->input->post("nominee_date_of_birth")),
		       "relation" => xss_clean($this->input->post("relation")),
		       "nominee_aadhar_card_number" => xss_clean($this->input->post("nominee_aadhar_card_number")),
		       "user_id" => xss_clean($this->session->userdata('user_id')),
		      "updated_at" => date("y-m-d H:i:s"));
		      if(!empty($this->input->post("id"))){
		      $where = array('user_id' => $this->session->userdata('user_id'));
		      $row_array = array('row_array');
              $td_users_email = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
              $email = $td_users_email['email'];
		      $where = array("id" => $this->input->post("id"));
			  $this->Main_model->update_data($where, $data, "td_user_nominee_details");
			  $this->Email_model->nominee_received_email_to_user($nominee_name,$nominee_email,$nominee_phone,$nominee_id_proof,$email);
			  $this->Email_model->nominee_received_email_to_admin($nominee_name,$nominee_email,$nominee_phone,$nominee_id_proof);
		      }else{
		      $nominee_name = xss_clean($this->input->post("nominee_name"));
		      $nominee_email = xss_clean($this->input->post("nominee_email"));
		      $nominee_phone = xss_clean($this->input->post("nominee_phone"));
		      $nominee_id_proof = $data['nominee_id_proof'];
		      $where = array('user_id' => $this->session->userdata('user_id'));
		      $row_array = array('row_array');
              $td_users_email = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
              $email = $td_users_email['email'];
		       $this->Main_model->insert_data($data, "td_user_nominee_details");
		       $this->Email_model->nominee_received_email_to_user($nominee_name,$nominee_email,$nominee_phone,$nominee_id_proof,$email);
		       $this->Email_model->nominee_received_email_to_admin($nominee_name,$nominee_email,$nominee_phone,$nominee_id_proof);
		      }
		       $this->session->set_flashdata("success", "Nominee added successfully");
              redirect(base_url() . "auth/is_session/user/profile/nominee/");
            }
        }
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_nominee_details"] = $this->Main_model->get_data($where, "td_user_nominee_details",null,null,null,null,null,$row_array);
        
        $this->data['_view_'] = 'user/nominee_view';
        $this->load->view('_user_', $this->data);
    }
    
    
     
    public function help_and_support(){
        if($_POST){
            if($_POST["submit"] == "add_help_support"){
             $data = array(
             "ticket_id" => "TIT".rand(),
             "title" => xss_clean($this->input->post("title")),
             "description" => xss_clean($this->input->post("description")),
             "email" => xss_clean($this->input->post("email")),
             "status" => 'Pending',
             "user_id" => xss_clean($this->session->userdata('user_id')), 
             "created_at" => date("y-m-d H:i:s"));
		      if(!empty($_FILES['screenshort']['tmp_name'])){
                 if(is_uploaded_file($_FILES['screenshort']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/profile/';
                    $config1['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = 'screenshort'.'_'.rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('screenshort', FALSE) && is_uploaded_file($_FILES['screenshort']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/user/profile/help_and_support/');
                    } else {
                        $out = $this->upload->data();
                        $data['screenshort'] = 'uploads/profile/' . $out['orig_name'];
                    }
                }
		      }
		      $this->Main_model->insert_data($data, "td_help_and_support");
		      $email_one = $this->input->post("email");
		      $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
    	      $row_array = array('row_array');
              $td_users_email = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
              $email_two = $td_users_email['email'];
              if(!empty($email_one) || !empty($email_two)){
                  $this->Email_model->ticket_received_email_to_user($email_one,$email_two);
                  $this->Email_model->ticket_received_email_to_admin($email_one,$email_two);
              }
              $this->session->set_flashdata("success", "Tickets Create Successfully");
              redirect(base_url() . "auth/is_session/user/profile/help_and_support/");
            }}
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_user_bank_details"] = $this->Main_model->get_data($where, "td_user_bank_details",null,null,null,null,null,$row_array);
        $where = array("user_id "=>$this->session->userdata('user_id'));
    // 	$result_array = array('result_array');
    // 	$order_by = array('id','desc');
    // 	$select = array('email','screenshort','title','description','status','created_at','ticket_id');
    //     $this->data["td_help_and_support"] = $this->Main_model->get_data($where, "td_help_and_support",$select,$order_by,null,null,$result_array);
        
        $_table_name = 'td_help_and_support';
		$_like_name = 'ticket_id';
        $_url = 'auth/is_session/user/profile/help_and_support/';
        $where = $this->session->userdata('user_id');
        $pagination = $this->paginate(base_url() . $_url, $this->Get_paginated_model->get_paginated_help_and_support_count($_table_name,$_like_name,$where),10);
		$this->data[$_table_name] = $this->Get_paginated_model->get_paginated_help_and_support($pagination['per_page'], $pagination['offset'],$_table_name,$_like_name,$where);
		$this->data['start'] = $pagination['start'];
        $this->data['_view_'] = 'user/help_and_support_view';
        $this->load->view('_user_', $this->data);
    }
    
    
    public function validate_aadhar($str) {
        // Call the custom validation rule
        return $this->form_validation->validate_aadhar($str);
    }
    
    public function validate_pan($str) {
    return $this->form_validation->validate_pan($str);
     }
     
    public function validate_date_of_birth($str) {
    return $this->form_validation->validate_date_of_birth($str);
    }
    // Callback function for image validation
    public function callback_pan_front_side_validate_image($str) {
        if (empty($_FILES['pan_front_side']['name'])) {
            $this->form_validation->set_message('pan_front_side', 'The %s field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
     public function callback_pan_back_side_validate_image($str) {
        if (empty($_FILES['pan_back_side']['name'])) {
            $this->form_validation->set_message('pan_back_side', 'The %s field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
     public function callback_aadhar_front_side_validate_image($str) {
        if (empty($_FILES['aadhar_front_side']['name'])) {
            $this->form_validation->set_message('aadhar_front_side', 'The %s field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
     public function callback_aadhar_back_side_validate_image($str) {
        if (empty($_FILES['aadhar_back_side']['name'])) {
            $this->form_validation->set_message('aadhar_back_side', 'The %s field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    
    
    function convertIndianNumberFormatToNumeric($numberString) {
        $numberString = strtoupper($numberString); // Convert to uppercase for case insensitivity
        $numericValue = 0;
    
        // Check if the string contains "CR" for crores
        if (strpos($numberString, 'CR') !== false) {
            // Extract the numerical part before "CR"
            $numericPart = str_replace('CR', '', $numberString);
    
            // Check if the numeric part is a valid number
            if (is_numeric($numericPart)) {
                // Convert crore to actual number (1 crore = 10 million)
                $numericValue = floatval($numericPart) * 10000000;
            } else {
                // Invalid number format
                $numericValue = null;
            }
        }
        // Check if the string contains "L" for lakhs
        elseif (strpos($numberString, 'L') !== false) {
            // Extract the numerical part before "L"
            $numericPart = str_replace('L', '', $numberString);
    
            // Check if the numeric part is a valid number
            if (is_numeric($numericPart)) {
                // Convert lakh to actual number (1 lakh = 100 thousand)
                $numericValue = floatval($numericPart) * 100000;
            } else {
                // Invalid number format
                $numericValue = null;
            }
        }
        // Check if the string contains "Th" for thousands
        elseif (strpos($numberString, 'TH') !== false) {
            // Extract the numerical part before "Th"
            $numericPart = str_replace('TH', '', $numberString);
    
            // Check if the numeric part is a valid number
            if (is_numeric($numericPart)) {
                // Convert thousand to actual number (1 thousand = 1000)
                $numericValue = floatval($numericPart) * 1000;
            } else {
                // Invalid number format
                $numericValue = null;
            }
        } else {
            // Not in crore, lakh, or thousand format
            $numericValue = null;
        }
    
        return $numericValue;
    }
    
    
       public function moredetails(){
        $where = array("id" =>  $this->session->userdata('user_id'));
        $td_users = $this->Main_model->get_data($where, "td_users");
        $data = array("name" => xss_clean($this->input->post("name")),
        		       "email" => xss_clean($this->input->post("email")));
         $where = array('id' => $this->session->userdata('user_id'));
         $this->Main_model->update_data($where, $data, 'td_users');
          $get_phone = $this->session->userdata('verify_user_phone');
          $details = $this->User_model->get_user_details_from_id($get_phone);
         $session_data = array('user_id' => $details['id'],'phone' => $details['phone']);
         $this->session->set_userdata($session_data);
       if($details['welcome_popup'] == 1){
             $this->db->set('welcome_popup', 0);
             $this->db->where('id', $details['id']);
             $this->db->update('td_users');
             redirect(base_url() . 'auth/is_session/user/dashboard/welcome/', 'refresh'); die(); 
         }else{
              redirect(base_url() . 'auth/is_session/user/dashboard/', 'refresh'); die(); 
         }
       
        }
    
}

