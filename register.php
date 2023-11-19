<?php
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
    $name = $_POST["name"];
    $password = $_POST["password"];

    if (empty($username) || empty($name) || empty($password)) {
        echo "<p class='error'>Username, name, and password are required.</p>";
    } else {
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO user (username, name, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $name, $password);

        // Execute the statement
       if ($stmt->execute()) {
    echo "<p style='color:white;' class='success'>Registration successful for user: $username</p>";
    // Redirect to login page after registration
            header("Location: loginUser.html");
            exit(); // Ensure that no further code is executed after redirection
        } else {
    echo "<p style='color:white;class='error'>Error in registration. Please try again later.</p>";
}

        // Close statement
        $stmt->close();
    }
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: verdana, sans-serif;
            background-color: maroon;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: maroon;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registration</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

             <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>