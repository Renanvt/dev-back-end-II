<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('Class/Usuario.php');
require_once('Class/Conexao.php');

// INSTANCIANDO USUÁRIO
$usuario = new Usuario();

// CADASTRANDO USUÁRIO
$dados = [
    'nome' => 'Carlos Fernades',
    'email' => 'josefernades@hotmail.com',
    'dataNascimento' => '2010-10-12',
    'telefone' => '(48) 98754-5825'
];
$dados = json_encode($dados);

//INSERINDO USUÁRIO NO BANCO DE DADOS
$addUsuarios = $usuario->inserirUsuario($dados);

echo "<h2>Listar Usuário:</h2>";
$listaUsuarios = $usuario->listarUsuario();
//LISTANDO USUÁRIO
echo $listaUsuarios;

// CADASTRANDO USUÁRIO 2
$dados= [
    'nome' => 'Felipe Fernades',
    'email' => 'josefernades@hotmail.com',
    'dataNascimento' => '2010-10-12',
    'telefone' => '(48) 98754-5825'
];
$dados = json_encode($dados);

//INSERINDO USUÁRIO PREPARADO NO BANCO DE DADOS
$addUsuarios2 = $usuario->inserirUserPreparado($dados);

echo "<h2>Busca e Usuário:</h2>";
$buscaUsuario = $usuario->buscarUserPreparado(2);
//BUSCANDO USUÁRIO PREPARADO
echo $buscaUsuario;

// CADASTRANDO USUÁRIO 3
$id = 3;
$dados=[
    'nome' => 'Carlos Alberto',
    'email' => 'carlos@hotmail.com',
    'dataNascimento' => '2010-10-12',
    'telefone' => '(48) 98754-5825'
];
$dados = json_encode($dados);

// EDITAR USUÁRIO PREPARADO
$editarUsuarios = $usuario->editarUsuarioPreparado($id,
    $dados);

// DELETAR USUÁRIO
$id = 3;
$deletarUsuarios = $usuario->deletarUsuario($id);

// DELETAR USUÁRIO 2
$id = 4;
$deletarUsuarios = $usuario->deletarUsuarioPreparado($id);