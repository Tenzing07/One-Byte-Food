<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'one-byte-food';

$con = mysqli_connect($hname, $uname, $pass, $db);
if (!$con) {
    die("Cannot connect to Database: " . mysqli_connect_error());
}

function filteration($data) {
    global $con;
    foreach ($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $value = mysqli_real_escape_string($con, $value);
        $data[$key] = $value;
    }
    return $data;
}

function select($sql, $values, $datatypes) {
    global $con;
    $stmt = mysqli_prepare($con, $sql);
    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    if (!mysqli_stmt_execute($stmt)) {
        die("Query execution failed: " . mysqli_stmt_error($stmt));
    }
    $result = mysqli_stmt_get_result($stmt);
    if ($result === false) {
        die("Getting result set failed: " . mysqli_error($con));
    }
    return $result;
}

function update($sql, $values, $datatypes) {
    global $con;
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        return $affected_rows;
    } else {
        die("Query cannot be prepared - Update: " . mysqli_error($con));
    }
}
function delete($sql, $values, $datatypes){
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Delete");
        }
    } else {
        die("Query cannot be prepared - Delete");
    }
}
?>
