<?php
session_start();
error_reporting(0);
include '../checklogin.php';
check_login();
?>
<?php
include '../config.php';
$qd=mysqli_query($con,"select id from officers where service_no='".$_SESSION['service_no']."' order by id desc");
$qg=mysqli_fetch_assoc($qd);

$qk=mysqli_query($con,"select * from posts where ipo='".$qg['id']."' order by id desc");
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Reports</a></li>
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
                                <h4>ALL REPORTS </h4>
                                <p>
                               
                                <?php echo $_SESSION['dmsg'];  ?>
                                <?php echo $_SESSION['dmsg']="";  ?>


                            </p>

                            </div>
                            <div class="card-body">

                                 <div class="form-group">
                             
                              <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"  placeholder="Search....."  required>
                            </div>
                                   
  
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Case No.</th>
                                                
                                                <th>Crime-suspect Fullname</th>
                                                <th>Gender</th>
                                                <th>Marital Status</th>
                                                <th>Crime</th>
                                                <th>Crime Type</th>
                                                <th>Legal action</th>
                                                <th>View</th>
                                               <!-- <th>Edit</th>-->
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           
                                           while($r=mysqli_fetch_array($qk)) {
                                               

                                             ?>
                                            <tr>
                                                
                                                <td><?php echo $r['case_no']; ?></td>
                                                <td><?php echo $r['fname'].' '.$r['oname']; ?></td>
                                                <td><?php echo $r['sex']; ?></td>
                                                <td><?php echo $r['marital']; ?></td>
                                                <td><?php echo $r['crime']; ?></td>
                                                <td><?php echo $r['type']; ?></td>
                                                <td><?php echo $r['legal_action']; ?></td>

                                                <td><a href="report-detail.php?id=<?php echo $r['id']?>"><i class="fa fa-eye"></i></a></td>

                                          <!--     <td><a href="edit.php?id=<?php echo $r['id']?>" onClick="return confirm('Are you sure you want to edit this report ?')"><i class="fa fa-pencil"></i></a></td> -->

                                                <td><a href="delete.php?id=<?php echo $r['id']?>" onClick="return confirm('Are you sure you want to delete this crime report ?')"><i class="fa fa-bitbucket"></i></a></td>
                                                
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