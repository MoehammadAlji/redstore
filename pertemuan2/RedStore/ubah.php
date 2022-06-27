<?php
include "koneksi.php";


$ambil = $koneksi->query("SELECT * FROM products where id_product = '$_GET[id]'");
$pecah = $ambil->fetch_assoc(); //untuk memecah data yang didapat untuk dijadikan Array



?>
<pre>
    <?php
    // var_dump($pecah);
    ?>
</pre>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2 class="title">Update Product</h2>
    <div class="container-form-box-update">
        <div class="input-group-update">
            <div class="insert-product">
                <form method="post" enctype="multipart/form-data">
                    <div class="border">
                        <div>
                            <label>Product Name: </label>
                            <input type="text" name="name" value="<?= $pecah['name']; ?>">
                        </div><br>
                        <div>
                            <label>Product Price : </label>
                            <input type="number" name="price" value="<?= $pecah['price']; ?>">
                        </div><br>
                        <div>
                            <label>Product brand : </label>
                            <input type="text" name="brand" value="<?= $pecah['brand']; ?>">
                        </div><br>
                    </div>
                    <div>
                        <label>Product Photo: </label> <br> <br>
                        <img src="img/<?= $pecah['image'] ?>" width="200px">
                    </div><br>

                    <div>
                        <label>Change Photo: </label> <br> <br>
                        <input class="photo" type="file" name="photo">
                    </div><br>


                    <div><br>
                        <label>Product description: </label>
                        <textarea name="description" cols="30" rows="10" value="<?= $pecah['description']; ?>"> </textarea>
                    </div><br>

                    <button class="btn-update-product" name="ubah">Ubah</button>
                    <!-- <input class="btn-add-product" type="button" name="save" value="save"> -->

                </form> <br>
            </div>
        </div>
    </div>
</body>

</html>

<?php if (isset($_POST['ubah'])) : ?>
    <?php
    $photo = "img/" . $_FILES['photo']['name'];
    $lokasi = $_FILES['photo']['tmp_name'];
    //kalau mau ngubah foto
    if (!empty($lokasi)) {
        move_uploaded_file($lokasi, "img/$photo");
        $koneksi->query("UPDATE products SET image = '$photo', name = '$_POST[name]', price = '$_POST[price]', brand = '$_POST[brand]', description = '$_POST[description]' WHERE id_product = '$_GET[id]'");
        // var_dump($coba);
    }

    $koneksi->query("UPDATE products SET name = '$_POST[name]', price = '$_POST[price]', brand = '$_POST[brand]', description = '$_POST[description]' WHERE id_product = '$_GET[id]'");



    header("location: product.php");

    ?>

<?php endif ?>

<!-- <?php
        // echo "<script>location='index.php'</script>";
        ?> -->