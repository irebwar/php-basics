<?php

class BankAccount {
	private $balance = 0;

	public function deposit($amount) {
		if ($amount > 0) {
			$this->balance +=$amount;
			echo "Added $amount.<br>";
		}
	}

	public function getBalance() {
		return $this->balance;
	}
}

$myAccount = new BankAccount();
$myAccount->deposit(500);
$myAccount->deposit(500);
// $myAccount->deposit = 1000;
echo "Current Balance: " . $myAccount->getBalance() . "<br>";
$myAccount->deposit(500);
echo "Current Balance: " . $myAccount->getBalance() . "<br>";

// class Test extends BankAccount{
// 	public function withdrow($amount) {
// 		if ($amount <= $balance) {
// 			$this->balance -= $amount;
// 			echo "withdorw: ". $this->amount;
// 		}
// 	}
// }

// $test = new Test();
// $test->withdrow(500);

?>