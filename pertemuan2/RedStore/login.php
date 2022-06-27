<?php
require "koneksi.php";
session_start();

// var_dump($akun['customer']);


// if (!isset($_SESSION["admin"])) {
//     echo "<script>location='index.php'</script>";
// }else {=
//     echo "<script>location='index.php'</script>";

// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="hero">
        <?php // include "partials/navbar.php"; 
        ?>
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" id="login-button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Sign Up</button>
            </div>
            <form method="post" id="login" class="input-group">
                <input type="text" class="input-field" placeholder="User Id" name="email" required>
                <input type="password" class="input-field" placeholder="Enter Password" name="password" required>
                <input type="checkbox" class="check-box"> <span>Remember password</span>
                <button type="submit" class="submit-btn" name="login" value="login">Login</button>
            </form>

            <form method="post" id="register" class="input-group">
                <input type="text" class="input-field" name="username-register" name="Username" placeholder="User Id" required>
                <input type="number" class="input-field" name="phone-number-register" placeholder="Number Phone">
                <input type="email" class="input-field" name="email-register" placeholder="Email Id" required>
                <input type="password" class="input-field" name="password-register" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"> <span>I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn" name="register" value="register">Register</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "102px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>


    <?php
        // var_dump("meh");
        // die;
    //kalau ada tombol simpan (maksudnya tombol simpan ditekan)
    if (isset($_POST["login"])) {

        //melakukan kueri apakah akun(email sama password)-nya sama kayak di db
        $email = $_POST["email"];
        $password = $_POST["password"];
        $akuncustomer = $koneksi->query("SELECT * FROM customers WHERE email_customer='$email' AND password_customer='$password'");
        $akunadmin = $koneksi->query("SELECT * FROM admin WHERE username='$email' AND password='$password'");


        //ngitung akun yang sama (maksudnya apakah ada akun yang email dan password-nya sama dengan yang di DB)
        $akunyangcocok = $akuncustomer->num_rows;
        $akunadminyangcocok = $akunadmin->num_rows;


        //jika seandainya ada akun yang sama, bakal di-loginkan
        if ($akunyangcocok == 1) {
            //ayuk login sini sama om :>>>

            //mendapatkan akun dlm bentuk array
            $akun = $akuncustomer->fetch_assoc();
            $_SESSION['customer'] = $akun;



            // if (isset($_SESSION['admin'])) {
            //     // var_dump($_SESSION['admin']);
            // }


            // echo $_SESSION['customer'];

            // echo "<script>alert('Selamat, anda berhasil Login'); </script>";
            // echo "<script>location='index.php'</script>";

            if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
                echo "<script>alert('checkoutnya kosong, ayok pilih produk dulu ')</script>";
                echo "<script>location='index.php'</script>";
                header("location: index.php");
            } else {
                header("location: checkout.php");
            }

            // header("Location: checkout.php");
        }elseif ($akunadminyangcocok == 1) {
            $admin = $akunadmin->fetch_assoc();
            $_SESSION['admin'] = $admin;

            echo "<script>location='index.php'</script>";
            // header("location: admin/indexadmin.php");

        }
         else {
            echo "<script>alert('Ciee, yang password atau email-nya salah'); </script>";
            echo "<script>location='login.php'</script>";
        }



        // if ($akunadminyangcocok == 1) {
        //     $admin = $akunadmin->fetch_assoc();
        //     $_SESSION['admin'] = $admin;
        // } else {
        //     echo "<script>alert('Ciee, yang password atau email-nya salah'); </script>";
        //     echo "<script>location='login.php'</script>";
        // }
    } elseif (isset($_POST["register"])) {
        var_dump("meh");
        die;
        $register_username = $_POST['username-register'];
        $register_email = $_POST['email-register'];
        $register_password = $_POST['password-register'];
        $register_phone = $_POST['number-phone-register'];

        var_dump($register_username); 
        var_dump($register_email);
        var_dump($register_password);
        var_dump($register_phone);

        die;

        //memasukkan data registrasi
        //kalau customer mau memasukkan nomer telepon

        $koneksi->query("INSERT INTO customers(name_customer, email_customer, password_customer, telepon_customer) VALUES ('$register_username','$register_email','$register_password','$register_phone',)");

        echo "<script>alert ('oke, anda sudah terdaftar ke database kami..... Selamat datang di Website kami')</script>";
        // header("location: login.php");
        
        // echo "<meta http-equiv='refresh' content='1;url=index.php'>";    

    }
    ?>

</body>

</html>