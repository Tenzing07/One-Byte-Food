<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

// Set content type for JSON responses
header('Content-Type: application/json');

// Function to handle database errors
function handleDatabaseError($errorMessage) {
    http_response_code(500); // Internal Server Error
    echo json_encode(array("error" => $errorMessage));
    exit(); // Terminate script execution
}

// Function to handle successful updates
function handleUpdateSuccess() {
    echo json_encode(array("success" => true));
    exit(); // Terminate script execution
}

// Function to retrieve general settings
function getGeneralSettings() {
    $q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [1];
    $res = select($q, $values, "i");

    if ($res && $data = mysqli_fetch_assoc($res)) {
        echo json_encode($data);
    } else {
        handleDatabaseError("No data found");
    }
}

// Function to update general settings
function updateGeneralSettings($formData) {
    $q = "UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `sr_no`=?";
    $values = [$formData['site_title'], $formData['site_about'], 1];
    $res = update($q, $values, 'ssi');

    if ($res) {
        handleUpdateSuccess();
    } else {
        handleDatabaseError("Failed to update general settings");
    }
}

// Handle different POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['get_general'])) {
        getGeneralSettings();
    } elseif (isset($_POST['upd_general'])) {
        updateGeneralSettings($_POST);
    } else {
        handleDatabaseError("Invalid request");
    }
} else {
    handleDatabaseError("Invalid request method");
}
?>
