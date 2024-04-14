<?php
$hname = 'localhost';
$uname= 'root';
$pass='';
$db='one-byte-food';

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
?>

