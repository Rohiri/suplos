<?php

namespace Suplos\Models;

use PDO;
use Suplos\Core\Modelo;


class Bienes extends Modelo
{
    public static function getAll()
    {
        $db = static::getDatabase();
        $stmt = $db->query('SELECT *
        	FROM realstate rl1
        	INNER JOIN cities rl2 ON rl1.city_id = rl2.id
        	INNER JOIN types rl3 ON rl1.type_id = rl3.id'
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
