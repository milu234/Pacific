<?php

include '../php/includes/db.php';
include '../php/includes/User.php';
// require '../php/includes/User.php';
	session_start();
	if(isset($_SESSION['user'])){
		
	}
if(isset($_GET['update'])){
    $uid=$_GET['uid'];
    $name = $_GET['name'];
	$email = $_GET['email'];
	 $pass = $_GET['psw'];
	 $password_hash = password_hash($pass, PASSWORD_BCRYPT);
    // 	// $conf_pass = $_POST['confpsw'];
    include '../php/includes/utils.php';
	 $radio = $_GET['radio']; // user role
     $class = $_GET['class_name'];
     
	 $role_id = getRoleId($radio);
     $class_id = getClassId($class);
    
     $query2 = mysqli_query($conn,"UPDATE users set name = '$name', email='$email', password = '$pass',class_id='$class_id',role_id='$role_id' where user_id=$uid");
    
    header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/admin/viewusers.php");

    // echo $uid;
	// 	// get the class id and role id from the database and use them in the query
	// include '../php/includes/utils.php';
	
	 $role_id = getRoleId($radio);
     $class_id = getClassId($class);
     
     
     //header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/admin/viewusers.php");

	
}
 
?>