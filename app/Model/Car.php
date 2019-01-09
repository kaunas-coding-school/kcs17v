<?php

namespace KCS\Model;

Class Car
{
    public $spalva;
    public $greitis;
    private $rida;

    public function __construct()
    {
        $this->spalva = 'Nera';
        $this->greitis = '0km\h'; // 0km\h10 -> 010
        $this->rida = 0;
    }

    public function vaziuoti()
    {
        echo "Automobilis važiuoja " . $this->greitis . " greičiu <br>";
        $this->rida += (int) $this->greitis;
    }

    public function gautiSpalva()
    {
        return $this->spalva;
    }

    public function gautiRida()
    {
        return $this->rida;
    }


}
