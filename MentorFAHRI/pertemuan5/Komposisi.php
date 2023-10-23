<?php
class Roda
{
    public function bergerakberputar()
    {
        echo "Roda bergerakberputar <br>";
    }
}

class Rantai
{
    private $roda;

    public function __construct()
    {
        $this->roda = new Roda();
    }
    public function berputar()
    {
        
        echo "Rantai berputar <br>";
        $this->roda->bergerakberputar();
    }
}
class Pedal
{
    private $rantai;

    public function __construct()
    {
        $this->rantai = new Rantai();
    }
    public function tergerak()
    {
        echo "Pedal tergerak <br>";
        $this->rantai->berputar();
    }
}

class Sepeda
{
    private $pedal;

    public function __construct()
    {
        $this->pedal = new pedal();
    }

    public function kendarai()
    {
        $this->pedal->tergerak();
        echo "Sepeda bergerak\n";
    }
}

$sepeda = new Sepeda();
$sepeda->kendarai();
