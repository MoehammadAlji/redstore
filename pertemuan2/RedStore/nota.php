<?php 

include "koneksi.php";
include "partials/navbar.php";




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota</title>
</head>
<body>
<div class="konten">
        <div class="container">
            <h1 class="title" style="color: black;">Check Out</h1>
            <form method="post" class="data-pembeli">
                <table border="1" class="table">
                    <thead>
                        <tr>
                            <th id="bruh">No</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subprice</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($_SESSION['keranjang'] as $id_product => $jumlah) : ?>
                            <!-- menampilkan product yang di-ulangkan berdasarkan idproduct -->
                            <?php
                            $ambil = $koneksi->query("SELECT * from products WHERE id_product ='$id_product'");
                            $pecah = $ambil->fetch_assoc();
                            ?>
                            <!-- <pre>
                            <?= print_r($pecah) . "<br>" ?>
                        </pre> -->
                            <tr>
                                <td><?= $nomor; ?></td>
                                <td><?= strtolower($pecah['name']); ?></td>
                                <td><?= "Rp" . number_format($pecah['price'], 2)  . ",-"; ?></td>
                                <td><?= $jumlah ?></td>
                                <td><?= "Rp" .  number_format($pecah['price'] * $jumlah, 2) . ",-"; ?></td>
                                <!-- <td>
                                <a href="hapuskeranjang.php?id=<?= $id_product ?>"><button>Hapus</button></a>
                            </td> -->
                            </tr>
                            <?php $nomor++ ?>
                            <?php $totalBelanja += $pecah['price'] ?>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Total Belanja: </th>
                            <th><?= "Rp" .  number_format($totalBelanja, 2); ?></th>
                        </tr>
                    </tfoot>
                </table>

                <input type="text" name="total_belanja" value="<?= $totalBelanja ?>" hidden>
                <?= "Data Pembeli  : " ?>
                <?= $_SESSION['customer']['name_customer'] . "<br> Nomor Telepon : " . $_SESSION['customer']['telepon_customer'] ?>

                <div>
                    <select name="id_shipping">
                        <option value="">Pilih ongkos kirim</option>
                        <?php
                        $ambil = $koneksi->query("SELECT * from shippings");
                        while ($perongkir = $ambil->fetch_assoc()) : ?>
                            <option value="<?= $perongkir['id_shipping'] ?>"><?= $perongkir['city_name'] ?> (<?= "Rp " . number_format($perongkir['cost'], 2) . ",-" ?>)</option>
                        <?php endwhile; ?>
                    </select>
                    <button class="checkout" name="Check Out">Check Out</button>
                </div>
            </form>

            <?php

            ?>
            <!-- 
            <a href="product.php"><button>Saya masih ingin Belanja</button></a>
            <a href="checkout.php"><button>Ayo Bayar sekarang!</button></a>
             -->

        </div>
    </div>
</body>
</html>