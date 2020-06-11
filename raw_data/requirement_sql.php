<?php
# create database

$con = mysqli_connect("localhost","root","","rural_network");
if ($con) {
echo "Database created";
}
else{
echo "Failed to create database".mysqli_error();
}



// creating user table in sql

$query = mysqli_query($con,"CREATE TABLE users(
id VARCHAR(10),
first_name VARCHAR(25),
last_name VARCHAR(25),
mobile_num VARCHAR(10),
mobile_status VARCHAR(3),
username VARCHAR(100),
email VARCHAR(100),
email_status VARCHAR(3),
date_of_birth DATE,
password VARCHAR(255),
profile_pic VARCHAR(255),
num_post VARCHAR(10),
num_likes VARCHAR(10),
user_closed VARCHAR(3),
friend_array TEXT,
signup_date DATE);");

if ($query) {
echo "table created";
}
else{
echo "error in creating table!".mysqli_error($con);
}




?>
