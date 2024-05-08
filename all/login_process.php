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

$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

// Verify user and password
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Assuming 'password' is stored as plaintext in the database (NOT recommended)
    if ($password === $user['password']) {
        // Update user status to 'online' upon successful login
        $updateStmt = $conn->prepare('UPDATE user SET status = ? WHERE id = ?');
        $onlineStatus = 'online';
        $userId = $user['id'];
        $updateStmt->bind_param('si', $onlineStatus, $userId);
        $updateStmt->execute();
        $updateStmt->close();

        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['userId'] = $user['id']; // Store user ID in session
        $_SESSION['username'] = $user['name'];

        // Redirect to the desired page after successful login
        header("Location: ../"); // Redirect to parent directory or dashboard
        exit;
    } else {
        echo "Login failed: Incorrect email or password";
    }
} else {
    echo "Login failed: User not found";
}

$stmt->close(); // Close the prepared statement
$conn->close(); // Close the database connection
?>
