<?php
	include 'includes/User.php';
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:http://".$_SERVER['HTTP_HOST']."/Pacific");
	}
	session_destroy();
	header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/");
?>
