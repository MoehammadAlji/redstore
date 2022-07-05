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
            <h1 class="title" style="color: black;">Riwayat Pesanan</h1>
            <form method="post" class="data-pembeli">
                <table border="1" class="table">
                    <thead>
                        <tr>
                            <th id="bruh">No</th>
                            <th>Status</th>
                            <th>Customer Name</th>
                            <th>Purchase Date</th>
                            <th>Quantity</th>
                            <th>Subprice</th>
                            <th>action</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        foreach ($_SESSION['keranjang'] as $id_product => $jumlah) : ?>
                            <!-- menampilkan product yang di-ulangkan berdasarkan idproduct -->
                            <?php
                            $ambil = $koneksi->query("SELECT * from products INNER JOIN product_purchasings ON products.id_product = product_purchasings.id_product INNER JOIN purchasings ON purchasings.id_purchasing = product_purchasings.id_purchasing WHERE purchasings.status_purchasing = 'paid'");
                            $pecah = $ambil->fetch_assoc();
                            ?>
                            <!-- <pre>
                            <?= print_r($pecah) . "<br>" ?>
                        </pre> -->
                            <tr>
                                <td><?= $nomor; ?></td>
                                <td><?= strtolower($pecah['name']); ?></td>
                                <td><?= $_SESSION['customer']['name_customer'] ?></td>
                                <td></td>
                                <td><?= $jumlah ?></td>
                                <td><?= "Rp" .  number_format($pecah['price'] * $jumlah, 2) . ",-"; ?></td>
                                <td>
                                    <button class="checkout" name="Bayar">Bayar</button>
                                </td>
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
                            <th colspan="6">Total Belanja: </th>
                            <th><?= "Rp" .  number_format($totalBelanja, 2); ?></th>
                        </tr>
                    </tfoot>
                </table>

                <input type="text" name="total_belanja" value="<?= $totalBelanja ?>" hidden>
                <?=$_SESSION['customer']['name_customer'] ?> 
                <!-- <?= "<br> Nomor Telepon : " . $_SESSION['customer']['telepon_customer'] ?> -->


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