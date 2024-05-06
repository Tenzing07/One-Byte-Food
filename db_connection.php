<?php
// Database connection details
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "one-byte-food";

// Create connection
$conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
