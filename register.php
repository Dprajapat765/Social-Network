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
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
	<div class="forms">
		<ul class="tab-group">
			<li class="tab active"><a href="#reg_form">Sign Up</a></li>
			<li class="tab"><a href="#login_form">Log In</a></li>
		</ul>
		
		<form action="register.php" method="POST" id="login_form">
		    <div class="input-field">
				<input class="form-control" type="text" name="log_email" placeholder="Username" required=""><br>
				<input class="form-control" type="password" name="log_password" placeholder="Password" required=""><br>
				<input class="form-control btn btn-lg btn-success btn-block" type="submit" name="login_button" value="Login">
				<br>
				<?php if (in_array("<span style='color:#FF0000;'>Username or Password is incorrect.</span><br>", $error_array)) {
					echo "<span style='color:#FF0000;'>Username or Password is incorrect.</span><br>";
				}?>
				<a href="#" id="forget_password">Forget Password?</a>
			</div>
		</form>
		<form action="register.php" method="POST" id="reg_form">
			<div class="input-field">
		        <!-- ==============First Name ====================================== -->
				<input class="form-control" type="text" name="reg_fname" placeholder="First Name" value="<?php  
					if(isset($_SESSION['reg_fname'])){
						echo $_SESSION['reg_fname'];
					}
				?>" required=""><br>
				<!-- Display errors -->
				<?php  
					if (in_array("<span style='color:#FF0000;'>first name must be between 2-25 characters!!</span><br>", $error_array)) {
						echo "<span style='color:#FF0000;'>first name must be between 2-25 characters!!</span><br>";
					}
				?>
				<!--********************************************************************* -->
				<!--********************************************************************* -->


				<!-- ==============Last Name ====================================== -->
				<input class="form-control" type="text" name="reg_lname" placeholder="Last Name"  value="<?php  
					if(isset($_SESSION['reg_lname'])){
						echo $_SESSION['reg_lname'];
					}
				?>" required=""><br>
				<!-- Display errors -->
				<?php  if (in_array("<span style='color:#FF0000;'>last name must be between 2-25 characters!!</span><br>", $error_array)) {
					echo "<span style='color:#FF0000;'>last name must be between 2-25 characters!!</span><br>";
				}?>
				<!--********************************************************************* -->
				<!--********************************************************************* -->


				


				<!-- ==============Username ====================================== -->
				<input class="form-control" type="text" name="reg_username" placeholder="Username"  value="<?php  
					if(isset($_SESSION['reg_username'])){
						echo $_SESSION['reg_username'];
					}
				?>" required=""><br>
				<!-- Display errors -->
				<?php if (in_array("<span style='color:#FF0000;'>username can only contain a-z or numbers!!</span><br>", $error_array)) {
						echo "<span style='color:#FF0000;'>username can only contain a-z or numbers!!</span><br>";}
					else if (in_array("<span style='color:#FF0000;'>Username already exists!!</span><br>", $error_array)) {
						echo "<span style='color:#FF0000;'>Username already exists!!</span><br>";}
					else if (in_array("<span style='color:#FF0000;'>Username should be atleast of 6 characters!!</span><br>", $error_array)) {
						echo "<span style='color:#FF0000;'>Username should be atleast of 6 characters!!</span><br>";}
				?>
				<!--********************************************************************* -->
				<!--********************************************************************* -->


				<!-- =========================Email ====================================== -->
				<input class="form-control" type="email" name="reg_email" placeholder="Email Address" id="email"  value="<?php  
					if(isset($_SESSION['reg_email'])){
						echo $_SESSION['reg_email'];
					}
				?>"  required=""><br>

				<!-- confirm email -->
				<input class="form-control" type="email" name="reg_email2" placeholder="Confirm Email Address"   value="<?php  
					if(isset($_SESSION['reg_email2'])){
						echo $_SESSION['reg_email2'];
					}
				?>"  required=""><br>
				<!-- Display errors -->
				<?php if (in_array("<span style='color:#FF0000;'>Email already in use!!</span><br>", $error_array)) {echo "<span style='color:#FF0000;'>Email already in use!!</span><br>";}
				else if (in_array("<span style='color:#FF0000;'>Invalid format!!</span><br>", $error_array)) {echo "<span style='color:#FF0000;'>Invalid format!!</span><br>";}
				else if (in_array("<span style='color:#FF0000;'>Email doesn't match!</span><br>", $error_array)) {echo "<span style='color:#FF0000;'>Email doesn't match!</span><br>";}?>
				<!--********************************************************************* -->
				<!--********************************************************************* -->


				<!-- Date of Birth input -->
				<input class="form-control" type="date" name="dob" required=""><br>
				<!--********************************************************************* -->


				<!-- ==============Password ====================================== -->
				<input class="form-control" type="password" name="reg_password" placeholder="Password" id="password"  required=""><br>

				<!-- confirm password -->
				<input class="form-control" type="password" name="reg_password2" placeholder="Confirm Password"  required=""><br>

				<!-- Display errors -->
				<?php if (in_array("<span style='color:#FF0000;'>password doesn't match!!</span><br>", $error_array)) {
					echo "<span style='color:#FF0000;'>password doesn't match!!</span><br>";
				}
				else if (in_array("<span style='color:#FF0000;'>password can only contain a-z or numbers!!</span><br>", $error_array)) {
					echo "<span style='color:#FF0000;'>password can only contain a-z or numbers!!</span><br>";
				}
				else if (in_array("<span style='color:#FF0000;'>password should atleast 6 character long or between 6-20!!</span><br>", $error_array)) {echo "<span style='color:#FF0000;'>password should atleast 6 character long or between 6-20!!</span><br>";
				}?>
				<!--********************************************************************* -->
				<!--********************************************************************* -->

				<input class="form-control btn btn-lg btn-info btn-block" type="submit" id="reg_form" name="register_button" value="Signup">
		    </div>
		</form>


		
	</div>



	<div class="content">
		<div class="logo">
			<img src="assets/images/logo.png" alt="bhilwara network logo" width="80" height="80">
			<span>Bhilwara Network</span>
		</div>
		<!-- slider -->
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img style="height: 535px;" class="d-block w-100" src="assets/images/slider_images/011.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
					<img style="height: 535px;" class="d-block w-100" src="assets/images/slider_images/012.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img style="height: 535px;" class="d-block w-100" src="assets/images/slider_images/013.jpg" alt="Third slide">
				</div>
			</div>
		</div>
	</div>


	<div class="footer">
		<span class="title">Bhilwara Network</span>
		<span class="rights">All Rights Reserved by Bhilwara Network.</span>
		<span class="icons">Follow us on:
			<span><a href="#" class="fa fa-facebook"></a></span>
			<span><a href="#" class="fa fa-twitter"></a></span>
			<span><a href="#" class="fa fa-linkedin"></a></span>
			<span><a href="#" class="fa fa-youtube"></a></span>
			<span><a href="#" class="fa fa-instagram"></a></span>
		</span>
	</div>
	


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
$(document).ready(function(){
	  $('.tab a').on('click', function (e) {
	  e.preventDefault();
	  
	  $(this).parent().addClass('active');
	  $(this).parent().siblings().removeClass('active');
	  
	  var href = $(this).attr('href');
	  $('.forms > form').hide();
	  $(href).fadeIn(500);
	});
});
</script>
</body>
</html>
