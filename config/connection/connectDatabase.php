<?php
$servername = "localhost";
$username = "root";
$databasename = "quan-ly-cua-hang";

// Create connection
$conn = new mysqli($servername, $username, NULL, $databasename);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

