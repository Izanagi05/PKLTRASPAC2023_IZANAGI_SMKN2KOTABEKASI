<?php



class Mobil{
    private $nama, $mesin;
    public function __construct($nama){
        $this->nama=$nama;
    }
    public function Mesin(Mesin $mesin){
        $this->mesin=$mesin->getMesin();
    }
    public function getMobil(){;
        return $this->nama;
    }
    public function getMesinMobil(){;
        return $this->mesin;
    }


}

class Mesin{
    private $nama;
    public function __construct($nama){
        $this->nama=$nama;
    }
    public function getMesin(){;
        return $this->nama;
    }

}


$mobil1=new Mobil("Toyota");
$mesin1=new Mesin("Mesin turbo");
$mobil1->Mesin($mesin1);
echo "Mobil ". $mobil1->getMobil();
echo " dengan mesin ".$mobil1->getMesinMobil();