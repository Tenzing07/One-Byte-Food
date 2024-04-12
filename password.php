<?php
session_start();

// Include database connection
require_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required form fields are submitted
    if (isset($_POST['verification_code'], $_POST['name'], $_POST['new_password'], $_POST['confirm_password'])) {
        $verification_code = $_POST['verification_code'];
        $name = $_POST['name'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate inputs
        if (empty($verification_code) || empty($name) || empty($new_password) || empty($confirm_password)) {
            echo "All fields are required.";
            exit;
        }

        if ($new_password !== $confirm_password) {
            echo "Passwords do not match.";
            exit;
        }

        // Retrieve user by verification code and name
        $sql = "SELECT id, email, name FROM user WHERE verification_code = ? AND name = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            exit;
        }

        $stmt->bind_param("ss", $verification_code, $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, update user's password
            $row = $result->fetch_assoc();
            $user_id = $row["id"];

            // Update password without hashing
            $update_sql = "UPDATE user SET password = ?, verification_code = NULL WHERE id = ?";
            $stmt_update = $conn->prepare($update_sql);

            if (!$stmt_update) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
                exit;
            }

            $stmt_update->bind_param("si", $new_password, $user_id);

            if ($stmt_update->execute()) {
                echo "Your password has been reset successfully.";

                // Redirect to the main page after successful password reset
                header("Location: ../");
                exit;
            } else {
                echo "Error updating password: " . $stmt_update->error;
            }
        } else {
            echo "Verification code or name is incorrect.";
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="password.php" method="post">
        <label for="verification_code">Verification Code:</label>
        <input type="text" id="verification_code" name="verification_code" required><br><br>
        
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br><br>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <button type="submit">Update Password</button>
    </form>
</body>
</html>
