<?php

namespace Learning\Core\Services\Routing;

use Learning\Core\Interfaces\RouteInterface;

class Router implements RouteInterface
{
    function route(): callable
    {

        return function () {
            $known_controller = ['page'];
            $known_method = ['view'];
            $url = $_SERVER['REQUEST_URI'];
            $segments = explode('/', $url);
            array_shift($segments);
            $controller = $segments[0];
            $method = $segments[1];
            if ($url === '/' || in_array($controller, $known_controller) && in_array($method, $known_method)) {
                echo "Vasya";
            } else {
                http_response_code(404);
                echo "ошибся";
            }
        };
    }
}