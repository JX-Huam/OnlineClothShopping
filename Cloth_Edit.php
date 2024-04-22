<?php

//open connection to database before performing SELECT
require_once("config.php");

if (isset($_GET["Cloth_ID"]) && !empty($_GET["Cloth_ID"])) {
    $Cloth_ID = $_GET["Cloth_ID"]; 
} else {
    // Handle the case when Cloth_ID is not set or empty
    // You can redirect the user to an error page or display an error message
    exit("Invalid Cloth ID");
}

//retrieving data from table Cloth according to fieldname id
            
$sql = "SELECT * FROM Cloth WHERE Cloth_ID= $Cloth_ID";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
            // get all the fieldnames from the selected row
            $Cloth_Name = $row["Cloth_Name"];
            $Cloth_Pic = $row["Cloth_Pic"];
            $Brand = $row["Brand"];
            $Category = $row["Category"];
            $Material = $row["Material"];
            $Color = $row["Color"];
            $Price = $row["Price"];
            $Stock_Quantity = $row["Stock_Quantity"];
            $Item_Discount = $row["Item_Discount"];
                
            }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cloth</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #cc2323;
        }

        .container {
            max-width: 600px;
            margin: 3rem auto;
            padding: 2rem;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }


        .btn-edit:hover {
            background-color: #b31f1f;
            border-color: #b31f1f;
        }

        .btn-back {
            background-color: #3f51b5;
            border-color: #3f51b5;
            color: #ffffff; /* Added font color */
        }

        .btn-back:hover {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Cloth</h2>
        <form method="post" action="Cloth_Update.php">
            <input type="hidden" name="Cloth_ID" value="<?php echo $Cloth_ID; ?>">
            <div class="mb-3">
                <label class="form-label">Cloth Name</label>
                <input type="text" class="form-control" name="ClothName" value="<?php echo $Cloth_Name; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Cloth Picture</label>
                <input type="text" class="form-control" name="ClothPicture" value="<?php echo $Cloth_Pic; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Brand</label>
                <input type="text" class="form-control" name="Brand" value="<?php echo $Brand; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" class="form-control" name="Category" value="<?php echo $Category; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Material</label>
                <input type="text" class="form-control" name="Material" value="<?php echo $Material; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Color</label>
                <input type="text" class="form-control" name="Color" value="<?php echo $Color; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="Price" value="<?php echo $Price; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="text" class="form-control" name="Stock" value="<?php echo $Stock_Quantity; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Discount</label>
                <input type="text" class="form-control" name="Discount" value="<?php echo $Item_Discount; ?>">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-edit">Edit Cloth</button>
            </div>
        </form>
        <div class="mt-3">
            <a class="btn btn-back" href="Cloth_List.php" role="button">Back to Cloth List</a>
            <a class="btn btn-back" href="Main_Admin.html" role="button">Back to Main Page</a>
        </div>
    </div>
</body>
</html>
