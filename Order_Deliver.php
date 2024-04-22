<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Shipping Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #cc2323;
            color: #fff;
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .container {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        .shipping-details {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 8px;
        }
    </style>
    <script type="text/javascript">
        function delivered() {
            alert("The order was successfully delivered!");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Shipping Details</h2>
        <div class="shipping-details">
            <table class="table">
                <?php
                require_once("config.php"); // Call connection to the database

                $id = $_GET["id"];

                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                }

                $sql = "SELECT * FROM Orders WHERE Order_ID = $id";

                if (mysqli_query($conn, $sql)) {
                    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                    // Output data of each row
                    echo "
                    <tr>
                        <th>Order ID</th>
                        <td>$row[Order_ID]</td>
                    </tr>
                    <tr>
                        <th>Cloth ID</th>
                        <td>$row[Cloth_ID]</td>
                    </tr>
                    <tr>
                        <th>Customer ID</th>
                        <td>$row[Customer_ID]</td>
                    </tr>
                    <tr>
                        <th>Unit Price</th>
                        <td>$row[Unit_Price]</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>$row[Quantity]</td>
                    </tr>
                    <tr>
                        <th>Total Price After Discount</th>
                        <td>$row[Total_Price_After_Discount]</td>
                    </tr>
                    <tr>
                        <th>Order Date</th>
                        <td>$row[Order_Date]</td>
                    </tr>
                    <tr>
                        <th>Shipping Address</th>
                        <td>$row[Shipping_Address]</td>
                    </tr>  
                    <tr>
                        <td><a class='btn btn-primary' onclick='delivered()'>Deliver</a></td>
                    </tr>
                    ";
                } else {
                    echo "0 results";
                }

                $sql = "DELETE FROM Orders WHERE Order_ID = $id";

                mysqli_query($conn, $sql);

                mysqli_close($conn);
                ?>
            </table>
        </div>

        <a class="btn btn-primary" href="Order_List.php" role="button">Back to Order List</a>
        <a class="btn btn-primary" href="Main_Admin.html" role="button">Back to Main Page</a>
    </div>

</body>
</html>
