<?php
  session_start();
  $id=$_GET['id'];
  include('../config.php');
 mysqli_query($con,"delete from posts where id='$id'");
 $_SESSION['dmsg']= '<span style="color:green;">'."Crime Report was successfully deleted".'</span>';
 header("location:view-report.php");
?>