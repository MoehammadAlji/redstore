<?php
session_start();

$id_customer = $_GET['id'];

// if (isset($_SESSION['keranjang'][$id_product])) {
//     $_SESSION['keranjang'][$id_product] -= 1;

// } elseif (isset($_SESSION['keranjang'][$id_product]) == 1) {

//     unset($_SESSION["keranjang"][$id_product]);
// }

unset($_SESSION["list-user"][$id_customer]);



header("Location: list-user.php");
