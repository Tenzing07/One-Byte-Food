<?php
session_start();

require_once "db_connection.php"; // Include the file that contains database connection details

// Check if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Update user status to 'offline' in the database
    $updateStmt = $conn->prepare('UPDATE user SET status = ? WHERE id = ?');
    $offlineStatus = 'offline';
    $userId = $_SESSION['userId']; // Retrieve user ID from session
    $updateStmt->bind_param('si', $offlineStatus, $userId);
    $updateStmt->execute();
    $updateStmt->close();

    // Unset all of the session variables
    $_SESSION = array();
    // Destroy the session
    session_destroy();
}

// Redirect to the desired page after logout
header("Location: ../"); // Redirect to parent directory or login page
exit;
?>
