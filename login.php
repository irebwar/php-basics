<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
</head>
<body>
	<form action="process.php" method="POST">
		<input type="text" name="username" placeholder="Username (try 'admin')">
		<input type="password" name="password" placeholder="Password (try '1234')">
		<button type="submit">Login</button>
	</form>
	<?php
		session_start();
		if (isset($_SESSION['error'])) {
			echo '<p style="color:red">' . $_SESSION['error'] . '</p>';
			unset($_SESSION['erros']);
		}
	?>
</body>
</html>