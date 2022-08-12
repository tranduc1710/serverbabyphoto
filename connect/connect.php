<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "babyphoto";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if($conn->connect_error){
  die("Error Connection");
}
// echo "\nConnected successfully";
?>