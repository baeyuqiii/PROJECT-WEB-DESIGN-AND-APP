<?php
include("navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Admin</title>
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
        <h1>Delete Admin Page</h1>
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
            // Check if product_id is set and not empty
            if (isset($_POST['username']) && !empty($_POST['username'])) {
                // Sanitize input to prevent SQL injection
                $username = $conn->real_escape_string($_POST['username']);

                // SQL query to delete a record
                $sql = "DELETE FROM admin WHERE username = '$username'";

                if ($conn->query($sql) === TRUE) {
                    // Check if any rows were affected by the DELETE operation
                    if ($conn->affected_rows > 0) {
                        echo '<div class="pop-up">Record deleted successfully</div>';
                    } else {
                        echo "No record found with the provided username.";
                    }
                } else {
                    echo "Error deleting record: " . $conn->error;
                }
            } else {
                echo "Invalid username. Please provide a valid username.";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="#">Delete Admin :</label>
            <input type="text" name="username" id="username" autocomplete="off"placeholder="Admin Username" required>
            <input type="submit" value="Delete">
        </form>
    </div>
</section>
</body>
</html>
