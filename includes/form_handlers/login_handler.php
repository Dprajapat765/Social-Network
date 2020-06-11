<?php 

if (isset($_POST['login_button'])) {
	
	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); // sanitize email address

	$_SESSION['log_email'] = $email; // store email in session variable
	$password = md5($_POST['log_password']); // get password

	$check_database_query = mysqli_query($con, "SELECT * FROM  users WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if ($check_login_query==1) {
		// you have successfully logged in
		$row = mysqli_fetch_array($check_database_query);
		$username =  $row['username'];

		$_SESSION['username'] = $username;
		header("Location:index.php");
		exit();
	}



?>