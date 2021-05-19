<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
$_SESSION['wmsg']="";
?>
<?php
include '../config.php';
    //$sysip = gethostbyname($HOSTNAME);

$IP = $_SERVER['REMOTE_ADDR'];        // Obtains the IP address
$computerName = gethostbyaddr($IP);   // Obtains the "remote host

if(isset($_POST['sub'])){
extract($_POST);

$date=date("d-m-y \@ g:i A");

$qu=mysqli_query($con,"INSERT INTO officers(officer,rank,service_no,phone,username,password,date_created) values('$officer','$rank','$service_no','$phone','$username','$password','$date')");
$qu2=mysqli_query($con,"INSERT INTO session_log(officer,rank,service_no,login_device,last_login,last_logout) values ('$officer','$rank','$service_no','$computerName','$date','$date') ");

if(($qu) && ($qu2)){
$_SESSION['wmsg']='<span style="color:green;">'."Officer  was successfully created".'</span>';
}
else{
$_SESSION['wmsg']='<span style="color:red;">'."Officer was not successfully created".'</span>';    
}
}
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add Officer</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>ADD OFFICER</h4>

                                <p>
                               
                                <?php if (!empty($_SESSION['wmsg'])) {
                                    echo $_SESSION['wmsg'];
                                } 
                                 ?>
                            </p>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="#" method="POST">
                                       
 <div class="Container"><div class="row">                                    
<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Officer Name :</p>
                                            <input type="text" class="form-control input-rounded" name="officer" placeholder="Please enter officer name" required="required">
                                        </div>
</div>


<div class="col-md-4">
          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Rank :</p>
                                            <select class="form-control input-rounded" name="rank"  required="required">
                                             <option value="Rank" selected="selected">--------Select Rank--------</option>
                  <option value="MAJOR">Major</option>
                  <option value="INSPECTOR">Inspector</option>
                  <option value="CORPRAL">Corpral</option>
                  <option value="SERGENT">Sergent</option>
                  <option value="PRO">PRO</option>
                </select>
     </div> </div>


<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Service Number :</p>
                                            <input type="number" class="form-control input-rounded" name="service_no" placeholder="Please enter service no" required="required">
                                        </div></div>

 <div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Phone Number :</p>
                                            <input type="text" class="form-control input-rounded" name="phone" placeholder="Please enter phone no" required="required">
                                        </div></div>                                       

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Username:</p>
                                            <input type="text" class="form-control input-rounded" name="username" placeholder="Please enter username" required="required">
                                        </div></div>
<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Password :</p>
                                            <input type="password" class="form-control input-rounded" name="password" placeholder="Please enter password" required="required">
                                        </div></div>
</div></div>



                                        <div class="form-actions">
                                        <button type="submit" name="sub" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="reset" class="btn btn-inverse">Clear</button>
                                    </div>
                                    </form>
                                </div>
                            </div>


                        </div>
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