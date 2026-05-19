<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends My_Controller {
    public function __construct() {
        parent::__construct();
    }


    function update_single_slider(){
        if($_POST){
			if ($_POST["submit"] == "update_single_slider") {
                $where = array("id" => $this->input->post("uid"));
                $td_update_single_slider = $this->Main_model->get_data($where, "td_update_single_slider");
                $data = array(
                    "title_1" => $this->security->xss_clean($this->input->post("title_1")),
                    "title_2" => $this->security->xss_clean($this->input->post("title_2")),
                    "title_3" => $this->security->xss_clean($this->input->post("title_3")),
                    "title_4" => $this->security->xss_clean($this->input->post("title_4")),
                    'updated_by' => $this->session->userdata("id"),
                    'updated_at' => date("Y-m-d H:i:s")
                );
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = 'uploads/banner/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", '<p style="color:red">System Settings ' . $error['error'] . ' for Logo</p>');
                        redirect(base_url() . "auth/is_session/slider/update_single_slider/");
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/banner/' . $out['orig_name'];
                    }
                }
                $where = array("id" => $this->input->post("uid"));
                $this->Main_model->update_data($where, $data, "td_update_single_slider");
                $this->session->set_flashdata("success", "Data updated successfully.");
            }
             redirect(base_url() . "auth/is_session/slider/update_single_slider/");
		}
		 $this->data = array(
			'title' => 'Banner Image - Admin',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
        
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1");
		$row_array = array('row_array');
        $this->data["td_update_single_slider"] = $this->Main_model->get_data($where, "td_update_single_slider",null,null,null,null,null,$row_array);
        $this->data['_view_'] = 'backend/banner/update_single_slider_view';
        $this->load->view('_backend_', $this->data);
    }
   
}

