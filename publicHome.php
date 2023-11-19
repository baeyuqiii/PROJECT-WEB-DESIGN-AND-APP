<?php
// navbar.php

// Ensure that output buffering is turned on
ob_start();

// Start the session
session_start();

// Your existing code for navbar goes here

// Flush the output buffer
ob_end_flush();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dreamy Universe</title>
    <style>
        body {
            background-color: lightgoldenrodyellow;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: maroon;
            color: whitesmoke;
            text-align: center;
            padding: 10px;
            font-size: 26px;
            font-family: arial;
            display: flex; 
            justify-content: space-between; /* Adjust alignment */
            align-items: center;
        }

        nav a {
            color: whitesmoke;
            text-decoration: none;
            margin: 10px;
            font-size: 26px;
            text-align: center;
            font-family: arial;
        }

        main {
            padding: 20px;
        }

        ul.menu {
            list-style: none;
            padding: 0;
            display: flex;
            align-items: center; /* Center the navigation links vertically */
        }

        ul.menu li {
            margin-right: 10px;
            position: relative;
            text-align: center;
            font-family: arial;
            font-weight:bold ;
        }

        ul.submenu {
            position: absolute;
    top: 100%;
    left: 0;
    visibility: hidden;
    opacity: 0;
    z-index: 1;
    width: 100%;
    display: flex;
    flex-direction: column;
    font-weight:bold ;

        }

        ul.menu li:hover ul.submenu {
           visibility: visible;
    opacity: 1;
    top: 100%;

            z-index: 1;
        }

        ul.menu li ul.submenu li {
            margin: 0;
            display: block;
            padding: 3px;
            width: 100%;
            border: 1px solid white;
            text-align: center;
            background-color: maroon;
        }

        ul.menu li ul.submenu li a {
            display: inline;
            padding: 5px 0;
            font-size: 20px;
        }

        ul.menu li ul.submenu li ul.sub-submenu {
            display: none;
            list-style: none;
            padding: 0px;
            position: absolute;
            top: 0;
            left: 100%;
            background-color: grey;
            width: 145px;
            font-weight:bold ;
        }

        ul.menu li ul.submenu li:hover ul.sub-submenu {
            display: block;
            margin-top: 10px;
            z-index: 1;
        }

        ul.menu li ul.submenu li ul.sub-submenu li {
            margin: 0;
            display: block;
            padding: 5px;
            width: 92%;
            border: 1px solid white;
            text-align: center;
            background-color: maroon;
        }

        ul.menu li ul.submenu li ul.sub-submenu li a {
            display: inline;
            padding: 5px 0;
            font-size: 20px;
            font-weight:bold ;
            background-color: maroon;
        }
        }

        .user {
            display: flex;
            align-items: center;
        }

        .user a {
            margin-left: 10px;
        }

        .header .flex .cart {
            margin-left: 2rem;
            font-size: 2rem;
            color: whitesmoke;
        }
        <style>
        footer {
            background-color: maroon;
            color: maroon;
            padding: 20px 0;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            background-color: maroon;
        }

        .footer-logo {
            flex: 1;
            padding: 10 40px;
        }

        .footer-logo img {
            width: 200px;
            height: 200px;
            text-align: right;
        }

        .footer-contact {
            flex: 1;
            padding: 0 20px;
        }

        .footer-contact h3 {
            font-size: 14px;
            margin-bottom: 20px;
            font-family: arial;
        }

        .contact-form {
            display: flex;
            flex-wrap: wrap;
        }

        .contact-form input[type="email"] {
            flex: 1;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #777;
            border-radius: 4px;
        }

        .contact-form button {
            background-color: lightgoldenrodyellow;
            color: maroon;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .footer-social {
            flex: 1;
            padding: 0 20px;
        }

        .footer-social h3 {
            font-size: 14px;
            margin-bottom: 20px;
            font-family: sans-serif;
        }
       .fa {
        padding: 20px;
        font-size: 30px;
        width: 30px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
        }

        .fa:hover {
        opacity: 0.7;
        }

        .fa-facebook {
        background: #3B5998;
        color: white;
        }

        .fa-twitter {
        background: #55ACEE;
        color: white;
        }
        .fa-youtube {
        background: #bb0000;
        color: white;
        }

        .fa-instagram {
        background: #125688;
        color: white;
        }
        .copyright {
            font-size: 14px;
            position: center;
            font-family: fantasy;
            font-weight: 100;

        }
         .slideshow-container {
            position: relative;
            max-width: 100%;
            margin: 0 auto;
            display: block;
        }

        .mySlides {
            display: none;
        }

        .mySlides img {
            width: 1000px;
            height: auto;
            display: block;
        }

        /* Navigation dots */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
            cursor: pointer;
        }

        .active-dot {
            background-color: #717171;
        }
        
        .addbutton
        {
            background-color: #FF1493;
            font-family:arial ;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border: 5px;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px auto;
            display: block;
        }
        .addbutton:hover
        {
            background-color: maroon;
            color:#FF1493;
            border:5px;
        }
        
         
        /* Style for the navigation dots */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
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

    </style>

    </style>
</head>
<body>
    <header class="header">
        <nav class="navigation">
            <img src="images/logo4.png" width="200" height="175" alt="Logo" style="align-items: center;">
            <ul class="menu">
                <li><a href="home.txt.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>

                <li>
                    <li><a href="display.php">Merchandise</a>
                    
                </li>
                <li>
                    Services
                    <span class="toggle-submenu">▿</span>
                    <ul class="submenu">
                        <li><a href="terms.php">Terms of Service</a></li>
                        <li><a href="process_feedback.php">Feedback</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <div class="user">
                <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
                <span class="spacer">|</span>
                <a href="register.php"><i class="fa fa-user"></i> Sign Up</a>
            </div>
        </nav>
    </header>
</body>
 <div class="slideshow-container">
        <!-- Slides -->
       <div class="mySlides">
    <video width="100%"; height="auto" controls>
        <source src="images/plave.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<div class="mySlides">
    <img src="images/openorder.png" style="width:100%">
</div>
<div class="mySlides">
    <img src="images/comingsoon.png" style="width:100%">
</div>
<div class="mySlides">
    <img src="images/sale.png" style="width:100%">
</div>


        <!-- Navigation dots -->
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>

        </div>
    </div>
     <h2 style="margin-left: 20px;font-family: arial;text-align: center;font-size:45px;">Crowd's Favourite</h2>
    <main class ="grid">
         <div class="item-container">
    <div class="item">
        <img src="images/hoodie3.webp" alt="items 1" class="item-image">
         <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
        <h2>KTH snow flower zip-up</h2>
        <p class="description" style="display: none;">
            A little sweetness to add to your wardrobe. Everything about this zip-up is cozy and soft (and very convenient). From the large hood to hide when you feel like it, the warmth of the fleece that makes you wanna snuggle inside of the zip-up, the cute little designs that remind you of our lovely tiger (or bear for team bear), this product is made for you.<br><br>
            ∙ UNISEX ⚤ product<br>
            ∙ Polaroid style design + sunflowers printed on the front<br>
            ∙ KTH + 1995 embroidered on the back<br>
            ∙ Snow Flower embroidered on the hood<br>
            ∙ Rainproof<br>
            ∙ Grey
        </p>
        <p>Price: RM 88.00</p>
        <button>Add to Cart</button>
    </div>


    <div class="item">
        <img src="images/hoodie5.webp" alt="items 3" class="item-image">
         <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
        <h2>Indigo hoodie</h2>
        <p class="description" style="display: none;">
            A must have for your winter wardrobe, our best seller INDIGO polar hoodie. As cool looking as cozy, you won't stop wearing it, believe us!!<br>
            Made with polar fleece to keep you warm this winter, this product is softer than your favorite duvets. The INDIGO polar hoodie is as oversized as the 'RM' print and comes alone or as a set with the sweatpants.<br>
            ∙ UNISEX ⚤ product<br>
            ∙ High waisted<br>
            ∙ Oversized<br>
            ∙ Adjustable hood with drawstrings<br>
            ∙ Printed<br>
            ∙ Blue<br>
        </p>
        <p>Price: RM 150.00</p>
        <button>Add to Cart</button>
    </div>

    <div class="item">
        <img src="images/jeans1.webp" alt="items 4" class="item-image">
         <p class="rate">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
        <h2>Agust d jeans</h2>
        <p class="description" style="display: none;">
            This Agust D jeans is the perfect tribute for our favorite rapper. It can compliment any outfit, you can wear it at any occasion and you'll always look amazing with these jeans on. You can effortlessly turn your basic outfit into a bomb one with those ;) Our signature pockets are obviously a must on this, so don't be surprise when your phone gets lost in there.<br>
            ∙ UNISEX ⚤ product<br>
            ∙ Mid/low waist jeans<br>
            ∙ Printed<br>
            ∙ Large back pockets<br>
        </p>
        <p>Price: RM 68.00</p>
        <button>Add to Cart</button>
    </div>
    </main>
     <script>
        const submenuToggles = document.querySelectorAll('.toggle-submenu');

        submenuToggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const submenu = this.nextElementSibling;
                submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
    const itemImages = document.querySelectorAll(".item-image");
    const descriptions = document.querySelectorAll(".description");

    itemImages.forEach((image, index) => {
        image.addEventListener("click", function () {
            descriptions[index].style.display = descriptions[index].style.display === "block" ? "none" : "block";
        });
    });

    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            dots[i].classList.remove("active-dot");
        }

        slideIndex++;

        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].classList.add("active-dot");

        var isVideo = slides[slideIndex - 1].querySelector('video'); // Check if the current slide contains a video

        // Set the timeout based on whether the current slide is a video or image
        var timeoutDuration = isVideo ? 73000 : 2000; // Adjust the duration as needed (60,000 milliseconds for 1 minute)

        setTimeout(showSlides, timeoutDuration);
    }

    // Add a function to change slides when clicking on the navigation dots
    var dots = document.getElementsByClassName("dot");
    for (var i = 0; i < dots.length; i++) {
        dots[i].addEventListener("click", function () {
            var dotIndex = Array.from(dots).indexOf(this);
            slideIndex = dotIndex + 1;
            showSlides();
        });
    }
});
    </script>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="images/logo4.png" alt="Logo">

            </div>
           <div class="footer-contact">
    <h3 style="text-align: center; color: white;">Sign up to stay up-to-date on all our latest arrivals!</h3>
    <div class="contact-form">
        <input type="email" placeholder="Enter your email">
        <button>Subscribe</button>
    </div>
</div>
<div class="footer-social">
    <h3 style="text-align: center; color: white;">Let's Connect</h3>
    <div class="social-icons">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>
</div>
</div>
<div class="copyright" style="text-align: center; color: white; background-color: maroon;">
    &copy; 2023 DreamyUniverse. All rights reserved.
</div>
</footer>

</body>
</html>
