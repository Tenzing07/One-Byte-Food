<?php
// Include database connection
require_once 'all/db_connection.php';

// Extract the number of guests from the POST data
$numberOfPeople = isset($_POST['numberOfPeople']) ? intval($_POST['numberOfPeople']) : 0;

// Validate input (ensure $numberOfPeople is a positive integer)
if ($numberOfPeople <= 0) {
    echo json_encode(['error' => 'Invalid number of people']);
    exit;
}

// Query to fetch available tables based on guest count and availability status
$sql = "SELECT * FROM tables 
        WHERE max_guests >= $numberOfPeople 
        AND id NOT IN (
            SELECT table_id FROM reservations
        )";

$result = $conn->query($sql);

$response = array();

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Prepare table information
            $tableId = $row['id'];
            $tableName = $row['table_name'];
            $maxGuests = $row['max_guests'];

            // Check if the table is booked for any date/time
            $isBooked = false;
            $reservationSql = "SELECT COUNT(*) as count FROM reservations WHERE table_id = $tableId";
            $reservationResult = $conn->query($reservationSql);

            if ($reservationResult && $reservationResult->num_rows > 0) {
                $reservationData = $reservationResult->fetch_assoc();
                if ($reservationData['count'] > 0) {
                    $isBooked = true; // Set as booked if there's at least one reservation
                }
            }

            // Prepare response data for available tables
            $response[] = array(
                'tableId' => $tableId,
                'tableName' => $tableName,
                'maxGuests' => $maxGuests,
                'isBooked' => $isBooked
            );
        }
    }
}

// Send JSON response with available tables
echo json_encode($response);

// Close database connection
$conn->close();
?>
