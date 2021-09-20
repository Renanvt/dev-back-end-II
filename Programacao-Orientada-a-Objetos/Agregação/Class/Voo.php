<?php

namespace Voo;

use Aeroporto\Aeroporto;
use Aviao\Aviao;

class Voo
{
    private $aeroportoOrigem;
    private $aeroportoDestino;
    private $dataHoraSaida;
    private $dataHoraChegada;
    private $passagens;
    private $aviao;

    public function __construct()
    {
        $this->aeroportoOrigem = "";
        $this->aeroportoDestino = "";
        $this->dataHoraSaida = "";
        $this->dataHoraChegada = "";
        $this->passagens = "";
        $this->passagens = array();
    }

    public function setaeroportoOrigem(
        Aeroporto $aeroportoOrigem,
        Aeroporto $aeroportoDestino,
        $dataHoraSaida,
        $dataHoraChegada,
        Aviao $aviao
    ) {
        $this->aeroportoOrigem = $aeroportoOrigem;
        $this->aeroportoDestino = $aeroportoDestino;
        $this->dataHoraSaida = $dataHoraSaida;
        $this->dataHoraChegada = $dataHoraChegada;
        $this->aviao = $aviao;
        $aeroportoDestino->voo = $this;
        $aeroportoOrigem->voo = $this;
        $aviao->voo[] = $this;
    }
}
