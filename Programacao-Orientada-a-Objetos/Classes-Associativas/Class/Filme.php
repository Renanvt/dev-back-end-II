<?php
namespace Filme;

/*
A classe Filme √© parecida com a classe Ator, diferenciando apenas o atributo
titulo, que armazenar√° o nome do filme.
*/
class Filme
{
    public $titulo;
    public $atua;

    public function __construct($titulo)
    {
        $this->titulo = $titulo;
        $this->atua = array();
    }
}