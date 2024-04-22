<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #cc2323;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        h2 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 30px;
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

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>List of Feedbacks</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Feedback ID</th>
                    <th>Customer Name</th>
                    <th>Feedback</th>
                    <th>Submitted Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php
            require_once("config.php");

            $sql = "SELECT * FROM Feedback";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                        <td>$row[Feedback_ID]</td>
                        <td>$row[Customer_Name]</td>
                        <td>$row[Feedback]</td>
                        <td>$row[Created_at]</td>
                        <td>
                            <a class='btn btn-danger btn-sm btn-delete' href='Feedback_Delete.php?id=$row[Feedback_ID]'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 results</td></tr>";
            }

            mysqli_close($conn);
            ?>
            </tbody>
        </table>

        <a class="btn btn-primary btn-back" href="Main_Admin.html" role="button">Back to Main Page</a>
    </div>
</body>
</html>
