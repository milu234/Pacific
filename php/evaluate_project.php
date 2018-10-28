<?php
  include 'includes/User.php';
  require "includes/db.php";
  session_start();
  $user = unserialize($_SESSION['user']);
  if(!isset($_SESSION['user']))
    header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/index.php");
  $marks = $_POST['marks'];
  $comments = $_POST['comments'];
  $project_id = $_POST['project_id'];
  // no need to check whether the project is evaluated or no.
  $query = "INSERT INTO project_evaluation(project_marks, project_comments, project_id, user_id) values($marks, '$comments', $project_id, $user->id)";
  $result = mysqli_query($conn, $query);
  if($result){
    // we also have to update the projects database and mark the project as evaluated
    $query = "UPDATE projects set project_evaluation='evaluated' where project_id=$project_id";
    $result = mysqli_query($conn, $query);
    if($result){
      $_SESSION['show_notif'] = True;
			$_SESSION['notif-box-color'] = "green";
			$_SESSION['notif-box-message'] = "PRoject evaluated. You can now evaluate other projects";
      header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/staff/projectinfo.php?project_id=".$project_id);
    }
  }
 ?>