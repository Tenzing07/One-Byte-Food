<?php
// Include database connection
require_once 'all/db_connection.php';

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $guests = $_POST['guests'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bookingDate = $_POST['bookingDate'];
    $bookingTime = $_POST['bookingTime'];
    $tableId = $_POST['tableId'];

    // Insert into reservations table
    $sql = "INSERT INTO reservations (table_id, guests, name, email, phone, booking_date, booking_time) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssss", $tableId, $guests, $name, $email, $phone, $bookingDate, $bookingTime);

    $response = array();

    if ($stmt->execute()) {
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
