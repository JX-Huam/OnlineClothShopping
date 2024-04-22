<?php

//establish connection to database using config.php
require_once("config.php");

//create table cloth
$sql = "CREATE TABLE Cloth (
  Cloth_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Cloth_Name VARCHAR(30) NOT NULL,
  Cloth_Pic VARCHAR(30) NOT NULL,
  Brand VARCHAR(30) NOT NULL,
  Category VARCHAR(30) NOT NULL,
  Material VARCHAR(30) NOT NULL,
  Color VARCHAR(10) NOT NULL,
  Price DECIMAL(10, 2) NOT NULL,
  Stock_Quantity INT(3) NOT NULL,
  Item_Discount VARCHAR(5)
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table Cloth created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

$sql = "INSERT INTO Cloth(Cloth_Name, Cloth_Pic, Brand, Category, Material, Color, Price, Stock_Quantity, Item_Discount) 
VALUES ('Cloth1','1.jpg','brand1','category1', 'material1', 'color1', '10', '50', '10')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO Cloth(Cloth_Name, Cloth_Pic, Brand, Category, Material, Color, Price, Stock_Quantity, Item_Discount) 
VALUES ('Cloth2','2.jpg','brand2','category2', 'material2', 'color2', '20', '30', '0')";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>