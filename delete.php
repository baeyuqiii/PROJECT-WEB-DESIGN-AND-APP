<?php
include("connect.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>
    <link rel="stylesheet" href="product.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: lightgoldenrodyellow;
            margin: 0;
            padding: 0;
        }
        .page-header {
            background-color: maroon;
            color: white;
            text-align: center;
            padding: 10px;
        }
        #upload_container {
    text-align: center;
    margin: 20px auto;
    max-width: 400px;
    padding: 20px; 
    border: 2px solid #ccc;
    background-color: #f9f9f9;
}
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 400px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: maroon;
            color: white;
            width: 50%;
            height: 50px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: maroon;
        }
        .pop-up {
            border: 1px solid green;
            padding: 10px;
            margin-top: 10px;
            background-color: lightgreen;
        }
        .messages {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header class="page-header">
        <h1>Delete Item Page</h1>
    </header>
<section id="upload_container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dreamyuniverse";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if item id is set and not empty
            if (isset($_POST['itemId']) && !empty($_POST['itemId'])) {
                // Sanitize input to prevent SQL injection
                $itemId = $conn->real_escape_string($_POST['itemId']);

                // SQL query to delete a record
                $sql = "DELETE FROM items WHERE itemId = '$itemId'";

                if ($conn->query($sql) === TRUE) {
                    // Check if any rows were affected by the DELETE operation
                    if ($conn->affected_rows > 0) {
                        echo '<div class="pop-up">Record deleted successfully</div>';
                    } else {
                        echo "No record found with the provided Item ID.";
                    }
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            } else {
                echo "Invalid Item ID. Please provide a valid Item ID.";

            }
        }

        // Close the database connection
        $conn->close();
        ?>
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="itemId">Delete Item :</label>
             <input type="text" name="itemId" id="itemId" autocomplete="off"placeholder="Item ID" required>
            <input type="submit" value="Delete">
        </form>
        
    </div>
</section>
</body>
</html>
