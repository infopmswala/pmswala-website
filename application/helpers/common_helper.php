<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function maskPhoneNumber($phoneNumber) {
        $phoneNumber = $phoneNumber; //your phone number
        $showFirstDigits = 2; //how many digits to show in the beggining of the phone number
        $showLastDigits = 2; // how many digits to show in the end of the phone number
        $mask = substr_replace($phoneNumber,str_repeat('*',strlen($phoneNumber) - $showFirstDigits - $showLastDigits),$showFirstDigits,strlen($phoneNumber) - $showFirstDigits - $showLastDigits);
        return $mask;
    }
    
function random_number($size = 6)
{
    $random_number='';
    $count=0;
    while ($count < $size ) 
        {
            $random_digit = mt_rand(0, 9);
            $random_number .= $random_digit;
            $count++;
        }
    return $random_number;  
}

    function gettransactionid(){
            mt_srand((double)microtime()*10000);
            $charid = md5(uniqid(rand(), true));
            $c = unpack("C*",$charid);
            $c = implode("",$c);
            return substr($c,0,13);
    }
    

function randr($j = 8){
    $string = "";
        for($i=0;$i < $j;$i++){
            srand((double)microtime()*1234567);
            $x = mt_rand(0,2);
            switch($x){
                case 0:$string.= chr(mt_rand(97,122));break;
                case 1:$string.= chr(mt_rand(65,90));break;
                case 2:$string.= chr(mt_rand(48,57));break;
            }
        }
    return strtoupper($string); //to uppercase
    }
    
   function d_m_y_conversion($getdate){
    return date("d-m-Y", strtotime($getdate));
    }

    function y_m_d_conversion($getdate){
    return date("Y-m-d", strtotime($getdate));
    }

    function y_m_d_hisconversion($getdate){
    return date("Y-m-d H:i:s", strtotime($getdate));
    }

    function no_image(){
        return  "<img src='" . base_url() . 'assets/backend/images/no_image.png' . "'width='100'>" . "<br /><br />";
        
    }

    function Dateconversion($getdate){
        if(trim($getdate)!='0000-00-00'){
        return date('M d, Y', strtotime($getdate));
        }else{
        return '';
        }
    }

    function Timeconversion($getdate){
        if(trim($getdate)!='00:00:00' && trim($getdate)!=''){
        return date('h:i a', strtotime($getdate));
        }else{
        return '';
        }
    }

    function Datebreakconversion($getdate){
        if(trim($getdate)!='0000-00-00 00:00:00'){
        return date('d-m-Y', strtotime($getdate)).'<br>'.date('(h:i A)', strtotime($getdate));
        }else{
        return '';
        }
    }

        function getDaysAgo($lastloginTime){
            $estimate_time = time() - strtotime($lastloginTime);
            if( $estimate_time < 1 ){
                return 'less than 1 second ago';
            }
            $condition = array(
                        12 * 30 * 24 * 60 * 60  =>  'year',
                        30 * 24 * 60 * 60       =>  'month',
                        24 * 60 * 60            =>  'day',
                        60 * 60                 =>  'hour',
                        60                      =>  'minute',
                        1                       =>  'second'
            );
            foreach( $condition as $secs => $str ){
                $d = $estimate_time / $secs;
                if( $d >= 1 )
                {
                    $r = round( $d );
                    return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
                }
            }
        }

        function dateDiffInDays($date1, $date2)  
        {
            $diff = strtotime($date2) - strtotime($date1);
            return abs(round($diff / 86400)); 
        }


function split_str($str) 
{
if(!empty($str)){
$url_name=	strtolower($str);
$url_name1 = stripslashes(str_replace("'", '', $url_name));
$url_name2 = str_replace(str_split('~[\\\\/:&+*?"<>|]~'), '-', $url_name1);
$url_name2 = str_replace(str_split('()'), '', $url_name2);
$url_name3 = preg_replace('/[^A-Za-z0-9]/', '-',$url_name2);
$url_name3 = stripslashes(str_replace("---", '-', $url_name3));
$url_name3 = stripslashes(str_replace("--", '-', $url_name3));
}
return $url_name3;	
}

function get_url($str) 
{
if(!empty($str)){
$url_name=	strtolower(trim($str));
$url_name1 = stripslashes(str_replace("'", '', $url_name));
$url_name2 = str_replace(str_split('~[\\\\/:&+*?"<>|]~'), '-', $url_name1);
$url_name2 = str_replace(str_split('()'), '', $url_name2);
$url_name3 = preg_replace('/[^A-Za-z0-9]/', '-',$url_name2);
$url_name3 = stripslashes(str_replace("---", '-', $url_name3));
$url_name3 = stripslashes(str_replace("--", '-', $url_name3));
}
return $url_name3;	
}

function round_price($str){
	return str_replace(',','',number_format(floatval($str),2));
	
}
function numberFormat($num){
	return preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $num);
	
}

function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
    $secret_iv = '5fgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}

function generateSalt_e($length) {
	$random = "";
	srand((double) microtime() * 1000000);
	$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
	$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
	$data .= "0FGH45OP89";
	for ($i = 0; $i < $length; $i++) {
		$random .= substr($data, (rand() % (strlen($data))), 1);
	}
	return $random;
}
function Genearate_Email_verification_code(){
    $randomletter = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 8);
    return $randomletter;
    }

    if (!function_exists('create_slug')) {
        function create_slug($string)
        {
            $slug = trim($string);
            $slug = strtolower($slug);
            $slug = str_replace(' ', '-', $slug);
            $slug = str_replace('@', '-', $slug);
            $slug = str_replace('#', '-', $slug);
            $slug = str_replace('$', '-', $slug);
            $slug = str_replace('%', '-', $slug);
            $slug = str_replace('^', '-', $slug);
            $slug = str_replace('&', '-', $slug);
            $slug = str_replace('*', '-', $slug);
            $slug = str_replace('(', '-', $slug);
            $slug = str_replace(')', '-', $slug);
            $slug = str_replace('_', '-', $slug);
            $slug = str_replace('=', '-', $slug);
            $slug = str_replace('/', '-', $slug);
            $slug = str_replace('.', '-', $slug);
            $slug = str_replace(',', '-', $slug);
            $slug = str_replace('  ', '-', $slug);            
            return $slug;
        } } 
        
        

 function get_compnay_title() {
    $CI =& get_instance();
    $query = $CI->db->query("SELECT title FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['title'];
    }else{
        return false;
    }
}

function get_type_modules($module_type){
    $CI =& get_instance();
    $td_modules=$CI->db->select('module_name')->order_by('id',"desc")->limit(1)->where('module_type',$module_type)->where('status',1)->get('td_modules')->result_array();
    if(!empty($td_modules)){
        return $td_modules[0]['module_name'];
     }else{
         return false;
     }
}

function get_user_email($user_id){
     $CI =& get_instance();
     $td_user=$CI->db->select('email')->where('id',$user_id)->get('td_users')->row_array();
    if(!empty($td_user)){
        return $td_user['email'];
     }else{
         return false;
     }
}
function get_modules($module_type){
    $CI =& get_instance();
    $where = array("status" => "1",'module_type'=>$module_type);
    $td_modules = $CI->Main_model->get_data($where, "td_modules");
    if(!empty($td_modules[0])){
        return $td_modules;
     }else{
         return false;
     }
}
function get_compnay_logo()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT logo FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['logo'];
    }else{
        return false;
    }
}

function get_color_code()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT color FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['color'];
    }else{
        return false;
    }
}

function get_compnay_fav()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT fav FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['fav'];
    }else{
        return false;
    }
}

function get_footer()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT footer FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['footer'];
    }else{
        return false;
    }
}


function get_address()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT address FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['address'];
    }else{
        return false;
    }
}

function get_phone()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT phone FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['phone'];
    }else{
        return false;
    }
}


function get_email()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT email FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['email'];
    }else{
        return false;
    }
}

function get_hours()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT hours FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['hours'];
    }else{
        return false;
    }
}

function get_about()
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT about FROM td_settings");
    $config = $query->row_array();
    if(!empty($config)){
       return $config['about'];
    }else{
        return false;
    }
}


    function custom_echo($x, $length)
    {
      if(strlen($x)<=$length)
      {
        echo $x;
      }
      else
      {
        $y=substr($x,0,$length) . '...';
        echo $y;
      }
    }
?>