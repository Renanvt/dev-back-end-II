<?php
include('Carros.php');
$tipo = "Passeio";
$cor = "Branco";
 echo "Venda: $marca $tipo $cor";
// será impresso Venda: Ford Passeio Branco
echo "</br>";

include('Carros.php');
echo "Venda: $marca $tipo $cor";
// será impresso Venda: Ford SUV Preto

/*
No código anterior, observe que utilizamos a função Include para chamar o
componente. Como essa chamada aceita a inclusão do mesmo componente mais
de uma vez, podemos ter problemas com subscrita, sendo aconselhável utilizar
a função Require_once, assim, evitando problemas de múltiplas inclusões e a
parada do sistema para identificação de possíveis erros.
*/