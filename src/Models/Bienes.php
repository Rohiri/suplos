<?php

namespace Suplos\Models;

use PDO;
use Suplos\Core\Modelo;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


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

    public static function filter($request)
    {
        $db = static::getDatabase();
        $stmt = $db->prepare('SELECT *
        	FROM realstate rl1
        	INNER JOIN cities rl2 ON rl1.city_id = rl2.id
        	INNER JOIN types rl3 ON rl1.type_id = rl3.id
        	WHERE rl1.city_id = ?
        	AND rl1.type_id = ?'
        );

        $stmt->bindParam(1,$request['ciudad'],PDO::PARAM_INT);
        $stmt->bindParam(2,$request['tipo'],PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function insert($request)
    {
        $db = static::getDatabase();

        try {
        	$db->beginTransaction();
        	$stmt = $db->prepare('INSERT INTO realstate (addres,phone,postal_code,price,city_id,type_id)
        	VALUES(?,?,?,?,?,?)');

	        $stmt->bindParam(1,$request['direccion'],PDO::PARAM_INT);
	        $stmt->bindParam(2,$request['telefono'],PDO::PARAM_INT);
	        $stmt->bindParam(3,$request['codigo_postal'],PDO::PARAM_INT);
	        $stmt->bindParam(4,$request['price'],PDO::PARAM_INT);
	        $stmt->bindParam(5,$request['city_id'],PDO::PARAM_INT);
	        $stmt->bindParam(6,$request['type_id'],PDO::PARAM_INT);
	        $stmt->execute();
        	$db->commit();
        } catch (Exception $e) {
        	$db->rollback();
        }
    }

}
