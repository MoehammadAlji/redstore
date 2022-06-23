<?php 
$host = "localhost";
$username = "root";
$password = "ABC123abc,";
$db = "jualansepatu";


$koneksi = mysqli_connect($server, $username, $password);
if ($koneksi) {
    $select_db = mysqli_select_db($koneksi, $db); 
}else {
    die;
    echo "tidak bisa terhubung";
}


?>

