<?php




require_once __DIR__.'/boot/autoload.php';


//Rutas
$router = new Suplos\Core\Enrutador();

$router->agregar('', ['controller' => 'HomeController', 'action' => 'index']);
$router->agregar('data/index', ['controller' => 'DataController', 'action' => 'index']);

$router->dispatch($_SERVER['QUERY_STRING']);
