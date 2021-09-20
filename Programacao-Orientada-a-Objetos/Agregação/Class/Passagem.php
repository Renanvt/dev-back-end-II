<?php

namespace Passagem;

use Passageiro\Passageiro;
use Voo\Voo;

class Passagem
{
    private $voo;
    private $passageiro;
    private $poltrona;

    public function __construct()
    {
        $this->voo = "";
        $this->passageiro = "";
        $this->poltrona = "";
    }

    public function setPassagem(
        Voo $voo,
        Passageiro $passageiro,
        $poltrona
    ) {
        $this->voo = $voo;
        $this->passageiro = $passageiro;
        $this->poltrona = $poltrona;
        $voo->passagens[] = $this;
        $passageiro->passagens[] = $this;
    }
}
