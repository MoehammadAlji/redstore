<?php
session_start();

$id_product = $_GET['id'];

unset($_SESSION["keranjang"][$id_product]);

 header("Location: keranjang.php");
?>