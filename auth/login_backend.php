<?php
session_start();

$host = 'localhost'; 
$user = "root"; 
$password = "root"; 
$dbname = "vueDb"; 

$con = mysqli_connect($host, $user, $password,$dbname); 
if(empty($_POST["email"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $email = mysqli_real_escape_string($con, $_POST["email"]);  
           $password = mysqli_real_escape_string($con, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM Users WHERE email = '$email' AND password = '$password'";  
           $result = mysqli_query($con, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                echo "your logged in";
                session_start();
                $_SESSION['id']=session_id();

           }  
           else  
           {  
                echo "Wrong User Details";  
           }  
      } 
?>
