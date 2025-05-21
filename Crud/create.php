<?php
include "Db_connection.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $sql = "INSERT INTO users(username,passkey,email) VALUES('$username','$hashed','$email')";
    $result = mysqli_query($conn, $sql); //$conn->query($sql)
    if($result){
        header("location: login.php?msg=New user created");
        exit();
    }else{
        die("Querry Failed: ". mysqli_error($conn));
    }
}
?>
