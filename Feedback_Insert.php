<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedback</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #007bff;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
            color: #333333;
        }

        h1 {
            margin-bottom: 30px;
        }

        .success-message {
            color: #008000;
            margin-top: 20px;
        }

        .error-message {
            color: #ff0000;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-gap {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Feedback</h1>

        <?php
        //get all fieldnames using $_POST
        $name = $_POST["customerName"];
        $feedback = $_POST["feedback"];

        //call config.php to open connection to database before performing insert data
        require_once("config.php");

        //input all fieldnames into table customer using INSERT INTO 
        $sql = "INSERT INTO Feedback(Customer_Name, Feedback) VALUES ('$name', '$feedback')";

        if (mysqli_query($conn, $sql)) {
            echo "<p class='success-message'>New feedback submitted successfully</p>";
            echo "<a class='btn' href='Feedback_Customer.php'>Submit More Feedback</a>";
            echo "<a class='btn btn-gap' href='Shopping_List.php'>Proceed to Shopping Page</a>";
        } else {
            echo "<p class='error-message'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
