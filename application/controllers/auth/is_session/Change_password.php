<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Change_password extends My_Controller {

	public function __construct(){

		parent::__construct();

	}

	

	public function index()
	{   
		if ($_POST) {
			if ($_POST["submit"] == "update") {
                $password = $_POST['password'];
                $current_password = $_POST['current_password'];
                $repassword = $_POST['repassword'];
                $where = array('id' => $this->session->userdata('id'));
				$user_details = $this->Main_model->get_data($where, 'td_admin');
                if ($user_details[0]->password_int != $current_password) {
                    $this->session->set_flashdata("error", 'Wrong current password.');
                    redirect(base_url() . 'auth/is_session/profile/');
				}
                if ($password == $repassword) {
                    $data = array(
                        'password' => md5($password),
                        'password_int' => $password
					);
                    $this->Main_model->update_data($where, $data, 'td_admin');
                    $this->session->set_flashdata("success", 'Password updated successfully.');
                } else {
                    $this->session->set_flashdata("error", 'New password not match with repeat password.');
                }
                redirect(base_url() . 'auth/is_session/change_password/');
            }
			redirect(base_url() . "auth/is_session/change_password/");
        }
		$this->data = array(
		'title' => 'Profile ',
		'heading' => 'My Heading',
		'message' => 'My Message'
          );
        $where = array("id" => $this->session->userdata('id'));
        $this->data["employee"] = $this->Main_model->get_data($where, "td_admin");
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/change_password_view';
        $this->load->view('_backend_', $this->data);

	}

	private function hash_password($password){

		return password_hash($password, PASSWORD_BCRYPT);

	 }

	



}