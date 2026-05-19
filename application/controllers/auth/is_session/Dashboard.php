<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends My_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->data = array(
            'title' =>  get_compnay_title() .'| Dashboard'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['_view_'] = 'backend/dashboard_view';
        $this->load->view('_backend_', $this->data);

    }



   

	



}

