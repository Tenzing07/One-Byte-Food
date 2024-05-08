<?php
// Start session to access session variables
session_start();

// Include database connection
require_once 'all/db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If user is not logged in, return an error response
    echo json_encode(['success' => false, 'error' => 'User is not logged in']);
    exit;
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $guests = $_POST['guests'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bookingDate = $_POST['bookingDate'];
    $bookingTime = $_POST['bookingTime'];
    $tableId = $_POST['tableId'];

    // Retrieve user ID from session
    $userId = $_SESSION['userId'];

    // Insert into reservations table with user_id
    $sql = "INSERT INTO reservations (user_id, table_id, guests, name, email, phone, booking_date, booking_time) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiisssss", $userId, $tableId, $guests, $name, $email, $phone, $bookingDate, $bookingTime);

    $response = array();

    if ($stmt->execute()) {
        // Reservation successful, update table status to 'booked'
        $updateSql = "UPDATE tables SET status = 'booked' WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i", $tableId);
        $updateStmt->execute();
        $updateStmt->close();

        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = 'Database error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Return JSON response
    echo json_encode($response);
} else {
    // Invalid request method
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
