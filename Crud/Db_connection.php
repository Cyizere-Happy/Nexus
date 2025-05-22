<?php
$Hostname = "localhost";
$username = "root";
$password = "";
$db_name = "php_db";

$conn = new mysqli($Hostname,$username,$password,$db_name);

if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
    header("location: login.php?msg=New user created");
}
?>