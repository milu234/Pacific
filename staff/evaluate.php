<?php

	
// include('../layouts/nav.php');
    // include('assignment_info.php');
    // include('assignment_info.php');
    
    
    if(isset($_GET['score'])){
        $scoreupdated=$_GET['scoreupdated'];
        $aid = $_GET['aid'];
        $uid = $_GET['uid'];
        $aeid = $_GET['aeid'];
    echo $aid;
    echo $uid;
    echo $scoreupdated;
     $conn = mysqli_connect('localhost','root','','pacific');
         $query2 = mysqli_query($conn,"UPDATE  assignment_evaluation set assignment_marks=$scoreupdated where assignment_id=$aid and user_id=$uid and assignment_evaluation_id=$aeid ");
         echo $query2;
          header("location:http://localhost:8080/Pacific/staff/dashboard.php");
     }

