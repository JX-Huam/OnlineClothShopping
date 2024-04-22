<?php
session_start();
// Establish connection to the database
require_once("config.php");

// Checking if the 'ID' field is set and not null
// If null, you can use your own JavaScript script to display an alert box or an error message
if (isset($_SESSION['ID'])) {
    $id = $_SESSION['ID'];
}

$id = $_SESSION['ID'];
$quantity = $_POST["quantity_buy"];
$cloth_id = $_POST["cloth_id"];

// Retrieve cloth and customer data
$cloth_query = "SELECT * FROM Cloth WHERE Cloth_ID=$cloth_id";
$cloth_result = mysqli_query($conn, $cloth_query);
$cloth_row = mysqli_fetch_assoc($cloth_result);

$customer_query = "SELECT * FROM Customer WHERE Customer_ID=$id";
$customer_result = mysqli_query($conn, $customer_query);
$customer_row = mysqli_fetch_assoc($customer_result);

$priceAfterDiscount = ($cloth_row["Price"] * (100 - $cloth_row["Item_Discount"]) / 100) * $quantity;

// Update the Orders table with the new order
$sql = "INSERT INTO Orders (Cloth_ID, Customer_ID, Unit_Price, Quantity, Total_Price_After_Discount, Shipping_Address)
        VALUES ('$cloth_id', '$id', '$cloth_row[Price]', '$quantity', '$priceAfterDiscount', '$customer_row[shippingAddress]')";

if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// Decrease the amount of stock by the purchased quantity
$sql = "UPDATE Cloth SET Stock_Quantity = Stock_Quantity - $quantity WHERE Cloth_ID = $cloth_id";
mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #0000FF;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .message {
            color: #FFFFFF;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FFFFFF;
            color: #0000FF;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }

        .link:hover {
            background-color: #0000CC;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="message">Order added successfully</h2>
        <a class="link" href="Shopping_List.php">Back to Shopping Page</a>
    </div>
</body>
</html>
