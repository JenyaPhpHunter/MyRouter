<?php

namespace Learning\Core;

use Learning\Core\Interfaces\RouteInterface;

class Application
{
    protected RouteInterface $router;

    public function __construct(RouteInterface $router)
    {
        $this->router = $router;
    }

    public function main()
    {
        $callable = $this->router->route();
        $callable();
    }

}