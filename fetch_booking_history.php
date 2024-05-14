<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Handle unauthenticated access gracefully
    echo json_encode([]); // Return empty array or appropriate error response
    exit;
}

require_once "all/db_connection.php"; // Include database connection details

// Retrieve logged-in user's ID from session
$userId = $_SESSION['userId'];

// Handle DELETE request to cancel a booking
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Parse incoming JSON request
    $input = json_decode(file_get_contents('php://input'), true);

    // Ensure booking ID is provided
    if (isset($input['booking_id'])) {
        $bookingId = $input['booking_id'];

        // Begin a transaction to perform both delete and update operations atomically
        $conn->begin_transaction();

        try {
            // Step 1: Delete the booking
            $stmtDelete = $conn->prepare('DELETE FROM reservations WHERE id = ? AND user_id = ?');
            if (!$stmtDelete) {
                throw new Exception('Failed to prepare delete statement');
            }

            $stmtDelete->bind_param('ii', $bookingId, $userId);
            $stmtDelete->execute();

            // Check if deletion was successful
            if ($stmtDelete->affected_rows <= 0) {
                throw new Exception('Booking not found or you do not have permission to delete it');
            }

            // Step 2: Update the status of the associated table to 'available'
            $stmtUpdateTableStatus = $conn->prepare('UPDATE tables SET status = ? WHERE id = (
                SELECT table_id FROM reservations WHERE id = ?
            )');
            if (!$stmtUpdateTableStatus) {
                throw new Exception('Failed to prepare update statement for table status');
            }

            $newStatus = 'available';
            $stmtUpdateTableStatus->bind_param('si', $newStatus, $bookingId);
            $stmtUpdateTableStatus->execute();

            // Commit the transaction if both operations are successful
            $conn->commit();

            // Respond with success message
            http_response_code(200);
            echo json_encode(['message' => 'Booking deleted successfully']);

        } catch (Exception $e) {
            // Rollback the transaction in case of any error
            $conn->rollback();

            // Respond with error message
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }

        // Clean up prepared statements
        $stmtDelete->close();
        $stmtUpdateTableStatus->close();

        exit;
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Booking ID not provided']);
        exit;
    }
}

// Prepare SQL statement to fetch user's reservations including the table name
$stmt = $conn->prepare('SELECT r.id, r.booking_date, r.booking_time, t.table_name, r.guests 
                        FROM reservations r
                        JOIN tables t ON r.table_id = t.id
                        WHERE r.user_id = ?');
if (!$stmt) {
    // Handle SQL statement preparation error
    echo json_encode([]); // Return empty array or appropriate error response
    exit;
}

$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

$bookings = [];
// Fetch reservation data including the table name
while ($row = $result->fetch_assoc()) {
    $bookings[] = [
        'id' => $row['id'],
        'booking_date' => $row['booking_date'],
        'booking_time' => $row['booking_time'],
        'table_name' => $row['table_name'],
        'guests' => $row['guests']
    ];
}

$stmt->close();
$conn->close();

// Return bookings as JSON
echo json_encode($bookings);
?>
