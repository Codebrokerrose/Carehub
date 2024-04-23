<?php
session_start(); // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();
// Redirect the user to another page (optional)
header("Location: index.php"); // Redirect to the homepage or any other page
exit();
?>