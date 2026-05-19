<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Withdrawal_request extends User_Controller {
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
        $this->data["td_withdrawal_request"] = $this->db->select('wr.created_at,wr.transaction_id,wr.payment_status,pt.amount,pt.portfolio_name')->from('td_withdrawal_request wr')->join('td_payment_transactions pt','pt.id=wr.payment_id')->where('wr.user_id',$this->session->userdata('user_id'))->order_by('wr.created_at','DESC')->get()->result_array();
        $this->data["td_sum_withdrawal_request"] = $this->db->select('sum(pt.amount)as amount')->from('td_withdrawal_request wr')->join('td_payment_transactions pt','pt.id=wr.payment_id')->where('wr.user_id',$this->session->userdata('user_id'))->where('wr.payment_status',1)->order_by('wr.created_at','DESC')->get()->row_array();
        $this->data['_view_'] = 'user/withdrawal_request_view';
        $this->load->view('_user_', $this->data);
    }
}

