<?php
require_once 'inc/db_config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tableId = $_POST['tableId'];

    // Delete table from database
    $sql = "DELETE FROM tables WHERE id = $tableId";

    if ($conn->query($sql) === TRUE) {
        echo "Table deleted successfully";
    } else {
        echo "Error deleting table: " . $conn->error;
    }
}
?>
