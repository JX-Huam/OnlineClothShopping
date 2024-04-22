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
            background-color: #cc2323;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }

        .btn-submit {
            margin-top: 20px;
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

    <script>
        function IOValidation() {
            // Make quick references to our fields
            var ClothName = document.getElementsByName("ClothName")[0];
            var ClothPictureName = document.getElementsByName("ClothPictureName")[0];
            var Brand = document.getElementsByName("Brand")[0];
            var Category = document.getElementsByName("Category")[0];
            var Material = document.getElementsByName("Material")[0];
            var Color = document.getElementsByName("Color")[0];
            var Price = document.getElementsByName("Price")[0];
            var Stock = document.getElementsByName("Stock")[0];
            var Discount = document.getElementsByName("Discount")[0];

            if (
                isNotEmpty(ClothName, "Please enter the Cloth Name") &&
                isNotEmpty(ClothPictureName, "Please enter the Cloth Picture Name") &&
                isNotEmpty(Brand, "Please enter the Brand") &&
                isNotEmpty(Category, "Please enter the Category") &&
                isNotEmpty(Material, "Please enter the Material") &&
                isNotEmpty(Color, "Please enter the Color") &&
                isNotEmpty(Price, "Please enter the Price") &&
                isNumber(Price, "Please enter a valid number for Price") &&
                isNotEmpty(Stock, "Please enter the Stock") &&
                isNumber(Stock, "Please enter a valid number for Stock") &&
                isNotEmpty(Discount, "Please enter the Discount") &&
                isNumber(Discount, "Please enter a valid number for Discount")
            ) {
                alert("Form fields are valid");
                return true;
            }

            return false;
        }

        function isNotEmpty(elem, helperMsg) {
            if (elem.value.length > 0) {
                return true;
            } else {
                alert(helperMsg);
                elem.focus(); // Set the focus to this input
                return false;
            }
        }

        function isNumber(elem, helperMsg) {
            var numericExpression = /^[0-9]+(\.[0-9]+)?$/;
            if (elem.value.match(numericExpression)) {
                return true;
            } else {
                alert(helperMsg);
                elem.focus(); // Set focus to this input
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container my-5">
        <h2>New Cloth</h2>
        <form method="post" action="Cloth_Add.php" onsubmit="return IOValidation()">
            <div class="mb-3">
                <label for="ClothName" class="form-label">Cloth Name</label>
                <input type="text" class="form-control" id="ClothName" name="ClothName" required>
            </div>
            <div class="mb-3">
                <label for="ClothPictureName" class="form-label">Cloth Picture Name</label>
                <input type="text" class="form-control" id="ClothPictureName" name="ClothPictureName" required>
            </div>
            <div class="mb-3">
                <label for="Brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="Brand" name="Brand" required>
            </div>
            <div class="mb-3">
                <label for="Category" class="form-label">Category</label>
                <input type="text" class="form-control" id="Category" name="Category" required>
            </div>
            <div class="mb-3">
                <label for="Material" class="form-label">Material</label>
                <input type="text" class="form-control" id="Material" name="Material" required>
            </div>
            <div class="mb-3">
                <label for="Color" class="form-label">Color</label>
                <input type="text" class="form-control" id="Color" name="Color" required>
            </div>
            <div class="mb-3">
                <label for="Price" class="form-label">Price</label>
                <input type="text" class="form-control" id="Price" name="Price" required>
            </div>
            <div class="mb-3">
                <label for="Stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="Stock" name="Stock" required>
            </div>
            <div class="mb-3">
                <label for="Discount" class="form-label">Discount</label>
                <input type="text" class="form-control" id="Discount" name="Discount" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">ADD CLOTH</button>
                <a class="btn btn-back" href="Cloth_List.php" role="button">Back to Cloth List</a>
            </div>
        </form>
    </div>
</body>
</html>
