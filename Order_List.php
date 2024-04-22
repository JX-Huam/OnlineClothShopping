<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #cc2323;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #17a2b8;
            color: #ffffff;
            border: none;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .btn-deliver {
            background-color: #dc3545;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-deliver:hover, .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>List of Orders</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Cloth ID</th>
                    <th>Customer ID</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price After Discount</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require_once("config.php");

                $sql = "SELECT * FROM Orders";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td>$row[Order_ID]</td>
                            <td>$row[Cloth_ID]</td>
                            <td>$row[Customer_ID]</td>
                            <td>$row[Unit_Price]</td>
                            <td>$row[Quantity]</td>
                            <td>$row[Total_Price_After_Discount]</td>
                            <td>$row[Order_Date]</td>
                            <td>
                                <a class='btn btn-deliver btn-sm' href='Order_Deliver.php?id=$row[Order_ID]'>Deliver</a>
                                <a class='btn btn-delete btn-sm' href='Order_Delete.php?id=$row[Order_ID]'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>0 results</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <a class="btn btn-primary" href="Main_Admin.html" role="button">Back to Main Page</a>
    </div>
</body>
</html>
