<?php 




//Load Composer's autoloader
require '../vendor/autoload.php';

//Setup the connection
$conn = mysqli_connect('localhost', 'root', '', 'Pacific');

if (isset($_POST['save'])){
        $nameoftheproject = $_POST['nameoftheproject'];
		$descriptionoftheproject = $_POST['descriptionoftheproject'];
		$range = $_POST['range'];
		$projectgithublink = $_POST['projectgithublink']; // user role
        $githubusername = $_POST['githubusername'];
            
        mysqli_query($conn,"INSERT into projects (project_name,project_description,project_link,github_username,project_status) VALUES ('$nameoftheproject','$descriptionoftheproject','$projectgithublink','$githubusername','$range') ");
        header("location:http://localhost/Pacific/");
}