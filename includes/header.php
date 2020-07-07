<?php 
require 'config/config.php';
/*check if user logged in or not*/
if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else{
	header('Location: register.php');
}

?>

<html>

<head>
	<title>Welcome to Bhilwara Network</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Fontdiner+Swanky&display=swap" rel="stylesheet">
	<!-- register stylesheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div class="top_bar">
		<div class="home_logo">
			<a href="index.php">
				<img src="assets/images/logo.png">
				<span>Bhilwara Network</span>
			</a>
		</div>

		<nav>
			<a href="<?php echo $userLoggedIn; ?>" style="font-size: 17px;">
				<?php echo $user['first_name']; ?>
			</a>
			<a href="index.php" title="Home">
				<i class="fa fa-home fa-lg"></i>
			</a>
			<a href="#" title="Notifications">
				<i class="fa fa-bell-o fa-lg"></i>
			</a>
			<a href="#" title="Messages">
				<i class="fa fa-envelope fa-lg"></i>
			</a>
			<a href="#" title="My Account">
				<i class="fa fa-users fa-lg"></i>
			</a>
			<a href="#" title="Settings">
				<i class="fa fa-cog fa-lg"></i>
			</a>
		</nav>
	</div>

	<!-- wrapper class of main page  clossing this on index.php-->
	<div class="container">
		<div class="wrapper">
