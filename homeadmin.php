<?php
    include("navbar.php");
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Page</title></head>
    <?php
    include("connect.php");
    $username = "jungkook";
    ?>

    <div class="profile">
    <div class="profile-image">
        <img src="images/jk2.jpg" alt="Profile Image">
    </div>
    <div class="profile-info">
        <p class="profile-username"><strong><?php echo $username; ?></strong></p>
        <p class="profile-description">Administrator</p>
    </div>
</div>



    
    <div class="header2">
        <div class="content-wrapper">
            
            <div class="content">
                <p style="font-family: georgia; font-size: 53px; color: maroon; text-align: center;"><strong>Welcome To Admin Site</strong></p>
                <p style="font-family: georgia; font-size: 30px; color: maroon;">DreamyUniverse</p>
                <br>
                <br>
                
            </div>
        </div>
    </div>
</body>

</html>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: white;
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        margin: 0;
    }

    .header {
        background: maroon;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 30px 40px;
    }

     .profile {
    display: flex;
    align-items: center;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #f9f9f9;
}

.profile-image {
    margin-right: 20px;
}

.profile-image img {
    width: 140px;
    height: 130px;
    border-radius: 50%;
}

.profile-info {
    text-align: left;
}

.profile-username {
    font-size: 24px;
    color: maroon;
    margin-bottom: 5px;
}

.profile-description {
    font-size: 18px;
    color: #555;
}


    .header2 {
        display: flex;
        align-items: center;
        padding: 20px;
        justify-content: space-between;
    }

    .content-wrapper {
        display: flex;
        align-items: center;
    }

    .content {
        flex: 1;
    }

    .btn-wrapper {
        text-align: center;
        margin-top: 20px;
        flex: 1;
    }

    .btn {
        background-color: maroon;
        color: black;
        border-radius: 5px;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        font-family: "Times New Roman";
        font-size: 20px;
        cursor: pointer;
        display: block;
    }

    .btn:hover {
        color: lightgrey;
        border-color: lightgrey;
        transition: 0.1s;
    }

    .container {
        width: 1000px;
        margin: 0 auto;
        background: white;
        margin-left: 20px;
        padding: 40px;
        border: 3px solid black;
        border-radius: 10px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.6);
    }
</style>
