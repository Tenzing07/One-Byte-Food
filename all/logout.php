<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the desired page after logout
header("Location: ../"); // Adjust path as needed
exit;
?>
