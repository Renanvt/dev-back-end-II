<?php
/*
Notem que, neste arquivo, instanciamos um objetos midia para a classe TipoEquipamento e três objetos para a classe Equipamento. Em todos os
objetos da classe Equipamento, passamos a referência do objeto midia. 
*/
use Equipamento\Equipamento;
use TipoEquipamento\TipoEquipamento;

require_once('Class/Equipamento.php');
require_once('Class/TipoEquipamento.php');

$midia = new TipoEquipamento(12, "Video");

$monitor1 = new Equipamento(10, "Monitor 15 pol.", date("dm-Y"), $midia);

print_r($monitor1);

$monitor2 = new Equipamento(20, "Monitor 17 pol.", date("dm-Y"), $midia);
$monitor3 = new Equipamento(30, "Monitor 21 pol.", date("dm-Y"), $midia);

print_r($midia);

/*
Resultado:

Equipamento\Equipamento Object ( 
    [codigoEquipamento] => 10 
    [descricao] => Monitor 15 pol. 
    [dataAquisicao] => 1509-2021 
    [tipoEquipamento] => TipoEquipamento\TipoEquipamento Object ( 
        [codigoTipoEquipamento] => 12 
        [descricao] => Video 
        [equipamentos] => Array ( 
            [0] => Equipamento\Equipamento Object *RECURSION* 
        ) 
    ) 
) 

TipoEquipamento\TipoEquipamento Object ( 
    [codigoTipoEquipamento] => 12 
    [descricao] => Video 
    [equipamentos] => Array ( 
        [0] => Equipamento\Equipamento Object (
             [codigoEquipamento] => 10 
             [descricao] => Monitor 15 pol. [dataAquisicao] => 1509-2021 [tipoEquipamento] => TipoEquipamento\TipoEquipamento Object *RECURSION* 
        ) 
        [1] => Equipamento\Equipamento Object (            
            [codigoEquipamento] => 20 
            [descricao] => Monitor 17 pol. [dataAquisicao] => 1509-2021 [tipoEquipamento] => TipoEquipamento\TipoEquipamento Object *RECURSION* 
        ) 
        [2] => Equipamento\Equipamento Object (
            [codigoEquipamento] => 30 
            [descricao] => Monitor 21 pol. [dataAquisicao] => 1509-2021 [tipoEquipamento] => TipoEquipamento\TipoEquipamento Object *RECURSION* ) 
        ) 
    )

*/