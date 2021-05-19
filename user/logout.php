<?php
session_start();
include '../config.php';
$date=date("d-m-y \@ g:i A");
$_SESSION['id']=="";
$_SESSION['login']=="";
session_unset();
$_SESSION['msg']='<span style="color:green;">'."You have successfully logged out".'</span>';
?>
<script language="javascript">
document.location="../login.php";
</script>
