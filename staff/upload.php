<?php
include 'db.php';
include '../php/includes/User.php';

session_start();
	if(isset($_SESSION['user']))
	   $user = unserialize($_SESSION['user']);
/* Getting file name */
$filename = $_FILES['file']['name'];

/* Location */
$location = "uploads/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
    $query = "update users set image_path = '".$location."' where user_id = '".$user->id."'";
    $result = mysqli_query($conn, $query);
    $user->image_path = $location;
    $_SESSION['user'] = serialize($user);
    echo $location;
   }else{
      echo 0;
   }
}