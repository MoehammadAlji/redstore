<?php
require_once "koneksi.php";

$sql = "SELECT * from products";

$value_tnn = mysqli_query($koneksi, $sql); // cara ambil data dr sql
$products = mysqli_fetch_all($value_tnn, MYSQLI_ASSOC); //merubah data sql jadi array

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rizky 'SHOE'P</title>
    <link rel="stylesheet" href="style.css?version=3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css" integrity="sha512-OivR4OdSsE1onDm/i3J3Hpsm5GmOVvr9r49K3jJ0dnsxVzZgaOJ5MfxEAxCyGrzWozL9uJGKz6un3A7L+redIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/regular.min.css" integrity="sha512-YoxvmIzlVlt4nYJ6QwBqDzFc+2aXL7yQwkAuscf2ZAg7daNQxlgQHV+LLRHnRXFWPHRvXhJuBBjQqHAqRFkcVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/solid.min.css" integrity="sha512-qzgHTQ60z8RJitD5a28/c47in6WlHGuyRvMusdnuWWBB6fZ0DWG/KyfchGSBlLVeqAz+1LzNq+gGZkCSHnSd3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/svg-with-js.min.css" integrity="sha512-U7WyVKwgyoYSa+qowujpUQIH3omU6SlFFr8m6kiEuuM1lWqoiURgTNskMFEf1la4PDNQzMws/G1u0wKGNxVbcQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/v4-shims.min.css" integrity="sha512-8jeHv1CihM7sBeBfx3J7o0UVGMXc8wM20zSKVuAiQj5AmnYX36LpRZ8SpU5ec3Y4FgkUrJ5GqlAAWOzRDKFwfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/v5-font-face.min.css" integrity="sha512-wVffp1z2cYYhxt8nhif5UsMu415VRqX2CkMeWg5lYyrcpFBLfoMQ6ngVSJG8BumKBl83wf2bMRDwVmTgfoDovQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="header">
        <?php include 'partials/navbar.html' ?>
        <?php include 'partials/landing-page.html'; ?>
    </div>
    <!-- featured category -->
    <?php //include 'partials/featured-category.html'; 
    ?>
    <!-- featured products -->
    <h2 class="title">A few product from our store</h2>
    <!-- Items -->
    <section class="aaaa">
        <div class="list-product">
            <ul class="ini-ul">
                <?php foreach ($products as $product) : ?>
                    <?php if ($product['image'] == "img/slip on.jpeg") {
                        break;
                    } ?>
                    <li>
                        <div class="eee">
                            <img src="<?= $product['image'] ?>" class="gambar-li">
                        </div>
                        <div class="items">
                            <strong><?= $product['name'] ?></strong>
                            <hr>
                            <strong><?= $product['brand'] ?></strong>
                            <br> <br>
                            <div class="harga" style="margin-top:-20px !important;"> <?= "Rp" . number_format($product['price'], 2) ?> <br>
                            </div>
                        </div>
                        <div class="button">
                            <a href="beli.php"> <button type="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Langsung Beli</button></a>
                            <a href="keranjang.php"><button type="button"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Masukkan Keranjang</button></a>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </section>
    <!-- Testimonial -->
    <?php include 'partials/testimonial.html'; ?>
    <!-- Brands -->
    <?php include 'partials/brands.html'; ?>

    <?php include 'partials/footer.html'; ?>

</body>

</html>