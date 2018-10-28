<?php
include 'includes/User.php';
session_start();
if(!$_SESSION['user']){
  header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/index.php");
}
$project_id = $_GET['project_id'];
$conn = mysqli_connect('localhost', 'root', '', 'pacific') or die("couldnt connect to the database");
$query = "UPDATE projects set project_evaluation='sent for evaluation' where project_id=".$project_id;
$result = mysqli_query($conn, $query);
if($result){
  // if the data is inserted
  $_SESSION['show_notif'] = True;
  $_SESSION['notif-box-color'] = "blue";
  $_SESSION['notif-box-message'] = "Your project has been sent for evaluation.";
  header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/student/projectinfo.php?project_id=".$project_id);
}
 ?>