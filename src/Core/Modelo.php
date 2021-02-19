<?php

namespace Suplos\Core;

use PDO;

abstract class Modelo
{
    /**
     * Clase Base para consultar a la base de datos usando PDO.
     * @return [type] [description]
     */
    protected static function getDatabase()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'pgsql:host=localhost;port=5432;dbname=intelcost_bienes';
            $db = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}