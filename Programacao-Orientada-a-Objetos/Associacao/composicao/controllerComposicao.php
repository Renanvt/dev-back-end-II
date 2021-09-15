<?php
/*
A composição também é uma relação todo/parte, contudo existe uma grande
diferença em relação à agregação. Na composição, o objeto todo é responsável
pela criação e destruição de suas partes. Enquanto, na agregação, o objeto todo
possui agregações de partes (DALL’OGLIO, 2009).

Na agregação, ao destruir o objeto todo, os objetos partes ainda existem, ou
seja, são independentes do objeto todo, diferentemente da composição em que,
o objeto todo e o objeto parte são totalmente dependentes.
*/

use Pessoa\Pessoa;

require_once('Class/Pessoa.php');

$jose = new Pessoa();
$jose->setContato(10, "Jose de Abreu", "43 2568-7895", "jose@jsoe.com");

echo $jose->getContato();
/*
Resultado:
{
    "Código": 10,
    "Nome": "Jose de Abreu",
    "Contato": {
        "telefone": "jose@jsoe.com",
        "email": "43 2568-7895"
    }
}
*/