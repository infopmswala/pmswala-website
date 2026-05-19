<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends User_Controller {
  public function __construct(){
	  parent::__construct();
	  $this->load->library('session');
      $this->load->helper('security');
  }

   
   function index(){
       $user_session = $this->session->userdata('user_id');
       $this->session->unset_userdata($user_session);
        redirect(base_url()."login/landing_page/");
   }
 
   
}