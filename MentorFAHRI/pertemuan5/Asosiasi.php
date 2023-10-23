<?php


class Kendaraan {
    private $nama;

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}

class JenisKendaraan {
    private $kendaraan;
    private $jenis;

    public function __construct(Kendaraan $kendaraan, $jenis) {
        $this->kendaraan = $kendaraan;
        $this->jenis = $jenis;
    }

    public function getNamaKendaraan() {
        return $this->kendaraan->getNama();
    }
    public function getJenisKendaraan() {
        return $this->jenis;
    }
}

$kendaraan = new Kendaraan();
$kendaraan->setNama("Mobil");

$jenisKendaraan = new JenisKendaraan($kendaraan, "Kendaraan Darat");

echo "Nama kendaraan: " . $jenisKendaraan->getNamaKendaraan(); 
echo "Jenis kendaraan: " . $jenisKendaraan->getJenisKendaraan(); 