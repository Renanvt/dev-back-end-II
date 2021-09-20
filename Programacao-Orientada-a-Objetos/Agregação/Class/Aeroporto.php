<?php

namespace Aeroporto;

class Aeroporto
{
    private $identificacao;
    private $nome;
    private $voo;

    public function __construct()
    {
        $this->identificacao = "";
        $this->nome = "";
        $this->voo = array();
    }

    public function setAeroporto($identificacao, $nome)
    {
        $this->identificacao = $identificacao;
        $this->nome = $nome;
    }
}
