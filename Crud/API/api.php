<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$hostname = "localhost";
$username = "root";
$password = "";
$db = "php_db";

$conn = new mysqli($hostname, $username, $password, $db);

if($conn->connect_error){
    die(json_encode(["Error" => "something went wrong" . $conn->connect_error]));
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method){
   case 'GET':
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM users where id=$id");
        if($result){
            $user = $result->fetch_assoc();
            echo json_encode($user);
        }else{
          echo json_encode(["message" => "No user with such id"]);
        }
    }else{
    $result = $conn->query("SELECT * FROM users");
    $users = [];
    while($row = $result->fetch_assoc()){
        $users[] = $row;
    }
    echo json_encode($users);
  }
   break;

   case 'POST':
     $content = json_decode(file_get_contents("php://input"), true);

     $username = $conn->real_escape_string($content['username']);
     $email = $conn->real_escape_string($content['email']);
     $password = $conn->real_escape_string($content['password']);
     $result = $conn->query("INSERT INTO users(username,passkey,email) VALUES ('$username','$email','$password')");

     if($result){
        echo json_encode(["Message" => "User created successfully"]);
     }else{
        echo json_encode(["Message" => "Failed to create user"]);
     }

   break;

   case 'PUT':
    if(isset($_GET['id'])){
    $content = json_decode(file_get_contents("php://input"), true);
    $id= $_GET['id'];

    $username = $conn->real_escape_string($content['username']);
    $email = $conn->real_escape_string($content['email']);
    $password = $conn->real_escape_string($content['password']);

    $result = $conn->query("UPDATE users SET username='$username', email='$email', passkey='$password' where id='$id'");
    if($result){
        echo json_encode(["Message" => "User Updated successfully"]);
    }else{
        echo json_encode(["Message" => "Query failed:" . mysqli_error($result)]);
    }
    }else{
        echo json_encode(['Message' => 'No ID was provided']);
    }
    break;

    case 'DELETE':
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $result = $conn->query("DELETE FROM users Where id=$id");
          if($result){
            echo json_encode(['Message' => 'User Deleted successfully']);
          }else{
        echo json_encode(["Message" => "Query failed:" . mysqli_error($result)]);
        }
        }else{
        echo json_encode(['Message' => 'No ID was provided']);
        }
        break;
      }
?>