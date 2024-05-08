<?php
include_once "db_connection.php";

require_once __DIR__ . '/vendor/autoload.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateVerificationCode() {
    return str_pad(mt_rand(100000, 999999), 6, '0', STR_PAD_LEFT);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone_number = htmlspecialchars($_POST["phone_number"]);
    $address = htmlspecialchars($_POST["address"]);
    $date_of_birth = $_POST["date_of_birth"]; 
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    if (!ctype_alpha($name)) {
        echo "Error: Username should only contain alphabetical characters";
        exit;
    }

 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email format";
        exit;
    }

    // Validate password complexity (at least 8 characters with special symbols and numbers)
    if (strlen($password) < 8 || !preg_match("/[A-Za-z0-9#@\$]/", $password)) {
        echo "Error: Password should be at least 8 characters long and contain special symbols (#, @, $) and numbers";
        exit;
    }

  
    if (!ctype_digit($phone_number)) {
        echo "Error: Phone number should only contain numeric characters";
        exit;
    }

   
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match";
        exit;
    }

    $verification_code = generateVerificationCode();


    $sql = "INSERT INTO user (name, email, phone_number, address, date_of_birth, password, verification_code) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $name, $email, $phone_number, $address, $date_of_birth, $password, $verification_code);

    if ($stmt->execute()) {
        $mail = new PHPMailer(true); 

        try {
           
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'avibikram777@gmail.com'; // Your Gmail address
            $mail->Password = 'xoth gycz mvaw nlet'; // Your Gmail app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('avibikram777@gmail.com', 'Your Name');
            $mail->addAddress($email, $name);

            // Email content
            $mail->isHTML(false); 
            $mail->Subject = 'Email Verification Code';
            $mail->Body = "Hi $name,\r\nYour verification code is: $verification_code";

            
            $mail->send();
            echo "Signup successful! Please check your email for the verification code.";

            
            header("Location: verify.php?email={$email}");
            exit;
        } catch (Exception $e) {
            echo "Error sending verification email: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    
    $stmt->close();
}


$conn->close();
?>
