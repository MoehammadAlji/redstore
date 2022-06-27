<?php
session_start();
include "koneksi.php";
$nomor = 1;
include "partials/navbar.php";
// echo "<pre>";
// print_r($_SESSION["customer"]);
// echo "</pre>"; ?>

<!-- <?php if (empty($_SESSION["checkout"]) || !isset($_SESSION["checkout"])) : ?>
    <div class="error-page">
        <img src="img/error.png" alt="" srcset="">
        <h1>Wah, keranjangnya kok kosong? </h1>
        <p>yuk beli barang pilihanmu </p>
        <a class="error-button" href="product.php"><button>Ayo Mulai Belanja</button></a>

    </div>

<?php else : ?>
    <li><a href="checkout.php">Check out</a></li>
<?php endif ?> -->

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_customer = $_SESSION["customer"]["id_customer"];
    $name_customer = $_SESSION["customer"]["name_customer"];
    $id_shipping = $_POST["id_shipping"];
    $id_payment = $_POST["id_payment"];
    $purchase_date = date("Y-m-d, H:i:s");
    

    foreach ($_SESSION['keranjang'] as $id_product => $jumlah) {
        // menampilkan product yang di-ulangkan berdasarkan idproduct 

        $products = $koneksi->query("SELECT * from products WHERE id_product ='$id_product'");
        $product = $products->fetch_assoc();
    }
    $productname = strtolower($product['name']);


    // var_dump($_POST); echo "<br>";
    // var_dump($id_customer); echo "<br>";
    // var_dump($id_shipping); echo "<br>";
    // var_dump($totalBeli); echo "<br>";
    // var_dump($id_payment); echo "<br>";
    // die;


    $ambil = $koneksi->query(("SELECT * FROM shippings WHERE id_shipping='$id_shipping'"));
    $arrayshipping = $ambil->fetch_assoc();
    $cost = $arrayshipping['cost'];
    $city_name = $arrayshipping['city_name'];

    $totalBeli = $_POST["total_belanja"] + $cost;
    // $totalBeli = $_POST["total_belanja"] + $cost;

    // echo "hai";
    // die;

    // die;
    // $koneksi->query( "INSERT INTO purchasings(id_customer, id_shipping, purchase_date, total) VALUES ($id_customer, $arrayshipping, $purchase_date, $totalBeli) ");
    if ($koneksi->query("INSERT INTO purchasings(id_customer, id_shipping, total, id_payment) VALUES ($id_customer, $id_shipping, $totalBeli, $id_payment)") === TRUE) {
    } else {
        echo "Error: " . $koneksi->error;
    }

    //menyimpan id pembelian yang barusan terjadi
    $id_pembelian_barusan = $koneksi->insert_id;

    foreach ($_SESSION['keranjang'] as $id_product => $jumlah) {
        $koneksi->query("INSERT INTO product_purchasings (id_purchasing, id_product, product_name,  jumlah, purchase_date) VALUES ('$id_pembelian_barusan','$id_product','$productname','$jumlah','$purchase_date')");
        $koneksi->query("INSERT INTO history_purchasings (id_purchasing, id_product, product_name, id_customer, name_customer, id_shipping, purchase_date, city_name) VALUES ('$id_pembelian_barusan','$id_product','$productname','$id_customer','$name_customer','$id_shipping','$purchase_date','$city_name')");
    }

    // echo "haloo";
    // foreach ($_SESSION['keranjang'] as $id_product => $jumlah) {
    // }

    //mengkosongkan keranjang
    unset($_SESSION['keranjang']);

    //tampilan dialihkan ke halaman nota
    echo "<script>location='index.php'</script>";
    // header("location: index.php");


    $koneksi->close();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

                <input type="text" name="total_belanja" value="<?= $totalBelanja ?>" hidden> <!-- //post dari sini -->
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
                    <!-- <button class="checkout" name="Check Out">Check Out</button> -->
                </div>
                <div>
                    <select name="id_payment" class="id_payment">
                        <option value="">Pilih cara bayar</option>
                        <?php
                        $ambil = $koneksi->query("SELECT * from payment");
                        while ($bayar = $ambil->fetch_assoc()) : ?>
                            <option value="<?= $bayar['id_payment'] ?>"><?= $bayar['payment_name'] ?> </option>
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
    <?php


    ?>

    <pre>
    <?php
    // var_dump($_SESSION['keranjang']);
    echo "<pre>";
    // var_dump($_POST["id_shipping"]);
    // var_dump($id_customer);
    // var_dump($id_shipping);
    // var_dump($ambil);
    echo "</pre>";
    ?>
    </pre>
</body>

</html>