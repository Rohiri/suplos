<?php

namespace Suplos\Core;


class Enrutador
{
    /**
     * array de rutas
     * @var array
     */
    protected $rutas = [];

    /**
     * Parametros
     * @var array
     */
    protected $parametros = [];

    /**
     * Agregar una ruta
     * @param  [type] $ruta       [description]
     * @param  array  $parametros [description]
     * @return [type]             [description]
     */
    public function agregar($ruta, $parametros = [])
    {
        $ruta = preg_replace('/\//', '\\/', $ruta);

        $ruta = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $ruta);

        $ruta = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $ruta);

        $ruta = '/^' . $ruta . '$/i';

        $this->rutas[$ruta] = $parametros;

    }

    /**
     * Obtener las rutas
     * @return [type] [description]
     */
    public function obtenerRutas()
    {
        return $this->rutas;
    }

    /**
     * Hace coinciddir la ruta con las rutas en la tabla de rutas
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    public function match($url)
    {
        foreach ($this->rutas as $ruta => $params) {
            if (preg_match($ruta, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->parametros = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Obtener parametros de la ruta
     * @return [type] [description]
     */
    public function obtenerParametros()
    {
        return $this->parametros;
    }

    /**
     * Crea la ruta, el objeto controlador y ejecuta el metodo accion.
     *
     * @param string $url
     *
     * @return void
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {

            $controller = $this->parametros['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->obtenerNamespace() . $controller;

            if (class_exists($controller)) {
                $controller_object = new $controller($this->parametros);

                $action = $this->parametros['action'];
                $action = $this->convertToCamelCase($action);

                if (preg_match('/action$/i', $action) == 0) {
                    $controller_object->$action();

                } else {
                    throw new \Exception("El Metodo $action En El Controlador $controller No Puede Ser Accedido - Eliminar el Sufijo Action Para Llamar a Este Metodo");
                }
            } else {
                throw new \Exception("El Controlador $controller No Existe");
            }
        } else {
            throw new \Exception('No se encuentra la ruta.', 404);
        }
    }

    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * Remueve de las variables de la que existen dentro de la url. Por Ejemplo
     *   URL                           $_SERVER['QUERY_STRING']  Route
     *   -------------------------------------------------------------------
     *   localhost/index               /index                   /index
     *   localhost/index?city=1        /index&city=1            /index
     */
    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }

    /**
     * Obtiene los nombres de espacio del Controlador.
     */
    protected function obtenerNamespace()
    {
        $namespace = 'Suplos\Controllers\\';

        if (array_key_exists('namespace', $this->parametros)) {
            $namespace .= $this->parametros['namespace'] . '\\';
        }

        return $namespace;
    }
}