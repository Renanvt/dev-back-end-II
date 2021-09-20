<?php

use Aeroporto\Aeroporto;
use Aviao\Aviao;
use Passageiro\Passageiro;
use Passagem\Passagem;
use Voo\Voo;

require_once('Class/Aeroporto.php');
require_once('Class/Aviao.php');
require_once('Class/Passageiro.php');
require_once('Class/Passagem.php');
require_once('Class/Voo.php');

$aeroporto1 = new Aeroporto();
$aeroporto2 = new Aeroporto();

$aviao1 = new Aviao();

$passageiro1 = new Passageiro();
$passageiro2 = new Passageiro();
$passageiro3 = new Passageiro();

$passagem1 = new Passagem();
$passagem2 = new Passagem();
$passagem3 = new Passagem();

$voo1 = new Voo();

$aeroporto1->setAeroporto("SBMG", "Aeroporto Regional de
Maringá");
$aeroporto2->setAeroporto("GRU", "Aeroporto Internacional de
São Paulo/Guarulhos");

$aviao1->setAviao("PR-XMG", "B737-800", "GOL Linhas Aéreas S.A.");
$passageiro1->setPassageiro("CS-123456", "José Lima");
$passageiro2->setPassageiro("CS-198476", "Fernando Reis");
$passageiro3->setPassageiro("CS-145899", "Cassandra Costa");

$voo1->setaeroportoOrigem($aeroporto1, $aeroporto2, "2020-10-
24 15:40:00", "2020-10-24 16:40:00", $aviao1);

$passagem1->setPassagem($voo1, $passageiro1, "D1");
$passagem2->setPassagem($voo1, $passageiro2, "D2");
$passagem3->setPassagem($voo1, $passageiro3, "D3");

print_r($passagem1);

/*
Resultado:

*/
