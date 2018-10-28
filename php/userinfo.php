<?php
	require ".././functions.php";
	header('Content-Type: text/html; charset=utf-8');
	global $CLIENT_ID, $CLIENT_SECRET, $REDIRECT_URI;
	$client = new Google_Client();
	$client->setClientId($CLIENT_ID);
	$client->setClientSecret($CLIENT_SECRET);
	$client->setRedirectUri($REDIRECT_URI);
	$client->setScopes('email');
	$authUrl = $client->createAuthUrl();
	getCredentials($_GET['code'], $authUrl);
	$userName = $_SESSION["userInfo"]["name"];
	$userEmail = $_SESSION["userInfo"]["email"];
?>