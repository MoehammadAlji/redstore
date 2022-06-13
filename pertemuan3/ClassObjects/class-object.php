<?php

ini_set('display_errors', 1);

class SantriQodr {

    public $nama;
    public $umur;
    public $alamat;
    public $nilai;
    protected $kebiasaan;

    // public function __construct($a, $b, $c)
    // {
    //     $this->nama = $a;
    //     $this->umur = $b;
    //     $this->alamat = $c;
    //     $this->nilai = 0;
    // }

    // public function __destruct()
    // {
    //     echo "{$this->nama} sudah selesai ";
    // }

    // public function perkenalanFadlan() {
    //     return "Hallo nama saya Fadlan";
    // }

    // public function perkenalanRizky() {
    //     return "Hallo nama saya Rizky";
    // }

    // public function perkenalanSubhan() {
    //     return "Hallo nama saya Subhan";
    // }

    // public function perkenalanSantri() {
    //     $perkenalan = "Nama lengkap saya {$this->nama}<br>{$this->informasiUmur()}";

    //     return $perkenalan;
    // }

    // public function informasiUmur() {
    //     return "Umur saya {$this->umur}";
    // }

    // public function setNilai($nilai) {
    //     $this->nilai = $nilai;
    // }

    // public function cekNilai() {
    //     return "Nilai {$this->nama} adalah {$this->nilai}";
    // }

}

// $fadlan = new SantriQodr("Fadlan Ar-Riza", 19, "Jakarta");
// $fadlan->nama = "Fadlan Ar-Riza";
// $fadlan->umur = 19;
// $fadlan->alamat = "Jakarta";


// $rizky = new SantriQodr("Rizky Irfan", 16, "Gresik");    
// // $rizky->nama = "Rizky Irfan";
// // $rizky->umur = 16;
// // $rizky->alamat = "Gresik";

$subhan = new SantriQodr("Subhan Burhan", 18, "Jambi");
$subhan->nama = "Subhan Burhan";
$subhan->umur = 18;
$subhan->alamat = "Jambi";

echo "<p>Umur subhan {$subhan->umur}</p>"; //umur subhan 18

// echo $fadlan->perkenalanFadlan();
// echo "<br>";
// echo $rizky->perkenalanRizky();
// echo "<br>";
// echo $subhan->perkenalanSubhan();

// echo $fadlan->perkenalanSantri();
// echo "<br>";
// echo $rizky->perkenalanSantri();

// $fadlan->setNilai(90);
// $rizky->setNilai(95);

// echo var_dump($fadlan);


// inheritance
// class SantriQodr {
//     public $nama;
//     public $umur;
//     public $alamat;

//     public function perkenalanSantri() {
//         $perkenalan = "Nama lengkap saya {$this->nama}<br>{$this->informasiUmur()}";

//         return $perkenalan;
//     }

//     public function informasiUmur() {
//         return "Umur saya {$this->umur}";
//     }

// }

// class Pengurus extends SantriQodr {
//     public $jabatan;

//     public function __construct($a, $b, $c, $d)
//     {
//         $this->nama = $a;
//         $this->umur = $b;
//         $this->alamat = $c;
//         $this->jabatan = $d;
//     }
// }

// class Anggota extends SantriQodr  {
//     public $aib;

//     public function __construct($a, $b, $c, $d)
//     {
//         $this->nama = $a;
//         $this->umur = $b;
//         $this->alamat = $c;
//         $this->aib = $d;
//     }


// }

// $rio = new Pengurus("Rio de Jainiro", 20, "Semarang", "Ketua");
// $fadlan = new Anggota("Fadlan Ar-Riza", 19, "Jakarta", ["tidur saat jam fokus", "Main game saat jam fokus"]);

// var_dump($fadlan);
// echo $rio->perkenalanSantri();
// echo "<br>";
// echo $fadlan->perkenalanSantri();
// var_dump($fadlan->aib[0]);
// foreach($fadlan->aib as $aib) {
//     echo "{$aib}<br>";
// }