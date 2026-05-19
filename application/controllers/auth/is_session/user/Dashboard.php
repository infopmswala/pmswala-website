<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends User_Controller {
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
        $where = array("pro_status" => "1","module_id"=>2232);
        $limit = array(4,0);
    	$result_array = array('result_array');
    	$select = array('question','answer');
    	$order_by = array('id','desc');
        $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs",$select,$order_by,$limit,null,$result_array);
        $this->data["count_portfolios"] = $this->db->where("payment_status","1")->where('user_id',$this->session->userdata('user_id'))->get('td_payment_transactions')->num_rows();
        $this->data["maturity_amount"]  =$this->db->select('SUM(maturity_amount) AS maturity_amount')->where('user_id',$this->session->userdata('user_id'))->where('payment_status',1)->from('td_payment_transactions')->get()->row_array();
        $this->data["total_invested_amount"]  =$this->db->select('SUM(amount) AS amount')->where('user_id',$this->session->userdata('user_id'))->where('payment_status',1)->from('td_payment_transactions')->get()->row_array();
        //print_r($this->data["total_invested_amount"]);exit;
        $this->data["count_total_maturity_amount"]  =$this->db->select('SUM(maturity_amount) AS maturity_amount')->where('user_id',$this->session->userdata('user_id'))->where('payment_status',1)->from('td_payment_transactions')->get()->row_array();
        //print_r($this->data["count_total_maturity_amount"]['maturity_amount']);exit;
        $this->data['my_portfolio'] = $this->db->select('*')->from('td_payment_transactions')->join('td_portfolio','td_portfolio.id=td_payment_transactions.purchase')->where('td_payment_transactions.payment_status',1)->where('td_payment_transactions.user_id',$this->session->userdata('user_id'))->order_by("td_payment_transactions.created_at", "DESC")->get()->result_array();
        //print_r($this->data["my_portfolio"]);exit;
        $where = array("status" => "1","module_id"=>9163);
	    $result_array = array('result_array');
	    $order_by = array('id','desc');
	    $select = array('title_1','title_2','investment','period','payout','id','portfolio_image');
	    $limit = array(3,0);
        $this->data["td_portfolio"] = $this->Main_model->get_data($where, "td_portfolio",$select,$order_by,$limit,null,$result_array);
        $this->data['_view_'] = 'user/dashboard_view';
        $this->load->view('_user_', $this->data);

    }

function welcome(){
    $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","module_id"=>2232);
        $limit = array(4,0);
    	$result_array = array('result_array');
    	$select = array('question','answer');
        $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs",$select,null,$limit,null,$result_array);
       $this->data['_view_'] = 'user/welcome_view';
        $this->load->view('_user_', $this->data);
   }

   

		function moredetails_view(){
    $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1","module_id"=>2232);
        $limit = array(4,0);
    	$result_array = array('result_array');
    	$select = array('question','answer');
        $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs",$select,null,$limit,null,$result_array);
       $this->data['_view_'] = 'user/moredetails_view';
        $this->load->view('user/moredetails_view', $this->data); 
        // $this->load->view('_user_', $this->data);
   }



}

