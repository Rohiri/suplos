<?php




require_once __DIR__.'/vendor/autoload.php';


//Para Usar variables de Entorno en .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


//Rutas
$router = new Suplos\Core\Enrutador();

$router->agregar('', ['controller' => 'HomeController', 'action' => 'index']);

$router->dispatch($_SERVER['QUERY_STRING']);
