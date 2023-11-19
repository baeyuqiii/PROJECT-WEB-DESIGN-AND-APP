<?php
include ("navbar.php");
$servername = "localhost"; // Host name
$username = "root"; // MySQL username
$password = ""; // MySQL password
$dbName = "dreamyuniverse"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed." . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $feedback = $_POST["feedback"];
    $rating = $_POST['rating'];

    if (empty($username) || empty($feedback)) {
        echo "<p class='error'>Username and feedback are required.</p>";
    } else {
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO feedbackuser (username, feedback, rating) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $username, $feedback, $rating); // Change "sss" to "ssi"

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p class='success'>Thank you for your feedback, $username!</p>";
            // You can add additional processing here if needed
        } else {
            echo "<p class='error'>Error inserting feedback. Please try again later.</p>";
        }

        // Close statement
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: maroon;
            color: maroon;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 24px;
            color: maroon;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        textarea {
            width: 100%;
            height: 100px;
            resize: vertical;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: maroon;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: darkred;
        }

    </style>
</head>
<body>

<div class="container">
        <h2>User Feedback Form</h2>
        <form action="process_feedback.php" method="post">
            
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required>

            <label for="rating">Rating :</label>
            <select name="rating" id="rating" required>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
            
            <label for="feedback">Feedback :</label>
            <textarea name="feedback" id="feedback" required></textarea>
            
            <input type="submit" value="Submit Feedback">
        </form>
    </div>

</body>
</html>