<?php

include 'includes/db.php';

include 'includes/User.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location:http:".$_SERVER['HTTP_HOST']."/Pacific");
}

//Load Composer's autoloader
require '../vendor/autoload.php';

//Setup the connection


if (isset($_POST['save'])){
        $nameoftheproject = $_POST['nameoftheproject'];
    		$descriptionoftheproject = $_POST['descriptionoftheproject'];
    		$range = $_POST['range'];
    		$projectgithublink = $_POST['projectgithublink']; // user role
        $githubusername = $_POST['githubusername'];

        mysqli_query($conn,"INSERT into projects (project_name,project_description,project_link,github_username,project_status) VALUES ('$nameoftheproject','$descriptionoftheproject','$projectgithublink','$githubusername','$range') ");
        // We also have to add an entry in the works_on table
        $query = "SELECT project_id from projects where project_name='$nameoftheproject'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
        	$project_id = mysqli_fetch_assoc($result)['project_id'];
        	$user = unserialize($_SESSION['user']);
        	$query = "INSERT into works_on(user_id,project_id,project_role) values(".$user->id.", $project_id, 'leader')";
        	//echo $query;
        	$result = mysqli_query($conn, $query);
        	if($result){
        		header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/student/dashboard.php");
        	}
        }
		header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/index.php?err=project_upload_error");
}
