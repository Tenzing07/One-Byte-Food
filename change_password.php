<!-- change_password.php -->

<?php
require_once 'all/db_connection.php'; // Include database connection

if (isset($_POST['change_password_submit'])) {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Fetch user's current password from session or database based on your authentication mechanism
    $userId = 1; // Assuming user ID, update this based on your authentication mechanism

    // Verify if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        echo "New password and confirm password do not match.";
        exit;
    }

    // Check if current password matches the one stored in the database
    $sql = "SELECT password FROM user WHERE id = $userId";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        if (password_verify($currentPassword, $storedPassword)) {
            // Current password is correct, proceed to update with new password
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updateSql = "UPDATE user SET password = '$hashedNewPassword' WHERE id = $userId";
            $updateResult = mysqli_query($connection, $updateSql);

            if ($updateResult) {
                echo "Password updated successfully.";
            } else {
                echo "Error updating password: " . mysqli_error($connection);
            }
        } else {
            echo "Current password is incorrect.";
        }
    } else {
        echo "Error fetching user data.";
    }

    mysqli_close($connection);
}
?>
