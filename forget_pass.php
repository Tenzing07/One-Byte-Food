<?php
session_start();

// Include database connection and PHPMailer
require_once "db_connection.php";
require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';

    // Validate email
    if (empty($email)) {
        echo "Email is required.";
        exit;
    }

    // Check if the email exists in the database
    $sql = "SELECT id, name FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User exists, fetch user details
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $name = $row["name"];

        // Generate verification code
        $verification_code = generateVerificationCode();

        // Update verification code in database
        $update_sql = "UPDATE user SET verification_code = ? WHERE id = ?";
        $stmt_update = $conn->prepare($update_sql);

        if (!$stmt_update) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            exit;
        }

        $stmt_update->bind_param("si", $verification_code, $user_id);

        if ($stmt_update->execute()) {
            // Send email with verification code
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'avibikram777@gmail.com'; // Your Gmail address
                $mail->Password = 'ljkm ejvl cefo yybz'; // Your Gmail app password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('avibikram777@gmail.com', 'Your Name');
                $mail->addAddress($email, $name);

                $mail->isHTML(false);
                $mail->Subject = 'Password Reset Verification Code';
                $mail->Body = "Hi $name,\r\nYour password reset verification code is: $verification_code";

                if ($mail->send()) {
                    // Redirect to password.php after displaying success message
                    header("Location: password.php");
                    exit;
                } else {
                    echo "Error sending verification email.";
                }
            } catch (Exception $e) {
                echo "Error sending verification email: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error updating verification code: " . $stmt_update->error;
        }
    } else {
        echo "Email not found. Please enter a valid email address.";
    }

    $stmt->close();
}

function generateVerificationCode() {
    return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="forget_pass.php" method="post">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
