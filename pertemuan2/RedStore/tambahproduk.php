<?php
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="image-background">
        <div class="form-box-add">
            <div class="input-group-add">
                <div class="insert-product">
                    <form method="post" enctype="multipart/form-data">
                        <div class="border">
                            <div>
                                <label>Product Name: </label>
                                <input type="text" name="name">
                            </div><br>
                            <?php
                            // echo "<pre>";
                            // var_dump($_POST['name']);
                            // var_dump($_POST['price']);
                            // var_dump($_POST['brand']);
                            // var_dump($_POST['description']);
                            // echo "</pre>";
                            ?>
                            <div>
                                <label>Product Price : </label>
                                <input type="number" name="price">
                            </div><br>
                            <div>
                                <label>Buy Price : </label>
                                <input type="number" name="buy_price">
                            </div><br>
                            <div>
                                <label>Product stock : </label>
                                <input type="number" name="stock">
                            </div><br>
                            <div>
                                <label>Product brand : </label>
                                <input type="text" name="brand">
                            </div><br>
                        </div>

                        <div><br>
                            <label>Product description: </label>
                            <textarea name="description" cols="30" rows="7"></textarea>
                        </div><br>

                        <div>
                            <label>Product Photo: </label> <br> <br>
                            <input class="photo" type="file" name="photo">
                        </div><br>
                        <button class="btn-add-product" name="save">Save</button>
                        <!-- <input class="btn-add-product" type="button" name="save" value="save"> -->
                    </form> <br>
                </div>

            </div>
        </div>
    </div>

    <?php


    if (isset($_POST['save'])) {

        $photo = "img/" . $_FILES['photo']['name'];
        $lokasi = $_FILES['photo']['tmp_name'];
        move_uploaded_file($lokasi, "$photo");

        $koneksi->query("INSERT INTO products (image, name, price, buy_price, quantity, brand, description) VALUES ('$photo','$_POST[name]','$_POST[price]','$_POST[buy_price]','$_POST[stock]','$_POST[brand]','$_POST[description]')");

        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
    ?>

</body>

</html>