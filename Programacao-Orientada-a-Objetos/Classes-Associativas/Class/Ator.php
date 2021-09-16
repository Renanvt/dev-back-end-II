<?php
namespace Ator;

class Ator
{
    public $nome;
    public $atua = array(); //armazenar as referências das atuações do ator Neste caso,
    // como ele deve atender à multiplicidade muitos, ele será um array.
    public function __construct($nome)
    {
        $this->nome=$nome;
        $this->atua;
    }
}