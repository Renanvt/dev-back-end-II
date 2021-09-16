<?php

use Ator\Ator;
use Atua\Atua;
use Filme\Filme;

require_once('Class/Ator.php');
require_once('Class/Atua.php');
require_once('Class/Filme.php');

$ator1 = new Ator("Rafael A. Florindo");
$ator2 = new Ator("Carlos Danilo Luz");

$filme1 = new Filme("Armagedon");

$atua = array();

$ator1Atua = new Atua();
$ator1Atua->setAtua($filme1, $ator1, "Cinegrafista");
$atua[] = $ator1Atua;

$ator2Atua = new Atua();
$ator2Atua->setAtua($filme1, $ator2, "Dramaturgico");
$atua[] = $ator2Atua;

print_r($ator1);
print_r($atua);

/*
No arquivo de controle, instanciamos dois atores e um filme. Note que criamos
um array com o nome atua e, em cada posição deste array, armazenamos a
instância da atuação dos atores ator1Atua e ator2Atua.

Notem que o ator Rafael participa do filme Armagedon, no papel de Cinegrafista, e, neste filme, ainda temos a participação do ator Carlos participando como Dramaturgico. Desta forma, mostramos o relacionamento
de muitos para muitos.
*/

/*
Resultado:

Ator\Ator Object ( 
    [nome] => Rafael A. Florindo 
    [atua] => Array ( 
        [0] => Atua\Atua Object ( 
            [filme] => Filme\Filme Object ( 
                [titulo] => Armagedon 
                [atua] => Array ( 
                    [0] => Atua\Atua Object *RECURSION* [1] => Atua\Atua Object ( 
                        [filme] => Filme\Filme Object *RECURSION* 
                        [ator] => Ator\Ator Object (
                             [nome] => Carlos Danilo Luz [atua] => Array ( 
                                 [0] => Atua\Atua Object *RECURSION* 
                                )
                            ) 
                        [papel] => Dramaturgico 
                    ) 
                ) 
            ) 
            [ator] => Ator\Ator Object *RECURSION* [papel] => Cinegrafista 
        )          
    ) 
) 






Array ( 
    [0] => Atua\Atua Object ( 
        [filme] => Filme\Filme Object ( 
            [titulo] => Armagedon [atua] => Array (
                 [0] => Atua\Atua Object *RECURSION* 
                 [1] => Atua\Atua Object ( 
                    [filme] => Filme\Filme Object *RECURSION* 
                    [ator] => Ator\Ator Object ( 
                        [nome] => Carlos Danilo Luz [atua] => Array ( 
                            [0] => Atua\Atua Object *RECURSION* 
                            ) 
                        )
                        [papel] => Dramaturgico 
                    )
                )
            )
            [ator] => Ator\Ator Object ( 
                [nome] => Rafael A. Florindo 
                [atua] => Array ( 
                    [0] => Atua\Atua Object *RECURSION* 
                )
            )
            [papel] => Cinegrafista
        )

    [1] => Atua\Atua Object (
        [filme] => Filme\Filme Object (
            [titulo] => Armagedon [atua] => Array (
                [0] => Atua\Atua Object (
                    [filme] => Filme\Filme Object *RECURSION* 
                    [ator] => Ator\Ator Object (
                        [nome] => Rafael A. Florindo [atua] => Array (
                            [0] => Atua\Atua Object *RECURSION* 
                        )
                    )
                    [papel] => Cinegrafista 
                )
                [1] => Atua\Atua Object *RECURSION* 
            )
        )
        [ator] => Ator\Ator Object (
            [nome] => Carlos Danilo Luz [atua] => Array ( 
                [0] => Atua\Atua Object *RECURSION* 
            )
        )
        [papel] => Dramaturgico 
    )
)
*/