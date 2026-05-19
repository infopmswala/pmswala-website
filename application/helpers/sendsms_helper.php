<?php
function send_mobile_otp($mobileno,$otp){
            $otp = $otp;
            $mobile = $mobileno;
            $curl = curl_init();
            $url = "https://control.msg91.com/api/v5/otp?template_id=1707171385560725456&mobile=91" . $mobile . "&otp=" . $otp . "&otp_length=4";
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
?>