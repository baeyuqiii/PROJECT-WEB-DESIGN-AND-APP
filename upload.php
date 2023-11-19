<?php
include("connect.php");
include("navbar.php");

if (isset($_POST["submit"])) {
    $itemId = $_POST["itemId"];
    $itemName = $_POST["itemName"];
    $itemSize = $_POST["itemSize"];
    $itemPrice = $_POST["itemPrice"];
    $itemQuantity = $_POST["itemQuantity"];
    $cat = $_POST["category"];

    // For uploads photos
    $upload_dir = "images/";
    $itemImage = $upload_dir . $_FILES["imageUpload"]["name"];
    $upload_file = $upload_dir . basename($_FILES["imageUpload"]["name"]);
    $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
    $check = $_FILES["imageUpload"]["size"];
    $upload_ok = 1; // Initialize to 1

    if (file_exists($upload_file)) {
        echo "<script>alert('The file already exists')</script>";
        $upload_ok = 0; // Set to 0 to indicate an issue
    } else {
        if ($check === 0) {
            echo '<script>alert("The photo size is 0 or the file is empty. Please select a valid photo.")</script>';
            $upload_ok = 0;
        } else {
            if (!in_array($imageType, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                echo '<script>alert("Please change the image format to jpg, jpeg, png, gif, or webp.")</script>';
                $upload_ok = 0;
            }
        }
    }

    if ($upload_ok === 1) { // Check for a successful check
        if ($itemName !== "" && $itemPrice !== "") {
            move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $upload_file);

            $sql = "INSERT INTO items (itemId, itemName, itemSize, itemPrice, itemQuantity, itemImage, cat) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssdss", $itemId, $itemName, $itemSize, $itemPrice, $itemQuantity, $itemImage, $cat);


            if ($stmt->execute()) {
                echo "<script>alert('Your product was uploaded successfully')</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "')</script>";
            }

            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgoldenrodyellow;
            margin: 0;
            padding: 0;
        }
        .page {
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

select {
    width: 100px;
    height: 30px;
   
    background-color: #f9f9f9;
}

input[type="text"],
input[type="number"],
input[type="file"],
button,
option {
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
.dropdownmenu a {
    background: maroon;
    color: white;
    display: block;
    font-weight: bold;
    font-size: 20px;
    text-align: center;
    text-decoration: none;
    padding: 30px 40px;
    transition: all 0.25s ease;
}
option[type="submit"] {
    background-color: maroon;
    color: white;
    width: 50%;
    height: 50px;

}
.dropdownmenu a {
    background: maroon;
    color: white;
    display: block;
    font-weight: bold;
    font-size: 20px;
    text-align: center;
    text-decoration: none;
    padding: 30px 40px;
    transition: all 0.25s ease;
}

.dropdownmenu li:hover a {
    background: white;
    color: maroon;
}
    </style>
</head>
    <header class="page">
        <h1>Add Item Page</h1>
    </header>
<body>
    <section id="upload_container">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="itemId" id="itemId" placeholder="Item ID" required>
            <input type="text" name="itemName" id="itemName" placeholder="Item Name" required>
            <input type="text" name="itemSize" id="itemSize" placeholder="Item Size" required>
            <input type="number" name="itemPrice" id="itemPrice" placeholder="Item Price" required>
            <input type="text" name="itemQuantity" id="itemQuantity" placeholder="Item Quantity" required>
            
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <select name="category" id="cat"required>
                    <option value="Kpop">Kpop</option>
                    <option value="Anime">Anime</option>

            </select><br><br>
            <input type="submit" value="Add Item" name="submit">
        </form>
    </section>

    <script>
        var itemId = document.getElementById("itemId");
        var itemName = document.getElementById("itemName");
        var itemSize = document.getElementById("itemSize");
        var itemPrice = document.getElementById("itemPrice");
        var itemQuantity = document.getElementById("itemQuantity");
        var cat = document.getElementById("cat");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload() {
            uploadImage.click();
        }

        uploadImage.addEventListener("change", function () {
            var file = this.files[0];
            if (productname.value === "") {
                productname.value = file.name;
            }
            choose.innerHTML = "You can change (" + file.name + ") picture";
        });
    </script>
</body>
</html>
