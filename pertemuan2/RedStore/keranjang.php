<?php
session_start();


// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

require_once "koneksi.php";
$value_tnn = mysqli_query($koneksi, $sql); // cara ambil data dr sql
$nomor = 1;
$products = mysqli_fetch_all($value_tnn, MYSQLI_ASSOC); //merubah data sql jadi array

if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) : ?>
    <?php include "partials/navbar.php"; ?>

    <div class="error-page">
        <img src="img/error.png" alt="" srcset="">
        <h1>Wah, keranjangnya kok kosong? </h1>
        <p>yuk beli barang pilihanmu </p>
        <a class="error-button" href="product.php"><button>Ayo Mulai Belanja</button></a>

    </div>


<?php else : ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php include "partials/navbar.php"; ?>

        <div class="konten">
            <div class="container">
                <h1 class="title">Keranjang Belanja</h1>
                <table border="1" class="table">
                    <thead>
                        <tr>
                            <th id="bruh">No</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subprice</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['keranjang'] as $id_product => $jumlah) : ?>
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
                                <td>
                                    <a href="hapuskeranjang.php?id=<?= $id_product ?>"><button>Hapus</button></a>
                                </td>
                            </tr>
                            <?php $nomor++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <a href="product.php"><button>Saya masih ingin Belanja</button></a>

                <?php if (isset($_SESSION["customer"])) : ?>
                    <a href="checzzkout.php"><button>Ayo Bayar sekarang!</button></a>

                    <!-- kalau belum login -->
                <?php else : ?>
                    <a href="login.php"><button>Ayo Bayar sekarang!</button></a>
                <?php endif ?>

            </div>
        </div>


        <footer>
            <?php //include "partials/footer.php"; 
            ?>
        </footer>

    </body>

    </html>
<?php endif ?>