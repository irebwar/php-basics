<?php

include 'config.php';

// $sql = "SELECT email FROM users WHERE username = ?";
// $stmt = $conn->prepare($sql);

// $user_input = "akam_ali";
// $stmt->execute([$user_input]);

// $result = $stmt->fetch();
// if ($result) {
// 	echo "<br>";
// 	echo "<br>";

// 	echo "Email: " . $result['email'];
// } else {
// 	echo "<br>";
// 	echo "<br>";
// 	echo "<br>";
// 	echo "failed";
// }

$sql = "INSERT INTO users (username,f_name, l_name, email, password) VALUES (:uname, :ufname, :ulname, :uemail, :upass)";
$stmt = $conn->prepare($sql);

$username = "sara_new";
$fname = "Sara";
$lname = "New";
$email = "sara@test.com";
$password = "123456";

$stmt->execute([
    ':uname' => $username,
    ':ufname' => $fname,
    ':ulname' => $lname,
    ':uemail' => $email,
    ':upass' => $password
]);
echo "بەکارهێنەری نوێ زیادکرا!";