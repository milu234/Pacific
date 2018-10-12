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
			$user = mysqli_fetch_assoc($result);
			include 'includes/utils.php';
			include 'includes/User.php';
			$user_obj = new User($user['user_id'], $email, getRoleName($user['role_id']), getClassName($user['class_id']));
			$_SESSION['user'] = serialize($user_obj);
			$_SESSION['login_success'] = True;
			$_SESSION['notif-box-color'] = "green";
			$_SESSION['notif-box-message'] = "You have logged in succesfully.";
			// header("location:http://localhost/Pacific/");

			if($user['role_id'] == 1){
				header("location:http://localhost/Pacific/student/dashboard.php");
			}

			else if($user['role_id'] == 2) {
				header("location:http://localhost/Pacific/staff/dashboard.php");
			}

		} else {
			$_SESSION['err'] = "Invalid username or password.";
			header("location:http://localhost/Pacific");
		}

	} else {
		$_SESSION['err'] = "User does not exit";
		header("location:http://localhost/Pacific");
	}

	
?>