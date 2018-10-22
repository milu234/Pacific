<?php
    include 'includes/User.php';
   	session_start();
   	if(!isset($_SESSION['user'])){
   		header("location:http://".$_SERVER['HTTP_HOST']."/Pacific");
   	}
   if(isset($_SESSION['user']))
      $user = unserialize($_SESSION['user']);
      include 'includes/utils.php';

      $conn = mysqli_connect('localhost','root','','pacific');
      $nameoftheassignment = $_POST['nameoftheassignment'];
      $marksallotedtoassignment = $_POST['marksallotedtotheassignment'];
      $class = $_POST['classalloted'];
      $class_id = getClasId($class);
      $assignment_type = $_POST['assignment_type'];
      $description = $_POST['descriptionoftheassignment'];
      $dateofsubmission = $_POST['deadline'];
      $query = "INSERT into assignments(assignment_name,assignment_marks,assignment_type,description_of_assignment,date_of_submission,user_id,class_id) VALUES ('".$nameoftheassignment."',".$marksallotedtoassignment.",'".$assignment_type."','".$description."','".$dateofsubmission."',".$user->id.",".$class_id.")";
      $result = mysqli_query($conn,$query);
    //   echo $query;
      header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/staff/dashboard.php");


      $result2 = mysqli_query($conn,"SELECT assignment_name,date_of_submission from assignments where user_id = ".$user->id." ");
      while($rows = mysqli_fetch_assoc($result2)){
          echo $rows['assignment_name'];

      }




   if(isset($_SESSION['err'])){
      echo "<script>alert('".$_SESSION['err']."');</script>";
      unset($_SESSION['err']);
   }



?>
