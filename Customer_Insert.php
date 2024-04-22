<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Customer</title>
</head>
<body>

	  <?php

        //get all fieldnames using $_POST
		 $name = $_POST["name"];
		 $email = $_POST["email"];
		 $phoneNumber = $_POST["phoneNumber"];
		 $shippingAddr = $_POST["shippingAddr"];
		 $city = $_POST["city"];
		 $username = $_POST["username"];
		 $password = $_POST["password"];

	    //call config.php to open connection to database before performing insert data
		require_once("config.php");

		//input all fieldnames into table customer using INSERT INTO 
	     $sql = "INSERT INTO customer(name, email, phoneNumber, shippingAddress, city, level, username, password) VALUES ('$name', '$email', '$phoneNumber', '$shippingAddr', '$city', '1', '$username','$password')";

		if (mysqli_query($conn, $sql)) {
			echo "New customer registers successfully";
			echo "<p><a href='Login.html'>Click here to Login</a></p>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	     mysqli_close($conn);
	   ?>
</body>
</html>