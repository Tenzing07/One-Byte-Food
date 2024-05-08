<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'one-byte-food';

// Establish database connection
$con = mysqli_connect($hname, $uname, $pass, $db);
if (!$con) {
    die("Cannot connect to Database: " . mysqli_connect_error());
}

// Function to filter input data
function filteration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

// Function to sanitize data using real_escape_string
function sanitize($con, $data)
{
    return mysqli_real_escape_string($con, $data);
}

// Function to perform SELECT query with prepared statement
function select($con, $sql, $values = [], $datatypes = '')
{
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        if (!empty($values) && $datatypes) {
            if (!mysqli_stmt_bind_param($stmt, $datatypes, ...$values)) {
                die("Parameters cannot be bound - Select");
            }
        }
        if (!mysqli_stmt_execute($stmt)) {
            die("Query cannot be executed - Select");
        }
        $res = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt); // Close the statement
        return $res;
    } else {
        die("Query cannot be prepared - Select");
    }
}
