<?php
$servername = "localhost";
$username="root";
$password="";
$db="pacific";
//Create Connection
$conn = mysqli_connect($servername,$username,$password,$db);
//Check connection
if (!$conn) {
	die("Connection Failed".mysqli_connect_error());
	# code...
}
?>