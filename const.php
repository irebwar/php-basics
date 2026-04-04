<?php

class Product {
	public $name;
	public $price;

	public function __construct($name, $price) {
		$this->name = $name;
		$this->price = $price;
	}

	public function getDetails() {
		return "Product: {$this->name}, Price: {$this->price}";
	}
}
$name = "MacBook PRO";
$price = 1200;
$laptop = new Product("MacBook PRO", "1200");
echo $laptop->getDetails();
?>