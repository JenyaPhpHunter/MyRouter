<?php

namespace Learning\Core\Services\Routing;

use Learning\Core\Interfaces\RouteInterface;

class Router implements RouteInterface
{
    protected string $namespace;
    public array $routes = [];

    public function __construct(string $namespace)
    {
        $this->namespace = $namespace;
    }

    public function getData(): array
    {
        $data['url'] = $_SERVER['REQUEST_URI'];
        $segments = explode('/', $data['url']);
        array_shift($segments);
        $controllerName = ucfirst($segments[0]);
        $data['controllerClass'] = $this->namespace . "\\" . $controllerName . 'Controller';
        $data['method'] = $segments[1];
        return $data;
    }

    public function addRoute(string $path, $action)
    {
        $this->routes['path'] = $path;
        $this->routes['action'] = $action;
    }

    function route(): callable
    {
        $data = $this->getData();
        $routes = $this->routes;
        return function () use ($data, $routes) {
            if (class_exists($data['controllerClass'])) {
                $controller = new $data['controllerClass']();
            }
            if (method_exists($controller, $data['method'])) {
                call_user_func([$controller, $data['method']], $_GET);
            } elseif ($data['url'] === '/') {
                echo "Index.php";
            } else {
                if ($data['url'] == $routes['path']) {
                    $routes['action']();
                } else {
                    echo "некорректная ссылка";
                    throw new \Exception('некорректная ссылка');
                }
            }
        };
    }

}
