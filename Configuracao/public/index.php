<?php

$root = dirname(path: __DIR__);

define('APP_ROOT', $root);

// Faz a inclusão do arquivo autoload do composer
require $root . '/vendor/autoload.php';

use App\Controller\MyController;

// Instanciando o controller
$controller = new MyController();

$controller->view();

/*
 Resultado:
Jhon Doe
Mary Jane
------%
*/
