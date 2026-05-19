<?php
if (!defined('BASEPATH'))  exit('No direct script access allowed');
class My_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('Email_model');
		$this->load->model('Get_paginated_model');
		$this->load->model('Main_model');
		$this->check_session();
    }
       
    
    public function paginate($url, $total_rows,$page_count)
	{
		//initialize pagination
		$page = $this->security->xss_clean($this->input->get('page'));
		$per_page = $this->input->get('show', true);
		if (empty($page)) {
			$page = 0;
		}

		if ($page != 0) {
			$page = $page - 1;
		}

		if (empty($per_page)) {
			$per_page = $page_count;
		}
		$config['num_links'] = 4;
		$config['base_url'] = $url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$get_page = (!empty($_GET['page'])) ? $_GET['page'] : 0;
        $start = ($get_page == 0 ? 1 : (($get_page - 1) * $config["per_page"] + 1));
		return array('per_page' => $per_page, 'offset' => $page * $per_page, 'start' => $start);
	}
    function check_session(){
		$users_ID = $this->session->userdata('id');
        if(!$users_ID){
            redirect('auth/log_session/login/');
        }
	}
	


      
}



class Api_Controller extends CI_Controller {
    function __construct() {
    parent::__construct();
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, x-xsrf-token, Authorization, X-Request-With');
	header('Access-Control-Allow-Credentials: true');
	header('Content-Type: application/json');
    $this->load->model('Main_model');
    }

    
}
       


class Frontend_Controller extends CI_Controller {
    function __construct() {
    parent::__construct();
    $this->load->model('Email_model');
    $this->load->model('Main_model');
    }
    
}

class User_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->model('Email_model');
		$this->load->model('Get_paginated_model');
		$this->load->model('Main_model');
		$this->user_session();
    }
     public function paginate($url, $total_rows,$page_count)
	{
		//initialize pagination
		$page = $this->security->xss_clean($this->input->get('page'));
		$per_page = $this->input->get('show', true);
		if (empty($page)) {
			$page = 0;
		}

		if ($page != 0) {
			$page = $page - 1;
		}

		if (empty($per_page)) {
			$per_page = $page_count;
		}
		$config['num_links'] = 4;
		$config['base_url'] = $url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['reuse_query_string'] = true;
		$this->pagination->initialize($config);
		$get_page = (!empty($_GET['page'])) ? $_GET['page'] : 0;
        $start = ($get_page == 0 ? 1 : (($get_page - 1) * $config["per_page"] + 1));
		return array('per_page' => $per_page, 'offset' => $page * $per_page, 'start' => $start);
	}
    function user_session(){
		$user_id = $this->session->userdata('user_id');
        if(!$user_id){
            redirect('login/landing_page/');
        }
	}
	


      
}