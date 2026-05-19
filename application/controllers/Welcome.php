<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
	public function send_mobile_otp(){
            // OTP
            $otp = rand(1231, 7879);
            $mobile = "919966515227";
            $curl = curl_init();
             $url = "https://control.msg91.com/api/v5/otp?template_id=6631cc5cce44115f240a0ad7&mobile=" . $mobile . "&otp=" . $otp . "&otp_length=4";
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
            print_r($response);exit; 
            file_get_contents($url);
           
            if ($url) {
            // file_get_contents($url); //for debugging
            return $response;
        } else {
            echo "Failure";
        }
        
        }
        
        
function send_otp(){

// MSG91 API credentials
$authKey = '421167Ax24quMvw663110c8P1'; // Your MSG91 API key

// OTP details
$mobileNumber = '919966768227'; // Recipient's mobile number
$otp = rand(100000, 999999); // Generate a random OTP

// API URL
$url = 'https://api.msg91.com/api/v5/otp';

// Prepare post parameters
$postData = array(
    'authkey'   => $authKey,
    'template_id' => '1707171385560725456', // Your MSG91 OTP template ID
    'mobile'    => $mobileNumber,
    'otp'       => $otp
);

// Initialize cURL
$ch = curl_init($url);

// Set the POST request options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    $error = curl_error($ch);
    echo "cURL Error: " . $error;
} else {
    // Print the response
    echo $response;
}

// Close cURL session
curl_close($ch);
print_r($response);exit;
}
}
