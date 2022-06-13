<?php

ini_set('display_errors', 1);
// indexed
// $students = array(['fadlan', 'rizki', 'subhan']);
$students = ['fadlan', 'rizki', 'subhan'];
$numbers = [1, 2, 3, 4, 5, 6, 7, 'satu', 'dua', 1.5];

// print_r($students);
// echo $students[3];
// echo count($numbers);

for($i = 0; $i < 5; $i++) {
    $numbers[] = $i * 2;
}
// foreach ($students as $student) {
//     echo $student;
// }
 
// cara menambahkan array
$students[] = "Rijal";
$students[] = "Boji";

// print_r($numbers);


// Array Assosiative
$student = ['nama' => 'Rijal', 'umur' => 22, 'status' => 'Singlr'];
$student['alamat'] = "Dlingo";

// foreach ($student as $index => $studtentItem) {
//     echo $index;
// }

// Array Multidimensi
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

    echo $students[2]['hobi'][1];
?>