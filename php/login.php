<?php
	include 'includes/User.php';
	session_start();
	if(isset($_SESSION['user'])){
		header("location:http://".$_SERVER['HTTP_HOST']."/Pacific");
	}
	$email = $_POST['email'];
	$password = $_POST['psw'];
	$pass = password_hash($password,PASSWORD_DEFAULT);
	$conn = mysqli_connect("localhost", "root", "", "Pacific") or die("couldnt connect to the database.");

	// first we check whether the user exists
	$query = "Select * from users where email='".$email."'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) == 1){
		// user exists
		$query = "Select user_id, name, class_id, role_id,image_path from users where email='".$email."' and password='".$pass."'";
		$pass_data = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1){
			// password matched
			$user = mysqli_fetch_assoc($result);
			include 'includes/utils.php';
			include 'includes/User.php';
			$user_obj = new User($user['user_id'],$user['name'], $email, getRoleName($user['role_id']), getClassName($user['class_id']), $user['image_path']);
			$_SESSION['user'] = serialize($user_obj);
			$_SESSION['login_success'] = True;
			$_SESSION['notif-box-color'] = "green";
			$_SESSION['notif-box-message'] = "You have logged in succesfully.";
			// header("location:http://localhost/Pacific/");

			if($user['role_id'] == 1){
				header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/student/dashboard.php");
			}

			else if($user['role_id'] == 2) {
				header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/staff/dashboard.php");
			}

			else if($user['role_id'] == 3) {
				header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/admin/dashboard.php");
			}

		} else {
			$_SESSION['err'] = "Invalid username or password.";
			header("location:http://".$_SERVER['HTTP_HOST']."/Pacific");
		}

	} else {
		$_SESSION['err'] = "User does not exit";
		header("location:http://".$_SERVER['HTTP_HOST']."/Pacific");
	}


?>
