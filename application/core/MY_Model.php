<?php
class MY_Model extends CI_Model {
    public $_table_name = '';
    public $_primary_key = '';
    public $_order_by = '';
    public $rules = array();
    protected $_timestamps = FALSE;
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }



    public function get($where = NULL, $order = NULL, $single = NULL, $select = NULL, $order_by = NULL, $group_by = NULL, $limit = NULL) {
        /*         * *******************************************************************************
         *   $where = array("id" => "2", "name" => "rajesh", "mobile" => "12345690");  *
         *   $order = array("20", "0");                                                  *
         *   $single = TRUE || FALSE;                                                    *
         * ****************************************************************************** */
        if ($where != NULL) {
            $this->db->where($where);
        }
        if($limit != NULL){
            $this->db->limit($limit[0], $limit[1]);
        }
        //select columns
        if ($select != NULL) {
            $this->db->select($select);
        }
         if ($group_by != NULL) {
            $this->db->group_by($group_by[0]);
        }
        if ($order_by != NULL) {
            $this->db->order_by($order_by[0], $order_by[1]);
        }
        if ($order != NULL) {
            $query = $this->db->get($this->_table_name, $order[0], $order[1]);
        } else {
            $query = $this->db->get($this->_table_name);
        }
        if ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        return $query->$method();

    }

      public function get_new($where = NULL, $table = NULL, $order = NULL, $single = NULL, $select = NULL, $order_by = NULL, $group_by = NULL, $limit = NULL, $result_array = NULL, $row_array = NULL, $first_row = NULL, $sum = NULL) {

        /*         * *******************************************************************************

         *   $where = array("id" => "2", "name" => "", "mobile" => "12345690");  *

         *   $order = array("20", "0");                                                  *

         *   $single = TRUE || FALSE;                                                    *

         * ****************************************************************************** */

        if ($table != NULL) {

            $this->_table_name = $table;

        }

        if ($where != NULL) {



            $this->db->where($where);

        }





        if ($limit != NULL) {

            $this->db->limit($limit[0], $limit[1]);

        }



        //select columns

        if ($sum != NULL) {
            $this->db->select_sum($sum[0], $sum[1]);
        }
        if ($select != NULL) {
            $this->db->select($select);
        }
        if ($group_by != NULL) {
            $this->db->group_by($group_by);
        }
        if ($order_by != NULL) {
            $this->db->order_by($order_by[0], $order_by[1]);
        }
        if ($order != NULL) {
            $query = $this->db->get($this->_table_name, $order[0], $order[1]);
        } else {
            $query = $this->db->get($this->_table_name);
        }

        if ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }

        if ($result_array == TRUE) {
            $method = 'result_array';
        }
        
        if($row_array == TRUE) {
            $method = 'row_array';
        }

        if($first_row == TRUE) {
            $method = 'first_row';
        }

        return $query->$method();

    }



    public function update($where = NULL, $data = NULL) {



        if ($where != NULL && $data != NULL) {



//            if($where != NULL){

//                foreach ($where as $value){

//                    $this->db->where($value[0], $value[1]);

//                }

//            }

            return $this->db->update($this->_table_name, $data, $where);

        }

    }



    public function insert($data = NULL) {



        if ($data != NULL) {

            $this->db->set($data);

            $data = $this->db->insert($this->_table_name);

            $id = $this->db->insert_id();

            return $id;

        }

    }

          

    public function inserts($datas = NULL) {



        if ($datas != NULL) {

            $this->db->set($datas);

            $datas = $this->db->insert($this->_table_name);

            $id = $this->db->insert_id();

            return $id;

        }

    }



    public function delete($data = NULL) {

        if ($data != NULL) {

            $this->db->where($data);

            //$this->db->limit(1);

            return $this->db->delete($this->_table_name);

        }

    }



    public function whereLike($where = NULL, $select = NULL) {



        if ($select != NULL) {



            $this->db->select($select);

        }





        $this->db->like($where[0], $where[1]);



        $query = $this->db->get($this->_table_name);



        return $query->result();

    }

    

     public function countRows($where = NULL, $table = NULL, $group_by = NULL) {

        $where_str = $where;

        $i = 0;

        if (is_array($where)) {

            foreach ($where as $key => $value) {

                if ($i == 0) {

                    $where_str = " $key = $value";

                } else {

                    $where_str .= " AND $key = $value";

                }

                $i++;

            }

        }

        if ($where == null) {

            $query = $this->db->query(" SELECT * FROM $table");

        }

        if ($where == null && $group_by != NULL) {

            $query = $this->db->query(" SELECT * FROM $table GROUP BY $group_by[0] ");

        }



        if ($where_str != "") {

            $query = $this->db->query(" SELECT * FROM $table WHERE $where_str ");

        }

        if ($where_str != "" && $group_by != NULL) {

            $query = $this->db->query(" SELECT * FROM $table WHERE $where_str GROUP BY $group_by[0] ");

        }



        return $query->num_rows();

    }



}

