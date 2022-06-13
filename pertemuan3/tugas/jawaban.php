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
        $this->harga = $d;
        $this->kembalian = $e; //ini properti
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
            return "anda telah membeli laptop {$this->namalaptop} {$this->tipe} sebanyak $beliberapa item seharga " .
                "Rp" . number_format($this->harga, 2) . ",-" . " dengan total " . "Rp" . number_format($this->harga * $beliberapa, 2) . ",-" .
                " dan membayar dengan uang sebesar " . "Rp" . number_format($duit, 2) . ",-" . "<br><br> kembalian anda adalah: " . "Rp" . number_format($this->kembalian, 2) . ",-" .
                " dan sekarang stocknya {$this->sisabarang}";
        }
    }
}




$laptop1  = new Laptop("Asus", "A455L", 0, 8000000, null); // ini object
$laptop2  = new Laptop("Asus", "A509FA", 10, 5000000, null); //ini object
$laptop3  = new Laptop("Asus", "M409DA", 32, 8680000, null);
$laptop4  = new Laptop("Asus", "VivoBook 15 A516JAO-FHD321", 6, 5450000, null);
$laptop5  = new Laptop("Asus", "VivoBook A405U", 912432, 5000000, null);
$laptop6  = new Laptop("Asus", "A455L", 15, 8000000, null);
echo $laptop3->beliLaptop(100000000, 3);
