<?php
$servername = "localhost";
$username = "root";
$databasename = "quan-ly-cua-hang";

// Create connection
$conn = new mysqli($servername, $username, NULL, $databasename);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


function rand_string($length){
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $size = strlen($chars);
  $str = '';
  for( $i = 0; $i < $length; $i++ ) {

      $str .= $chars[rand(0,$size - 1)];

  }
  return $str;
}