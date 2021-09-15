<?php
namespace Carrinho;

use Produto\Produto;

class Carrinho
{
    /*temos os atributos itens[] como um array que receberá as referências dos objetos da classe Produto. */
    public $itens;

    public function __construct()
    {
        $this->itens = array();
    }

    public function adicionarItem(Produto $itens)
    {
        /*
        temos os métodos: adicionarItem(), que recebe
        o parâmetro item do tipo Produto; 
        */
        $this->itens[] = $itens;
    }

    public function exibirLista()
    {
        return $this->itens;
    }

    public function calcularTotalCarrinho():float
    {
        $total = 0;
        for($i = 0; $i < count($this->itens); $i++){
        $total += $this->itens[$i]->preco;
    }
        return $total;
    }
}