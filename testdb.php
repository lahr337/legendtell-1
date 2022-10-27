<?php
$servername = "localhost";
$username = "legendtell_trigma_us";
$password = "L$#r63vrYBr#@#@";
$database="legendtell_trigma_us";
// Create connection
$conn = new mysqli($servername, $username, $password , $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>