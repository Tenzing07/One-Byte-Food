<?php
session_start();

require_once "db_connection.php"; // Include the file that contains database connection details

// Check if email and password are provided
if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "Error: Email and password fields are required.";
    exit;
}
