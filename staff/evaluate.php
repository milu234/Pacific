<?php

	
// include('../layouts/nav.php');
    // include('assignment_info.php');
    
    $scoreupdated=$_POST['scoreupdated'];
    $id = $_POST['id'];
    if(isset($_POST['score'])){
        $conn = mysqli_connect('localhost','root','','pacific');
        $query2 = mysqli_query($conn,"UPDATE  assignment_evaluation set assignment_marks=$scoreupdated where assignment_id=$id and user_id=$user->id ");
        echo $query2;
         header("location:http://localhost/Pacific/staff/evaluate.php");
    }

