<?php

//establish connection to database using config.php
require_once("config.php");

//create table order
$sql = "CREATE TABLE Orders (
  Order_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Cloth_ID INT(6)  NOT NULL,
  Customer_ID VARCHAR(255) NOT NULL,
  Unit_Price DECIMAL(10,2) NOT NULL,
  Quantity INT(3) NOT NULL,
  Total_Price_After_Discount DECIMAL(10,2) NOT NULL,
  Order_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  Shipping_Address VARCHAR(255)
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table Orders created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>