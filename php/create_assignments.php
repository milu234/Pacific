<?php
   session_start();
   if(isset($_SESSION['user']))
      $user = unserialize($_SESSION['user']);
      $conn = mysqli_connect('localhost','root','','pacific');
      $query = mysqli_query($conn,"INSERT into assignments(assignment_name,assignment_description,assignment_marks,) VALUES ('.$.')");



   if(isset($_SESSION['err'])){
      echo "<script>alert('".$_SESSION['err']."');</script>";
      unset($_SESSION['err']);
   }



?>