<?php 
// Start up PHP Session
session_start();

include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #3218c5;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            color: #333333;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            vertical-align: middle;
        }

        table th {
            width: 150px;
        }

        .btn-primary {
            background-color: #17a2b8;
            color: #ffffff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #138496;
        }
    </style>

    <script type="text/javascript">
        function delivered() {
            alert("The order was successfully delivered!");
        }
    </script>
</head>
<body>
    <div class="container my-5">
        <h2>User Information</h2>
        <table class="table">
            <?php
            require_once("config.php");

            $id = $_SESSION['ID'];

            if (isset($_SESSION['ID'])) {
                $id = $_SESSION['ID'];
            }

            $sql = "SELECT * FROM Customer WHERE Customer_ID = $id";

            if (mysqli_query($conn, $sql)) {
                $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

                echo "
                <tr>
                    <th>Name</th>
                    <td>$row[name]</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>$row[email]</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>$row[phoneNumber]</td>
                </tr>
                <tr>
                    <th>Shipping Address</th>
                    <td>$row[shippingAddress]</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>$row[city]</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>$row[username]</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>$row[password]</td>
                </tr>
                <tr>
                    <td colspan='2' style='text-align: center;'>
                        <a class='btn btn-primary' href='Customer_Edit.php' role='button'>Update Information</a>
                    </td>
                </tr>
                ";
            } else {
                echo "<tr><td colspan='2'>0 results</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </table>

        <div style="text-align: center;">
            <a class="btn btn-primary" href="Shopping_List.php" role="button">Back to Shopping Page</a>
        </div>
    </div>
</body>
</html>
