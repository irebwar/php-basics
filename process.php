<?php

session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if ($username === 'admin' && $password === '1234') {
	$_SESSION['is_logged_in'] = true;
	$_SESSION['username'] = $username;
	header("Location: dashboard.php");
	exit();
} else {
	$_SESSION['error'] = "Username or password is not currect";
	header("Location: login.php");
	exit();
}

?>