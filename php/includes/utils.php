<?php

$database_connection = mysqli_connect("localhost", "root", "", "pacific") or die("couldnt connect to the database");

function getClassId($class_name) {
	global $database_connection;
	$query = "Select class_id from class where class_name='".$class_name."'";
	$result = mysqli_query($database_connection, $query); 
	$id = null;
	if(mysqli_num_rows($result) > 0) {
		$id = mysqli_fetch_assoc($result)['class_id'];
	}
	return $id;
}

function getClassName($class_id) {
	global $database_connection;
	$query = "Select class_name from class where class_id=".$class_id;
	$result = mysqli_query($database_connection, $query); 
	$name = null;
	if(mysqli_num_rows($result) > 0) {
		$name = mysqli_fetch_assoc($result)['class_name'];
	}
	return $name;
}

function getRoleId($role_name) {
	global $database_connection;
	$query = "Select role_id from role where role_name='".$role_name."'";
	$result = mysqli_query($database_connection, $query); 
	$id = null;
	if(mysqli_num_rows($result) > 0) {
		$id = mysqli_fetch_assoc($result)['role_id'];
	}
	return $id;
}
function getRoleName($role_id) {
	global $database_connection;
	$query = "Select role_name from role where role_id=".$role_id;
	echo $query;
	$result = mysqli_query($database_connection, $query); 
	$id = null;
	if(mysqli_num_rows($result) > 0) {
		$id = mysqli_fetch_assoc($result)['role_name'];
	}
	return $id;
}
?>