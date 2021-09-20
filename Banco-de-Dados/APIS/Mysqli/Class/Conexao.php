<?php
/*
Notem que criamos uma classe abstrata com o nome de Conexao. Dessa forma,
a classe que necessitar utilizar o banco de dados deverá estender (generalização/
herança) a classe Conexao. Caso a classe não seja instanciada, o servidor do
PHP retornará um Fatal error: Uncaught Error: Cannot instantiate abstract class Conexao.
*/

//A classe Conexao — Representa uma conexão entre o PHP e um banco de dados MySQLi
namespace Conexao;

abstract class Conexao
{

    protected function conectarDB()
    {
        try {
            //realiza a conexão com o banco
            //de dados Mysql/MariaDB por intermédio da extensão mysqli
            return $conectar = new \mysqli("localhost", "root", "", "dbteste");
        } catch (\mysqli_sql_exception $e) {
            return $e->getMessage();
        }
    }


}
