<?php
session_start();


// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

require_once "koneksi.php";
$value_tnn = mysqli_query($koneksi, $sql); // cara ambil data dr sql
$nomor = 1;
$products = mysqli_fetch_all($value_tnn, MYSQLI_ASSOC); //merubah data sql jadi array

?>

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
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
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
                            <td><?=$nomor;?></td>
                            <td><?= strtolower($pecah['name']); ?></td>
                            <td><?= "Rp" . number_format($pecah['price'], 2)  . ",-"; ?></td>
                            <td><?= $jumlah ?></td>
                            <td><?= "Rp" .  number_format($pecah['price'] * $jumlah, 2) . ",-"; ?></td>
                        </tr>
                        <?php $nomor++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            
            <a href="product.php"><button>Saya masih ingin Belanja</button></a>
            <a href="checkout.php"><button>Ayo Bayar sekarang!</button></a>

        </div>
    </div>


    <footer>
        <?php //include "partials/footer.php"; ?>
    </footer>
    
</body>

</html>