<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/regular.min.css" integrity="sha512-YoxvmIzlVlt4nYJ6QwBqDzFc+2aXL7yQwkAuscf2ZAg7daNQxlgQHV+LLRHnRXFWPHRvXhJuBBjQqHAqRFkcVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/solid.min.css" integrity="sha512-qzgHTQ60z8RJitD5a28/c47in6WlHGuyRvMusdnuWWBB6fZ0DWG/KyfchGSBlLVeqAz+1LzNq+gGZkCSHnSd3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <link rel="stylesheet" href="style.css">
    <div class="navbar">
        <div class="logo">
            <img src="images/logo.png" width="125px">
        </div>
        <nav>
            <ul id="MenuItems">
                <!-- kalau sudah login -->

                <li><a href="index.php">Home</a></li>
                <li><a href="product.php">Products</a></li>
                <!-- <li><a href="keranjang.php">Keranjang</a></li> -->

                <?php if (isset($_SESSION["admin"])) : ?>
                    <li><a href="admin/list-user.php">List Customer</a></li>
                <?php else : ?>
                    <li><a href="checkout.php">Check out</a></li>
                <?php endif ?>

                <?php // if (isset($_SESSION["customer"] || $_SESSION["admin"])) : 
                ?>
                <?php
                if (isset($_SESSION['customer']) || isset($_SESSION["admin"])) : ?>
                    <li><a href="logout.php">Log out</a></li>
                    <!-- kalau belum login -->
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif ?>


            </ul>
        </nav>
        <!-- <img src="images/cart.png" alt="" width="30px" height="30px"> -->
        <a href="keranjang.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>

        <!-- <img src="images/menu.png" alt="" class="menu-icon" onclick="menutoggle()"> -->


    </div>


</body>

</html>

<?php

require "koneksi.php";
// unset($_SESSION);


?>
<!-- JS menu -->

<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px"
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>