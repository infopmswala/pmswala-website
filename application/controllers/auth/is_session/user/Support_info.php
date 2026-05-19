<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Support_info extends User_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function support() {
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



   

	
public function terms_and_conditions() {
        $this->data = array(
            'title' =>  get_compnay_title() .'| Dashboard'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
	    $result_array = array('result_array');
	    $order_by = array('created_at','DESC');
        $this->data["td_payment_transactions"] = $this->Main_model->get_data($where, "td_payment_transactions",null,$order_by,null,null,$result_array);
        
        $where = array("status" => "1","id"=>6);
	    $row_array = array('row_array');
        $this->data["td_information"] = $this->Main_model->get_data($where, "td_information",null,null,null,null,null,$row_array);
        
        $this->data['_view_'] = 'user/terms_and_conditions_view';
        $this->load->view('_user_', $this->data);

    }



public function privacy_policy() {
        $this->data = array(
            'title' =>  get_compnay_title() .'| Dashboard'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","id"=>7);
	    $row_array = array('row_array');
        $this->data["td_information"] = $this->Main_model->get_data($where, "td_information",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'user/privacy_policy_view';
        $this->load->view('_user_', $this->data);

    }
    
    public function agreement() {
        $this->data = array(
            'title' =>  get_compnay_title() .'| Dashboard'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
	    $result_array = array('result_array');
	    $order_by = array('created_at','DESC');
        $this->data["td_payment_transactions"] = $this->Main_model->get_data($where, "td_payment_transactions",null,$order_by,null,null,$result_array);
        
         $where = array("status" => "1","id"=>8);
	    $row_array = array('row_array');
        $this->data["td_information"] = $this->Main_model->get_data($where, "td_information",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'user/agreement_view';
        $this->load->view('_user_', $this->data);

    }



}