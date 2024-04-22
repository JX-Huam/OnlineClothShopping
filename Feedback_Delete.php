<?php
require_once("config.php");

$id = $_GET["id"];

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

// Delete the feedback based on the ID using DELETE FROM query
$sql = "DELETE FROM Feedback WHERE Feedback_ID = $id";

if (mysqli_query($conn, $sql)) {
   echo "Feedback deleted successfully";
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
    <title>Delete Feedback</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #cc2323;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        a {
            color: #fff;
            text-decoration: none;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h2>Feedback Deleted</h2>
    <a href="Feedback_List.php">Click here to go back to the feedback list</a>
    <br>
    <a href="Main_Admin.html">Click here to go back to the main page</a>
</body>
</html>
