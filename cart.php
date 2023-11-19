<?php
include("connect.php");
include("navbar.php");

if(isset($_POST['update_itemQuantity'])){
   $update_value = $_POST['update_itemQuantity'];
   $update_itemId = $_POST['update_itemQuantity_itemId'];
   $update_itemQuantity_query = mysqli_query($conn, "UPDATE `cart` SET itemQuantity = '$update_value' WHERE itemId = '$update_itemId'");
   if($update_itemQuantity_query){
      header('location:cart.php');
   }
}

if(isset($_GET['remove'])){
   $remove_itemId = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE itemId = '$remove_itemId'");
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

$select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>
  <style>
      body {
         font-family: Arial, sans-serif;
         background-color: maroon;
         color: black;
         text-align: center;
      }
      .container {
         max-width: 1200px;
         margin: 0 auto;
         padding: 20px;
      }
      .shopping-cart {
         background-color: lightgoldenrodyellow;
         border-radius: 5px;
         padding: 20px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .heading {
         font-size: 24px;
         margin-bottom: 20px;
      }
      table {
         width: 100%;
         border-collapse: collapse;
      }
      th, td {
         border: 1px solid #ccc;
         padding: 10px;
         text-align: center;
      }
      th {
         background-color: #f2f2f2;
      }
      img {
         max-width: 100px;
         height: auto;
      }
      .delete-btn {
         color: red;
         text-decoration: none;
      }
      .option-btn {
         background-color: #007bff;
         color: #fff;
         padding: 5px 10px;
         text-decoration: none;
         border-radius: 5px;
         display: inline-block;
      }
      .checkout-btn {
         text-align: right;
         margin-top: 20px;
      }
      .disabled {
         background-color: gray;
         pointer-events: none;
      }
      .btn {
      background-color: lightgoldenrodyellow; 
      border: none; /* Remove borders */
      color: red;
      font-size: 20px;
      cursor: pointer;
   }
/* Add this style to your existing CSS */
input[name="update_itemQuantity"] {
   width: 25px;
   text-align: center; /* Adjust the width as needed */
}

   </style>
</head>
<body>
<br><br>
<div class="container">

<section class="shopping-cart">
   <h1 class="heading">Shopping Cart</h1>
   <table>
      <thead>
         <th>Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total Price</th>
         <th>Action</th>
      </thead>
      <tbody>
         <?php 
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>
         <tr>
            <td><?php echo $fetch_cart['itemName']; ?></td>
            <td>RM<?php echo is_numeric($fetch_cart['itemPrice']) ? number_format($fetch_cart['itemPrice']) : 'N/A'; ?>.00</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_itemQuantity_itemId" value="<?php echo $fetch_cart['itemId']; ?>">
                  <input type="number" name="update_itemQuantity" min="1" value="<?php echo $fetch_cart['itemQuantity']; ?>">
               </form>
            </td>
            <td>RM<?php echo is_numeric($fetch_cart['itemPrice']) && is_numeric($fetch_cart['itemQuantity']) ? number_format($fetch_cart['itemPrice'] * $fetch_cart['itemQuantity']) : 'N/A'; ?>.00</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['itemId']; ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Remove</a></td>
         </tr>
         <?php
           if (is_numeric($fetch_cart['itemPrice']) && is_numeric($fetch_cart['itemQuantity'])) {
               $grand_total += $fetch_cart['itemPrice'] * $fetch_cart['itemQuantity'];
           }
            }
         }
         ?>
         <tr class="table-bottom">
            <td><a href="home.txt.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
            <td colspan="2">Grand Total</td>
            <td>RM<?php echo number_format($grand_total); ?>.00</td>
            <td><form action="cart.php" method="get">
                  <button type="submit" class="btn" name="delete_all"><i class="fa fa-trash"></i></button>
               </form>
         </tr>
      </tbody>
   </table>
   <div class="checkout-btn">
   <form action="checkout.php" method="post">
      <button type="submit" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><a href="checkout.php">Checkout</button>
   </form>
</div>

</section>

</div>
   
<script src="js/script.js"></script>

</body>
</html>
