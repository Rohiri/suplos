<?php

namespace Suplos\Models;

use PDO;
use Suplos\Core\Modelo;


class City extends Modelo
{
    public static function getAll()
    {
        $db = static::getDatabase();
        $stmt = $db->query('SELECT *
        	FROM cities rl1'
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
