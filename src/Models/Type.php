<?php

namespace Suplos\Models;

use PDO;
use Suplos\Core\Modelo;


class Type extends Modelo
{
    public static function getAll()
    {
        $db = static::getDatabase();
        $stmt = $db->query('SELECT *
        	FROM types rl1'
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
