<?php
$servername = "localhost";
$username = "root"; 
$password = NULL;
$databasename = "quan-ly-cua-hang";

// Create connection
$conn = mysqli_connect($servername,$username,$password,$databasename);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
 
  ?>
?> 