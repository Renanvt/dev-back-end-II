<?php

namespace Usuario;

use InterfaceDado\InterfaceDao;

require_once('InterfaceDAO.php');

/*
O código anterior implementa a interface DAO e, consequentemente, deverá implementar todos os seus métodos, mesmo que sejam sem instruções dentro de seus
métodos. No nosso caso, como não implementaremos o conteúdo dos métodos,
colocou-se apenas o comando return, pois esses métodos devem retornar um valor.

*/
class Usuario implements InterfaceDao
{
    public function insert($parametros, $valores): bool
    {
        return true;
    }
    public function update($parametros, $valores): bool
    {
        return true;
    }
    public function delete($clausula): bool
    {
        return true;
    }
    public function selectAll(): array
    {
        return [];
    }
    public function loadById($id): array
    {
        return [];
    }
}
