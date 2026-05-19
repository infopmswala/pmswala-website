<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Portfolios extends User_Controller {
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
        $where = array("status" => "1","module_id"=>9163);
	    $result_array = array('result_array');
	    $order_by = array('id','desc');
	    $select = array('title_1','title_2','investment','period','payout','id','portfolio_image','interest');
        $this->data["td_portfolio"] = $this->Main_model->get_data($where, "td_portfolio",$select,$order_by,null,null,$result_array);
        $this->data['_view_'] = 'user/portfolio_view';
        $this->load->view('_user_', $this->data);

    }


       public function investment() {
           if($_POST){
               if($_POST["submit"] == "add_investment"){
                  $data = array(
                  'user_id' => $this->input->post("user_id"),
                  'transaction_id' => gettransactionid(),
                  'purchase' => $this->input->post("portfolio_id"),
                  'mode_of_payment_status' => $this->input->post("mode_of_payment_status"),
                  'created_at' => $this->input->post("user_id"),
                  "created_at" => date("y-m-d H:i:s"),);
                  $this->Main_model->insert_data($data, "td_payment_transactions");
               }
               redirect($_SERVER['HTTP_REFERER']);
           }
           $get_id = $_GET['jwt_token'];
           $id = encrypt_decrypt($get_id, 'decrypt');
           if(!empty($id)){
            $this->data = array( 'title' =>  get_compnay_title() .'| Dashboard' );
            $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
    	    $row_array = array('row_array');
            $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
            $where = array("status" => 1,"id"=>$id);
            $row_array = array('row_array');
            $this->data["td_portfolio_details"] = $this->Main_model->get_data($where, "td_portfolio",null,null,null,null,null,$row_array);
            $where = array("status" => 1,"id"=>5);
            $row_array = array('row_array');
            $this->data["td_section"] = $this->Main_model->get_data($where, "td_section",null,null,null,null,null,$row_array);
            $where = array("pro_status" => "1","module_id"=>8540,"portfolio_id" => $id);
	        $result_array = array('result_array');
	        $order_by = array('id','desc');
	        $select = array('question','answer','id');
            $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs",$select,$order_by,null,null,$result_array);
            
            $where = array("pro_status" => "1","module_id"=>3446,"portfolio_id" => $id);
	        $result_array = array('result_array');
	        $order_by = array('id','desc');
	        $select = array('question','answer','id');
            $this->data["why_invest"] = $this->Main_model->get_data($where, "td_faqs",$select,$order_by,null,null,$result_array);
            
            $where = array("status" => "1","portfolio_id"=>$id);
	        $result_array = array('result_array');
	        $order_by = array('id','desc');
	        $select = array('fund_details_title','fund_details_percentage','short_description','description','id');
            $this->data["td_fund_details"] = $this->Main_model->get_data($where, "td_fund_details",$select,$order_by,null,null,$result_array);
            
            $where = array("status" => "1","user_id"=>$this->session->userdata('user_id'));
    	    $row_array = array('row_array');
            $this->data["td_user_kyc_details"] = $this->Main_model->get_data($where, "td_user_kyc_details",null,null,null,null,null,$row_array);
            
            $this->data['_view_'] = 'user/my_investment_view';
            // echo "test";die;
            $this->load->view('_user_', $this->data);
           }else{
                redirect(base_url() . "auth/is_session/user/portfolios/");
           }
        }
   
    public function my_portfolio() {
            $this->data = array(
                'title' =>  get_compnay_title() .'| Dashboard'
            );
            $this->data['my_portfolio'] = $this->db->select('*,td_payment_transactions.created_at as buy_time')->from('td_payment_transactions')->join('td_portfolio','td_portfolio.id=td_payment_transactions.purchase')->where('td_payment_transactions.payment_status',1)->where('td_payment_transactions.user_id',$this->session->userdata('user_id'))->order_by("td_payment_transactions.created_at", "DESC")->get()->result_array();
            $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
    	    $row_array = array('row_array');
            $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
            $this->data['_view_'] = 'user/my_portfolio_view';
            $this->load->view('_user_', $this->data);
    
        }
    	


 public function my_portfolio_details(){
     $this->data = array(
                'title' =>  get_compnay_title() .'| Dashboard'
            );
            $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
    	    $row_array = array('row_array');
            $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
            //$this->data["td_payment_transactions"] = $this->db->select('td_payment_transactions.*')->from('td_payment_transactions')->join('td_portfolio','td_portfolio.id=td_payment_transactions.purchase')->where('td_payment_transactions.payment_status',1)->where('td_payment_transactions.transaction_id',$_GET['transaction_id'])->get()->row_array();
            $where = array("transaction_id"=>$_GET['transaction_id']);
    	    $row_array = array('row_array');
            $this->data["td_payment_transactions"] = $this->Main_model->get_data($where, "td_payment_transactions",null,null,null,null,null,$row_array);
            $where = array("payment_id"=>$this->data["td_payment_transactions"]['id']);
    	    $row_array = array('row_array');
            $this->data["td_withdrawal_request"] = $this->Main_model->get_data($where, "td_withdrawal_request",null,null,null,null,null,$row_array);
            $where = array("id"=>1);
    	    $row_array = array('row_array');
            $this->data["td_update_content"] = $this->Main_model->get_data($where, "td_update_content",null,null,null,null,null,$row_array);
            $this->data['_view_'] = 'user/my_portfolio_details_view';
            $this->load->view('_user_', $this->data);
    
 }
 
     function get_investment_details(){
         $investamount = $this->input->post("investamount");
         $investment = $this->input->post("investment");
         $payout = $this->input->post("payout");
         $portfolio_id = $this->input->post("portfolio_id");
         $get_interest = $this->db->where('id', $portfolio_id)->get('td_portfolio')->row_array();
         if($this->input->post("payout_mode") == 'Monthly'){
             $interest = $get_interest['monthly_interest'];
             $interesr_earning = $this->compound_interest_only($investamount,$interest,$payout);
             $result = $this->compound_interest($investamount,$payout,$interest);
             $yearly_amount_1 = $this->get_year_interest_only($investamount,$interest,$payout);
             $yearly_amount_2 = $yearly_amount_1 / 12;
             $yearly_amount = round($yearly_amount_2,2);
         }else{
             $interest = $this->input->post("interest");
             $interesr_earning = $this->compound_interest_only($investamount,$interest,$payout);
             $result = $this->compound_interest($investamount,$payout,$interest);
             $yearly_amount = $this->get_year_interest_only($investamount,$interest,$payout);
         }
         
         $data = array();
         $data['invest_amount'] = $investamount;
         $data['interest_earning'] = $yearly_amount;
         $data['total_earning'] = $result;
         $data['interest'] = $interest;
         $data['payout'] = $payout;
          $data['amount_year'] = $yearly_amount;
         $data['payout_mode'] = $this->input->post("payout_mode");
         echo json_encode($data);
     }
     
     

 function submit_investment_details(){
     $portfolio_id = $this->input->post("portfolio_id");
     $get_interest = $this->db->where('id', $portfolio_id)->get('td_portfolio')->row_array();
     //print_r($_POST);exit;
     $invest_amount = $this->input->post("get_new_invest_amount");
     $payout_mode = $get_interest['payout'];
     $maturity_date = $this->input->post("maturity_date");
     if($payout_mode == 'Yearly'){
             $invest_amount = $this->input->post("get_new_invest_amount");
             $interest = $get_interest['interest'];
             $payout = $get_interest['payout_year'];
             $result = $this->compound_interest($invest_amount,$payout,$interest);
             $yearly_amount = $this->get_year_interest_only($invest_amount,$interest,$payout);
             $data = array(
                  'user_id' => $this->session->userdata('user_id'),
                  'transaction_id' => gettransactionid(),
                  'purchase' => $get_interest['id'],
                  'portfolio_name' => $get_interest['title_1'],
                  'pay_mode' => $payout_mode,
                  'maturity_amount' => $result,
                  'interest' => $get_interest['interest'],
                  'period' => $get_interest['payout_year'],
                  'maturity_date' => $maturity_date,
                  'sub_earnings' => $yearly_amount,
                  'amount' => $this->input->post("get_new_invest_amount"),
                  'mode_of_payment_status' => 'Bank Account for Funds Transfer',
                  'created_at' => $this->session->userdata('user_id'),
                  "created_at" => date("y-m-d H:i:s"));
                  $this->Main_model->insert_data($data, "td_payment_transactions");
                  $email = get_user_email($this->session->userdata('user_id'));
                  //$this->Email_model->payment_pending_user($email);
                  $data1['success'] = 'successfully';
                  echo json_encode($data1);
                  
         }else{   
                    
                     $investamount = $this->input->post("get_new_invest_amount");
                     $interest = $this->input->post("get_interest");
                     $payout = $get_interest['payout_year'];
                     $interesr_earning = $this->compound_interest_only($investamount,$interest,$payout);
                     $result = $this->compound_interest($investamount,$payout,$interest);
                     $yearly_amount_1 = $this->get_year_interest_only($investamount,$interest,$payout);
                     $yearly_amount_2 = $yearly_amount_1 / 12;
                     $yearly_amount = round($yearly_amount_2,2);
                  $data = array(
                  'user_id' => $this->session->userdata('user_id'),
                  'transaction_id' => gettransactionid(),
                  'purchase' => $get_interest['id'],
                  'pay_mode' => $payout_mode,
                   'sub_earnings' => $this->input->post("interest_earning"),
                  'maturity_amount' => $this->input->post("maturity_amount"),
                  'interest' => $get_interest['interest'],
                  'period' =>  $this->input->post("investment_period"),
                  'maturity_date' => $this->input->post("maturity_date"),
                  'portfolio_name' => $get_interest['title_1'],
                  'amount' => $this->input->post("get_new_invest_amount"),
                  'mode_of_payment_status' => 'Bank Account for Funds Transfer',
                  'created_at' => $this->session->userdata('user_id'),
                  "created_at" => date("y-m-d H:i:s"));
                  $this->Main_model->insert_data($data, "td_payment_transactions");
                  $email = get_user_email($this->session->userdata('user_id'));
                  $this->Email_model->payment_pending_user($email);
                  $data1['success'] = 'successfully';
                  echo json_encode($data1);
         }
 }
  
  
      function withdrawal_request(){
       if($_POST){
			if($_POST["submit"] == "withdrawal_request"){
			   $data = array(
			   'user_id' => $this->session->userdata('user_id'),
               'transaction_id' => gettransactionid(),
			   'purchase'=> $this->input->post("portfolio_id"),
			   'payment_id'=> $this->input->post("payment_id"),
			   'payment_status' => '0',
			   "created_at" => date("y-m-d H:i:s"));
			    $where = array("payment_id"=>$this->input->post("payment_id"));
        	    $row_array = array('row_array');
                $td_withdrawal_request = $this->Main_model->get_data($where, "td_withdrawal_request",null,null,null,null,null,$row_array);
			   if(empty($td_withdrawal_request)){
			   $this->Main_model->insert_data($data, "td_withdrawal_request");
			    redirect($_SERVER['HTTP_REFERER']);
			   }else{
			       $where = array("payment_id" => $this->input->post("payment_id"));
		           $this->Main_model->update_data($where, $data, "td_withdrawal_request");
		           redirect($_SERVER['HTTP_REFERER']);
			   }
			}}
      }
 
   function compound_interest($investment, $years, $interest){
    $interest_amount = ((int)$investment * (int)$interest * (int)$years) / 100;
    $final_amount = $investment + $interest_amount;
    return $final_amount;
   }

    function compound_interest_only($investment, $interestRate, $years){
        $interestAmount = ((int)$investment * (int)$interestRate * $years) / 100;
        return number_format((float)$interestAmount);
    }

   function get_year_interest_only($investment, $interestRate, $years){
        $interestAmount = ((int)$investment * (int)$interestRate * (int)$years) / 100;
        
        $yearly_amount = $interestAmount / $years;
        return round($yearly_amount,2);
    }
}

