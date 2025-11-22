<?php
if (isset($_COOKIE['theme'])) {
	$theme = $_COOKIE['theme'];
	echo "Your selected theme is: " . $theme;
}else {
	echo "No theme cookie found.";
}
?>