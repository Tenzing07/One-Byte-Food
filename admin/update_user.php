<?php
// Include database configuration
require_once('inc/db_config.php');

// Check if the request method is POST and data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode JSON data sent from the client-side
    $postData = json_decode(file_get_contents('php://input'), true);

    // Validate required fields in the received data
    if (isset($postData['id']) && isset($postData['fields'])) {
        $userId = mysqli_real_escape_string($con, $postData['id']);
        $fields = $postData['fields'];

        // Prepare an array to store update statements
        $updates = [];

        // Build update statements for each field
        foreach ($fields as $fieldName => $fieldValue) {
            $fieldValue = mysqli_real_escape_string($con, $fieldValue);
            $updates[] = "$fieldName = '$fieldValue'";
        }

        // Construct the SQL query to update user details
        $sql = "UPDATE user SET " . implode(", ", $updates) . " WHERE id = '$userId'";

        // Execute the SQL query
        $result = mysqli_query($con, $sql);

        // Check if the query executed successfully
        if ($result) {
            // Return success message as JSON response
            echo json_encode(['success' => true]);
        } else {
            // Return error message as JSON response
            echo json_encode(['error' => 'Failed to update user details.']);
        }
    } else {
        // Return error message if required data is missing
        echo json_encode(['error' => 'Invalid request.']);
    }
} else {
    // Return error message for invalid request method
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
