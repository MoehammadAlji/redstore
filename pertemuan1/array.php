<?php

// $students = ["fadlan","rizky","subhan"];

// $numbers = [1,2,3,4,5,6,7,"satu","dua", 1.5];
/*
1. Buat list bilangan ganjil 1 - 10.000 didalam array
2. buat profil diri sendiri ()
    -Data: nama, Nickname, Hobi, Nama ayah.
3.buat susunan Data sendiri dari web apa yg ingin dibuat
    -cth Rental mobil
        -Merek, brand, seat, harga, status

*/

//NOMOR 1.

//     $arr = [];
//     $index =  count($arr); //2


// for ($i=0; $i < 10000; $i++) { 
//     if ($i % 2 == 1) {
//         $arr[$index] = $i;
//         $index++;

//     }
// }

// print_r($arr);




//    NOMOR 1 DONE.




//NOMOR 2.

// $datadiri = [
//     "Nama"     => "Muhammad Rizky A.N",
//     "Nickname" => "@AljiDzabit",
//     "Hobi"     => ["Membaca","Bersepeda"],
//     "Nama_Ayah"=> "Syamsul Maarif"
// ];

// print_r($datadiri);



?>

 <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ol>
            <li>
                Nama      : <?= $datadiri['Nama'] ?> <br>
                Nickname  : <?= $datadiri['Nickname'] ?> <br>
                Hobi      : 
                    <?php foreach ($datadiri['Hobi'] as $hobi) : ?>
                        <?= $hobi ?>,
                    <?php endforeach ?> <br>
                Nama ayah : <?= $datadiri['Nama_Ayah'] ?> <br><br><br>
            </li>
    </ol>
</body>
</html>  -->



<?php

//NOMOR 3
$jualansepatu = [
    [
        "namasepatu"     => "SEPATU RUN FALCON 2.0",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","kain"],
        "hargasepatu"    => 850000,
        "cocokuntuk"     => ["berlari", "Jogging"]
    ],
    [
        "namasepatu"     => "SEPATU LITE RACER ADAPT 4.0",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","kain"],
        "hargasepatu"    => 1200000,
        "cocokuntuk"     => ["berlari", "Jogging"]
    ],
    [
        "namasepatu"     => "SEPATU 4DFWD X PARLEY",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","kain"],
        "hargasepatu"    => 4000000,
        "cocokuntuk"     => ["berlari", "Jogging"]
    ],
    [
        "namasepatu"     => "SEPATU ULTRABOOST 22 HEAT.RDY SHOES",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","kain"],
        "hargasepatu"    => 3300000,
        "cocokuntuk"     => ["berlari", "Jogging"]
    ],
    [
        "namasepatu"     => "SEPATU TERREX VOYAGER SLIP-ON",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","kain"],
        "hargasepatu"    => 1300000,
        "cocokuntuk"     => ["berlari", "berjalan di tempat becek"]
    ],
    [
        "namasepatu"     => "SEPATU PREDATOR EDGE.3 INDOOR",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","plastik"],
        "hargasepatu"    => 1300000,
        "cocokuntuk"     => ["berlari", "bermain sepak bola"]
    ],
    [
        "namasepatu"     => "SEPATU TRAE YOUNG 1",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","kain"],
        "hargasepatu"    => 1300000,
        "cocokuntuk"     => ["jalan-jalan", " bermain basket"]
    ],
    [
        "namasepatu"     => "SEPATU PRO MODEL 2G LOW",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","kain"],
        "hargasepatu"    => 1520000,
        "cocokuntuk"     => ["berlari", "Main basket"]
    ],
    [

        "namasepatu"     => "SANDAL SLIDES ADILETTE",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet",],
        "hargasepatu"    => 600000,
        "cocokuntuk"     => ["berjalan-jalan", "dipakai dirumah"]
    ],
    [
        "namasepatu"     => "SEPATU TENIS ADIZERO UBERSONIC 4",
        "mereksepatu"    => "Adidas",
        "bahansepatu"    => ["karet","kain"],
        "hargasepatu"    => 2200000,
        "cocokuntuk"     => ["bermain tenis", "bermain badminton"]
    ],
];


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
    <ul>
        <?php foreach ($jualansepatu as $product) : ?>
            <li>
                Nama : <?= $product['namasepatu'] ?> <br>
                Merek : <?= $product['mereksepatu'] ?> <br>
                Bahan : 
                    <?php foreach ($product['bahansepatu'] as $bahansepatu) : ?>
                        <?= $bahansepatu . ", ";?> 
                    <?php endforeach ?> <br>
                Harga sepatu : <?= $product['hargasepatu'] ?> <br>
                Cocok dipakai untuk :                    
                <?php foreach ($product['cocokuntuk'] as $cocokuntuk) : ?>
                        <?= $cocokuntuk . ", ";?> 
                <?php endforeach ?> <br><br>

            </li>
        <?php endforeach?>
    </ul>
</body>
</html>

<!-- NOMOR 3 DONE -->
