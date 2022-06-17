<?php 

session_start();
$id_product = $_GET['id'];

// kalau product sudah ada 
if (isset($_SESSION['keranjang'][$id_product])) {   
    $_SESSION['keranjang'][$id_product] += 1;
}

// $keranjang[$id_product] = 1;
else {
    $_SESSION['keranjang'][$id_product] = 1;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script> alert('Produl telah ditambahkan kedalam keranjang')</script>";
echo "<script> location='keranjang.php'</script>";



?>