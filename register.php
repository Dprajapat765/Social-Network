<?php 
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>SignUp or Login - Bhilwara Network</title>
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript">
		$(document).ready(function(){
			// onclick sign up, hide login form  and show registration form
			$("#signup").click(function() {
				$("#second").slideUp("slow", function(){
					$("#third").slideDown("slow");
				});
			});
			// onclick create an account, hide login form  and show registration form
			$("#register").click(function() {
				$("#first").slideUp("slow", function(){
					$("#second").slideDown("slow");
				});
			});

			// show registration form and hide otp process
			$("#back").click(function() {
				$("#third").slideUp("slow", function(){
					$("#second").slideDown("slow");
				});
			});

			// click on login link, hide all form annd show login form
			$("#log_in2").click(function() {
				$("#third").slideUp("slow", function(){
					$("#first").slideDown("slow");
				});
			});
			$("#log_in").click(function() {				
				$("#second").slideUp("slow", function(){
					$("#first").slideDown("slow");
				});
			});
		});
	</script>
</head>
<body background="assets/images/background/desktop.jpg">
	<?php 
	if (isset($_POST['reg_button'])) {
		echo '
		<script>
		$(document).ready(function(){
			$("#first").hide();
			$("#second").hide();
			$("#third").show();
			});
		</script>
		';
	}
	 ?>







<div class="container-fluid">
	<h3 style="background-color: #094162; color: #FFF; height: 74px; margin-right: 5px; margin: 0px;">Bhilwara Network<img src="assets\\images\\logo\\logo.png" alt="logo"></h3>
	<div class="row">
		<div class="header col-sm-8">
			<?php include "includes/standard.html"; ?>
		</div>
		<div id="form" class="col-sm-4">
			<div id="first">
				<div class="form-group">
					<form action="register.php" method="POST">
						<input class="form-control" type="text" name="log_email" placeholder="Username" required=""><br>
						<input class="form-control" type="password" name="log_password" placeholder="Password" required=""><br>
						<input class="form-control btn btn-lg btn-primary btn-block" type="submit" name="login_button" value="Login">
						<br>
						<a href="#" id="register">Create an account!!</a>
					</form>
				</div>
			</div><!-- end of first form -->



			<div class="form-group" id="second">
				<form action="register.php" method="POST">
					<!-- ==============First Name ====================================== -->
					<input class="form-control" type="text" name="reg_fname" placeholder="First Name" value="<?php  
						if(isset($_SESSION['reg_fname'])){
							echo $_SESSION['reg_fname'];
						}
					?>" required><br>
					<!-- Display errors -->
					<?php  
						if (in_array("first name must be between 2-25 characters!!<br>", $error_array)) {
							echo "first name must be between 2-25 characters!!<br>";
						}
					?>
					<!--********************************************************************* -->
					<!--********************************************************************* -->


					<!-- ==============Last Name ====================================== -->
					<input class="form-control" type="text" name="reg_lname" placeholder="Last Name"  value="<?php  
						if(isset($_SESSION['reg_lname'])){
							echo $_SESSION['reg_lname'];
						}
					?>" required><br>
					<!-- Display errors -->
					<?php  if (in_array("last name must be between 2-25 characters!!<br>", $error_array)) {
						echo "last name must be between 2-25 characters!!<br>";
					}?>
					<!--********************************************************************* -->
					<!--********************************************************************* -->


					


					<!-- ==============Username ====================================== -->
					<input class="form-control" type="text" name="reg_username" placeholder="Username"  value="<?php  
						if(isset($_SESSION['reg_username'])){
							echo $_SESSION['reg_username'];
						}
					?>" required><br>
					<!-- Display errors -->
					<?php if (in_array("username can only contain a-z or numbers!!<br>", $error_array)) {
							echo "username can only contain a-z or numbers!!<br>";}
						else if (in_array("Username already exists!!", $error_array)) {
							echo "Username already exists!!";}
						else if (in_array("Username should be atleast of 6 characters!!<br>", $error_array)) {
							echo "Username should be atleast of 6 characters!!<br>";}
					?>
					<!--********************************************************************* -->
					<!--********************************************************************* -->


					<!-- =========================Email ====================================== -->
					<input class="form-control" type="email" name="reg_email" placeholder="Email Address" id="email"  value="<?php  
						if(isset($_SESSION['reg_email'])){
							echo $_SESSION['reg_email'];
						}
					?>"  required><br>

					<!-- confirm email -->
					<input class="form-control" type="email" name="reg_email2" placeholder="Confirm Email Address"   value="<?php  
						if(isset($_SESSION['reg_email2'])){
							echo $_SESSION['reg_email2'];
						}
					?>"  required><br>
					<!-- Display errors -->
					<?php if (in_array("Email already in use!!<br>", $error_array)) {echo "Email already in use!!<br>";}
					else if (in_array("Invalid format!!<br>", $error_array)) {echo "Invalid format!!<br>";}
					else if (in_array("Email doesn't match!<br>", $error_array)) {echo "Email doesn't match!<br>";}?>
					<!--********************************************************************* -->
					<!--********************************************************************* -->


					<!-- Date of Birth input -->
					<input class="form-control" type="date" name="dob" required><br>
					<!--********************************************************************* -->


					<!-- ==============Password ====================================== -->
					<input class="form-control" type="password" name="reg_password" placeholder="Password" id="password"  required><br>

					<!-- confirm password -->
					<input class="form-control" type="password" name="reg_password2" placeholder="Confirm Password"  required><br>

					<!-- Display errors -->
					<?php if (in_array("password doesn't match!!<br>", $error_array)) {
						echo "password doesn't match!!<br>";
					}
					else if (in_array("password can only contain a-z or numbers!!<br>", $error_array)) {
						echo "password can only contain a-z or numbers!!<br>";
					}
					else if (in_array("password should atleast 6 character long or between 6-20!!<br>", $error_array)) {echo "password should atleast 6 character long or between 6-20!!<br>";
					}?>
					<!--********************************************************************* -->
					<!--********************************************************************* -->

					<input class="form-control btn btn-lg btn-info btn-block" type="submit" id="signup" name="register_button" value="Signup">
					<a href='#' id='log_in'>Already have an account!! Login here!</a>
					
				</form>
			</div><!-- end of second form -->
			
			

		</div><!-- end of form -->
	</div><!-- end of wor -->
</div><!-- end of container fluid -->
<script type="text/javascript">

</script>
	<!-- header of page -->
	<!-- <div class="container-fluid">
		<div>
			
			<div class="reg_form">
				<form>
					<input type="text" name="log_username" placeholder="Username"><br><br>
					<input type="password" name="password" placeholder="Password"><br><br>
					<input type="button" name="" value="Login">
				</form>
				<h2>Login or Signup</h2>
				
			</div>
		</div>
 -->		<!-- <div id="slider">
			<?php /*include 'standard.html';*/ ?>
		</div> -->
	<!-- `</div> -->
	<p class="footer">D Rural Network</p>
</body>
</html>
