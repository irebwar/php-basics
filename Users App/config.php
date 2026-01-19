<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course_db";

$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

try {
	$conn = new PDO($dsn, $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e){
	echo "Connection failed: " . $e->getMessage();
}