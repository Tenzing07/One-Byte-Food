<?php
// Include database connection
include_once "db_connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $date_of_birth = $_POST["date_of_birth"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Perform additional validation here if needed

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match";
        exit; // Stop execution if passwords don't match
    }

    // Prepare SQL statement to insert data into the 'user' table
    $sql = "INSERT INTO user (name, email, phone_number, address, date_of_birth, password) 
            VALUES ('$name', '$email', '$phone_number', '$address', '$date_of_birth', '$password')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Successful signup
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;

        // Redirect to a specific page after successful signup
        header("Location: ../"); // Adjust path as needed
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
