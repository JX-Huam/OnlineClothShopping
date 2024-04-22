<!DOCTYPE html>
<html>
<head>
  <title>Customer Feedback</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #3218c5;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 40px;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      text-align: center;
    }

    h1 {
      margin-bottom: 30px;
      color: #333333;
    }

    form {
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      color: #333333;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #cccccc;
      border-radius: 5px;
      resize: vertical;
      font-family: Arial, sans-serif;
    }

    textarea {
      height: 120px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      padding: 12px 20px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .error-message {
      color: #ff0000;
      margin-top: 10px;
    }

    .success-message {
      color: #008000;
      margin-top: 10px;
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
    <h1>Customer Feedback</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Retrieve the form data
      $customerName = $_POST["customerName"];
      $feedback = $_POST["feedback"];
      $date = date("Y-m-d");

      // Validate and process the feedback data
      if (!empty($customerName) && !empty($feedback)) {
        // Save the feedback to a file or database
        // You can customize this part to suit your needs

        // Display a success message
        echo "<p class='success-message'>Thank you for your feedback!</p>";
      } else {
        // Display an error message if any fields are empty
        echo "<p class='error-message'>Please fill in all the fields.</p>";
      }
    }
    ?>

    <form method="POST" action="Feedback_Insert.php">
      <label for="customerName">Your Name</label>
      <input type="text" name="customerName" id="customerName" required>
      
      <label for="feedback">Feedback</label>
      <textarea name="feedback" id="feedback" rows="4" required></textarea>
      
      <input type="submit" value="Submit Feedback">
      <a class="btn btn-back" href="Shopping_List.php" role="button">Back to Shopping List</a>
    </form>
    
  </div>
</body>
</html>
