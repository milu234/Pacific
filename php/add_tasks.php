<?php
include 'includes/User.php';
require "includes/db.php";
session_start();
if(!isset($_SESSION['user'])){
  header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/index.php");
}
$title = $_POST['title'];
$description = $_POST['description'];
$member_id = $_POST['assign_id'];
$project_id = $_POST['project_id'];
$query = "INSERT INTO tasks(task_title, task_description, user_id, project_id) values('$title', '$description', $member_id, $project_id)";
$result = mysqli_query($conn, $query);
if($result){
  // if insert is sucessful.
  $_SESSION['show_notif'] = True;
  $_SESSION['notif-box-color'] = "green";
  $_SESSION['notif-box-message'] = "Task assigned to the member";
  header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/student/projectinfo.php?project_id=".$project_id);
}
 ?>