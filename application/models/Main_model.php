<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_model extends MY_Model {
     function __construct() {
        parent::__construct();
    }
    public function insert_data($data = NULL, $table = NULL) {
        if ($table != NULL) {
            $this->_table_name = $table;
        }
        return $this->insert($data);
    }
    public function get_data($where = NULL, $table = NULL, $select = NULL, $order_by = NULL, $limit = NULL, $group_by = NULL, $result_array = NULL, $row_array = NULL, $first_row = NULL, $sum = NULL) {
        if ($table != NULL) {
            $this->_table_name = $table;
        }
        return $this->get_new($where, $table, NULL, NULL, $select, $order_by, $group_by, $limit, $result_array, $row_array, $first_row, $sum);
    }
    public function update_data($where = NULL, $data = NULL, $table = NULL) {
        if ($table != NULL) {
            $this->_table_name = $table;
        }
        return $this->update($where, $data);
    }   
    public function image_upload($image_name,$folder_name,$height='',$width=''){	
		$Img='';
		$config['upload_path'] = './uploads/'.$folder_name.'/'; /* NB! create this dir! */
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['max_size']  = '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$this->load->library('upload', $config);
		if(! $this->upload->do_upload($image_name))
		{
			$data['msg'] = $this->upload->display_errors();
		}
		else
		{
			$data = $this->upload->data();
			$uploadedImages[$image_name] = $data['file_name'];
			$Img = $uploadedImages[$image_name];
			$config_image = array();
			$config_image = array(
				'image_library' => 'gd2',
				'source_image' => './uploads/'.$folder_name.'/'.$Img,
				'new_image' => './uploads/'.$folder_name.'/'.$Img,
				'maintain_ratio' => FALSE,
				'rotate_by_exif' => TRUE,
				'strip_exif' => TRUE,
			);	
			if(!empty($height)){
				$config_image['height']=$height;
			}	
			if(!empty($width)){
				$config_image['width']=$width;
			}				
			$this->load->library('image_lib', $config_image);
			$this->image_lib->initialize($config_image);
			$this->image_lib->resize();
			$this->image_lib->clear();						
		}
		return   $Img;
	}
    function save($data, $table = false){
        if($table){
            $this -> table = $table;
        }
        if(isset($data['id'])){
            $this -> db -> update($this -> table, $data, array('id' => $data['id']));
            return $data['id'];
        }else{
            $this -> db -> insert($this -> table, $data);
            return $this -> db -> insert_id();
        }
    }
	public function count_rows($where = NULL, $table = NULL, $group_by = NULL) {
        return $this->countRows($where, $table, $group_by);
    }
	public function pagenation_data($table = NULL, $uri = NULL, $where_con = NULL) {
        $where = array("status" => 1);
        if ($where_con != NULL) {
            $where = $where_con;
        }
        $config["base_url"] = base_url() . $uri;
        $total_count = $config["total_rows"] = $this->Main_model->count_rows($where, $table);
        //$this->data['per_page'] = $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $limit = array(10, $page);
        $order_by = array('id', 'DESC');
        $details = $this->Main_model->get_data($where, $table, NULL, $order_by, $limit);
        //print_r($details);
        //exit;
        $links = $this->pagination->create_links();
        return array("data" => $details, "links" => $links, "total_count" => $total_count, "status" => TRUE);
    }


    function UpdateMenu($data = array(),$table_name = ''){
        $i=1;
        foreach ($data as $key => $value) {
            $this->db->set('position_order',$i)->where('id',$value)->update($table_name);
          $i++;
      }
  }
  
   public function CSV_download($page_name,$query){
		$this->load->helper('csv');
		query_to_csv($query, TRUE, $page_name.'('.date("m-d-Y").')'.'.csv');
	}
	
	
	function send_mobile_otp($mobileno,$otp){
            $otp = $otp;
            $mobile = $mobileno;
            $curl = curl_init();
            $url = "https://control.msg91.com/api/v5/otp?template_id=6631cc5cce44115f240a0ad7&mobile=91" . $mobile . "&otp=" . $otp . "&otp_length=4";
            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{"Param1":"1234"}',
              CURLOPT_HTTPHEADER => array(
                'accept: application/json',
                'authkey: 421167Ax24quMvw663110c8P1',
                'content-type: application/json',
                'Cookie: PHPSESSID=bde5ojltd2n5oaccmajdmavgo1'
              ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
        }
}

