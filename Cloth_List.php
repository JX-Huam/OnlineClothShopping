<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloth Database</title>
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
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>List of Cloths</h2>
        <div class="my-3 d-flex justify-content-center">
            <a class="btn" href="Main_Admin.html" role="button">Back to Main Page</a>
            <a class="btn" href="Cloth_Form.php" role="button">Add Cloth</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Cloth Picture</th>
                    <th>Cloth ID</th>
                    <th>Cloth Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Material</th>
                    <th>Color</th>
                    <th>Price (RM)</th>
                    <th>Stock</th>
                    <th>Discount (%)</th>
                    <th>Actions</th>
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
                            <td><img src=\"images/$row[Cloth_Pic]\" class='cloth-pic'></td>
                            <td>$row[Cloth_ID]</td>
                            <td>$row[Cloth_Name]</td>
                            <td>$row[Brand]</td>
                            <td>$row[Category]</td>
                            <td>$row[Material]</td>
                            <td>$row[Color]</td>
                            <td>$row[Price]</td>
                            <td>$row[Stock_Quantity]</td>
                            <td>$row[Item_Discount]</td>
                            <td class='actions-btns'>
                                <a class='btn btn-primary' href='Cloth_Edit.php?Cloth_ID=$row[Cloth_ID]'>Edit</a>
                                <a class='btn btn-delete' href='Cloth_Delete.php?Cloth_ID=$row[Cloth_ID]'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>0 results</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
