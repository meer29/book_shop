<?php
$hostname = "http://localhost/book-shop";
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "bookshopdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>

