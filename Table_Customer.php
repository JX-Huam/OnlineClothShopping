<?php

//establish connection to database using config.php
require_once("config.php");

//create table customer
$sql = "CREATE TABLE Customer (
  Customer_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  phoneNumber VARCHAR(20) NOT NULL,
  shippingAddress VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,
  level INT(1) NOT NULL,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table Customer created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

//initiate admin account into database
$sql = "INSERT INTO Customer(name, email, phoneNumber, shippingAddress, city, level, username, 
password) VALUES ('Admin', 'null', '0', 'null', 'null', '0', 
'admin','123')";
mysqli_query($conn, $sql);

//initiate first customer
$sql = "INSERT INTO Customer(name, email, phoneNumber, shippingAddress, city, level, username, 
password) VALUES ('Huam', 'huamxiang@graduate.utm.my', '0156983182', 'M07, KTDI', 'Johor', '1', 
'customer1','1234')";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>