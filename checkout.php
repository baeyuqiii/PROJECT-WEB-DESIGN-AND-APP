<?php

include 'connect.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pinCode, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pinCode','$total_product','$itemPrice_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pinCode."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
  
   <title>checkout</title>
 <style>
      /* Container styling */
      body {
         background-color: maroon;
         color: black;
         font-family: Arial, sans-serif;
         text-align: center;
      }

      .container {
         background-color: lightgoldenrodyellow;
         border: 2px solid black;
         padding: 20px;
         max-width: 500px;
         margin: 0 auto;
      }

      /* Form styling */
      .checkout-form {
         background-color: white;
         border: 1px solid black;
         padding: 20px;
         padding:2rem;
         border-radius: .5rem;
      }
      .checkout-form form .flex{
      display: flex;
      flex-wrap: wrap;
      gap:1.5rem;
      }

      .checkout-form form .flex .inputBox{
       flex:1 1 40rem;
      }
   
      .checkout-form form .flex .inputBox span{
      font-size: 14px;
      color:var(--black);
      text-align: left;
      }
      .heading {
         color: maroon;
      }

      .inputBox {
         margin-bottom: 10px;
      }

      input[type="text"],
      input[type="number"],
      input[type="email"],
      select {
         width: 100%;
         padding: 10px;
         border: 1px solid maroon;
         border-radius: 5px;
      }

      select {
         background-color: lightgoldenrodyellow;
      }

      .btn {
         background-color: maroon;
         color: lightgoldenrodyellow;
         padding: 10px 20px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .btn:hover {
         background-color: black;
      }

      /* Additional styling for the vertical cart list */
.display-order {
   background-color: lightgoldenrodyellow;
   border: 1px solid black;
   padding: 10px;
   text-align: left; /* Align text to the left for vertical display */
}

.display-order p {
   margin: 0; /* Remove default margin for <p> elements */
}

.grand-total {
   font-weight: bold;
   color: maroon;
}

   </style>
   

</head>
<body>

<?php ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete Your Order</h1>

   <form action="" method="post">

   <div class="display-order">
   <?php
   $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
   $total = 0;
   $grand_total = 0;
   if (mysqli_num_rows($select_cart) > 0) {
      while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
         $total_price = number_format($fetch_cart['itemPrice'] * $fetch_cart['itemQuantity']);
         $grand_total = $total += $total_price;
   ?>
         <p><?= $fetch_cart['itemName']; ?>(<?= $fetch_cart['itemQuantity']; ?>)</p>
   <?php
      }
   } else {
      echo "<div class='display-order'><p>your cart is empty!</p></div>";
   }
   ?>
   <p class="grand-total">Total : RM<?= $grand_total; ?>.00</p>
</div>

      <br><br>
      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
         <span>your phone number</span>
         <input type="text" placeholder="+60 - enter your phone number" name="phone" required>
         </div>


         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash On Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">Paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Cheras" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. Kuala Lumpur" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. Malaysia" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 56000" name="pinCode" required>
         </div>
      </div><br><br>
      <input type="submit" value="Order Now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
    $(document).ready(function () {
        // Function to validate the phone number format
        function validatePhoneNumber() {
            const phoneNumberInput = $("input[name='phone']");
            const phoneNumber = phoneNumberInput.val();

            if (!phoneNumber.startsWith("+60")) {
                alert("Phone number must start with '+60'.");
                phoneNumberInput.val('');
            }
        }

        // Call the function when the form is submitted
        $("form").submit(function (event) {
            validatePhoneNumber();
        });
    });
</script>




   
</body>
</html>