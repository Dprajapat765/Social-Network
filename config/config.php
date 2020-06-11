<?php 
ob_start(); // turns on output buffering
session_start();

$timezone = date_default_timezone_set('Asia/Calcutta');


$con = mysqli_connect("localhost","root","","rural_network");
if ($con) {
	//echo "Database created";
}
else{
	echo "Failed to create database".mysqli_error();
}


?>