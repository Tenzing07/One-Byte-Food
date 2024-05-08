<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

require_once "all/db_connection.php"; // Include the file that contains database connection details

// Retrieve logged-in user's ID from session
$userId = $_SESSION['userId'];

// Prepare SQL statement to fetch user data
$stmt = $conn->prepare('SELECT name, email, phone_number FROM user WHERE id = ?');
if (!$stmt) {
    die('Error in preparing SQL statement: ' . $conn->error);
}

$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

// Check if user data is found
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $name = $user['name'];
    $email = $user['email'];
    $phone = $user['phone_number'];
} else {
    // Handle error if user data is not found (though this scenario should not occur for a logged-in user)
    $name = '';
    $email = '';
    $phone = '';
}

$stmt->close(); // Close the prepared statement
$conn->close(); // Close the database connection

// Return the user data as an associative array
$userData = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone
];

// Encode user data as JSON and output
echo json_encode($userData);
?>
