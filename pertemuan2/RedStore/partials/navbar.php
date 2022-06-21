<?php
session_start();
require "koneksi.php";
// unset($_SESSION);


?>
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
            <li><a href="checkout.php">Check out</a></li>

            <?php if (isset($_SESSION["customer"])) : ?>
                <li><a href="logout.php">Log out</a></li>

                <!-- kalau belum login -->
            <?php else : ?>
                <li><a href="login.php">Login</a></li>


            <?php endif ?>

        </ul>
    </nav>
    <!-- <img src="images/cart.png" alt="" width="30px" height="30px"> -->
    <a href="keranjang.php"><i class="fa fa-shopping-bag" aria-hidden="true" ></i></a>

    <!-- <img src="images/menu.png" alt="" class="menu-icon" onclick="menutoggle()"> -->


</div>

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
