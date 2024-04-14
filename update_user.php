<?php
// Include database connection
include('inc/db_config.php');

// Check if POST data is received
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Log received POST data for debugging
    error_log("Received POST data: " . print_r($_POST, true));

    // Check for required data
    if (isset($_POST['id']) && isset($_POST['fields'])) {
        $userId = $_POST['id'];
        $updatedFields = $_POST['fields'];

        // Log received data for debugging
        error_log("Received User ID: $userId");
        error_log("Updated Fields: " . print_r($updatedFields, true));

        // Construct SQL UPDATE query with prepared statement
        $sql = "UPDATE user SET ";
        $params = [];
        foreach ($updatedFields as $field => $value) {
            $sql .= "$field = ?, ";
            $params[] = $value;
        }
        $sql = rtrim($sql, ", ") . " WHERE id = ?";
        $params[] = $userId;

        // Log SQL query for debugging
        error_log("SQL Query: $sql");

        // Prepare and bind parameters for the update query
        $stmt = mysqli_prepare($con, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, str_repeat("s", count($params)), ...$params);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($result) {
                echo "Changes saved successfully";
            } else {
                error_log("Update failed: " . mysqli_error($con));
                echo "Error: Failed to save changes";
            }
        } else {
            error_log("Prepare statement error: " . mysqli_error($con));
            echo "Error: Prepare statement failed";
        }
    } else {
        echo "Error: Invalid POST data";
    }
} else {
    echo "Error: Invalid request method";
}

// Close database connection
mysqli_close($con);
?>
