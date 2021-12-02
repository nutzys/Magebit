<?php

include "include/autoloader.php";

if(isset($_POST["submit"]) && !empty($_POST["submit"])){
    $email = $_POST["email"];
    $emailObj = new emailcontrol();
    $emailObj->createEmail($email);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ac9e5166d0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <title>MageBit</title>
</head>
<body>
    <div id="base">
        <div id="logo" class="item">
            <img src="img/logo_pineapple.png">
        </div>
        <div id="about-link" class="item">
            <a href="#">About</a>
        </div>
        <div id="works-link" class="item">
            <a href="#">How it works</a>
        </div>
        <div id="contact-link" class="item">
            <a href="#">Contact</a>
        </div>
        <?php if(!isset($_POST["email"])){?>
        <div id="heading">
            <h1>Subscribe to newsletter</h1>
        </div>
        <div id="subheading">
            <p>Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>
        </div>
        <form method="POST" id="input-form">
            <input type="text" name="email" id="email" placeholder="Type your email address here...">
            <input type="submit" id="submit" name="submit">
            <small></small>
        </form>
            <input type="checkbox" name="checkbox" class="checkbox-box" id="checkbox"><span class="tos-text">I agree to <a href="#">terms of service</a></span>
        <div id="line">
            
        </div>
        <a href="#">
            <div id="facebook" class="logo-border">
                <img src="img/ic_facebook_white.png">
            </div>
        </a>
        <a href="#">
            <div id="instagram" class="logo-border">
                <img src="img/ic_instagram_white.png">
            </div>
        </div>
        </a>
        <a href="#">
            <div id="twitter" class="logo-border">
                <img src="img/ic_twitter_white.png">
            </div>
        </a>
        <a href="#">
            <div id="youtube" class="logo-border">
                <img src="img/ic_youtube_white.png">
            </div>
        </a>
    </div>
    <div id="image">
        <img src="img/image_summer.png">
    </div>
    <?php }else{?>
        <div id="success-page">
        <div id="success-icon">
            <img src="img/ic_success.png">
        </div>
        <div id="top-texts">
            Thanks for subscribing!
        </div>
        <div id="bottom-text">
            You have successfully subscribed to our email listing. Check your email for the discount code.
        </div>
        <div id="line-success">

        </div>
        <div id="icons">
            <div id="facebook">
                <img src="img/ic_facebook_white.png">
            </div>
            <div id="instagram">
                <img src="img/ic_instagram_white.png">
            </div>
            <div id="twitter">
                <img src="img/ic_twitter_white.png">
            </div>
            <div id="youtube">
                <img src="img/ic_youtube_white.png">
            </div>
        </div>
        <div id="image">
            <img src="img/image_summer.png">
        </div>
    </div>
    <?}?>
</body>
</html>