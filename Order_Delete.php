<?php

require_once ("config.php");

$id = $_GET["id"];

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}


//delete order according to id using DELETE FROM
 $sql = "DELETE FROM Orders WHERE Order_ID = $id";

if (mysqli_query($conn, $sql)) {
   echo "";
   } else {
   echo "Error deleting record: " . mysqli_error($conn);
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
        <h2 class="message">Record deleted successfully</h2>
        <a class="link" href="Order_List.php">Click here to back to order list</a>
        <a class="link" href="Main_Admin.html">Click here to back to main page</a>
    </div>
</body>
</html>