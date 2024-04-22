<?php

// Set host, username, password
$db_host='localhost';
$db_user='root';
$db_pass='';

//Create connection
$conn = mysqli_connect($db_host, $db_user, $db_pass);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//Create Project Database
$sql = "CREATE DATABASE Project";
if (mysqli_query($conn, $sql)) {
  echo "project Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
