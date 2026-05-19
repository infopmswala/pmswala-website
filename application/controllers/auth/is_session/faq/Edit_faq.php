<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_faq extends My_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
        $get_id = $_GET['jwt_token'];
		$id = encrypt_decrypt($get_id, 'decrypt');
        if($_POST){
            if($_POST["update"] == "td_faqs"){   
			$data = array(
                "question" => $this->security->xss_clean($this->input->post("question")),
                "answer"  => $this->input->post("answer"),
                "meta_title"  => $this->security->xss_clean($this->input->post("meta_title")),
                "meta_keywords"  => $this->security->xss_clean($this->input->post("meta_keywords")),
                "meta_description"  => $this->security->xss_clean($this->input->post("meta_description")),
				'updated_by' => $this->security->xss_clean($this->session->userdata("id")),
				'updated_at' => date("Y-m-d H:i:s")
            );
            if (is_uploaded_file($_FILES['faq_image']['tmp_name'])) {
				$config1['upload_path'] = './uploads/faq/';
				$config1['allowed_types'] = '*';
				$config1['max_size'] = '*';
				$config1['overwrite'] = false;
				$config1['file_name'] = rand() . '_' . time();
				$this->load->library('upload', $config1);
				$this->upload->initialize($config1);
				if (!$this->upload->do_upload('faq_image', FALSE) && is_uploaded_file($_FILES['faq_image']['tmp_name'])) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata("error", '<p style="color:red">faq ' . $error['error'] . ' for Logo</p>');
					redirect(base_url() . "auth/is_session/faq/edit_faq/index?jwt_token=".$get_id);
				  } else {
					$out = $this->upload->data();
					$data['faq_image'] = './uploads/faq/' . $out['orig_name'];
				}
			}
            $where = array("id" => $id);
			$this->Main_model->update_data($where, $data, "td_faqs");
			$this->session->set_flashdata("success", "Data updated successfully.");
			redirect(base_url() . "auth/is_session/faq/list_faq/");
			}
        }
            $this->data = array(
                'title' => 'Edit faqs -Dashboard',
                'heading' => 'My Heading',
                'message' => 'My Message'
            );
            $where = array("status" => "1");
            $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
            $where = array("id" => $id);
            $this->data["td_faqs"] = $this->Main_model->get_data($where, "td_faqs");
             $this->data['_view_'] = 'backend/faqs/edit_faqs_view';
             $this->load->view('_backend_', $this->data);

        }

    



}

