<?php
include 'includes/User.php';
   session_start();
   if(isset($_SESSION['user']))
      $user = unserialize($_SESSION['user']);
      include 'includes/utils.php';

      $conn = mysqli_connect('localhost','root','','pacific');
      $nameoftheassignment = $_POST['nameoftheassignment'];
      $marksallotedtoassignment = $_POST['marksallotedtotheassignment'];
      $class = $_POST['classalloted'];
      $class_id = getClasId($class);
      $assignment_type = $_POST['assignment_type'];
      $query = "INSERT into assignments(assignment_name,assignment_marks,assignment_type,user_id,class_id) VALUES ('".$nameoftheassignment."',".$marksallotedtoassignment.",'".$assignment_type."',".$user->id.",".$class_id.")";
      $result = mysqli_query($conn,$query);
      echo $query;
    //   header("location:http://localhost/Pacific/staff/dashboard.php");


   if(isset($_SESSION['err'])){
      echo "<script>alert('".$_SESSION['err']."');</script>";
      unset($_SESSION['err']);
   }



?>