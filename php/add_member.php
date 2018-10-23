<?php
	require 'includes/User.php';
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:http:".$_SERVER['HTTP_HOST']."/Pacific");
	}
	if(isset($_POST['add-btn'])){
	$conn = mysqli_connect('localhost', 'root', '', 'pacific')
	or die("couldnt connect to the database");

	$query = "SELECT * FROM users u, works_on w where u.user_id=w.user_id and w.project_id=".$_POST['project_id']." and u.user_id=".$_POST['select_member'];
	echo $query;
	$result = mysqli_query($conn, $query);
	if ($result){
		if(mysqli_num_rows($result)>0){
			$_SESSION['err'] = "User is already a member";
			header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/index.php");
		}else{
			$query = "INSERT INTO works_on values('".$_POST['select_member']."', '".$_POST['project_id']."', 'member')";
			$result = mysqli_query($conn, $query);
			if($result){
				header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/student/projectinfo.php?project_id=".$_POST['project_id']);
			}
		}
	}
	}
 ?>
