<?php

class Authentication extends MY_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->_table_name = "td_admin";
    }



    public function get_user_details($user_email_id,$user_password) {
        $values = array('email' => $user_email_id,'password' => $user_password,'user_status' => "Active");
        $query = $this->db->get_where(TABLE_USER, $values);
               
        if($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function get_user_details_from_id($user_id) {
        $values = array('id' => $user_id);
        $query = $this->db->get_where(TABLE_USER, $values);
        if($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }
     

    public function update_user_last_login($user_email_id) {

        if($user_email_id != '0'){
            $data = array(
               'user_last_login' => date("Y-m-d H:i:s"),
               'updated_date_time' => date("Y-m-d H:i:s")
            );
            $this->db->where('email', $user_email_id);
            $this->db->update(TABLE_USER, $data);
        }else{
            $user_data = array(
                    'login_email' => $user_email_id,                        
                    'added_date' => date('Y-m-d H:i:s'),
                    'log_query'=>"Error"
                );
            $this->db->insert("login_checking_log", $user_data);
        }
    }
    }


   

    

    
