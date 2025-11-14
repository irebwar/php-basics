<?php

/*function say_hello() {
	echo "<h1>Welcome to our website!</h1>";
}

say_hello();*/

/*function greet_user($name) {
	echo "<p>Hello, " . $name . "!</p>";
}

greet_user("Sarchil");

greet_user("Naza");

$userName01 = "Sarchil";
$userName02 = "Naza";
$userName03 = "Ahmad";

greet_user($userName01);
greet_user($userName02);
greet_user($userName03);

$arrays = ["Sarchil", "Naza", "Ahmad"];

foreach ($arrays as $array) {
	greet_user($array);
}*/

/*function calculate_sum($num1, $num2) {
	$sum = $num1 + $num2;
	return $sum;
}

$result = calculate_sum(10, 20);

echo "The sum is: " . $result;*/

/*$cities = ["Sulaimani", "Erbil", "Duhok"];

echo $cities[1];
echo "<br>";

echo "<ul>";

foreach ($cities as $city) {
	echo "<li>" . $city . "</li>";
}

echo "</ul>";

echo "Number of Cities: " . count($cities);*/

/*$user_profile = [
	"username" => "sarchil_dev",
	"email" => "sarchil@example.com",
	"age" => 30,
	"is_active" => true
];

echo "Username: " . $user_profile["username"];
echo "<br>";

$user_profile["country"] = "Kurdistan";

echo "<h3>User Profile Details:</h3>";
echo "<ul>";

foreach ($user_profile as $key => $value) {
	if (is_bool($value)) {
		$display_value = $value ? 'Yes' : 'No';
	} else {
		$display_value = $value;
	}

	echo "<li><strong>" . ucfirst($key) . ": </strong>" . $display_value . "</li>";
}

echo "</ul>";*/

function create_product_card($product_data){
	$card_html = "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px; width: 200px;'>";
	$card_html .= "<h4>" . $product_data["name"] . "</h4>";
	$card_html .= "<p>Price: $" . $product_data["price"] . "</p>";

	if ($product_data["in_stock"]) {
		$card_html .= "<p style='color:green;'>In Stock</p>";
	} else {
 		$card_html .= "<p style='color:red;'>Out of Stock</p>";
 	}

 	$card_html .= "</div>";

 	return $card_html;
}

$product1 = [
	"name" => "Laptop",
	"price" => 1200,
	"in_stock" => true
];

$product2 = [
	"name" => "Mouse",
	"price" => 25,
	"in_stock" => false
];

echo create_product_card($product1);
echo create_product_card($product2);