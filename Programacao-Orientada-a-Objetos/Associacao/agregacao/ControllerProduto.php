<?php
/*
A agregação é o tipo de relação entre objetos conhecida como todo/parte. Neste tipo
de associação, um objeto agrega outro objeto, ou seja, torna um objeto externo parte
de si mesmo. Nesse caso, temos que o objeto pai poderá utilizar funcionalidades dos
objetos agregados, ou seja, um objeto todo pode agregar um ou mais objetos parte.

Neste caso,
a classe Carrinho é o todo, e a classe Produto é a parte
*/
use Carrinho\Carrinho;
use Produto\Produto;

require_once("Class/Carrinho.php");
require_once("Class/Produto.php");

$produto1 = new Produto(12, "Arroz", 25.78, 104);
$produto2 = new Produto(2, "Feijão", 5.78, 1400);
$produto3 = new Produto(125, "Café", 9.78, 714);

$carrinhoJunior = new Carrinho();
$carrinhoJunior->adicionarItem($produto1);
$carrinhoJunior->adicionarItem($produto2);
$carrinhoJunior->adicionarItem($produto3);

$results = $carrinhoJunior->exibirLista();
print_r($results);
echo "Total: " . $carrinhoJunior->calcularTotalCarrinho();

/*
Resultado:
Array
(
    [0] => Produto Object
        (
        [codigo] => 12
        [descricao] => Arroz
        [preco] => 25.78
        [quantidade] => 104
    )

    [1] => Produto Object
        (
        [codigo] => 2
        [descricao] => Feijão
        [preco] => 5.78
        [quantidade] => 1400
    )

    [2] => Produto Object
        (
        [codigo] => 125
        [descricao] => Café
        [preco] => 9.78
        [quantidade] => 714
    )
)
Total: 41.34
*/