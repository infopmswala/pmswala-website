<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function send_mail_contact_us($name="",$email_id="",$phone_no="",$city="",$country="",$message=""){
        $email = array('info@pmswala.com');
        //  $email = array('akashsharma199425@gmail.com');

		$now = date("d-m-Y");
		$this->data = array();
		$data = array('name'=>$name,'name'=>$name,'email'=>$email_id,'phone_no'=>$phone_no,'city'=>$city,'country'=>$country, 'message'=>$message);
        $otp_view = $this->load->view('email/contact_info_mail_view', $data, TRUE, 'text/html');
		$subject 		= "Message Received - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
    }
    
    
    public function send_mail_otp($verify_code=""){
        $email = array('sales@pmswala.com');
	    $subject 		= "[Pmswala] One Time Password - $verify_code";
	    $email_msg  =  "Dear User:";
	    $email_msg  .= "<table border='0'>";
        $email_msg  .= "<tr><td>The one time password to login to Your Pmswala Investor dashboard</td><td valign='top'><b>:</b></td><td valign='top'><b>" .  $verify_code . "</b></td></tr>";
        $email_msg  .= "Thanks and Regards," . "<br /><br />";
        $email_msg  .= "<img src='" . base_url() . $this->db->get_where('td_settings')->row()->logo . "' width='100'>" . "<br /><br />";
        $email_msg  .= $this->db->get_where('td_settings')->row()->email. "<br />";
        $email_msg  .= $this->db->get_where('td_settings')->row()->address. "<br />";
        $email_msg  .= $this->db->get_where('td_settings')->row()->phone. "<br />";
        $email_to	=	$this->db->get_where('td_settings')->row()->email;
        $this->send_smtp_mail($email_msg, $subject, $email);
    }

	public function ticket_received_email_to_user($email_one ="",$email_two =""){
		$email = array($email_one,$email_two);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/ticket_received_email_to_user_view', $this->data, TRUE, 'text/html');
		$subject 		= "Ticket Received - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function ticket_received_email_to_admin($email_one ="",$email_two =""){
		$email = array('info@pmswala.com');
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/ticket_received_email_to_admin_view', $this->data, TRUE, 'text/html');
		$subject 		= "Ticket Received - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function bank_received_email_to_admin($bank_name="",$ac_number="",$ifsc="",$branch_name=""){
		$email = array('info@pmswala.com');
		$now = date("d-m-Y");
		$this->data = array();
		$data = array('bank_name'=>$bank_name,'ac_number'=>$ac_number,'ifsc'=>$ifsc,'branch_name'=>$branch_name);
        $otp_view = $this->load->view('email/admin_bank_details_mail_view', $data, TRUE, 'text/html');
		$subject 		= "Bank Details info - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function bank_received_email_to_user($bank_name="",$ac_number="",$ifsc="",$branch_name="",$email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$data = array('bank_name'=>$bank_name,'ac_number'=>$ac_number,'ifsc'=>$ifsc,'branch_name'=>$branch_name);
        $otp_view = $this->load->view('email/user_bank_details_view', $data, TRUE, 'text/html');
		$subject 		= "Bank Details info - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function nominee_received_email_to_user($nominee_name="",$nominee_email="",$nominee_phone="",$nominee_id_proof="",$email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$data = array('nominee_name'=>$nominee_name,'nominee_email'=>$nominee_email,'nominee_phone'=>$nominee_phone,'nominee_id_proof'=>$nominee_id_proof);
        $otp_view = $this->load->view('email/user_nominee_details_view', $data, TRUE, 'text/html');
		$subject 		= "Nominee Details info - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function nominee_received_email_to_admin($nominee_name="",$nominee_email="",$nominee_phone="",$nominee_id_proof=""){
		$email = array('info@pmswala.com');
		$now = date("d-m-Y");
		$this->data = array();
		$data = array('nominee_name'=>$nominee_name,'nominee_email'=>$nominee_email,'nominee_phone'=>$nominee_phone,'nominee_id_proof'=>$nominee_id_proof);
        $otp_view = $this->load->view('email/admin_nominee_details_view', $data, TRUE, 'text/html');
		$subject 		= "Nominee Details info - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	public function kyc_received_email_to_admin(){
		$email = array('info@pmswala.com');
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/admin_kyc_mail_view', $this->data, TRUE, 'text/html');
		$subject 		= "New Kyc Submitted - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function kyc_received_email_to_user($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/user_kyc_mail_view', $this->data, TRUE, 'text/html');
		$subject 		= "New Kyc Submitted - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	
	
	public function kyc_pan_approval_successful($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/kyc_pan_approval_successful_main_view', $this->data, TRUE, 'text/html');
		$subject 		= "Pan Card Approval - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function kyc_pan_rejected_successful($email=""){
	    $email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/kyc_pan_rejected_successful_mail_view', $this->data, TRUE, 'text/html');
		$subject 		= "Pan Card Rejected - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
    public function kyc_aadhar_approval_successful($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/kyc_aadhar_approval_successful_main_view', $this->data, TRUE, 'text/html');
		$subject 		= "Aadhar Card Approval - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function kyc_aadhar_rejected_successful($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/kyc_aadhar_rejected_successful_main_view', $this->data, TRUE, 'text/html');
		$subject 		= "Aadhar Card Rejected - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	
	 public function bank_details_approval_successful($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/bank_details_approval_successful_mail_view', $this->data, TRUE, 'text/html');
		$subject 		= "Bank info Approval - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function bank_details_rejected_successful($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/bank_details_rejected_successful_mail_view', $this->data, TRUE, 'text/html');
		$subject 		= "Bank info Rejected - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	
	 public function nominee_details_approval_successful($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/nominee_details_approval_successful_mail_view', $this->data, TRUE, 'text/html');
		$subject 		= "Nominee info Approval - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function nominee_details_rejected_successful($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/nominee_details_rejected_successful_mail_view', $this->data, TRUE, 'text/html');
		$subject 		= "Nominee info Rejected - {Automatic reply } - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	
	public function payment_failed_user($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/payment_failed_mail_user_view', $this->data, TRUE, 'text/html');
		$subject 		= "Payment Failed - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function payment_success_user($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/payment_success_mail_user_view', $this->data, TRUE, 'text/html');
		$subject 		= "Payment Success - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
	
	public function payment_pending_user($email=""){
		$email = array($email);
		$now = date("d-m-Y");
		$this->data = array();
		$this->data['get_expiry_date_domain_data'] = '';
        $otp_view = $this->load->view('email/payment_pending_mail_user_view', $this->data, TRUE, 'text/html');
		$subject 		= "Payment Pending - PMS Wala";
		$email_msg	=	$otp_view;
		$this->send_smtp_mail($email_msg, $subject, $email);
	}
   function password_reset_email($new_password = '' , $email = ''){
		$query = $this->db->get_where('td_admin' , array('email_id' => $email));
		if($query->num_rows() > 0){
			$email_msg	=	"Your password has been changed.";
			$email_msg	.=	"Your new password is : ".$new_password."<br />";
			$email_sub	=	"Password reset request";
			$email_to	=	$email;
			$this->send_smtp_mail($email_msg , $email_sub , $email_to);
			return true;}else{return false;
		}
	}
	function password_reset_email_user($new_password = '' , $email = ''){
		$query = $this->db->get_where('td_student' , array('email' => $email));
		if($query->num_rows() > 0){
			$email_msg	=	"Your password has been changed.";
			$email_msg	.=	"Your new password is : ".$new_password."<br />";
			$email_sub	=	"Password reset request";
			$email_to	=	$email;
			$this->send_smtp_mail($email_msg , $email_sub , $email_to);
			return true;}else{
			return false;
		}
	}
   public function send_smtp_mail($msg=NULL, $sub=NULL, $to=NULL, $from=NULL, $view=NULL) {
		//Load email library
		$this->load->library('email');
		if($from == NULL){
				$from		=	$this->db->get_where('td_smtp_settings')->row()->smtp_user;
		}
				$subs		=	$this->db->get_where('td_settings')->row()->title;
		//SMTP & mail configuration
		$config = array(
			'protocol'  => $this->db->get_where('td_smtp_settings')->row()->protocol,
			'smtp_host' => $this->db->get_where('td_smtp_settings')->row()->smtp_host,
			'smtp_port' => $this->db->get_where('td_smtp_settings')->row()->smtp_port,
			'smtp_user' => $this->db->get_where('td_smtp_settings')->row()->smtp_user,
			'smtp_pass' => $this->db->get_where('td_smtp_settings')->row()->smtp_pass,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'smtp_timeout' => '30',
			'mailpath' => '/usr/sbin/sendmail',
			'wordwrap' => TRUE
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		//Email content
		// $htmlContent = '<h1>Sending email via SMTP server</h1>';
		// $htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';
		$htmlContent = $msg;
		$this->email->to(implode(', ', $to));
		$this->email->from($from, $subs);
		$this->email->subject($sub);
		$this->email->message($htmlContent);
		//Send email
		$this->email->send();
		// echo $this->email->print_debugger();
		// die();
	}
}

