<?php

include "koneksi.php";
include "partials/navbar.php";
session_start();



?>


<?php if (isset($_SESSION['customer'])) : ?>

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
                <form method="post" class="data-pembeli">
                    <table border="1" class="table">
                        <thead>
                            <tr>
                                <th id="bruh">No</th>
                                <th>Nama Barang</th>
                                <th>Purchase Date</th>
                                <th>Quantity</th>
                                <th>Subprice</th>
                                <th>Status Purchasing</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>



                            <!-- menampilkan product yang di-ulangkan berdasarkan idproduct -->
                            <?php
                            $datanota = $koneksi->query("SELECT * from products INNER JOIN product_purchasings ON products.id_product = product_purchasings.id_product INNER JOIN purchasings ON purchasings.id_purchasing = product_purchasings.id_purchasing INNER JOIN shippings ON shippings.id_shipping  = purchasings.id_shipping WHERE purchasings.status_purchasing = 'not_yet_paid'");
                            // $peccah = $datanota->fetch_assoc();
                            $nomor = 1;
                            ?>

                            <?php foreach ($datanota as $pecah) : ?>
                                <tr>
                                    <td><?= $nomor; ?></td>
                                    <td><?= strtolower($pecah['name']); ?></td>
                                    <td><?= $pecah['purchase_date'] ?></td>
                                    <td><?= $pecah['jumlah'] ?></td>
                                    <td><?= "Rp" .  number_format($pecah['price'] * $pecah['jumlah'] + $pecah['cost'], 2) . ",-"; ?></td>
                                    <td><?= $pecah['status_purchasing'] ?></td>
                                </tr>
                                <?php $nomor++ ?>
                                <?php $totalBelanja += $pecah['price'] + $pecah['cost'] ?>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total Belanja: </th>
                                <th><?= "Rp" .  number_format($totalBelanja, 2); ?></th>
                                <th>
                                    <button class="checkout" name="Bayar">Bayar</button>
                                </th>
                            </tr>
                        </tfoot>
                    </table>

                    <input type="text" name="total_belanja" value="<?= $totalBelanja ?>" hidden>
                    <!-- <?= $_SESSION['customer']['name_customer'] ?> -->
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

<?php else : ?>
    <h1 class="title" style="color: black;">Riwayat Pesanan</h1>
    <div class="error-page">
        <img src="img/error.png" alt="" srcset="">
        <h1>Wah, Masih kosong Kok Kesini? </h1>
        <p>yuk pesan dulu barang pilihanmu </p>
        <a class="error-button" href="product.php"><button>Ayo Mulai Belanja</button></a>

    </div>
<?php endif ?>