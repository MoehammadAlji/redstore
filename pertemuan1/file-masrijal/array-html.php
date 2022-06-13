<?php

$students = [
    [
        "nama" => "Rijal",
        'umur' => 22,
        'hobi' => ['Ngoding', 'Main Basket']
    ], 
    [
        "nama" => "Fadlan",
        'umur' => 25,
        'hobi' => ['Ngaji', 'Makan']
    ], 
    [
        "nama" => "Rizki",
        'umur' => 24,
        'hobi' => ['Membantu ', 'Membaca']
    ], 
    [
        "nama" => 'Subhan',
        'umur' => 23,
        'hobi' => ['Joging', 'Futsal']
    ]
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
        <?php foreach ($students as $student) : ?>
            <li>
                Nama : <?= $student['nama'] ?> <br>
                Umur : <?= $student['umur'] ?> <br>
                Hobi : 
                    <?php foreach ($student['hobi'] as $hobi) : ?>
                        <?= $hobi ?>,
                    <?php endforeach ?>
            </li>
        <?php endforeach?>
    </ul>
</body>
</html>