<?php 
class Laptop
{
    public $namalaptop;
    public $tipe;
    public $stock;
    public $harga;
    public $kembalian;
    public $sisabarang;

    public function __construct($a, $b, $c, $d, $e)
    {
        $this->namalaptop = $a; //ini semua properti
        $this->tipe = $b; //ini semua properti
        $this->stock = $c; //ini properti
        $this->kembalian = $d; //ini properti
        $this->sisabarang = $e; //meh
    }


    public function beliLaptop($duit, $beliberapa)
    {
        $this->sisabarang = $this->stock - $beliberapa;
        if ($this->stock == 0) {
            return "habis mas";
        } elseif ($this->stock < $beliberapa) {
            return "mas, stoknya kurang.... sekarang stocknya sisa {$this->stock}.... Gimana?";
        } else {
            $this->kembalian = $duit - $this->harga * $beliberapa;
            return "anda telah membeli laptop {$this->namalaptop} {$this->tipe} sebanyak {$beliberapa} item seharga " .
                "Rp" . number_format($this->harga, 2) . ",-" . " dengan total " . "Rp" . number_format($this->harga * $beliberapa, 2) . ",-" .
                " dan membayar dengan uang sebesar " . "Rp" . number_format($duit, 2) . ",-" . "<br><br> kembalian anda adalah: " . "Rp" . number_format($this->kembalian,2) . ",-" .
                " dan sekarang stocknya sisa {$this->sisabarang}";
        }
    }
}




$laptop1  = new Laptop("Asus", "A455L", 0, 8000000, null); // ini object
$laptop1->namalaptop = "Asus";
$laptop1->tipe       = "A455L";
$laptop1->stock      = 0;
$laptop1->harga      = 8000000;
$laptop1->sisabarang;

$laptop2  = new Laptop("Asus", "A509FA", 10, 5000000, null); //ini object
$laptop2->namalaptop = "Asus";
$laptop2->tipe       = "A509FA";
$laptop2->stock      = 1;
$laptop2->harga      = 5000000;
$laptop2->sisabarang;

$laptop3  = new Laptop("Asus", "M409DA", 32, 8680000, null);
$laptop3->namalaptop = "Asus";
$laptop3->tipe       = "M409DA";
$laptop3->stock      = 32;
$laptop3->harga      = 8680000;
$laptop3->sisabarang;

$laptop4  = new Laptop("Asus", "VivoBook 15 A516JAO-FHD321", 6, 5450000, null);
$laptop4->namalaptop = "Asus";
$laptop4->tipe       = "VivoBook 15 A516JAO-FHD321";
$laptop4->stock      = 6;
$laptop4->harga      = 5450000;
$laptop4->sisabarang;

$laptop5  = new Laptop("Asus", "VivoBook A405U", 912432, 5000000, null);
$laptop5->namalaptop = "Asus";
$laptop5->tipe       = "VivoBook A405U";
$laptop5->stock      = 912432;
$laptop5->harga      = 5000000;
$laptop5->sisabarang;

$laptop6  = new Laptop("Asus", "A455L", 15, 8000000, null);
$laptop6->namalaptop = "Asus";
$laptop6->tipe       = "A455L";
$laptop6->stock      = 10;
$laptop6->harga      = 8000000;
$laptop6->sisabarang;


echo $laptop1->beliLaptop(100000000, 2  );