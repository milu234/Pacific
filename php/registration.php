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
		$user = $_POST['email'];
		$pass = $_POST['psw'];
		$conf_pass = $_POST['confpsw'];
		$radio = $_POST['radio']; // user role
		$class = $_POST['class_name'];

		$query = "Insert into users(email, password, role_id, class_id) values('".$user."', '".$pass."','".$radio."', '".$class."');";
		$result = mysqli_query($conn, $query);
		
		if($result){
			include 'includes/User.php';
			$query = "Select user_id from users where email='".$user."'";
			$result1 = mysqli_query($conn, $query);
			if($result1){
				$id = $result1;
				$user_obj = new User($id, $user, $radio, $class);
				$_SESSION['user'] = $user_obj;
			}
			header("location:http://localhost/Pacific/");
		}
	}

?>

