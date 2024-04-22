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
    <title>Add Cloth to Cart</title>
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

        .cloth-pic {
            height: 200px;
            width: 200px;
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
    </style>
    <script type="text/javascript">
        function allNumber(input) {
            var numbers = /^[0-9]+$/;
            if (input.value.match(numbers)) {
                return true;
            } else {
                return false;
            }
        }

        function validate() {
            var quantityInput = document.getElementsByName("quantity_buy")[0];
            var quantityError = document.getElementById("quantityError");
            var isValid = true;

            if (quantityInput.value.trim() === "") {
                quantityError.style.color = "red";
                quantityError.innerHTML = "Quantity to Buy: (Please fill in this field)";
                isValid = false;
            } else if (!allNumber(quantityInput)) {
                quantityError.style.color = "red";
                quantityError.innerHTML = "Quantity to Buy: (Please only fill in numbers)";
                isValid = false;
            }

            return isValid;
        }
    </script>
</head>
<body>
    <div class="container my-5">
        <h2>Cloth Details</h2>
        <?php
        $id = $_SESSION['ID'];
        if (isset($_SESSION['ID'])) {
            $id = $_SESSION['ID'];
        }

        $cloth_id = $_GET["id"];

        $sql = "SELECT * FROM Cloth WHERE Cloth_ID=$cloth_id";
        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="images/<?php echo $row['Cloth_Pic']; ?>" class="cloth-pic">
        </div>
        <form method="post" action="Shopping_Cart_Update.php" onsubmit="return validate()">
            <table class="table">
                <tr>
                    <th>Cloth Name</th>
                    <td><?php echo $row['Cloth_Name']; ?></td>
                </tr>
                <tr>
                    <th>Cloth Brand</th>
                    <td><?php echo $row['Brand']; ?></td>
                </tr>
                <tr>
                    <th>Cloth Category</th>
                    <td><?php echo $row['Category']; ?></td>
                </tr>
                <tr>
                    <th>Cloth Material</th>
                    <td><?php echo $row['Material']; ?></td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td><?php echo $row['Color']; ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><?php echo $row['Price']; ?></td>
                </tr>
                <tr>
                    <th>Stock Quantity Left</th>
                    <td><?php echo $row['Stock_Quantity']; ?></td>
                </tr>
                <tr>
                    <th>Item Discount</th>
                    <td><?php echo $row['Item_Discount']; ?>%</td>
                </tr>
                <tr>
                    <th id="quantityError">Quantity to Buy</th>
                    <td>
                        <input type="text" name="quantity_buy" value="">
                        <input type="hidden" name="cloth_id" value="<?php echo $row['Cloth_ID']; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Add Order</button>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        } else {
            echo "<p style='color: red;'>Cloth does not exist</p>";
        }
        mysqli_close($conn);
        ?>
        <div style="text-align: center;">
            <a class="btn btn-back" href="Shopping_List.php" role="button">Back to Shopping Page</a>
        </div>
    </div>
</body>
</html>
