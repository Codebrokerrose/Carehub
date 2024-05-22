<?php
	session_start();
	error_reporting(0);
	if(!isset($_SESSION['username'])) {
		header('location:index.php');
		exit(); // Added to stop script execution after redirection
	}
?>
