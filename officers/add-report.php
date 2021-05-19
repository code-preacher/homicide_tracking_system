<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
$_SESSION['wmsg']="";
?>
<?php
include '../config.php';
 $officers = mysqli_query($con,"SELECT * FROM officers WHERE service_no='".$_SESSION['service_no']."' ");
    $row_officers = mysqli_fetch_assoc($officers);
    $totalRows_officers = mysqli_num_rows($officers);
    $posted_by=$row_officers['rank']. " " .$row_officers['officer']; 
    $ipo=$row_officers['id'];

$sysip = gethostbyname($HOSTNAME);

$IP = $_SERVER['REMOTE_ADDR'];        // Obtains the IP address
$computerName = gethostbyaddr($IP);   // Obtains the "remote host



if(isset($_POST['sub'])){
extract($_POST);

$pikx=$_FILES['pix']['name'];
          $temp=$_FILES['pix']['tmp_name'];
          $folder="crimeimages/" ;   
          $pos=strpos($pikx,'.');
         $len=strlen($pikx);
           $ext=substr($pikx, $pos, $len); 
            $pikx=str_replace($pikx,'.',rand(000,999).$ext );         
        $pix=$_SESSION['service_no']."-crime"."-".$fname."-".$oname."-"."$pikx";
        move_uploaded_file($temp,$folder.$pix)  ;
        $date=date("d-m-y \@ g:i A");

$qu=mysqli_query($con,"INSERT INTO posts (ipo, dates,case_no, fname, oname, age, sex, marital, height, state, nationality, occuation, emp_state, education, location, last_seen, crime, type, items, posted_by, legal_action, picture, remark,device,sysip) values('$ipo','$date','$case_no','$fname','$oname','$age','$sex','$marital','$height','$state','$nationality','$occuation','$emp_state','$education','$location','$last_seen','$crime','$type','$items','$posted_by','$legal_action','$pix','$remark','$computerName','$sysip')");

if($qu){
$_SESSION['wmsg']='<span style="color:green;">'."Crime Report was successfully Added".'</span>';
}
else{
$_SESSION['wmsg']='<span style="color:red;">'."Crime Report was not successfully Added".'</span>';    
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add Homicide Report</a></li>
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
                                <h4>ADD HOMICIDE REPORT</h4>

                                <p>
                               
                                <?php if (!empty($_SESSION['wmsg'])) {
                                    echo $_SESSION['wmsg'];
                                } 
                                 ?>
                            </p>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="#" method="POST" enctype="multipart/form-data">
                                       
 <div class="Container"><div class="row">                                    
<div class="col-md-3">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Case No. :</p>
                                            <input type="number" class="form-control input-rounded" name="case_no" placeholder="Please enter case number" required="required">
                                        </div>
</div>



<div class="col-md-3">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">First Name :</p>
                                            <input type="text" class="form-control input-rounded" name="fname" placeholder="Please enter first name" required="required">
                                        </div></div>

<div class="col-md-3">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Other Names :</p>
                                            <input type="text" class="form-control input-rounded" name="oname" placeholder="Please enter other names" required="required">
                                        </div></div>

<div class="col-md-3">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Age :</p>
                                            <input type="number" class="form-control input-rounded" name="age" placeholder="Please enter age" required="required">
                                        </div></div>

<div class="col-md-3">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Select Sex :</p>
                                            <select class="form-control input-rounded" name="sex" required="required">
                                                <option value="select sex" selected="selected">---------------Sex---------------</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option> 

                                            </select>
                                        </div> </div>   

<div class="col-md-3">
          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Marital Status :</p>
                                            <select class="form-control input-rounded" name="marital"  required="required">
                                             <option value="Marital Status" selected="selected">---------Marital Status---------</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Widowed">Widowed</option>
                </select>
     </div> </div>

<div class="col-md-3">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Height :</p>
                                            <input type="text" class="form-control input-rounded" name="height" placeholder="Please enter height" required="required">
                                        </div></div>  
<div class="col-md-3">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">State :</p>
                                            <input type="text" class="form-control input-rounded" name="state" placeholder="Please enter state" required="required">
                                        </div></div>

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Nationality :</p>
                                            <input type="text" class="form-control input-rounded" name="nationality" placeholder="Please enter nationality" required="required">
                                        </div></div>
<div class="col-md-4">
          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Occupation :</p>
                                            <select class="form-control input-rounded" name="occuation"  required="required">
                                             <option value="Occupation" selected="selected">-----Occupation-----</option>
                  <option value="CIVIL SERVANT">Civil Servant</option>
                  <option value="ENTERPRENEUR">Enterpreneur</option>
                  <option value="STUDENT">Student</option>
                </select>
     </div> </div>

<div class="col-md-4">
          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Employment Status :</p>
                                            <select class="form-control input-rounded" name="emp_state"  required="required">
                                             <option value="Employment Status" selected="selected">-----Employment Status-----</option>
                  <option value="EMPLOYED">Employed</option>
                  <option value="UNEMPLOYED">Unemployed</option>
                  <option value="STUDENT">Student</option>
                </select>
     </div> </div>


     <div class="col-md-4">
          <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Education:</p>
                                            <select class="form-control input-rounded" name="education"  required="required">
                                             <option value="Employment Status" selected="selected">-----Education-----</option>
                  <option value="PHD">PHD</option>
                  <option value="MSC">MSC</option>
                  <option value="BSC">BSC</option>
                  <option value="HND">HND</option>
                  <option value="ND">ND</option>
                  <option value="NCE">NCE</option>
                   <option value="NONE">None</option>
                </select>
     </div> </div>

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Location :</p>
                                            <input type="text" class="form-control input-rounded" name="location" placeholder="Please enter location" required="required">
                                        </div></div>
<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Last Seen On :</p>
                                            <input type="date" class="form-control input-rounded" name="last_seen" placeholder="Please enter last seen date" required="required">
                                        </div></div>

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Nature of crime :</p>
                                            <select class="form-control input-rounded" name="crime" required="required">
                                                <option value="select crime">----------Crime-------</option>
                  <option value="ASSAULT">Assault</option>
                  <option value="THEFT">Theft</option>
                  <option value="RAPE">Rape</option>
                  <option value="TERRORISM">Terrorism</option>  

                                            </select>
                                        </div> </div>


<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Type of Crime :</p>
                                            <input type="text" class="form-control input-rounded" name="type" placeholder="Enter crime type" required="required">
                                        </div></div>

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Crime Item found :</p>
                                            <input type="text" class="form-control input-rounded" name="items" placeholder="Enter crime item found" required="required">
                                        </div></div>

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Legal Action :</p>
                                            
                                            <textarea name="legal_action" placeholder="Enter legal action" required="required" rows="8" cols="20" class="form-control" style="height:100px"></textarea>
                                        </div></div>


                                        <div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Remark :</p>
                                            
                                            <textarea name="remark" placeholder="Enter remark" required="required" rows="8" cols="20" class="form-control" style="height:100px"></textarea>
                                        </div></div>

<div class="col-md-4">
 <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Upload Crime Image :</p>
                                            
                                            <input name="pix" type="file" class="form-control bg-primary" required="required" />
                                        </div></div>                                        

</div> </div>




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