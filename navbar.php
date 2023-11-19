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
                <a href="loginUser.html"><i class="fa fa-user"></i> Logout</a>
            </div>
        </nav>
    </header>
</body>
</html>
