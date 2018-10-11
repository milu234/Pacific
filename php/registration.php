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

		// get the class id and role id from the database and use them in the query
		include 'includes/utils.php';
		echo $radio;
		$role_id = getRoleId($radio);
		$class_id = getClasId($class);

		$query = "Insert into users(email, password, role_id, class_id) values('".$user."', '".$pass."',".$role_id.", ".$class_id.");";
		$result = mysqli_query($conn, $query);
		if($result){
			include 'includes/User.php';
			$query = "Select user_id from users where email='".$user."'";
			$result1 = mysqli_query($conn, $query);
			if(mysqli_num_rows($result1) > 0){
				// get the user id from the database after insertion
				$id = mysqli_fetch_assoc($result1)['user_id'];
				$user_obj = new User($id, $email, getRoleName($role_id), getClassName($class_id));
				$_SESSION['user'] = serialize($user_obj);
				if($role_id == 1){
					header("location:http://localhost/Pacific/student/dashboard.php");
				}
				else if($role_id == 2) {
					header("location:http://localhost/Pacific/staff/dashboard.php");
				}
				// header("location:http://localhost/Pacific");
			}
		} else{
			$_SESSION['err'] = "User already exits.";
			header("location:http://localhost/Pacific/");
		}
	}

?>

