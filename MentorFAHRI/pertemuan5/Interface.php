<?php
interface AlatKomunikasi {
    public function penggunaan();
}

class AlatKomunikasiTradisional{
    protected $golongan, $keterangan;
    public function golonganAlKom()
    {
        $this->golongan="Tergolong alat tradisional";
    }
}
class AlatKomunikasiModern{
    protected $golongan, $keterangan;
    public function golonganAlKom()
    {
        $this->golongan= "Tergolong alat modern";
    }
}

class HandPhone extends AlatKomunikasiModern  implements AlatKomunikasi {
    // private $golongan, $keterangan;
    public function penggunaan() {
        
        $this->golongan= "Tergolong alat modern";
        $this->keterangan= "Menggunakan handphone untuk berbicara dan mengirim pesan.\n";
    }
    public function getGolongan(){
        return $this->golongan;
    }
    public function getKeterangan(){
        return $this->keterangan;
    }
}

class BurungMerpati extends AlatKomunikasiTradisional implements AlatKomunikasi {
    // private $golongan, $keterangan;
    public function penggunaan() { 
        $this->golongan= "Tergolong alat Tradisional ";
        $this->keterangan= "Menggunakan burung merpati untuk mengirim pesan.\n";
    }
     public function getGolongan(){
        return $this->golongan;
    }
    public function getKeterangan(){
        return $this->keterangan;
    }
}

// Penggunaan antarmuka dalam contoh:
$hp = new HandPhone();
$burung = new BurungMerpati();

echo "Cara penggunaan handphone: ";
echo $hp->penggunaan();
echo "<br>";
echo $hp->getGolongan();
echo "<br>";
echo $hp->getKeterangan();
echo "<br>";
echo "<hr>";
echo "Cara penggunaan burung merpati: "; 
echo $burung->penggunaan();
echo "<br>";
echo $burung->getGolongan();
echo "<br>";    
echo $burung->getKeterangan();
