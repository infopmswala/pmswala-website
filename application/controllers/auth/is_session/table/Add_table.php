<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_table extends My_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->dbforge();
	}
	public function index(){  
		if($_POST){
			if($_POST["submit"] == "td_table"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
            
        
                $table_name = $this->input->post('table_name');
                $fields = $this->input->post('field');
                //print_r($fields);exit;
                if (trim($table_name) == "") {
                    $this->session->set_flashdata("error", "Table name is required");
                    redirect(base_url() . "auth/is_session/table/add_table/");
                }
        
        
                $data = [];
                $keys = []; //primary_key
        
                foreach ($fields as $key => $value) {
                    array_shift($fields[$key]);
                }
        
                
                foreach ($fields as $key => $val) {
                    if ($key == 'name') {
                        foreach ($fields['name'] as $f) {
                            $data[$f] = [];
                        }
                    }
                    if ($key == 'type') {
                        $i =0;
                        foreach ($data as $index => $Dvalue) {
                            $data[$index]['type'] = $fields['type'][$i];
                            $data[$index]['constraint'] = $fields['length'][$i];
        
                            // validate length
                            $this->_validate_fields_length($index, $data[$index]['type'], $data[$index]['constraint']);
        
                            if ($fields['value'][$i] === 'Auto Increment') {
                                $data[$index]['auto_increment'] = true;
                                $keys[] = $index;
                            }
        
                            if ($fields['value'][$i] === 'NULL') {
                                $data[$index]['default'] = null;
                            }
        
                            if ($fields['primary_key'][$i] == 1) {
                                $keys[] = $index;
                            }
        
                            if ($fields['unsigned'][$i] == 1) {
                                $data[$index]['unsigned'] = true;
                            }
        
                            if ($fields['null'][$i] == 1) {
                                $data[$index]['null'] = true;
                            }
        
                            if ($fields['zerofill'][$i] == 1) {
                                $data[$index]['default'] = 0;
                            }
                            $i++;
                        }
                    }
                }
        
                $this->dbforge->add_field($data);
                $this->dbforge->add_key($keys, true);
                $this->dbforge->create_table($table_name, true);
                $this->session->set_flashdata("success", "Data added successfully");
                redirect(base_url() . "auth/is_session/table/add_table/");
			}
		}
		$this->data = array(
			'title' => 'Add Articles - Dashboard',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
		$where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data['type'] = [
            'Numeric' => ['INT', 'TINYINT', 'SMALLINT', 'MEDIUMINT', 'BIGINT', 'FLOAT', 'DOUBLE', 'DECIMAL'],
            'Time' => ['DATE', 'DATETIME', 'TIMESTAMP', 'TIME', 'YEAR'],
            'String' => ['CHAR', 'VARCHAR', 'TEXT', 'TINYTEXT', 'MEDIUMTEXT', 'LONGTEXT', 'ENUM'],
            'binary' => ['BLOB', 'TINYBLOB', 'MEDIUMBLOB', 'LONGBLOB']
        ];
        $data = $this->db->list_fields('td_admin');
        //print_r($data);exit;
        $this->data['_view_'] = 'backend/table/add_table_view';
        $this->load->view('_backend_', $this->data);
	}

    private function _validate_fields_length($field_name, $type, $constraint)
    {
        $needed_length_arr = ['INT','CHAR','CHARACHTER','TINYINT'];
        if (in_array($type, $needed_length_arr) and ($constraint == "" or $constraint == 0)) {
            $this->session->set_flashdata("error", 'Field <b>'.$field_name.'</b> must have lenght');
            redirect(base_url() . "auth/is_session/table/add_table/");
        }
    }

}

