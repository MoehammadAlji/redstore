<?php
include "../koneksi.php";

ini_set('display_errors', 1);


$customers = $koneksi->query("SELECT * FROM customers where id_customer = '$_GET[id]'");
$customer = $customers->fetch_assoc(); //untuk memecah data yang didapat untuk dijadikan Array



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h2 class="title">Update customer</h2>
    <div class="container-form-box-update-customer">
        <div class="input-group-update-customer">
            <div class="insert-product">
                <form method="post" enctype="multipart/form-data">
                    <div class="border">
                        <div class="input-update">
                            <label>Name: </label>
                            <input type="text" name="name" value="<?= $customer['name_customer']; ?>">
                        </div><br>

                        <div class="input-update">
                            <label>Email: </label>
                            <input type="email" name="email" value="<?= $customer['email_customer']; ?>">
                        </div><br>

                        <div class="input-update">
                            <label>No WhatsApp: </label>
                            <input type="text" name="phone" value="<?= $customer['telepon_customer']; ?>">
                        </div><br>
                    </div>

                    <button class="btn-update-product" name="ubah">Ubah</button>

                </form> <br>
            </div>
        </div>
    </div>
</body>

</html>

<!-- <table border="1">
    <thead>
        <tr>
            <td>adfadsfa</td>
            <td>adfjkahfja</td>
            <td>dkjafhdsaflkh</td>
        </tr>
    </thead>
</table> -->

<?php if (isset($_POST['ubah'])) : ?>
    <?php

    $cek = $koneksi->query("UPDATE customers
     SET name_customer = '$_POST[name]', email_customer = '$_POST[email]', telepon_customer = '$_POST[phone]'
     WHERE id_customer = '$_GET[id]'");
    header("location: list-user.php");

    ?>

<?php endif ?>

<!-- <?php
        // echo "<script>location='index.php'</script>";
        ?> -->