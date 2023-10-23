<?php
class Pembuat{
 private $nama;
 public function __construct($nama) {
    $this->nama = $nama;
    // $this->nama = $nama;
}
    public function getNama(){
    return    $this->nama;
    }
}


class KendaraanDarat{ 
    private $pembuat;
    private $nama;
    public function __construct(Pembuat $pembuat, $nama) {
        $this->pembuat = $pembuat;
        $this->nama = $nama;
    } 

    public function getPembuatKendaraanDarat() {
        return $this->pembuat->getNama();
    }
    public function getKendaraanDarat() {
        return $this->nama;
    }
}

class Pabrik{
    private $totalkendaraan;
    public function addKendaraan(KendaraanDarat $kendaraan) {
        $this->totalkendaraan[] = $kendaraan;
    }
    
    public function getPabrik() {
        return $this->totalkendaraan;
    }
}


//pembuat
$pembuat1= new Pembuat("Karyawan pabrik 1"); 
$pembuat2= new Pembuat("Karyawan pabrik 2"); 
$pembuat3= new Pembuat("Karyawan pabrik 3"); 

//kendaraan
$kendaraandarat1= new KendaraanDarat($pembuat1, "Motor Biasa"); 
$kendaraandarat2= new KendaraanDarat($pembuat2, "Motor Balap"); 
$kendaraandarat3= new KendaraanDarat($pembuat3, "Motor Gwede"); 

$pabrik = new Pabrik();
$pabrik->addKendaraan($kendaraandarat1);
$pabrik->addKendaraan($kendaraandarat2);
$pabrik->addKendaraan($kendaraandarat3);

$Datakdrnpabrik = $pabrik->getPabrik();
foreach ($Datakdrnpabrik as $kdrn) {
    echo $kdrn->getKendaraanDarat() . " oleh " . $kdrn->getPembuatKendaraanDarat() . "\n";
    echo"<br>";
    
}
