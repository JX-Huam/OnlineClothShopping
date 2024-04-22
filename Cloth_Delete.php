<?php

//open connection to database 
require_once ("config.php");

if (isset($_GET["Cloth_ID"]) && !empty($_GET["Cloth_ID"])) {
    $Cloth_ID = $_GET["Cloth_ID"]; 
} else {
    // Handle the case when Cloth_ID is not set or empty
    // You can redirect the user to an error page or display an error message
    exit("Invalid Cloth ID");
}


// delete cloth according to id using DELETE FROM
$sql = "DELETE FROM Cloth WHERE Cloth_ID = '$Cloth_ID'";

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
	   <a class="link" href="Cloth_List.php">Cloth List</a>
    </div>
</body>
</html>