<?php
include("navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Item</title>
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
    padding: 20px;
    font-family: 'Arial', sans-serif;
}

#upload_container {
    text-align: center;
    margin: 20px auto;
    max-width: 400px;
    padding: 20px; 
    border: 2px solid #ccc;
    background-color: #f9f9f9;
}

input[type="text"],
input[type="number"],
input[type="file"],
button {
    display: block;
    width: 90%;
    margin: 15px 0; 
    padding: 15px;
    border: 1px solid #ccc;
}

button#choose {
    background-color: maroon;
    color: white;
    cursor: pointer;
    width:90%;
    height:;
}

button#choose:hover {
    background-color: darkred;
}

input[type="submit"] {
    background-color: maroon;
    color: white;
    width: 50%;
    height: 50px;
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
        <h1>Update Item Page</h1>
    </header>
    
    <div class="container">
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
            if (isset($_POST['itemId']) && !empty($_POST['itemId'])) {
                // Sanitize input to prevent SQL injection
                $itemId = $conn->real_escape_string($_POST['itemId']);

                // Check if product_name, itemSize, itemPrice, and itemQuantity are set and not empty
                if (
                    isset($_POST['itemName']) && !empty($_POST['itemName']) &&
                    isset($_POST['itemSize']) && !empty($_POST['itemSize']) &&
                    isset($_POST['itemPrice']) && !empty($_POST['itemPrice']) &&
                    isset($_POST['itemQuantity']) && !empty($_POST['itemQuantity'])
                ) {
                    $itemName = $conn->real_escape_string($_POST['itemName']);
                    $itemSize = $conn->real_escape_string($_POST['itemSize']);
                    $itemPrice = $conn->real_escape_string($_POST['itemPrice']);
                    $itemQuantity = $conn->real_escape_string($_POST['itemQuantity']);

                    // SQL query to update a record
                    $sql = "UPDATE items SET itemName = '$itemName', itemSize = '$itemSize', itemPrice = '$itemPrice', itemQuantity = '$itemQuantity' WHERE itemId = '$itemId'";

                    if ($conn->query($sql) === TRUE) {
                        // Check if any rows were affected by the UPDATE operation
                        if ($conn->affected_rows > 0) {
                            echo '<div class="pop-up">Record updated successfully</div>';
                        } else {
                            echo "No record found with the provided Item Id.";
                        }
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                } else {
                    echo "Invalid Item ID or Item Price. Please provide valid values.";
                }
            } else {
                echo "Item ID is missing or empty.";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
<section id="upload_container">
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

            <input type="text" name="itemId" id="itemId" placeholder="Item ID" required>
            <input type="text" name="itemName" id="itemName" placeholder="Item Name" required>
            <input type="text" name="itemSize" id="itemSize" placeholder="Item Size" required>
            <input type="number" name="itemPrice" id="itemPrice" placeholder="Item Price" required>
            <input type="text" name="itemQuantity" id="itemQuantity" placeholder="Item Quantity" required>
            <input type="file" name="imageUpload" id="imageUpload">
            <input type="submit" value="Update">
        </form>
</section>
    </div>
</body>
</html>
