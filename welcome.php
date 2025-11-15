<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
</head>
<body>
	<?php
		if (isset($_POST['username_field']) && !empty($_POST['username_field'])){
			$username = $_POST['username_field'];
			echo "<h1>Welcome back, " . htmlspecialchars($username) ."!</h1>";
		} else {
			echo "<h1>Please enter yor username.</h1>";
		}

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
	
		echo "Request Method: " . $_SERVER['REQUEST_METHOD'];
		echo "<br>";
		echo "Current File: " . $_SERVER['PHP_SELF'];
	?>
</body>
</html>