<?php
  session_start();
  include('../config.php');

if(isset($_POST['sub'])){
$username=$_POST['username'];
$password=$_POST['password'];

$q=mysqli_query($con,"update officers set username='$username',password='$password' where service_no='".$_SESSION['service_no']."'");

if($q){
$_SESSION['pmsg']='<span style="color:green;">'."Data was successfully updated".'</span>';
}
else{
$_SESSION['pmsg']='<span style="color:red;">'."Data was not successfully updated".'</span>';    
}
}

 header("location:profile.php");
?>