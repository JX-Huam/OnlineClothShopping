<?php 
// Start up PHP Session
session_start();

include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Check</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-top: 100px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
        }

        .btn-container a {
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <div class="message">
            <?php
            // username and password sent from form login.html
            $myusername=$_POST['username'];
            $mypassword=$_POST['password'];

            $sql="SELECT * FROM customer WHERE username='$myusername' AND password='$mypassword'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) 
                {
                    $user_name = $row["username"];
                    $user_id = $row["Customer_ID"];
                    $user_level = $row["level"];
                }
            }

            // mysql_num_row is counting table row
            $count=mysqli_num_rows($result);

            // If result matched $myusername and $mypassword, table row must be 1 row
            // If customer login
            if($count==1 && $user_level==1){
                $_SESSION["Login"] = "YES";
             
                // Add user information to the session (global session variables)
                $_SESSION['USER'] = $user_name;
                $_SESSION['ID'] = $user_id;
                $_SESSION['LEVEL'] = $user_level;

                echo "<h3>Welcome, $user_name!</h3>";
                echo "<p>You are now correctly logged in as a customer.</p>";
                echo "<p><a href='Shopping_List.php' class='btn btn-primary'>Proceed to Shopping Site</a></p>";
                echo "<p><a href='Customer_Detail.php' class='btn btn-primary'>Proceed to Details</a></p>";
            }
            // If admin login
            else if($count==1 && $user_level==0){
                $_SESSION["Login"] = "YES";
                 
                // Add user information to the session (global session variables)
                $_SESSION['USER'] = $user_name;
                $_SESSION['ID'] = $user_id;
                $_SESSION['LEVEL'] = $user_level;
                
                echo "<h3>Welcome, $user_name!</h3>";
                echo "<p>You are now correctly logged in as an admin.</p>";
                echo "<p><a href='Main_Admin.html' class='btn btn-primary'>Proceed to Main Handle Site</a></p>";
            }
            // If wrong username and password
            else {
                $_SESSION["Login"] = "NO";
             
                echo "<h3>Login Failed</h3>";
                echo "<p>You are NOT correctly logged in.</p>";
                echo "<p><a href='Login.html' class='btn btn-primary'>Back to Login Page</a></p>";
                echo "<p><a href='Main.html' class='btn btn-primary'>Back to Main Page</a></p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
