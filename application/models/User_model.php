<?php
class User_model extends MY_Model {
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->_table_name = "td_admin";
    }
    public function insert_data($data = NULL, $table = NULL) {
        if ($table != NULL) {
            $this->_table_name = $table;
        }
        return $this->insert($data, $table);
    }
    public function get_data($where = NULL, $table = NULL, $select = NULL) {
        if ($table != NULL) {
            $this->_table_name = $table;
        }
        return $this->get($where, $table, NULL, NULL, $select);
    }
    public function login_user() {
        $where = array(
            'email_id' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
        $readUserRow = $this->get_data($where);
        if (count($readUserRow) == 1) {
            $this->load->model('Main_model');
            $where = array('id' => 2);
            $users = $this->Main_model->get_data($where, 'td_admin');
            $data = array(
                'id' => $readUserRow[0]->id,
                'email' => $readUserRow[0]->email_id,
                'first_name' => $readUserRow[0]->full_name,
                'user_name' => $readUserRow[0]->user_name,
                'user_type' => $readUserRow[0]->user_type,
                'full_name' => $readUserRow[0]->full_name,         
                'photo' => $readUserRow[0]->photo,
                'pic' => $readUserRow[0]->pic,
                'mobile' => $readUserRow[0]->mobile_no,
                'login_at' => date('Y-m-d H:i:s'),
                'loggedin' => TRUE
            );
            /*
             * Update api session table
             */
            $ses_data = array(
                'session_id' => session_id(),
                'ip_address' => $this->get_client_ip(),
                'user_id' => $data['id'],
                'login_at' => $data['login_at'],
            );
            $data['session_id_login'] = $ses_data['session_id'];
            $this->insert_data($ses_data, 'td_api_sessions');
            $this->session->set_userdata($data);
            return true;
        } else {
            return false;
        }
    }

    public function get_client_ip() {
        $ipaddress = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }

        return $ipaddress;
    }

    
     public function get_user_details_from_id($user_id) {
        $values = array('phone' => $user_id);
        $query = $this->db->get_where('td_users', $values);
        if($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }

}