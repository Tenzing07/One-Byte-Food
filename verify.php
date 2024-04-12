<?php
session_start();

require_once "db_connection.php"; // Include the file that contains database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
    $verification_code = isset($_POST["verification_code"]) ? htmlspecialchars($_POST["verification_code"]) : '';

    // Validate form data
    if (empty($email) || empty($verification_code)) {
        echo "Email and verification code are required.";
        exit;
    }

    // Prepare SQL statement to verify the user based on email and verification code
    $sql = "SELECT id FROM user WHERE email = ? AND verification_code = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }

    $stmt->bind_param("ss", $email, $verification_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Verification successful, update user status and set session variables
        $row = $result->fetch_assoc();
        $user_id = $row["id"];

        $update_sql = "UPDATE user SET verified = 1 WHERE id = ?";
        $stmt_update = $conn->prepare($update_sql);

        if (!$stmt_update) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            exit;
        }

        $stmt_update->bind_param("i", $user_id);
        
        if ($stmt_update->execute()) {
            $_SESSION['loggedin'] = true;
            header("Location: ../");
            exit;
        } else {
            echo "Error updating user status: " . $stmt_update->error;
        }
    } else {
        echo "Invalid verification code. Please try again.";
    }

    $stmt->close();
} else if ($_SERVER["REQUEST_METHOD"] != "POST")
 {
   echo "The verification is sent."; // Displayed if accessed directly without POST request
}
else{
    echo "invalid ";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h2>Email Verification</h2>
    <form action="verify.php" method="post">
        <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">
        <label for="verification_code">Enter Verification Code:</label>
        <input type="text" id="verification_code" name="verification_code" required>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
