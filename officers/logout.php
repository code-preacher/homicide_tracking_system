<?php
session_start();
include '../config.php';
$date=date("d-m-y \@ g:i A");
mysqli_query($con,"update session_log set last_logout='$date' where service_no='".$_SESSION['service_no']."' ");
$_SESSION['service_no']=="";
$_SESSION['login']=="";
session_unset();
$_SESSION['msg']='<span style="color:green;">'."You have successfully logged out".'</span>';
?>
<script language="javascript">
document.location="../login.php";
</script>
