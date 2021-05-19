<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
$username=Cleanse(mysqli_real_escape_string($con,$_POST['username']));
$pass=Cleanse(mysqli_real_escape_string($con,$_POST['password']));


#User
$ret=mysqli_query($con,"SELECT * FROM user WHERE username='$username' and password='$pass'");
$num=mysqli_fetch_array($ret);


if($num>0)
{
$IP = $_SERVER['REMOTE_ADDR']; 
$computerName = gethostbyaddr($IP);
$date=date("d-m-y \@ g:i A");

$extra="user/dashboard.php";//
$_SESSION['id']=$num['email'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid username or password".'</span>';
	header("location:login.php");
}



	
#Officers
$ret2=mysqli_query($con,"SELECT * FROM officers WHERE username='$username' and password='$pass'");
$num2=mysqli_fetch_array($ret2);


if($num2>0)
{
$IP = $_SERVER['REMOTE_ADDR']; 
$computerName = gethostbyaddr($IP);
$date=date("d-m-y \@ g:i A");
mysqli_query($con,"update session_log set login_device='$computerName',last_login='$date' where service_no='".$num2['service_no']."' ");

$extra="officers/dashboard.php";//
$_SESSION['service_no']=$num2['service_no'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid username or password".'</span>';
	header("location:login.php");
}


#admin
$ret3=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$pass'");
$num3=mysqli_fetch_array($ret3);


if($num3>0)
{
$extra="admin/dashboard.php";//
$_SESSION['username']=$_POST['username'];
$_SESSION['login']=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['msg']='<span style="color:red;">'."Invalid username or password".'</span>';
	header("location:login.php");
}
}


function Cleanse($Data)
{
#$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
$Data = htmlentities($Data, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
$Data = stripslashes($Data); /** Add Strip Slashes Protection */
return $Data;
}
?>

