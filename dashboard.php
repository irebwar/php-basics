<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
	header("Location: login.php");
	exit();
}
?>

<h1>Welcome to your Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>

<p>This page is protected.</p>
<a href="logout.php">Logout</a>