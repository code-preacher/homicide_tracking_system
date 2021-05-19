<?php
  session_start();
  $id=$_GET['id'];
  include('../config.php');
 mysqli_query($con,"delete from ongoing_posts where id='$id'");
 $_SESSION['dmsg']= '<span style="color:green;">'."Ongoing Crime Report was successfully deleted".'</span>';
 header("location:view-report2.php");
?>