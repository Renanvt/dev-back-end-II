<?php

namespace TipoEquipamento;

class TipoEquipamento
{
    /*
    Na classe TipoEquipamento, além dos atributos explícitos na modelagem, devemos incluir mais um atributo que armazenará a referência do
    objeto da classe Equipamento, garantindo, assim, a multiplicidade e a associação entre as classes. No construtor da classe, recebemos por parâmetro
    os atributos $codigoTipoEquipamento, $descricao e setando em
    suas respectivas variáveis de classe, e já inicializamos o array dinâmico que
    armazenará as referências da classe Equipamento.
    */
    public $codigoTipoEquipamento;
    public $descricao;
    public $equipamentos;

    public function __construct($codigoTipoEquipamento,
    $descricao)
    {
        $this->codigoTipoEquipamento= $codigoTipoEquipamento;
        $this->descricao=$descricao;
        $this->equipamentos = array();
    }
}