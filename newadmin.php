<?php
    include("navbar.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Admin</title>
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
        border-radius: 5px;
    }
    label {
        display: block;
        margin-bottom: 10px;
    }
    input[type="text"],
    input[type="password"] {
        width: 100%;
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
        background-color: darkred;
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
        <h1>New Admin</h1>
    </header>
	<section id="upload_container">
<?php
include("connect.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs (you should add more validation as needed)
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
    } else {

        // Check if the username already exists
        $checkSql = "SELECT * FROM admin WHERE username = '$username'";
        $checkResult = $conn->query($checkSql);

        if ($checkResult->num_rows > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert new admin
            $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
            $result = $conn->query($sql);

            if ($result) {
                echo "Admin created successfully!";
            } else {
                echo "Error inserting admin: " . $conn->error;
            }
        }

        $checkResult->close();
    }

    $conn->close();
}
?>
		<form method="post" action="newadmin.php">
        <label for="username">Username:</label>
        <input type="text" name="username" placeholder="Username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Password" required><br>

        <input type="submit" value="New Admin">
		
    </form>
	</div>
</section>
</body>
</html>