<?php

namespace Equipamento;

use TipoEquipamento\TipoEquipamento;

require_once('TipoEquipamento.php');

Class Equipamento
{
    /*
    Notem que, na classe Equipamento, além dos atributos explícitos na modelagem,
    devemos incluir mais um atributo que armazenará a referência do objeto da classe
    TipoEquipamento, garantindo, assim, a multiplicidade e a associação entre as
    classes. No construtor da classe, recebemos os atributos $codigoEquipamento,
    $descricao, $dataAquisicao mais o objeto da classe TipoEquipamento por meio do parâmetro TipoEquipamento $tipoEquipamento, ou
    seja, estamos forçando o php a receber um objeto e não um valor comum. 
    */
    public $codigoEquipamento;
    public $descricao;
    public $dataAquisicao;
    public $tipoEquipamento;

    public function __construct($codigoEquipamento,  $descricao, $dataAquisicao, TipoEquipamento $tipoEquipamento)
    {
        /*
        Ainda no método construtor, após setar todos os atributos, armazenamos,
        no atributo equipamentos[] da classe TipoEquipamento, o próprio
        objeto da classe Equipamento pelo comando $this. 
        */
        $this->codigoEquipamento = $codigoEquipamento;
        $this->descricao = $descricao;
        $this->dataAquisicao = $dataAquisicao;
        $this->tipoEquipamento = $tipoEquipamento;

        $tipoEquipamento->equipamentos[] = $this;
    }
}