<?php
session_start();
error_reporting(0);

include 'config.php';
if(isset($_POST['submit'])){

	extract($_POST);

		$qu=mysqli_query($con,"insert into user(fname,email,address,phone,username,password,gender) values('$fname','$email','$address','$phone','$username','$password','$gender')");
		if($qu){
			$_SESSION['msg']='<span style="color:green;">'."Account was created successfully".'</span>';
			header("location:login.php");
		}
		else{
			$_SESSION['tmsg']='<span style="color:red;">'."Error creating account, try inputting the correct data".'</span>';    
		}	

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOMICIDE CASES REPORTING SYSTEM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="register.php" class="login100-form validate-form" method="post">
<!-- 
					<span class="login100-form-title p-b-5">
						<p style="color: blue;opacity: .5;font-size: 20px;margin-top: -150px;"> <marquee behavior="alternate" scrollDelay="10">COURSEWARE FOR DISTANCE LEARNING</marquee></p>
						<br><br><br><br>
						
					</span> -->
					<h1 style="margin-top: -150px;">SignUp Form</h1>
					<p>
						<?php echo $_SESSION['tmsg']; ?>
						<?php echo $_SESSION['tmsg']=""; ?>
					</p>
					
					<div class="wrap-input100 validate-input" style="margin-top: -2px;" data-validate = "fullname is required">
						<input class="input100" type="text" name="fname" placeholder="Your Fullname" required  />
						<span class="focus-input100">Fullname</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Email is required">
						<input class="input100" type="email" name="email" placeholder="Your Email" required />
						<span class="focus-input100">Email</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Address is required">
						<input class="input100" type="text" name="address" placeholder="Your Address" required />
						<span class="focus-input100">Address</span>
						<span class="label-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Phone Number is required">
						<input class="input100" type="text" name="phone" placeholder="Your Phone Number" required />
						<span class="focus-input100">Phone Number</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" style="margin-top: -2px;" data-validate = "username is required">
						<input class="input100" type="text" name="username" placeholder="Your Username" required  />
						<span class="focus-input100">Username</span>
						<span class="label-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" style="margin-top: -2px;" data-validate = "password is required">
						<input class="input100" type="password" name="password" placeholder="Your Password" required  />
						<span class="focus-input100">Password</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Gender is required">
						<!-- 	<input class="input100" type="text" name="state" placeholder="Your State of Origin" required  /> -->
						<span>Gender</span>
						<select class="input100"  name="gender" title="Please Gender" placeholder="Your Gender" required="required">
							<option value="MALE">MALE</option>
							<option value="FEMALE">FEMALE</option>
						</select>
						<span class="label-input100"></span>
					</div>

					


					<div class="container-login100-form-btn">
						<button  type="submit" name="submit" class="login100-form-btn">
							Submit
						</button>
					</div>
					
					<div class="text-left p-t-6 p-b-20">
						<span class="txt2">

							<a href="index.html" style="text-decoration: none;">
								Go back to home?
								<i class="fa fa-home"></i>
							</a>
							|
							
							<a href="login.php" style="text-decoration: none;">
								Already have an account, Login
								<i class="fa fa-sign-in"></i>
							</a>

							
						</span>
					</div>


					
					
					


				</fieldset>
			</form>

			<div class="login100-more" style="background-image: url('images/e9.jpg');">
			</div>
		</div>
	</div>
</div>





<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>


