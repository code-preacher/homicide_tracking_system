<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
?>
<?php
include '../config.php';

$qk=mysqli_query($con,"select * from ongoing_posts where id='".$_GET['id']."' ");
$row_post=mysqli_fetch_assoc($qk);

?>





<!DOCTYPE html>
<html lang="en">

<head>
  
    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>HOMICIDE CASES REPORTING SYSTEM DASHBOARD</title>
    
    <!-- Basic SEO -->
     <meta name="description" content="HOMICIDE CASES REPORTING SYSTEM ">
    <meta name="keywords" content="HOMICIDE CASES REPORTING SYSTEM ">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/">
 
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->


    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
    p{
        color: #455A6B;
    }
</style>
        
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
   <?php
include "inc/header.php";
   ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
   <?php
include "inc/sidebar.php";
   ?>     
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Report in detail</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                    <!-- /# column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title">
                                <h4>REPORT IN DETAIL </h4>
                              <hr/>

                            </div>
                            <div class="card-body">



<div class="Container">
    
<div class="row">

<div class="col-md-12" style="font-size: 18px;font-weight: bold;color: blue;text-transform: uppercase;">
<p> <?php echo $row_post['report']; ?></p>


</div>

<div class="col-md-7">Reported by : Anonymous</div>
<div class="col-md-5">Time : <?php echo $row_post['date']; ?> </div>

<div class="col-md-12">
<?php 
if (!empty($row_post['image'])) {
    echo "<br><hr><h3 style='font-weight:bolder;color:#000;text-transform:uppercase;font-size:14px;'>Image Evidence:</h3>";
echo "<img src='../user/homicide_images/".$row_post['image']."' width='750' height='500'>";
} else {
echo "";
}
?>

</div>


<div class="col-md-12">
<?php 
if (!empty($row_post['audio'])) {
    echo "<br><hr><h3 style='font-weight:bolder;color:#000;text-transform:uppercase;font-size:14px;'>Audio Evidence:</h3>";
echo "<audio controls><source src='../user/homicide_audio/".$row_post['audio']."'></source></audio>";
} else {
echo "";
}
?>


<div class="col-md-12">
<?php 
if (!empty($row_post['video'])) {
    echo "<br><hr><h3 style='font-weight:bolder;color:#000;text-transform:uppercase;font-size:14px;'>Video Evidence:</h3>";
echo "<video controls><source src='../user/homicide_video/".$row_post['video']."'></source></audio>";
} else {
echo "";
}
?>

</div>

</div>

</div>

</div>



                                   
  
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->


                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->

<!-- FOOTER REGION -->
<?php
include "inc/footer.php";
?>

            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>