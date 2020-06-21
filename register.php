<?php 
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>SignUp or Login - Bhilwara Network</title>
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="assets/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript">
		$(document).ready(function(){
			
			// onclick create an account, hide login form  and show registration form
			$("#register").click(function() {
				$("#first").slideUp("slow", function(){
					$("#second").slideDown("slow");
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
<body>
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







	<h3 style="background-color: #094162; color: #FFF; height: 74px; margin-right: 5px; margin: 0px;">Bhilwara Network<img src="assets\\images\\logo\\logo.png" alt="logo"></h3>
<div class="container-fluid">
	<div class="row">
		<div class="header col-sm-8">
			<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="assets/images/slider_images/011.jpg" alt="First slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="assets/images/slider_images/012.jpg" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="assets/images/slider_images/013.jpg" alt="Third slide">
			    </div>
			  </div>
			</div>
		</div>
		<div id="form" class="col-sm-4">
			<div id="first">
				<div class="form-group">
					<form action="register.php" method="POST">
						<input class="form-control" type="text" name="log_email" placeholder="Username" required=""><br>
						<input class="form-control" type="password" name="log_password" placeholder="Password" required=""><br>
						<input class="form-control btn btn-lg btn-primary btn-block" type="submit" name="login_button" value="Login">
						<br>
						<?php  
						if (in_array("Username or Password is incorrect.<br>", $error_array)) {
							echo "Username or Password is incorrect.<br>";
						}
						?>
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


	<p class="footer">D Rural Network</p>
</body>
</html>
