<?php 
$con = mysqli_connect("localhost","root","","rural_network");
if ($con) {
	echo "Database created";
}
else{
	echo "Failed to create database".mysqli_error();
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Rural Network</title>
</head>
<body>

	<h1>This is Homepage.</h1>

</body>
</html>
