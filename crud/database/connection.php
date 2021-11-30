<?php
$servername = "db-service";
//$servername = "172.17.0.2";
$username = "root";
$password = "secret";

// Create connection
$conn = new mysqli($servername, $username, $password,"CRUD");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>