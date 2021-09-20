<?php

use UsuarioPDO\UsuarioPDO;

require_once('Class/UsuarioPDO.php');

// INSTANCIANDO USUÁRIO PDO
$usuario = new UsuarioPDO();
$dados = [
    'nome' => 'Carlos Fernades',
    'email' => 'josefernades@hotmail.com',
    'dataNascimento' => '2010-10-12',
    'telefone' => '(48) 98754-5825'
];


$results = json_encode($dados);
// INSERIR USUÁRIO PREPARADO
$addUsuario = $usuario->inserirUserPreparado($results);


echo "<h2>Listar Usuário:</h2>";
$listaUsuarios = $usuario->listarUsuario();
// LISTAR USUÁRIO
echo $listaUsuarios;


echo "<h2>Busca e Usuário:</h2>";
// BUSCAR USUÁRIO
$buscaUsuario = $usuario->buscarUsuario(1);
echo $buscaUsuario;


$id = 5;
$dados=[
    'nome' => 'Tania Vanso',
    'email' => 'vanso@hotmail.com',
    'dataNascimento' => '2010-10-12',
    'telefone' => '(48) 98754-5825'
];
$dados = json_encode($dados);

//EDITAR USUÁRIO
echo $editarUsuario2 = $usuario->editarUser($id, $dados);
echo "<h2>Busca e Usuário:</h2>";

//DELETANDO USUÁRIO
$id = 5;
echo $excluirUsuario2 = $usuario->deletarUser($id);



echo "<h2>Busca e Usuário:</h2>";
//BUSCANDO USUÁRIO COM ID 1
$buscaUsuario = $usuario->buscarUsuario(1);
echo $buscaUsuario;
