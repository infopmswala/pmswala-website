<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
        $where = array("id" =>  $this->session->userdata('id'));
        $td_admin = $this->Main_model->get_data($where, "td_admin");
		$get_image = explode("/",$td_admin[0]->photo);
        $old_image= $get_image[2];  
		if ($_POST) {
            if ($_POST["submit"] == "profile") {
                if ($_FILES['image']['name'] != '') {                          
                    $image_name='image';$folder_name='profile';$height='345';$width='1350';
                    $image=$this->Main_model->image_upload($image_name,$folder_name,$height,$width); 
                 }else{
                    $image=$old_image;
                 }
				$data = array(
                    "photo" => "uploads"."/"."profile"."/".$image,
					'full_name' => $this->security->xss_clean($this->input->post("full_name")),
                    'email_id' => $this->security->xss_clean($this->input->post("email_id")),
                    'mobile_no' => $this->security->xss_clean($this->input->post("mobile_no")),
                    'address' => $this->security->xss_clean($this->input->post("address")),
                    'updated_by' => $this->session->userdata("id"),
                    'updated_at' => date("Y-m-d H:i:s"));
                        $where = array('id' => $this->session->userdata('id'));
                        $this->Main_model->update_data($where, $data, 'td_admin');
                       $this->session->set_flashdata("success", "Profile updated successfully.");
			}
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
                redirect(base_url() . 'auth/is_session/profile/');
            }
			redirect(base_url() . "auth/is_session/profile/");
        }
		$this->data = array(
		'title' => 'Profile ',
		'heading' => 'My Heading',
		'message' => 'My Message'
	);
    $where = array("id" => $this->session->userdata('id'));
    $this->data["td_admin"] = $this->Main_model->get_data($where, "td_admin");
    $where = array("status" => "1");
    $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
    $this->data['_view_'] = 'backend/profile_view';
    $this->load->view('_backend_', $this->data);
	}

}