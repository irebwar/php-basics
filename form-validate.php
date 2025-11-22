<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Validation</title>
</head>
<body>
	<h2>Create on Account</h2>
	<?php if (!empty($errors)): ?>
		<div style="color:red; border: 1px solid #red; padding: 10px; margin-bottom: 10px;">
			<strong>Please fix errors: </strong>
			<ul>
				<?php foreach ($errors as $error): ?>
					<li><?php echo $error; ?></li>
				<?php endforeach?>
			</ul>
		</div>
	<?php endif ?>

	<form method="POST" action="validate.php">
		<label for="username">Username:</label><br>
		<input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>"><br><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
        <button type="submit">Register</button>
	</form>
</body>
</html>