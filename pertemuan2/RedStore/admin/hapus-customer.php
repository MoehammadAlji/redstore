<?php
include "../koneksi.php";
ini_set('display_errors', 1);



$ambil = $koneksi->query("SELECT * FROM customers where id_customer = '$_GET[id]'");
$pecah = $ambil->fetch_assoc(); //untuk memecah data yang didapat untuk dijadikan Array


// print_r($fotoproduk);
// die;

$koneksi->query("DELETE FROM customers where id_customer = '$_GET[id]'");
header("location: list-user.php");

?>