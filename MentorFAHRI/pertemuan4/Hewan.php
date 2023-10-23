<?php
class Hewan
{
    private $makanan,
        $nama,
        $suara,
        $jenis,
        $bergerakdengan,
        $bergerakmenggunakan,
        $jenismakanan;

    public function __construct($nama = "deafult", $makanan = "default", $suara = "default", $jenis = "default", $jenismakanan = "default")
    {
        $this->makanan = $makanan;
        $this->suara = $suara;
        $this->nama = $nama;
        $this->jenis = $jenis;
        $this->jenismakanan = $jenismakanan;
    }
    public function __destruct()
    {
        $this->getketeranganhewan();
    }


    public function setketerangan($bergerakdengan, $bergerakmenggunakan)
    {
        $this->bergerakdengan = $bergerakdengan;
        $this->bergerakmenggunakan = $bergerakmenggunakan;
    }

    public function getketerangan()
    {
        return 'Bergerak dengan cara: ' . $this->bergerakdengan . ', menggunakan: ' . $this->bergerakmenggunakan;
    }
    public function getketeranganhewan()
    {
        echo 'Hewan: ' . $this->nama . ', makanannya: ' . $this->makanan . ', suara: ' . $this->suara . ', jenis: ' . $this->jenis . ', jenis makanan: ' . $this->jenismakanan . '<br> ' . $this->getketerangan() . '<br><br>';
    }
}

class Burung extends hewan
{

    public function __construct($nama = "deafult", $makanan = "default", $suara = "default", $jenis = "default", $jenismakanan = "default")
    {
        parent::__construct($nama, $makanan, $suara, $jenis, $jenismakanan);

        $this->setketerangan('Terbang', 'Sayap');
    }
    public function setketerangan($bgrdgn, $bgrpk)
    {
        parent::setketerangan($bgrdgn, $bgrpk);
    }
}
class Mamalia extends hewan
{

    public function __construct($nama = "deafult", $makanan = "default", $suara = "default", $jenis = "default", $jenismakanan = "default")
    {
        parent::__construct($nama, $makanan, $suara, $jenis, $jenismakanan);

        $this->setketerangan('Berjalan', 'Kaki');
    }
    public function setketerangan($bgrdgn, $bgrpk)
    {
        parent::setketerangan($bgrdgn, $bgrpk);
    }
}
class Reptil extends hewan
{

    public function __construct($nama = "deafult", $makanan = "default", $suara = "default", $jenis = "default", $jenismakanan = "default")
    {
        parent::__construct($nama, $makanan, $suara, $jenis, $jenismakanan);

        $this->setketerangan('Melata', 'perut');
    }
    public function setketerangan($bgrdgn, $bgrpk)
    {
        parent::setketerangan($bgrdgn, $bgrpk);
    }
}
$h1 = new Burung('Bangau', 'ikan', 'wek wek', 'burung', 'karnivora');
$h2 = new Mamalia('Sapi', 'rumput', 'mooo', 'mamalia', 'herbivora');
$h2->setketerangan('j','k');
$h3 = new Reptil('Ular', 'tikus', 'ssst', 'reptil', 'omnivora');

// $Angsa->setketerangan;
// $Angsa->getketeranganhewan();    
