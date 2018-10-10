<?php
	session_start();
	$email = $_POST['email'];
	$password = $_POST['psw'];

	$conn = mysqli_connect("localhost", "root", "", "Pacific") or die("couldnt connect to the database.");

	// first we check whether the user exists
	$query = "Select * from users where email='".$email."'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) == 1){
		// user exists
		$query = "Select user_id, class_id, role_id from users where email='".$email."' and password='".$password."'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1){
			// password matched
			$id = mysqli_fetch_assoc($result)['user_id'];
			$role_id = mysqli_fetch_assoc($result)['role_id'];
			$class_id = mysqli_fetch_assoc($result)['clas_id'];
			include 'includes/utils.php';
			include 'includes/User.php';
			$user_obj = new User($id, $email, getRoleName($role_id), getClassName($class_id));
			$_SESSION['user'] = serialize($user_obj);
			$_SESSION['login_success'] = True;
			$_SESSION['notif-box-color'] = "green";
			$_SESSION['notif-box-message'] = "You have logged in succesfully.";
			header("location:http://localhost/Pacific/");
		} else {
			$_SESSION['err'] = "Invalid username or password.";
			header("location:http://localhost/Pacific");
		}

	} else {
		$_SESSION['err'] = "User does not exit";
		header("location:http://localhost/Pacific/");
	}

?>