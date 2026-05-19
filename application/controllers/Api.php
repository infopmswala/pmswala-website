<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Main_model');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
    }
    
    public function contact_list(){
        try {
            // Build query
            $this->db->select('*');
            $this->db->from('td_contact_us');
            $this->db->order_by('id', 'DESC');
            
            $query = $this->db->get();
            $contacts = $query->result();
            
            // Prepare response
            $response = [
                'success' => true,
                'total' => count($contacts),
                'data' => $contacts
            ];
            
            echo json_encode($response);
            
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Error fetching contact list',
                'error' => $e->getMessage()
            ];
            echo json_encode($response);
        }
    }
    
    public function contact_details($id = null){
        try {
            if (empty($id)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Contact ID is required'
                ]);
                return;
            }
            
            $where = ['id' => $id];
            $contact = $this->Main_model->get_data($where, 'td_contact_us');
            
            if (!empty($contact)) {
                echo json_encode([
                    'success' => true,
                    'data' => $contact[0]
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Contact not found'
                ]);
            }
            
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => 'Error fetching contact details',
                'error' => $e->getMessage()
            ]);
        }
    }
}
