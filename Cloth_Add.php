<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cloth</title>
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
            padding: 10px 20px;
            background-color: #FFFFFF;
            color: #0000FF;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
        }

        .link:hover {
            background-color: #0000CC;
            color: #FFFFFF;
        }
    </style>
</head>
<body>

    <?php

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Check if required form fields are present
        if (
            isset($_POST["ClothName"]) &&
            isset($_POST["ClothPictureName"]) &&
            isset($_POST["Brand"]) &&
            isset($_POST["Category"]) &&
            isset($_POST["Material"]) &&
            isset($_POST["Color"]) &&
            isset($_POST["Price"]) &&
            isset($_POST["Stock"]) &&
            isset($_POST["Discount"])
        ) {

            // Retrieve the form field values
            $Cloth_Name = $_POST["ClothName"];
            $Cloth_Pic = $_POST["ClothPictureName"];
            $Brand = $_POST["Brand"];
            $Category = $_POST["Category"];
            $Material = $_POST["Material"];
            $Color = $_POST["Color"];
            $Price = $_POST["Price"];
            $Stock_Quantity = $_POST["Stock"];
            $Item_Discount = $_POST["Discount"];

            // Open connection to the database
            require_once("config.php");

            // Insert the field values into the database table
            $sql = "INSERT INTO Cloth(Cloth_Name, Cloth_Pic, Brand, Category, Material, Color, Price, Stock_Quantity, Item_Discount) 
            VALUES ('$Cloth_Name','$Cloth_Pic','$Brand','$Category', '$Material', '$Color', '$Price', '$Stock_Quantity', '$Item_Discount')";

            if (mysqli_query($conn, $sql)) {
                echo "<div class='container'>
                    <h2 class='message'>Cloth list updated successfully</h2>
                    <a class='link' href='Cloth_List.php' style='text-align: center'>Cloth List</a>
                    </div>";
                    
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            echo "Error: One or more required form fields are missing.";
        }
    }
    ?>
</body>
</html>
