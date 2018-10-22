<?php
	//uss php mailer
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require '../vendor/autoload.php';

	// Setup the connection
	$conn = mysqli_connect('localhost', 'root', '', 'Pacific');

	if(!$conn){
		// if the database does not get connected, display an erorr message.
		echo "There was an error connecting to the database.";
	} else {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['psw'];
		$password_hash = password_hash($pass, PASSWORD_BCRYPT);
		// $conf_pass = $_POST['confpsw'];
		$radio = $_POST['radio']; // user role
		$class = $_POST['class_name'];

		// get the class id and role id from the database and use them in the query
		include 'includes/utils.php';
		echo $radio;
		$role_id = getRoleId($radio);
		$class_id = getClassId($class);

		$query = "Insert into users(name,email, password, role_id, class_id) values('".$name."','".$email."', '".$password_hash."',".$role_id.", ".$class_id.");";
		$result = mysqli_query($conn, $query);
		if($result){
			// include 'includes/User.php';
			// $query = "Select user_id from users where email='".$user."'";
			// $result1 = mysqli_query($conn, $query);
			// if(mysqli_num_rows($result1) > 0){
			// 	// get the user id from the database after insertion
			// 	$id = mysqli_fetch_assoc($result1)['user_id'];
			// 	$user_obj = new User($id, $email, getRoleName($role_id), getClassName($class_id));
			// 	$_SESSION['user'] = $user_obj;
			// 	if($role_id == 1){
			// 		header("location:http://localhost/Pacific/student/dashboard.php");
			// 	}
			// 	else if($role_id == 2) {
			// 		header("location:http://localhost/Pacific/staff/dashboard.php");
			// 	}
			// 	// header("location:http://localhost/Pacific");
			// }
			$_SESSION['user_created'] = True;
			$_SESSION['notif-box-color'] = "green";
			$_SESSION['notif-box-message'] = "New User created succesfully.";
		} else{
		
		}
		
		// echo "<script type='text/javascript'>alert('$message');</script>";
		header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/admin/dashboard.php");
	}

?>

