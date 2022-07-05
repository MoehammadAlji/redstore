<?php
include "../koneksi.php";
session_start();
// include "../partials/navbar.php";

// $productpurchasings = $koneksi->query("SELECT * FROM product_purchasings");
// $productpurchasing = $productpurchasings->fetch_assoc();

$totals = $koneksi->query("SELECT *  FROM purchasings INNER JOIN product_purchasings ON product_purchasings.id_purchasing = purchasings.id_purchasing");
$purchasings = $totals->fetch_assoc();


?>


        

<table border="2">
    <tr>
        <th>Nomor</th>
        <th>Waktu beli</th>
        <th>Nama Barang</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php $no = 1;

    // var_dump($totals);
    // die;

    foreach ($totals as $purchasing) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td> <?= $purchasing['purchase_date']  ?> </td>
            <td> <?= $purchasing['product_name']  ?> </td>
            <td> <?= $purchasing['total'] ?> </td>
            <td> <?= $purchasing['status_purchasing'] ?> </td>
            <td>adfasdfasdfsdafsf</td>

        </tr>
    <?php endforeach ?>

</table>