<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');
class Forgot_password extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Email_model');
        $this->load->model('Main_model');
    }
    public function index() {
        $validation = array(
        array('field' => 'email', 'rules'=>'required'),
          );
    $this->form_validation->set_rules($validation);
    if($this->form_validation->run()==true) {
         $query = $this->db->get_where('td_admin', array(
                'email_id' => $this->input->post('email')
            ));
           $email = $this->input->post('email');
            if ($query->num_rows() > 0) {
                $id   = $query->row()->id;
                $new_password  =  substr(md5(mt_rand(100000, 999999)),0,6);
                $data['password_int'] = $new_password;
                $data['password'] = md5($new_password);
                $this->db->where('id', $id);
                $this->db->update('td_admin', $data);
                if ($this->Email_model->password_reset_email($new_password , $email)) {
                  $this->session->set_flashdata("success", "Email Sent successfully.");
                } else {
                    $this->session->set_flashdata("error", "Email Not Sent successfully.");
                }
            } else {
                $this->session->set_flashdata('error', 'invalid Email Id');
            }
    }
    $this->data = array(
        'title' => get_compnay_title() . ' | Forgot Password | Admin'
    );
    $where = array("status" => "1");
    $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
    $this->load->view('backend/forgot_password_view', $this->data);
}

}