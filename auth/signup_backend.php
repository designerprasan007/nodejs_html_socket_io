<?php
$host =     "localhost"; 
$user =     "root"; 
$password = "root"; 
$dbname =   "vueDb"; 

$con = mysqli_connect($host, $user, $password,$dbname);

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);


if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

switch ($method) {
    case 'GET':
      $id = $_GET['id'];
      $sql = "select * from Users".($id?" where id=$id":''); 
      break;
    case 'POST':
      $fullname = $_POST["fullname"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $validate_password = $_POST["validate_password"];
        if ($password == $validate_password) {
          # code...
          $password =  md5($password);
          $sql = "insert into Users (fullname, email, password) values ('$fullname', '$email', '$password')"; 
          $result = mysqli_query($con,$sql);

          echo "granted";       
        }
        else {
          echo "rejected";

        }
      break;
      }

$con->close();
?>

