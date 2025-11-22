<?php
$errors = [];
$username = '';
$email = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = trim($_POST['username']);
	if (empty($username)) {
		$errors[] = "Please inter your username!";
	}

	$email = $_POST['email'];
	if (empty($email)) {
		$errors[] = "Please inter your Email";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[] = "Please write current email";
	}

	if (empty($errors)) {
		echo "<div style='color:green;'>Welcome, " . $username . "</div>";
		$username = '';
		$email = '';
	}
}
?>