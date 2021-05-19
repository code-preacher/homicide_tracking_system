<?php

function randomActivate() { 
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); 
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
    }



    function active_exist($code) {
     global $con;
     $num_user = query_rows('otp', $code, 'otp_code' );
     if($num_user > 0){
        $code = randomActivate();
        $tr_code = $code;
        active_exist($tr_code);
     }
     
    return $code;
  }



function sms ($sender,$to,$message){

// initialize the curl resource
$jane = curl_init();

// set a single option...
//curl_setopt($ch, OPTION, $value);
$postData = array(
    'sender' => $sender,
    'to' => $to,
    'message' => $message,
    'type' => 0,
    'routing' => 4,
    'token' => 'Z8azG2wMVjQemfvnl4UopdRKDQLmt1gZZqDAVvD602W7dYQT1bN0nZGgFmPlVHPa157JGHN8Nc3Itnfm71cWPYPg0r8YkTzLfH2x'
 
);
// ... or an array of options
curl_setopt_array($jane, array(
    CURLOPT_URL => 'https://smartsmssolutions.com/api/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData,
    
));
// execute
$output = curl_exec($jane);
$arrysms = explode("||",$output);
$status = $arrysms[0]; //Return 1000 if successful and 1001 if failure occurs.
return $status;
}

function sendSms($phone, $msg){

/*
    Sending messages using our API
    Requirements - PHP, file_get_contents (enabled) function
*/

// Initialize variables ( set your variables here )
$username = 'petersammy7070@gmail.com';

$password = 'ochepeter';

$sender   = 'CRIME INFO';

$message  = $msg;

// Separate multiple numbers by comma
$mobiles  = $phone;

// Set your domain's API URL
$api_url  = 'https://portal.bulksmsnigeria.net/api/';

//Create the message data
$data = array('username'=>$username, 'password'=>$password, 'sender'=>$sender, 'message'=>$message, 'mobiles'=>$mobiles);

//URL encode the message data
$data = http_build_query($data);

//Send the message
$request = $api_url.'?'.$data;
$result  = file_get_contents($request);
$result  = json_decode($result);

if(isset($result->status) && strtoupper($result->status) == 'OK')
{ // Message sent successfully, do anything here
    $_SESSION['kmsg']='<span style="color:#CDC093;font-family:trebuchet ms;">'."Crime alert has been sent to all Officers...".'</span>';
}
else if(isset($result->error))
{    // Message failed, check reason.
   $_SESSION['kmsg']='<span style="color:#CDC093;font-family:trebuchet ms;">'."Error sending Otp...".$result->error.'</span>';
}
else
{// Could not determine the message response.
    $_SESSION['kmsg']='<span style="color:#CDC093;font-family:trebuchet ms;">'."Unable to process request...".'</span>';
}

}
?>



