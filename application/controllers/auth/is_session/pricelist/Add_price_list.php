<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_price_list extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){ 
		if ($_POST) {
            if ($_POST["submit"] == "td_price_list") {
				$data = array(
					'category_price_list' => $this->security->xss_clean($this->input->post("category_price_list")),
					'product' => $this->security->xss_clean($this->input->post("product")),
					'unit' => $this->security->xss_clean($this->input->post("unit")),
					'supply_location' => $this->security->xss_clean($this->input->post("supply_location")),
					'bpcl' => $this->security->xss_clean($this->input->post("bpcl")),
					'hpcl' => $this->security->xss_clean($this->input->post("hpcl")),
					'mrpl' => $this->security->xss_clean($this->input->post("mrpl")),
					'iocl' => $this->security->xss_clean($this->input->post("iocl")),
					'petrobazaar' => $this->security->xss_clean($this->input->post("petrobazaar")),
					'updated_date' => $this->security->xss_clean($this->input->post("updated_date")),
                    "created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"));
                $this->Main_model->insert_data($data, "td_price_list");
                $this->session->set_flashdata("success", "Data added successfully.");
			}
			redirect(base_url() . "auth/is_session/pricelist/list_price_list/");
        }
        		$this->data = array(
        		'title' => 'Add Price List - Dashboard',
        		'heading' => 'My Heading',
        		'message' => 'My Message');
		    $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $this->data['_view_'] = 'backend/pricelist/add_price_list_view';
            $this->load->view('_backend_', $this->data);
	}
}