<?php

namespace Jogador;

Class Jogador
{
    /*
    No exemplo apresentado, temos a classe Jogador, cujos atributos são código,
    nome e o código do possível capitão do jogador. Pelo fato de que esse capitão
    também é um jogador, a associação chamada comanda indica uma possível
    relação entre uma ou mais instâncias da classe Jogador com outras instâncias
    da mesma classe, ou seja, tal associação determina que um jogador pode ou não
    comandar outros jogadores. Além disso, essa associação faz com que a classe
    possua o atributo codigoCapitao para armazenar o código do jogador, que
    é o responsável pela instância do jogador em questão. Desse modo, após consultar
    uma instância da classe Jogador, pode-se utilizar o atributo codigoCapitao da instância consultada para pesquisar por outra instância da classe 
    */
    private $codigo;
    private $nome;
    private $codigoCapitao;

    public function __construct($codigo, $nome)
    {
        $this->setCodigo($codigo);
        $this->setNome($nome);
        $this->codigoCapitao=null;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    
    public function setNome($nome)
    {
        $this->nome = $nome;

    }
    
    public function setCodigoCapitao(Jogador $codigoCapitao)
    {
        /*
        Para garantir a associação unária, no método setCodigoCapitao(Jogador $codigoCapitao), recebemos um objeto de capitão e armazenamos
        em seu respectivo atributo. Em seguida, no método getCodigoCapitao(), retornamos o conteúdo do objeto com o comando return $this->codigoCapitao->getNome();. */
        $this->codigoCapitao = $codigoCapitao;
    }

    public function getCodigoCapitao()
    {
        return $this->codigoCapitao->getNome();
    }
 

    public function __toString()
    {
        $dados = [
            "codigo"=>$this->getCodigo(),
            "nome"=>$this->getNome(),
            "Capitao"=>$this->getCodigoCapitao()
        ];

        return json_encode($dados);
    }
}