<?php

namespace Atua;

use Ator\Ator;
use Filme\Filme;

class Atua
{
    public $filme;
    public $ator;
    public $papel;

    public function __construct()
    {
        $this->filme = "";
        $this->ator = "";
        $this->papel = "";
    }
    //Recebemos os objetos $filme e $ator
    public function setAtua(Filme $filme, Ator $ator, $papel)
    {
        $this->papel = $papel;
        $this->ator = $ator;
        $this->filme = $filme;

        //Armazenaremos a referência do objeto da classe
        //Atua, que está no $this na classe Ator e Filme
        $ator->atua[]=$this;
        $filme->atua[]=$this;
    }
}