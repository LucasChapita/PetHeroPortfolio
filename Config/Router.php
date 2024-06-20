<?php

namespace Config;

use Config\Request as Request;

class Router
{
    public static function Route(Request $request)
    {
        $controllerName = $request->getcontroller() . 'Controller';
        $methodName = $request->getmethod();
        $methodParameters = $request->getparameters();

        // Verificar si $start está presente en los parámetros y eliminarlo si es necesario
        if (isset($methodParameters['start'])) {
            unset($methodParameters['start']);
        }

        // Verificar si $finish está presente en los parámetros y eliminarlo si es necesario
        if (isset($methodParameters['finish'])) {
            unset($methodParameters['finish']);
        }

        $controllerClassName = "Controllers\\" . $controllerName;

        $controller = new $controllerClassName;

        if (!isset($methodParameters)) {
            call_user_func(array($controller, $methodName));
        } else {
            call_user_func_array(array($controller, $methodName), $methodParameters);
        }
    }
}
