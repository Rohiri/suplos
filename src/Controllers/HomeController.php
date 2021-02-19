<?php

namespace Suplos\Controllers;

use Suplos\Core\Vista;
use Suplos\Models\Bienes;
use Suplos\Models\City;
use Suplos\Models\Type;
use Suplos\Core\Controlador;
use Suplos\Models\DatosGenerales;

class HomeController extends Controlador
{
    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        $data = new DatosGenerales;
        $real_states = $data->getAllRealStates($_REQUEST);

        $dataUser = new Bienes;

        Vista::renderTemplate('welcome/welcome.html',[
            'cities' => $data->getAllCities(),
            'types' => $data->getAllTypes(),
            'real_states' => $real_states,
            'total_real_states' => count($real_states) ?? 0,
            'user_real_states' => Bienes::getAll(),
            'user_total_real_states' => count(Bienes::getAll()),
            'types_database' => Type::getAll(),
            'cities_database' => City::getAll(),
        ]);
    }

}
