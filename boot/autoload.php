<?php
/*
|--------------------------------------------------------------------------
| Autoload de Composer
|--------------------------------------------------------------------------
|
| Composer provee el autocargado de clases automaticamente para la
| aplicacion.
|
*/
require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();