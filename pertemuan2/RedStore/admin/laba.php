<?php


include "../koneksi.php";
session_start();
ini_set('display_errors', 1);



$totalbarangs = $koneksi->query("SELECT SUM(quantity) AS stok FROM products");
$totalbarang = $totalbarangs->fetch_assoc();

// $beliproducts = $koneksi->query("SELECT SUM(price) AS ori_price FROM products");
// $beliproduct = $beliproducts->fetch_assoc();

// $juals = $koneksi->query("SELECT SUM(buy_price) AS my_price FROM products");
// $jual = $juals->fetch_assoc();

// $hargajual = $jual['my_price'];
// $hargabeli = $beliproduct['ori_price'];

/* menghitung omset untuk sebulan (maksudnya harga barang yang dibeli dikali berapa barang yang dibeli)*/
$omsetperbulans = $koneksi->query("SELECT SUM(products.price * product_purchasings.jumlah) AS totalomset FROM products INNER JOIN product_purchasings ON products.id_product = product_purchasings.id_product INNER JOIN purchasings ON product_purchasings.id_purchasing = purchasings.id_purchasing WHERE MONTH(purchasings.purchase_date) = MONTH(CURRENT_DATE()) AND purchasings.status_purchasing = 'paid'");
$omsetperbulan = $omsetperbulans->fetch_assoc();
$omset_perbulan = $omsetperbulan['totalomset'];


/* menghitung jumlah modal sebulan (maksudnya harga beli barang yang dijual dikali berapa barang yang dibeli) */
$modalperbulans = $koneksi->query("SELECT SUM(products.buy_price * product_purchasings.jumlah) AS totalmodal FROM `products` INNER JOIN product_purchasings ON product_purchasings.id_product = products.id_product INNER JOIN purchasings ON product_purchasings.id_purchasing = purchasings.id_purchasing WHERE purchasings.status_purchasing = 'paid' AND MONTH(purchasings.purchase_date) = MONTH(CURRENT_DATE())");
$modalperbulan = $modalperbulans->fetch_assoc();
$modal_perbulan = $modalperbulan['totalmodal'];

// $labaperbulans = $koneksi->query("SELECT SUM(total) AS total FROM products")

$jumlahbelis = $koneksi->query("SELECT SUM(jumlah) AS jumlah FROM product_purchasings WHERE MONTH(purchase_date) = MONTH(CURRENT_DATE())");
$jumlahbeli = $jumlahbelis->fetch_assoc();
$jumlah_beli = $jumlahbeli['jumlah'];



// if(!$perbulans) {
//     echo "{$koneksi->error}";
// }

// var_dump($perbulan);
// die;

$laba = $omset_perbulan - $modal_perbulan;

?>
<link rel="stylesheet" href="../style.css">


<table class="table-list" border="2">
    <tr>
        <th> Bulan</th>
        <th>
            total produk
        </th>
        <th>omset</th>
        <!-- <th>Product yang dibeli</th> -->
        <th>Laba</th>
    </tr>
    <tr>
        <td>
            <?= date("F") ?>
        </td>
        <td>
            <?= number_format($totalbarang['stok']); ?>
        </td>

        <td>
            <?= number_format($omset_perbulan); ?>
        </td>

        <td>
            <?= number_format($laba); ?>
        </td>
    </tr>
</table>

<div class="konten">
    <div class="container">
        <a href="../index.php"><button>Ayo Kembali</button></a>
    </div>
</div>
