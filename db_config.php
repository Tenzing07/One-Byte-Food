<?php
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'one-byte-food';

$con = mysqli_connect($hname,$uname,$pass,$db);
if(!$con){
    die("Cannot connect to Database" .mysqli_connect_error());
}

function filteration($data){
    foreach($data as $key => $value){
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function select($con, $sql, $values, $datatypes){
    if($stmt = mysqli_prepare($con,$sql))
    {
        if(!mysqli_stmt_bind_param($stmt,$datatypes,...$values)){
            die("Parameters cannot be bound - Select");
        }
        if (!mysqli_stmt_execute($stmt)){
            die("Query cannot be executed - Select");
        }
        $res= mysqli_stmt_get_result($stmt);
        return $res;
    }else{
        die("query cannot be prepared - Select");
    }
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