<?php
    include '../php/includes/db.php';
    if(isset($_GET['delete'])){
        $id = $_GET['did'];
        
        $query =  mysqli_query($conn,"DELETE from users where user_id=$id");
        header("location:http://".$_SERVER['HTTP_HOST']."/Pacific/admin/viewusers.php");
    }

?>