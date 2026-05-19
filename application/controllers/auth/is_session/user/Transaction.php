<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction extends User_Controller {
    public function __construct() {
        parent::__construct();
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
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
	    $result_array = array('result_array');
	    $order_by = array('created_at','DESC');
        $this->data["td_payment_transactions"] = $this->Main_model->get_data($where, "td_payment_transactions",null,$order_by,null,null,$result_array);
        $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'),"payment_status"=>"1");
	    $row_array = array('row_array');
	    $order_by = array('created_at','DESC');
	    $sum = array('amount','amount');
        $this->data["td_amount_payment_transactions"] = $this->Main_model->get_data($where, "td_payment_transactions",null,$order_by,null,null,null,$row_array,null,$sum);
        $this->data['_view_'] = 'user/transaction_view';
        $this->load->view('_user_', $this->data);

    }



   

	



}

