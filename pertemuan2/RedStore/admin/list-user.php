<?php
session_start();
include "../koneksi.php";



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

    <h1 class="title">List-Customer</h1>

    <table class="table-list" border="1">
        <thead>
            <tr style="color: black; height: 45px; font-family: Sora; font-weight: bold; text-align:center;">
                <td width="25%">Nama Lengkap</td>
                <td width="15%">Email</td>
                <td width="12%">WhatsApp</td>
                <td width="12%">action</td>

            </tr>
        </thead>
        <tbody class="data-customer">
            <?php
            $data = $koneksi->query(("SELECT * FROM customers"));
            $listcustomer = $data->fetch_assoc();
            // $name = $listcustomer['name_customer'];

            ?>



            <?php while ($list = mysqli_fetch_array($data)) : ?>
                <tr style="color: black; height: 55px; font-family: san serif;">
                    <th><?= $list['name_customer'] ?></th>
                    <th><?= $list['email_customer'] ?></th>
                    <th><?= $list['telepon_customer'] ?></th>
                    <th>
                        <div>
                            <a href="hapus-customer.php?id=<?php echo $list['id_customer'] ?>"><button>Hapus</button></a>
                            <a href="ubah-customer.php?id=<?php echo $list['id_customer'] ?>"><button>Ubah</button></a>
                        </div>
                    </th>
                </tr>
            <?php endwhile ?>

        </tbody>
    </table>
    <div class="konten">
        <div class="container">
            <a href="../index.php"><button>Ayo Kembali</button></a>
        </div>
    </div>

</body>

</html>