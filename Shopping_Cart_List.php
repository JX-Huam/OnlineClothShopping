<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #3218c5;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
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

        .cloth-pic {
            height: 100px;
            width: 100px;
            border-radius: 10px;
            object-fit: cover;
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

        .btn-back {
            background-color: #333333;
            color: #ffffff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #222222;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        table thead {
            background-color: #17a2b8;
            color: #ffffff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #d9e6ec;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Cart</h2>
        <form method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Cloth Picture</th>
                        <th>Cloth Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Material</th>
                        <th>Color</th>
                        <th>Quantity Ordered</th>
                        <th>Total Price after Discount</th>
                        <th>Ordered Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    session_start();
                    require_once("config.php");

                    $id = $_SESSION['ID'];

                    $orders = "SELECT * FROM Orders WHERE Customer_ID=$id";
                    $orders_result = mysqli_query($conn, $orders);

                    if (mysqli_num_rows($orders_result) > 0) {
                        while ($orders_row = mysqli_fetch_assoc($orders_result)) {
                            $cloth = "SELECT * FROM Cloth WHERE Cloth_ID=$orders_row[Cloth_ID]";
                            $cloth_result = mysqli_query($conn, $cloth);
                            $cloth_row = mysqli_fetch_assoc($cloth_result);
                            echo "
                            <tr>
                                <td><img src=\"images/$cloth_row[Cloth_Pic]\" class='cloth-pic'></td>
                                <td>$cloth_row[Cloth_Name]</td>
                                <td>$cloth_row[Brand]</td>
                                <td>$cloth_row[Category]</td>
                                <td>$cloth_row[Material]</td>
                                <td>$cloth_row[Color]</td>
                                <td>$orders_row[Quantity]</td>
                                <td>$orders_row[Total_Price_After_Discount]</td>
                                <td>$orders_row[Order_Date]</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No items in the cart.</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </form>

        <div style="text-align: center;">
            <a class="btn btn-primary" href="Shopping_List.php" role="button">Back to Shopping Page</a>
        </div>
    </div>
</body>
</html>
