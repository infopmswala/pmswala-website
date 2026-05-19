<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Add_blog extends My_Controller {
public function __construct() {
        parent::__construct();
        $this->load->helper('url'); //You should autoload this one ;)
        $this->load->helper('ckeditor_helper');
    }
    public function index() {
		if($_POST){
			if($_POST["submit"] == "add_blog"){
				$date = str_replace("/", "-", $this->input->post("date"));
                $date = date("Y-m-d", strtotime($date));
                $where = array("category_id" => $this->input->post("category"));
                $td_category = $this->Main_model->get_data($where, "td_category");
                if($this->input->post("sub_category") != '-'){
                $where = array("sub_category_id" => $this->input->post("sub_category"));
                $td_sub_category = $this->Main_model->get_data($where, "td_sub_category");
                }
				$data = array(
                    "category_id" => $td_category[0]->category_id,
					"category" => $td_category[0]->category,
					"category_slug" => $td_category[0]->category_slug,
				    "sub_category_id" => (!empty($td_sub_category[0]->sub_category_id)) ? $td_sub_category[0]->sub_category_id : '-',
					 "sub_category" => (!empty($td_sub_category[0]->sub_category)) ? $td_sub_category[0]->sub_category : '-',
					"sub_category_slug" => (!empty($td_sub_category[0]->sub_category_slug)) ? $td_sub_category[0]->sub_category_slug : '-',
                    "title" => $this->security->xss_clean($this->input->post("title")),
                    'slug' => $this->security->xss_clean(create_slug($this->input->post('slug'))),
                    "description" => $this->input->post("description"),
                    "meta_title" => $this->security->xss_clean($this->input->post("meta_title")),
                    "meta_tag_description" => $this->security->xss_clean($this->input->post("meta_tag_description")),
                    "meta_tag_keywords" => $this->security->xss_clean($this->input->post("meta_tag_keywords")),
					"created_at" => date("y-m-d H:i:s"),
					"created_by" => $this->session->userdata("id"),
				);
               
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $config1['upload_path'] = './uploads/blog/';
                    $config1['allowed_types'] = '*';
                    $config1['max_size'] = '*';
                    $config1['overwrite'] = false;
                    $config1['file_name'] = rand() . '_' . time();
                    $this->load->library('upload', $config1);
                    $this->upload->initialize($config1);
                    if (!$this->upload->do_upload('image', FALSE) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata("error", $error['error']);
                        redirect(base_url() . 'auth/is_session/blog/add_blog/');
                    } else {
                        $out = $this->upload->data();
                        $data['image'] = 'uploads/blog/' . $out['orig_name'];
                    }
                }
				$this->Main_model->insert_data($data, "td_blog");
                $this->session->set_flashdata("success", "Blog added successfully");
                redirect(base_url() . "auth/is_session/blog/list_blog/");
			}
		}
		
		
		$this->data['ckeditor'] = array(
		
			//ID of the textarea that will be replaced
			'id' 	=> 	'content',
			'path'	=>	'js/ckeditor',
		
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"550px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
					
			),
		
			//Replacing styles from the "Styles tool"
			'styles' => array(
			
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Blue',
						'font-weight' 		=> 	'bold'
					)
				),
				
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 		=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
		$this->data = array(
			'title' => 'Add Blog - Admin',
			'heading' => 'My Heading',
			'message' => 'My Message'
		);
        
        $where = array("status" => "1");
        $this->data["td_settings"] = $this->Main_model->get_data($where, "td_settings");
        $where = array("status" => "1","pro_status" => "1");
        $this->data["td_category"] = $this->Main_model->get_data($where, "td_category");
        $where = array("status" => "1","pro_status" => "1");
        $this->data["td_sub_category"] = $this->Main_model->get_data($where, "td_sub_category");
        $this->data['_view_'] = 'backend/blog/add_blog_view';
        $this->load->view('_backend_', $this->data);
    }


    function getcategory(){
        $json = array();
        $where = array("status" => "1","pro_status" => "1",'category_id' => $this->input->post('category'));
        $json = $this->Main_model->get_data($where, "td_sub_category");
        header('Content-Type: application/json');
        echo json_encode($json);
    }
}