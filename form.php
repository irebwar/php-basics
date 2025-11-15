<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
</head>
<body>
	<h2>Please Login</h2>
	<form action="welcome.php" method="POST">
		<div>
			<label for="username">Username: </label>
			<input type="text" id="username" name="username_field" required>
		</div>
		<br>
		<div>
			<label for="password">Password: </label>
			<input type="password" id="password" name="password_field" required>
		</div>
		<br>
		<button type="submit">Login</button>
	</form>
</body>
</html>