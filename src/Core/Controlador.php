<?php

namespace Suplos\Core;

use Exception;

/**
 * Controlador Base para extender
 */
abstract class Controlador
{

    /**
     * Parametros de la ruta que coincide
     * @var array
     */
    protected $parametros = [];

    /**
     * Constructor
     * @param [type] $parametros [description]
     */
    public function __construct($parametros)
    {
        $this->parametros = $parametros;
    }

    /**
     * Se llama al metodo magico cuando se intenta llamara a un metodo
     * inexistente en un objeto de esta clase
     * @param  [type] $name Nombre del Metodo
     * @param  [type] $args Parametros
     */
    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new Exception("El Metodo $method No Existe En El Controlador " . get_class($this));
        }
    }

    protected function before()
    {
        //
    }

    protected function after()
    {
        //
    }
}