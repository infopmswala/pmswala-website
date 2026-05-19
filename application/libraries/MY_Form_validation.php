<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {
    
    public function __construct($rules = array()) {
        parent::__construct($rules);
    }
    
    // Custom validation function for PAN card
    public function validate_pan($str) {
        $regex_pattern = '/^([A-Z]){5}([0-9]){4}([A-Z]){1}?$/';

        if (preg_match($regex_pattern, $str)) {
            return TRUE;
        } else {
            $this->set_message('validate_pan', 'The %s field must be a valid PAN card number.');
            return FALSE;
        }
    }
    
    public function validate_aadhar($str) {
        // Aadhar number regex pattern
        $pattern = '/^\d{12}$/'; // Change this pattern if necessary

        if (preg_match($pattern, $str)) {
            return TRUE;
        } else {
            $this->set_message('validate_aadhar', 'The %s field must be a valid Aadhar number.');
            return FALSE;
        }
    }
    
   public function validate_date_of_birth($str) {
        $date = DateTime::createFromFormat('Y-m-d', $str);
        if ($date && $date->format('Y-m-d') === $str) {
            // Calculate 18 years ago from the current date
            $eighteenYearsAgo = new DateTime('-18 years');
            
            // Check if the provided date is 18 years ago or earlier
            if ($date <= $eighteenYearsAgo) {
                return TRUE;
            } else {
                $this->set_message('validate_date_of_birth', 'The %s field should be at least 18 years ago.');
                return FALSE;
            }
        } else {
            $this->set_message('validate_date_of_birth', 'The %s field must be a valid date (YYYY-MM-DD format).');
            return FALSE;
        }
    }
}
?>
