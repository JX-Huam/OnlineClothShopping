<?php

//establish connection to database
require_once ("config.php");


//checking the fieldname id is set and not null
if (isset($_POST["Cloth_ID"]) && !empty($_POST["Cloth_ID"])) {
    $Cloth_ID = $_POST["Cloth_ID"];
} else {
    // Handle the case when Cloth_ID is not set or empty
    // You can redirect the user to an error page or display an error message
    exit("Invalid Cloth ID");
}

// access the fieldname 
    $Cloth_Name = $_POST["ClothName"];
    $Cloth_Pic = $_POST["ClothPicture"];
    $Brand = $_POST["Brand"];
    $Category = $_POST["Category"];
    $Material = $_POST["Material"];
    $Color = $_POST["Color"];
    $Price = $_POST["Price"];
    $Stock_Quantity = $_POST["Stock"];
    $Item_Discount = $_POST["Discount"];



// update table cloth according to id using UPDATE
$sql = "UPDATE Cloth SET Cloth_Name = '$Cloth_Name', 
Cloth_Pic = '$Cloth_Pic', Brand = '$Brand', Category = '$Category', 
Material = '$Material', Color = '$Color', Price = '$Price', 
Stock_Quantity = '$Stock_Quantity', Item_Discount = '$Item_Discount' 
WHERE Cloth_ID = '$Cloth_ID'";

if (mysqli_query($conn, $sql)) {
   echo "";
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
    <title></title>
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
        <h2 class="message">Record updated successfully</h2>
        <a class="link" href="Cloth_List.php">Cloth List</a>
    </div>
</body>
</html>