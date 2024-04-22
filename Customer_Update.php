<?php
session_start();
// Establish connection to the database
require_once("config.php");

// Checking if the 'ID' field is set and not null
// If null, you can add your own JavaScript script to show an alert box or error message
if (isset($_SESSION['ID'])) {
    $id = $_SESSION['ID'];
}

// Accessing the field names from 'edit_guest-s.php'
// Decide whether you should use $_POST or $_GET based on your requirements
$id = $_SESSION['ID'];
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phoneNumber"];
$ship = $_POST["shippingAddr"];
$city = $_POST["city"];
$username = $_POST["username"];
$password = $_POST["password"];

// Updating the 'Customer' table based on the 'ID' using the UPDATE query
$sql = "UPDATE Customer SET name = '$name', 
 email = '$email' ,
 phoneNumber = '$phone',
 shippingAddress = '$ship',
 city = '$city',
 username = '$username',
 password = '$password' WHERE Customer_ID = $id";

if (mysqli_query($conn, $sql)) {
   echo "Information updated successfully";
} else {
   echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Information Updated</h2>
    <a href="Customer_Detail.php">Click here to go back to details</a>
</body>
</html>
