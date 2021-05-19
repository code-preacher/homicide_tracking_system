<?php
  error_reporting(E_ALL);
  ini_set("display_errors","on");

  if (isset($_POST['sub'])) {
    if (!empty($_POST['message']) && !empty($_POST['phone'])) {
      include 'sms-api.php';
      $msg = $_POST['message'];
      $phone = $_POST['phone'];

      sendSms($phone, $msg);

      $msg = "Message sent.";
	   echo $msg ;
    }
	else{	
	    $msg = "Message not sent.";	
		 echo $msg ;
	}
  }

?>

<html>
<head>
<style>
body{background:#534444;}
.a{margin:auto;width:400px;max-height:auto;background:#f9f9f9;font-family:trebuchet ms;font-size:14px; border:1px #fff;border-radius:8px;
padding:40px;
}
.b{width:120px;height:40px;}
</style>
</head>

<body>

<br/><br/><br/><br/><br/><br/><br/>
<div class="a">
<br/>

 <form action="" method="post" >
    
    <br>
    
       <div align="center">
	 
		PHONE: <input type="text" name="phone" required /><br/><br/>
			MESSAGE: <input type="text" name="message" required /><br/><br/>
<br/><br/>
        <label>
        <input type="submit" name="sub"  value="Send" class="b">
		          </label><p></p>
				  
				  <?php 
				  $msg=" ";
				 if($msg){
				 echo $msg;}?>

</div>
    </form>  
</div>


</body>
</html>