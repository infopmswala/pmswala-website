<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');
class Logout extends My_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('security');
    }
    public function index() {
        $this->session->sess_destroy();
        $this->session->set_userdata('');
        redirect(base_url()."auth/log_session/login/");
    }

    

}