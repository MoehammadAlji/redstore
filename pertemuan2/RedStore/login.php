<?php
require "koneksi.php";
session_start();

// var_dump($akun['customer']);

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
                <input type="text" class="input-field" placeholder="User Id" required>
                <input type="email" class="input-field" placeholder="Email Id" required>
                <input type="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"> <span>I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn">Registern</button>
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
    //kalau ada tombol simpan (maksudnya tombol simpan ditekan)
    if (isset($_POST["login"])) {
        //melakukan kueri apakah akun(email sama password)-nya sama kayak di db
        $email = $_POST["email"];
        $password = $_POST["password"];
        $ambil = $koneksi->query("SELECT * FROM customers WHERE email_customer='$email' AND password_customer='$password'");

        //ngitung akun yang sama (maksudnya apakah ada akun yang email dan password-nya sama dengan yang di DB)

        $akunyangcocok = $ambil->num_rows;

        //jika seandainya ada akun yang sama, bakal di-loginkan
        if ($akunyangcocok == 1) {
            //ayuk login sini sama om :>>>

            //mendapatkan akun dlm bentuk array
            $akun = $ambil->fetch_assoc();
            $_SESSION['customer'] = $akun;
            // echo $_SESSION['customer'];

            // echo "<script>alert('Selamat, anda berhasil Login'); </script>";
            echo "<script>location='index.php'</script>";

            // header("Location: checkout.php");
        } else {
            echo "<script>alert('Ciee, yang password atau email-nya salah'); </script>";
            echo "<script>location='login.php'</script>";
        }
    }

    ?>

</body>

</html>