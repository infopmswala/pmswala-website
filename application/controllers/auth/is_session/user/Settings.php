<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends User_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        
    }
    public function notification_settings() {
        $this->data = array(
            'title' =>  get_compnay_title() .'| Dashboard'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","id"=>$this->session->userdata('user_id'));
	    $row_array = array('row_array');
        $this->data["td_users"] = $this->Main_model->get_data($where, "td_users",null,null,null,null,null,$row_array);
        $where = array("status" => "1");
	    $result_array = array('result_array');
	    $order_by = array('created_at','DESC');
        $this->data["td_notifications"] = $this->Main_model->get_data($where, "td_notifications",null,$order_by,null,null,$result_array);
        $this->data['_view_'] = 'user/notification_settings_view';
        $this->load->view('_user_', $this->data);
    }
    
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('td_notifications');
        $this->session->set_flashdata("success","Record has been Deleted successfully");
        redirect($_SERVER['HTTP_REFERER']);
    }
     public function chanage_password() {
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
        $this->data['_view_'] = 'user/chanage_password_view';
        $this->load->view('_user_', $this->data);
    }
    
    function change(){
        if ($_POST["submit"] == "update") {
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $where = array('id' => $this->session->userdata('user_id'));
				$user_details = $this->Main_model->get_data($where, 'td_users');
                if ($password == $repassword) {
                    $data = array(
                        'password' => md5($password),
                        'password_int' => $password
					);
                    $this->Main_model->update_data($where, $data, 'td_users');
                    $this->session->set_flashdata("success", 'Password updated successfully.');
                } else {
                    $this->session->set_flashdata("error", 'New password not match with repeat password.');
                }
                redirect(base_url() . 'auth/is_session/user/settings/chanage_password/');
            }
    }

}

