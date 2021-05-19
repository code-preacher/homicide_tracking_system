<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
?>
<?php
include '../config.php';
$qz=mysqli_query($con,"select * from officers order by id desc");
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
        <script>
      function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
      </script>
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Officers</a></li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>ALL OFFICERS </h4>
                                <p>
                               
                            </p>

                            </div>
                            <div class="card-body">

                                 <div class="form-group">
                             
                              <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"  placeholder="Search for an officer name....."  required>
                            </div>
                                   
  
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover table-bordered ">
                                        <thead>
                                            <tr>
                                                <th>Officer Name</th>
                                                
                                                <th>Rank</th>
                                                
                                                <th>Service Number</th>
                                                <th>Phone Number</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Date Created</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                          
                                            while($l=mysqli_fetch_array($qz)) {
                                               
                                             ?>
                                            <tr>
                                                
                                                
                                                <td><?php echo $l['officer']; ?></td>
                                               <td><?php echo $l['rank']; ?></td>
                                               <td><?php echo $l['service_no']; ?></td>
                                               <td><?php echo $l['phone']; ?></td>
                                               <td><?php echo $l['username']; ?></td>
                                               <td><?php echo $l['password']; ?></td>
                                               <td><?php echo $l['date_created']; ?></td>
                                            </tr>
                                            <?php                                                
                                            }
                                             ?>
                                           
                                        </tbody>
                                    </table>
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