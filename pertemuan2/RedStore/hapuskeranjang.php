<?php
session_start();

$id_product = $_GET['id'];

// if (isset($_SESSION['keranjang'][$id_product])) {
//     $_SESSION['keranjang'][$id_product] -= 1;

// } elseif (isset($_SESSION['keranjang'][$id_product]) == 1) {

//     unset($_SESSION["keranjang"][$id_product]);
// }

unset($_SESSION["keranjang"][$id_product]);



header("Location: keranjang.php");
