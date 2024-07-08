<?php

$host= "localhost";
$username= "root";
$password = "";

$db_name = "registration_form";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}