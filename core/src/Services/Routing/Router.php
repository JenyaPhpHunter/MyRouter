<?php

namespace Learning\Core\Services\Routing;

use Learning\Core\Interfaces\RouteInterface;

class Router implements RouteInterface
{
    function route()
    {
        $known_entities = ['product'];
        $url = $_SERVER['REQUEST_URI'];
        $segments = explode('/', $url);
        array_shift($segments);
        $entity = $segments[0];
        $id = $segments[1];
        if($url === '/' || in_array($entity, $known_entities) && is_numeric($id)){
            echo "Vasya";
        } else {
            http_response_code(404);
            echo "ошибся";
        }
    }
}