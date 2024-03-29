<?php
// Declaring variables to prevents from the errors

$id = ""; // id
$fname = ""; // full name
$lname = ""; // last name
//$mo_no = ""; // mobile number of user
$user_name = ""; // username of user
$em = ""; // email
$em2 = ""; // confirm email
$dob = ""; // Date of birth of user
$password = ""; // password
$password2 = ""; // confirm password
$profile_pic = ""; // profile pic
$date = ""; // signup date
$error_array = array(); // displaying errors

if (isset($_POST['register_button'])) {
	// gettig values from register form

	// First Name
	$fname = strip_tags($_POST['reg_fname']); // remove html tags
	$fname = str_replace(" ", "", $fname); // remove spaces
	$fname = ucfirst(strtolower($fname)); // upper case first letter
	$_SESSION['reg_fname'] = $fname; // storing first name value in session variable


	// Last Name
	$lname = strip_tags($_POST['reg_lname']); // remove html tags
	$lname = str_replace(" ", "", $lname); // remove spaces
	$lname = ucfirst(strtolower($lname)); // upper case first letter
	$_SESSION['reg_lname'] = $lname; // storing last name value in session variable


	// Mobile ******************************************************************************************
	/*$mo_no = strip_tags($_POST['reg_mobile']); // remove html tags
	$mo_no = str_replace(" ", "", $mo_no); // remove spaces
	$_SESSION['reg_mobile'] = $mo_no; // storing mobile number value in session variable*/
	// ***************************************************************************************************


	// User Name
	$user_name = strip_tags($_POST['reg_username']); // remove html tags
	$user_name = str_replace(" ", "", $user_name); // remove spaces
	$user_name = strtolower($user_name); // lower case all character
	$_SESSION['reg_username'] = $user_name; // storing user name value in session variable


	// Email
	$em = strip_tags($_POST['reg_email']); // remove html tags
	$em = str_replace(" ", "", $em); // remove spaces
	$em = strtolower($em); // lower case first letter
	$_SESSION['reg_email'] = $em; // storing email value in session variable


	// Email2
	$em2 = strip_tags($_POST['reg_email2']); // remove html tags
	$em2 = str_replace(" ", "", $em2); // remove spaces
	$em2 = strtolower($em2); // lower case first letter
	$_SESSION['reg_email2'] = $em2; // storing email value in session variable


	// date of birth
	$dob = $_POST['dob']; // get the values of date of birth

	// Password
	$password = strip_tags($_POST['reg_password']); // remove html tags
	// Password2
	$password2 = strip_tags($_POST['reg_password2']); // remove html tags

	$date = date("Y-m-d"); // getting the current date



	/// email validation
	// ============================== 
	if ($em == $em2) {
		// check the format of the email
		if (filter_var($em, FILTER_VALIDATE_EMAIL)) {
			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

			// check if email already exists
			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
			// check the number of rows returned by the query
			$num_rows = mysqli_num_rows($e_check);
			if ($num_rows>0) {
				array_push($error_array, "<span style='color:#FF0000;'>Email already in use!!</span><br>");
			}
		}
		else{
			array_push($error_array, "<span style='color:#FF0000;'>Invalid format!!</span><br>");
		}
	}
	else{
		array_push($error_array, "<span style='color:#FF0000;'>Email doesn't match!</span><br>");
	}
	// ***********************************


	// first name validation
	// ======================
	if (strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "<span style='color:#FF0000;'>first name must be between 2-25 characters!!</span><br>");
	}
	// ***********************************


	// last name validation
	// ======================
	if (strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array, "<span style='color:#FF0000;'>last name must be between 2-25 characters!!</span><br>");
	}
	// ***********************************


	// password validation
	// ========================
	if ($password != $password2) {
		array_push($error_array, "<span style='color:#FF0000;'>password doesn't match!!</span><br>");
	}
	else{
		if (preg_match("/[^A-Za-z0-9]/", $password)) {
			array_push($error_array, "<span style='color:#FF0000;'>password can only contain a-z or numbers!!</span><br>");
		}
		if (strlen($password) > 20 || strlen($password )< 6)  {
			array_push($error_array, "<span style='color:#FF0000;'>password should atleast 6 character long or between 6-20!!</span><br>");
		} 
	}
	// ***********************************




	// username validation
	// ========================
	$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$user_name'");
	if (mysqli_num_rows($check_username_query)>0) {
		array_push($error_array, "<span style='color:#FF0000;'>Username already exists!!</span><br>");
	}
	if (strlen($user_name)<6) {
		array_push($error_array, "<span style='color:#FF0000;'>Username should be atleast of 6 characters!!</span><br>");
	}
	else{
		if (preg_match("/[^A-Za-z0-9]/", $user_name)) {
			array_push($error_array, "<span style='color:#FF0000;'>username can only contain a-z or numbers!!</span><br>");
		}
	}



	/*=======================encryption of password and profile pic assignment =====================*/
	if (empty($error_array)) {
		$password = md5($password); // encrypt password before sending to database
		
		/*------------------profile picture assignment---------------------*/
		$rand = rand(1,16);
		if ($rand == 1) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic1.png";
		}
		else if ($rand == 2) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic2.png";
		}
		else if ($rand == 3) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic3.png";
		}
		else if ($rand == 4) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic4.png";
		}
		else if ($rand == 5) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic5.png";
		}
		else if ($rand == 6) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic6.png";
		}
		else if ($rand == 7) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic7.png";
		}
		else if ($rand == 8) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic8.png";
		}
		else if ($rand == 8) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic9.png";
		}
		else if ($rand == 10) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic10.png";
		}
		else if ($rand == 11) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic11.png";
		}
		else if ($rand == 12) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic12.png";
		}
		else if ($rand == 13) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic13.png";
		}
		else if ($rand == 14) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic14.png";
		}
		else if ($rand == 15) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic15.png";
		}
		else if ($rand == 16) {
			$profile_pic = "/opt/lampp/htdocs/drulnet/assets/images/profile_pics/default/profile_pic16.png";
		}


		// ================= sending data to database ----------------------------------
		$query = mysqli_query($con, "INSERT INTO users VALUES ('0','$fname','$lname','$user_name','$em','no','$dob','$password','$profile_pic','0','0','no',',','$date')");
		/*if ($query) {
			echo "data send";
		}
		else{
			echo "failed".mysqli_error($con);
		}*/


		// displaying information for finishing the registrations
			
		    array_push($error_array, "<span style='color: #14C800'>You'll all set! Go ahead and Login!</span>");

			$_SESSION['reg_fname'] = "";
			$_SESSION['reg_lname'] = "";
			/*$_SESSION['reg_mobile'] = "";*/
			$_SESSION['reg_username'] = "";
			$_SESSION['reg_email'] = "";
			$_SESSION['reg_email2'] = "";
		

	} // end of if ------------------------------------ encryption and profile pic assignment
} // end of if (isset if)


?>
