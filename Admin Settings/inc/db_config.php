<?php
$hname = 'localhost';
$uname= 'root';
$pass='';
$db='one-byte-food';

$con = mysqli_connect($hname,$uname,$pass,$db);
if(!$con){
    die("Cannot connect to Database: " . mysqli_connect_error());
}

function filteration($data){
    foreach($data as $key => $value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);
        $data[$key] = $value;
    }
    return $data;
}

function select($con, $sql, $values, $datatypes) {
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($result) {
            return $result;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Select");
        }
    } else {
        die("Query cannot be prepared - Select");
    }
}
    
function update($con, $sql, $values, $datatypes) {
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        return $affected_rows;
    } else {
        die("Query cannot be prepared - Update");
    }
}
?>
