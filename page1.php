<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page 1</title>
</head>
<body>
	<h1>Welcome to Page 1</h1>
	<?php 
		$product_id = 10;
		$category = "electronics";
	?>

	<a href="page2.php?id=<?php echo $product_id;?>&cat=<?php echo $category; ?>">
		Go to page 2 with Product Details
	</a>
</body>
</html>