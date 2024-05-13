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
$sql = "SELECT id, table_name, max_guests, status, image FROM tables 
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
            $isBooked = $row['status'] === 'booked'; // Check if table is booked

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

            // Retrieve BLOB data (image) and convert to base64-encoded image URL
            $imageData = $row['image'];
            $imageBase64 = base64_encode($imageData);
            $imageSrc = 'data:image/jpeg;base64,' . $imageBase64;

            // Prepare response data for available tables (including image)
            $response[] = array(
                'tableId' => $tableId,
                'tableName' => $tableName,
                'maxGuests' => $maxGuests,
                'isBooked' => $isBooked,
                'image' => $imageSrc
            );
        }
    }
}

// Send JSON response with available tables
echo json_encode($response);

// Close database connection
$conn->close();
?>
