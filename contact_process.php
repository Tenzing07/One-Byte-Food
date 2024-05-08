<?php
// Include database connection details
require_once('all/db_connection.php'); // Adjust the path as needed

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare SQL statement with placeholders for data binding
    $sql = "INSERT INTO contact (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())";

    // Prepare the SQL statement using mysqli prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Data inserted successfully
        // Redirect back to the referring page with success message
        header("Location: {$_SERVER['HTTP_REFERER']}?status=success");
        exit;
    } else {
        // Error occurred while executing the statement
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If the form is not submitted via POST method, handle accordingly
    echo "Error: Form submission method not valid.";
}

// Close the database connection
$conn->close();
?>
