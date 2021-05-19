<?php
function sendSms2($phone, $msg){
          $url = "http://portal.bulksmsnigeria.net/api/?username=odehemmanuel5@gmail.com&password=#&message=". urlencode($msg)."&sender=LMS&mobiles=$phone";

          $ch = curl_init();
          $optArray = array(
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true
          );
          curl_setopt_array($ch, $optArray);
          $result = curl_exec($ch);
          curl_close($ch);
}

function sendSms($phone, $msg){

/*
    Sending messages using our API
    Requirements - PHP, file_get_contents (enabled) function
*/

// Initialize variables ( set your variables here )
$username = 'petersammy7070@gmail.com';

$password = '#';

$sender   = 'CRIMEALERT';

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
    $_SESSION['dmsg']='<span style="color:#CDC093;font-family:trebuchet ms;">'."Otp has been sent to you...".'</span>';
}
else if(isset($result->error))
{    // Message failed, check reason.
   $_SESSION['dmsg']='<span style="color:#CDC093;font-family:trebuchet ms;">'."Error sending Otp...".$result->error.'</span>';
}
else
{// Could not determine the message response.
    $_SESSION['dmsg']='<span style="color:#CDC093;font-family:trebuchet ms;">'."Unable to process request...".'</span>';
}

}
?>
