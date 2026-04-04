<?php

class User {
	public $username;
	public $email;

	public function login() {
		return $this->username . " has logged in. <br>";
	}
}

$user1 = new User();


$user1->username = "Ali 1";
$user1->email = "ali@test.com";

echo $user1->login();
$user2 = new User();


$user2->username = "Ali 2";
$user2->email = "ali@test.com";

echo $user2->login();
$user3 = new User();


$user3->username = "Ali 3";
$user3->email = "ali@test.com";

echo $user3->login();
$user4 = new User();


$user4->username = "Ali 4";
$user4->email = "ali@test.com";

echo $user4->login();
$user5 = new User();


$user5->username = "Ali 5";
$user5->email = "ali@test.com";

echo $user5->login();
?>