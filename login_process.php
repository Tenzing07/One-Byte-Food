<?php
session_start();

require_once "db_connection.php"; // Include the file that contains database connection details

// Check if email and password are provided
if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "Error: Email and password fields are required.";
    exit;
}
// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL statement
$stmt = $conn->prepare('SELECT * FROM user WHERE email = ?');
if (!$stmt) {
    die('Error in preparing SQL statement: ' . $conn->error);
}

// Verify user and password
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

     // Assuming 'password' is stored as plaintext in the database (NOT recommended)
     if ($password === $user['password']) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
     }}