<?php

namespace Suplos\Core;

use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class Vista
{
    /**
     * Renderiza una vista usando Twig
     * @param  [type] $template arvhivo a renderizar
     * @param  array  $args     parametros envidados a la vista
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new FilesystemLoader(dirname(__DIR__) . '/Views');
            $twig = new Environment($loader);
        }

        echo $twig->render($template, $args);
    }
}