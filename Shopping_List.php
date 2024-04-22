<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #3218c5;
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

        .btn {
            border-radius: 5px;
            font-weight: bold;
            background-color: #17a2b8;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #138496;
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

        .cloth-pic {
            height: 80px;
            width: 80px;
            border-radius: 50%;
        }

        .actions-btns {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .actions-btns .btn {
            padding: 5px 15px;
            font-size: 14px;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        @media (max-width: 576px) {
            .table thead {
                display: none;
            }

            .table tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: block;
            }

            .table tbody td:last-child {
                border-bottom: none;
            }
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <a class="btn btn-primary" href="Logout.php" role="button">Logout</a>
        <a class="btn btn-primary" href="Customer_Detail.php" role="button">Personal Information</a>
        <a class="btn btn-primary" href="Feedback_Customer.php" role="button">Give Feedback</a>
        <h2>Shopping Page</h2>
        <form method="post">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Cloth Picture</th>
                        <th>Cloth Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Material</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Stock Quantity</th>
                        <th>Discount</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require_once("config.php");

                    $sql = "SELECT * FROM Cloth";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                            <tr>
                                <td data-th='Cloth Picture'><img src=\"images/$row[Cloth_Pic]\" class='cloth-pic'></td>
                                <td data-th='Cloth Name'>$row[Cloth_Name]</td>
                                <td data-th='Brand'>$row[Brand]</td>
                                <td data-th='Category'>$row[Category]</td>
                                <td data-th='Material'>$row[Material]</td>
                                <td data-th='Color'>$row[Color]</td>
                                <td data-th='Price'>$row[Price]</td>
                                <td data-th='Stock Quantity'>$row[Stock_Quantity]</td>
                                <td data-th='Discount'>$row[Item_Discount]%</td>
                                <td>
                                    <a class='btn btn-danger btn-sm' href='Shopping_Cart_Insert.php?id=$row[Cloth_ID]'>Add to Cart</a>
                                </td>
                            </tr> 
                            ";
                        }
                    } else {
                        echo "<tr><td colspan='10'>0 results</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
        </form>

        <a class="btn btn-primary" href="Shopping_Cart_List.php" role="button">View cart</a>
    </div>
</body>
</html>
