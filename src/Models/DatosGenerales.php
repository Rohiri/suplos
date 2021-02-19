<?php

namespace Suplos\Models;

use Suplos\Core\Modelo;


class DatosGenerales
{
	public $ciudades = [];

	public $tipos = [];

    public $realstate = [];



    public function getAllCities()
    {
    	foreach ($this->getInformacion() as $data) {

    		if (!in_array($data->Ciudad, $this->ciudades)) {
    			array_push($this->ciudades, $data->Ciudad);
    		}
    	}

    	return $this->ciudades;
    }

    public function getAllTypes()
    {
    	foreach ($this->getInformacion() as $data) {

    		if (!in_array($data->Tipo, $this->tipos)) {
    			array_push($this->tipos, $data->Tipo);
    		}
    	}

    	return $this->tipos;
    }

    public function getAllRealStates($request =[])
    {
        foreach ($this->getInformacion() as $data) {
            $this->realstate[] = [
                'Id' => $data->Id,
                'Direccion' => $data->Direccion,
                'Ciudad' => $data->Ciudad,
                'Telefono' => $data->Telefono,
                'Codigo_Postal' => $data->Codigo_Postal,
                'Tipo' => $data->Tipo,
                'Precio' => $data->Precio,
            ];
        }

        if (isset($request['city'])) {
            $result = array_filter($this->realstate, function($data) use ($request) {
                return $data['Ciudad'] == $request['city'];
            });

            $this->realstate = $result;
        }

        if (isset($request['type'])) {
            $result = array_filter($this->realstate, function($data) use ($request) {
                return $data['Tipo'] == $request['type'];
            });

            $this->realstate = $result;
        }

        return $this->realstate;
    }


    public function getInformacion()
    {
    	return json_decode(file_get_contents(__DIR__."/../../data-1.json"));
    }


}
