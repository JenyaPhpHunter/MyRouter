<?php

namespace Learning\Core\Services\Routing;

use Learning\App\Controllers\HomeController;
use Learning\Core\Interfaces\RouteInterface;

class Router implements RouteInterface
{
    protected string $namespace;

    public function __construct(string $namespace)
    {
        $this->namespace = $namespace;
    }
    function route(): callable
    {
        return function () {
            $known_entities = ['page','view','home','index'];
            $url = $_SERVER['REQUEST_URI'];
            $segments = explode('/', $url);
            array_shift($segments);
            $entiny = $segments[0];
            $second_entiny = $segments[1];
            if (in_array($entiny, $known_entities) && in_array($second_entiny, $known_entities)) {
                $controllerName = ucfirst($entiny); // Home
                $controllerClass = $this->namespace . "\\" . $controllerName . 'Controller';
                if(class_exists($controllerClass)){
                    $controller = new $controllerClass();
                }
                $method = $second_entiny;
//                var_dump($controller);
//                echo $method;
                if(method_exists($controller, $method)){
                    call_user_func([$controller,$method],$_GET);
                }
            } elseif($url === '/') {
                echo "Index.php";
            } else {
                http_response_code(404);
                echo "ошибся";
            }
        };
    }
}