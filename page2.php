<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page 2</title>
</head>
<body>
	<h1>Welcome to Page 2</h1>

	<?php 
		if (isset($_GET['id']) && isset($_GET['cat'])) {
			$receved_id = $_GET['id'];
			$receved_cat = $_GET['cat'];

			if ($receved_id == 101) {
				echo "<p>You are viewing product with ID: <strong> " . $receved_id ."</strong></p>";
			echo "<p>The category is: <strong>" . $receved_cat ."</strong></p>";
			}else {
			echo "<p>No product details were provided.</p>";
		}
		} else {
			echo "<p>No product details were provided.</p>";
		}

		echo "<pre>";
		print_r($_GET);
		echo "</pre>";
	?>
</body>
</html>