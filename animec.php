<?php
include("connect.php");
include("navbar.php");

$cat = ['Anime',];
$itemSize = ['S', 'M', 'L', 'XL', 'XXL'];
if (isset($_POST['add_to_cart'])) {
    // Retrieve item details from the form
    $item_id = $_POST['itemId'];
    $item_name = $_POST['itemName'];
    $item_price = $_POST['itemPrice'];

    // Insert the item into the cart table
   $check_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE itemId = '$item_id'");
    if (mysqli_num_rows($check_query) > 0) {
        // Item already exists, update the quantity
        $update_query = mysqli_query($conn, "UPDATE `cart` SET itemQuantity = itemQuantity + 1 WHERE itemId = '$item_id'");
        if ($update_query) {
            // Quantity updated successfully
            echo "Item quantity updated in the cart!";
        } else {
            // Error handling if the quantity couldn't be updated
            echo "Error updating item quantity: " . mysqli_error($conn);
        }
    } else {
        // Item doesn't exist, insert into the cart
        $insert_query = mysqli_query($conn, "INSERT INTO `cart` (itemId, itemName, itemPrice, itemQuantity) VALUES ('$item_id', '$item_name', '$item_price', 1)");

        if ($insert_query) {
            // Item added to cart successfully
            echo "Item added to cart!";
        } else {
            // Error handling if the item couldn't be added to the cart
            echo "Error adding item to cart: " . mysqli_error($conn);
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
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <title>Our Merchandise</title>
    <style>
        body {
            font-family: verdana;
            background-color: lightgoldenrodyellow;
            margin: 0;
            padding: 0;
            font-size: 15px;
        }

        h1 {
            font-size: 45px;
            font-family: arial;
            text-align: center;
            margin-top: 20px;
        }

         main {
        display: flex;
        justify-content: space-around; /* Updated to space around items */
        align-items: center;
        flex-wrap: wrap; /* Allow items to wrap to the next line */
    }

    .item {
        background-color: #fff;
        padding: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        width: calc(30.33% - 20px); /* Updated width for three items in a row */
        margin: 10px; /* Added margin for spacing between items */
        text-align: center; /* Center text within the item */
    }

    .item img {
        width: 100%; /* Adjusted width to fill the container */
        height: auto;
        max-height: 300px;
    }
        .item-container {
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto; /* Center the item container on the page */
            color:black;
            font-family: arial;
        }
        .rate {
            display: flex;
            color: gold;
            margin-bottom: 10px;
        }

        .rate i {
            margin-right: 5px;
        }
        .n {
            max-width: 1200px;
            margin: 0 auto;
            padding: 100px;
            display: flex;
        }

        .title {
            color: white;
            padding: 0px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 20px;
        }

        .product-menu {
            flex: 1;
        }

        .product-menu ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .product-menu ul li a {
            text-decoration: none;
            color: #333;
            transition: color 0.1s;
        }

        .product-menu ul li a:active {
            color: #418bbd;
        }
          .product-menu ul li.active a, .product-menu ul li a:hover {
            color: #418bbd;
        }

        .product-menu ul li:hover > ul {
            display: block;
        }


    </style>
</head>

<body>
    <div class="n">
        <div class="title">
            <b><p style="background-color: maroon; padding: 10px 20px;">MERCHANDISE</p></b>
            <b><p style="background-color: maroon; padding: 10px 20px;"> <a href="animec.php" style="text-decoration: none; color: white;">ANIME</p></b>
            
    <!-- Move the form opening tag here -->
<form method="post" action="">
    <?php
    foreach ($cat as $category) {
        $sql = "SELECT * FROM items WHERE cat = '$category'";
        $result = $conn->query($sql);

        echo '<main>';
        echo '<div class="item-container">';
        while ($row = mysqli_fetch_assoc($result)) {
    ?>

            <div class="item">
                <img class="item-image" src="<?php echo $row["itemImage"]; ?>" alt="<?php echo $row["itemName"]; ?>">
                <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p class="itemName"><?php echo $row["itemName"]; ?></p>
                <p class="itemPrice"><b>RM<?php echo $row["itemPrice"]; ?></b></p>

                <!-- Add to Cart button inside the form -->
                <button type="submit" name="add_to_cart">Add to Cart</button>
                <!-- Hidden input fields to store item details -->
                <input type="hidden" name="itemId" value="<?php echo $row['itemId']; ?>">
                <input type="hidden" name="itemName" value="<?php echo $row['itemName']; ?>">
                <input type="hidden" name="itemPrice" value="<?php echo $row['itemPrice']; ?>">
            </div>
        <?php
        }
        echo '</div>';
        echo '</main>';
    }
    ?>
</form> <!-- Close the form tag here -->

</div>
</body>
</a>
</p>
<script>
    // Your existing script code here
</script>
</div>
</html>
