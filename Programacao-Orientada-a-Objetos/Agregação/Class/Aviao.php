<?php

namespace Aviao;

class Aviao
{
    private $identificacao;
    private $modelo;
    private $companiaArea;
    private $voo;

    public function __construct()
    {
        $this->identificacao = "";
        $this->modelo = "";
        $this->companiaArea = "";
        $this->voo = array();
    }

    public function setAviao(
        $identificacao,
        $modelo,
        $companiaArea
    ) {
        $this->identificacao = $identificacao;
        $this->modelo = $modelo;
        $this->companiaArea = $companiaArea;
    }
}
