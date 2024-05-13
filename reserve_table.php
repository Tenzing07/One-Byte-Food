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

    // Get table name based on table_id
    $tableName = '';
    $getTableNameSql = "SELECT table_name FROM tables WHERE id = ?";
    $getTableNameStmt = $conn->prepare($getTableNameSql);
    $getTableNameStmt->bind_param("i", $tableId);
    $getTableNameStmt->execute();
    $getTableNameStmt->bind_result($tableName);
    $getTableNameStmt->fetch();
    $getTableNameStmt->close();

    if (empty($tableName)) {
        // If table name is not found for the given table_id, return an error response
        echo json_encode(['success' => false, 'error' => 'Invalid table ID']);
        exit;
    }

    // Insert into reservations table with user_id and table_name
    $insertReservationSql = "INSERT INTO reservations (user_id, table_id, guests, name, email, phone, booking_date, booking_time, table_name) 
                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insertReservationStmt = $conn->prepare($insertReservationSql);
    $insertReservationStmt->bind_param("iiissssss", $userId, $tableId, $guests, $name, $email, $phone, $bookingDate, $bookingTime, $tableName);

    $response = [];

    if ($insertReservationStmt->execute()) {
        // Reservation successful, update table status to 'booked'
        $updateTableStatusSql = "UPDATE tables SET status = 'booked' WHERE id = ?";
        $updateTableStatusStmt = $conn->prepare($updateTableStatusSql);
        $updateTableStatusStmt->bind_param("i", $tableId);
        $updateTableStatusStmt->execute();
        $updateTableStatusStmt->close();

        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = 'Database error: ' . $insertReservationStmt->error;
    }

    $insertReservationStmt->close();
    $conn->close();

    // Return JSON response
    echo json_encode($response);
} else {
    // Invalid request method
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
