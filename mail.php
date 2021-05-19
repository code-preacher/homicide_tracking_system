<?php
if(isset($_POST['sub'])) {
    $to = $_POST["emt"];
    $name = $_POST["nm"];
    $email= $_POST["emf"];
    $text= $_POST["msg"];
    $subject= $_POST["sj"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail  ---charset=iso-8859-1
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$name.'  '.$subject.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$subject.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>
        
    </table>';

    if (@mail($to, $subject, $message, $headers))
    {
        echo 'mail has been sent.';
    }else{
        echo 'failed';
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
	   	FROM: <input type="text" name="emf" required /><br/><br/>
	   	TO: <input type="text" name="emt" required /><br/><br/>
	NAME: <input type="text" name="nm" required /><br/><br/>
		SUBJECT: <input type="text" name="sj" required /><br/><br/>
			MESSAGE: <input type="text" name="msg" required /><br/><br/>
<br/><br/><br/>
        <label>
        <input type="submit" name="sub"  value="Send" class="b">
		          </label>

</div>
    </form>  <br><br>
</div>


</body>
</html>