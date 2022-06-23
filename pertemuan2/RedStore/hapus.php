<?php
include "koneksi.php";


$ambil = $koneksi->query("SELECT * FROM products where id_product = '$_GET[id]'");
$pecah = $ambil->fetch_assoc(); //untuk memecah data yang didapat untuk dijadikan Array

$fotoproduk = $pecah['image'];

// print_r($fotoproduk);
// die;

if (file_exists("fotoproduk/$fotoproduk")) {
    unlink("fotoproduk/$fotoproduk");
}

$koneksi->query("DELETE FROM products where id_product = '$_GET[id]'");
header("location: product.php");

?>