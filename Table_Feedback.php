<?php

//establish connection to database using config.php
require_once("config.php");

//create table feedback
$sql = "CREATE TABLE Feedback (
  Feedback_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Customer_Name VARCHAR(100) NOT NULL,
  Feedback VARCHAR(500) NOT NULL,
  Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table Feedback created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>