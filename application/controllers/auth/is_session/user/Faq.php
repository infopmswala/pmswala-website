<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends User_Controller {
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
        $where = array("status" => "1","module_id"=>5136);
    	$result_array = array('result_array');
    	$order_by = array('id','desc');
    	$select = array('question','answer','id');
        $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs",$select,$order_by,null,null,$result_array);
        $this->data['_view_'] = 'user/faq_view';
        $this->load->view('_user_', $this->data);

    }



   

	



}

