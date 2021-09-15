<?php
namespace Pessoa;

require_once('Contato.php');

use Contato;

class Pessoa
{
    public $codigo;
    public $nome;
    public $contato;

    public function __construct()
    {
        $this->codigo=0;
        $this->nome="";
        $this->contato = new Contato();
    }

    public function setContato($codigo, $nome, $email, $telefone)
    {
        /*
        Notem que, após povoar os atributos codigo e nome, invocamos o método setContato da classe Contato pelo objeto contato
        da classe Pessoa e passamos a ele os atributos telefone e email. É neste
        método que a mágica acontece, ou seja, um objeto interno de uma classe todo
        chama a outra classe parte para compor sua classe todo.
        */
        $this->codigo=$codigo;
        $this->nome=$nome;
        $this->contato->setContato($telefone, $email);
    }

    public function getContato()
    {
        return json_encode([
        "Código"=>$this->codigo,
        "Nome"=>$this->nome,
        "Contato"=>$this->contato
        ]);
    }
}