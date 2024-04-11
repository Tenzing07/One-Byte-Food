<?php
include_once "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $date_of_birth = $_POST["date_of_birth"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match";
        exit; // Stop execution if passwords don't match
    }

  
        if ($conn->query($sql) === TRUE) {
        // Successful signup
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;

        // Redirect to a specific page after successful signup
        header("Location: ../"); // Adjust path as needed
        exit;
   
}
?>
