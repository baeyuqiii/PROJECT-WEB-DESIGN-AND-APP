<?php
include("navbar.php");
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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if (empty($name) || empty($message)) {
        echo "<p class='error'>Name and message are required.</p>";
    } else {
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p style='color: maroon;' class='success'>Thank you for your message, $name!</p>";
            // You can add additional processing here if needed
        } else {
            echo "<p class='error'>Error inserting message. Please try again later.</p>";
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
<html>
<head>
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgoldenrodyellow;
            color: white;
            margin: 0;
            padding: 0;
        }

        .contact-container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .contact-info, .contact-form {
            width: 45%;
            padding: 20px;
            background-color: maroon;
        }

        h2 {
            font-size: 24px;
            color: whitesmoke;
        }

        form {
            margin-top: 10px;
        }

        label, input, textarea {
            display: block;
            margin-bottom: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: ghostwhite;
            color: maroon;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <header>
       <p style="text-align:center;color: maroon;font-size: 30px;"><b> Contact Us</b></p>
    </header>
    <div class="contact-container">
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p><strong>Address:</strong> 123 Jln Kemana, Selangor, Korea</p>
            <p><strong>Phone:</strong> +60 18 3929 483</p>
            <p><strong>Email:</strong> leeya@gmail.com</p>
        </div>
        <div class="contact-form">
            <h2>Contact Form</h2>
            <form method="post" action="contact.php">
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Message :</label>
                <textarea id="message" name="message" required></textarea>
                
                <button type="submit"><b>Submit</b></button>
            </form>
        </div>
    </div>
</body>
</html>
