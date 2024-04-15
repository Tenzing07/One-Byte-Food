<?php
// Include database connection (replace with your own db_connection.php file)
include_once "db_connection.php";

// Include Composer autoload file
require_once __DIR__ . '/vendor/autoload.php'; // Adjust the path based on your project structure

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to generate a secure verification code
function generateVerificationCode() {
    return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone_number = htmlspecialchars($_POST["phone_number"]);
    $address = htmlspecialchars($_POST["address"]);
    $date_of_birth = $_POST["date_of_birth"]; // No need to sanitize
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate username (only alphabetical characters)
    if (!ctype_alpha($name)) {
        echo "Error: Username should only contain alphabetical characters";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format";
        exit;
    }

    // Validate password complexity (at least 8 characters with special symbols and numbers)
    if (strlen($password) < 8 || !preg_match("/[A-Za-z0-9#@\$]/", $password)) {
        echo "Error: Password should be at least 8 characters long and contain special symbols (#, @, $) and numbers";
        exit;
    }

    // Validate phone number (only numeric characters)
    if (!ctype_digit($phone_number)) {
        echo "Error: Phone number should only contain numeric characters";
        exit;
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match";
        exit;
    }

    // Generate a secure verification code
    $verification_code = generateVerificationCode();

    // Prepare SQL statement with a parameterized query
    $sql = "INSERT INTO user (name, email, phone_number, address, date_of_birth, password, verification_code) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Use prepared statement to insert data into the 'user' table
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $email, $phone_number, $address, $date_of_birth, $password, $verification_code);

    // Execute prepared statement
    if ($stmt->execute()) {
        // Send verification email with the code using PHPMailer
        $mail = new PHPMailer(true); // Create a new PHPMailer instance

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'avibikram777@gmail.com'; // Your Gmail address
            $mail->Password = 'ljkm ejvl cefo yybz'; // Your Gmail app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('avibikram777@gmail.com', 'Your Name');
            $mail->addAddress($email, $name);

            // Email content
            $mail->isHTML(false); // Set to `true` for HTML email
            $mail->Subject = 'Email Verification Code';
            $mail->Body = "Hi $name,\r\nYour verification code is: $verification_code";

            // Send the email
            $mail->send();
            echo "Signup successful! Please check your email for the verification code.";

            // Redirect to verify.php after sending email
            header("Location: verify.php?email={$email}");
            exit;
        } catch (Exception $e) {
            echo "Error sending verification email: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    // Close prepared statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
