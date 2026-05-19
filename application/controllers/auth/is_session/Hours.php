<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hours extends My_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        if($_POST){
			if($_POST["update"] == "update_hours"){
                if (isset($_POST['day_name'])) {
                    $id = '1';
                    $day_name = $_POST['day_name'];
                    $start_time = $_POST['start_time'];
                    $end_time = $_POST['end_time'];
                    $this->db->where("web_id", $id);
                    $this->db->delete("td_hours");
                for ($i = 0; $i <= 6; $i++) {
                if (isset($day_name[$i])) {
                $data = array('web_id' => '1', 'day_name' => $day_name[$i], 'start_time' => DATE("H:i:s", strtotime($start_time[$i])),
                'end_time' => DATE("H:i:s", strtotime($end_time[$i])),'created_date' => date('Y-m-d H:i:s'),
                );
				$this->Main_model->insert_data($data, "td_hours");
                $this->session->set_flashdata("success", "Hours update successfully");
            }
            }
            }
			}
		}
        $this->data = array(
            'title' =>  get_compnay_title() .'| Hours'
        );
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $this->data["timings"] = $this->Main_model->get_data(null, "td_hours");
        $this->data['_view_'] = 'backend/hours/hours_view';
        $this->load->view('_backend_', $this->data);
    }



   

	



}